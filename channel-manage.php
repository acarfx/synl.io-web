<!DOCTYPE html>
<html lang="en">
<?php include 'session.php'; ?>
<head>
	<?php include './includes/head.php'; ?>
	<link rel="stylesheet" href="./vendor/select2/css/select2.min.css">
	<link rel="stylesheet" href="./dist/css/component-custom-switch.css">
	<link href="./vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
	<link href="./vendor/jquery-asColorPicker/css/asColorPicker.min.css" rel="stylesheet">
</head>
<body>
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
	
			</div>
		  </div>
    <div id="main-wrapper">
     <?php include './includes/header.php'; ?>
	<div class="modal fade" id="addChannels">
			<div class="modal-dialog">
			  <div class="modal-content">
				<div class="modal-header">
				  <h4 class="modal-title">Yeni Kanal Ekleme</h4>
				  <button type="button" style="border: none; background-color: transparent;" data-bs-dismiss="modal"><i class="fa fa-close" style="color: whitesmoke"></i></button>
				</div>
				<div class="modal-body">
				  <div class="form-group">
					<label>Kanal ismi belirtin <span style="color: red;">*</span></label>
					<input class="form-control" style="background-color: #292f52; color: whitesmoke;" id="kanalOlusturma_i"></input>
					</br>
					<label>Kanal tipi belirtin <span style="color: red;">*</span></label>
					<select class="form-control" onchange="typeSelector();" style="background-color: #292f52; color: whitesmoke;" id="kanalOlusturma_t">
						<option value="GUILD_CATEGORY">Kategori</option>
						<option value="GUILD_VOICE">Ses</option>
						<option value="GUILD_TEXT">Metin</option>
					</select>
					</br>
					<div id="kategoriG" style="display: none;">
						<label>Kanal kategorisi belirtin</label>
						</br>
						<select class="form-control" style="background-color: #292f52; color: whitesmoke;" id="kanalOlusturma_k">
								<option value="NO_CATEGORY">Kategori Seçilmesin!</option>
						</select>
						</br>
					</div>
					<div id="sesLimitG"  style="display: none;">
						<label>Ses limit belirtin</label>
						</br>
						<input class="form-control" style="background-color: #292f52; color: whitesmoke;" id="kanalOlusturma_l"></input>
					</div>
				  </div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success light" onclick="kanalEkle();"><i class="fa fa-plus"></i> Ekle</button>
				  <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Geri Dön</button>
				</div>
			  </div>
			</div>
		  </div>
		  <div class="modal fade" id="editRole">
			<div class="modal-dialog">
			  <div class="modal-content">
				<div class="modal-header">
				  <h4 class="modal-title" id="rolDüzenleme_isim"></h4>
				  <button type="button" style="border: none; background-color: transparent;" data-bs-dismiss="modal"><i class="fa fa-close" style="color: whitesmoke"></i></button>
				</div>
				<div class="modal-body">
				  <div class="form-group">
					<label>Rol ismi belirtin:</label>
					<input class="form-control" style="background-color: #292f52; color: whitesmoke;" id="rolDuzenleme_isims"></select>
					</br>
					<label>Rol resmi belirtin (<span style="color: green;">Boost gerekir</span>):</label>
					<input class="form-control" style="background-color: #292f52; color: whitesmoke;" id="rolDuzenleme_icon"></select>
					</br>
					<label>Rol rengi belirtin</label>
					</br>
					<input type="text" class="as_colorpicker form-control"  id="rolDuzenleme_renk" value="#fffff"></input>
					</br>
					</br>
					<div class="custom-switch pl-0">
           			Sağda gözüksün mü? </br></br>  <input class="custom-switch-input" id="rolDuzenleme_sag" type="checkbox">
					<label class="custom-switch-btn" for="rolDuzenleme_sag" style="align-items: left;"></label>
            		</div>
					</br>
					<div class="custom-switch pl-0">
           			Etiketlenebilir mi? </br></br>  <input class="custom-switch-input" id="rolDuzenleme_etiket" type="checkbox">
					<label class="custom-switch-btn" for="rolDuzenleme_etiket" style="align-items: left;"></label>
            		</div>
				  </div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success light" onclick="updateRoles(editRole, 'EDIT')"><i class="fa fa-plus"></i> Düzenle</button>
				  <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Geri Dön</button>
				</div>
			  </div>
			</div>
		  </div>
         <div class="content-body">
			<div class="container-fluid">
			<div class="alert alert-danger alert-dismissible fade show" id="status-payment" style="display: none;"></div>
				<div class="form-head mb-sm-5 mb-3 d-flex flex-wrap align-items-center">
					
				<div class="welcome-text mr-auto">
                            <h4>Merhaba, <?php echo $var['name'] ?>!</h4>
                            <p class="mb-0">Kanal listesi ve yönetim sayfasına hoş geldiniz.</p>
                        </div>
					
				</div>
				<div class="row">
					<div class="col-xl-12">		
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Genel Kanal Listesi</h4>
								<button data-bs-toggle="modal" data-bs-target="#addChannels" class="btn btn-success text-white mb-2"><i class="fa-solid fa-plus"></i> Kanal Oluştur</button>
							</div>
							<div class="card-body">
                                <div class="table-responsive">
                                    <table id="example2" class="display" style="width:100%">
                                        <thead>
                                            <tr>
												<th>#</th>
                                                <th>Kanal</th>
												<th>Tip</th>
												<th>Kategori</th>
                                                <th>İşlemler</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                
                                    </table>
                                </div>
                            </div>
					</div>
					</div>
				</div>
				
		</div>
		</div>
        <?php include './includes/footer.php'; ?>


    </div>
 
    <script src="./vendor/global/global.min.js"></script>
	<script src="./vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="./synl/js/Guild.API.js"></script>
	<script src="./vendor/chart.js/Chart.bundle.min.js"></script>
	<script src="./vendor/select2/js/select2.full.min.js"></script>
    <script src="./js/plugins-init/select2-init.js"></script>
    <script src="./vendor/peity/jquery.peity.min.js"></script>
	<script src="./js/plugins-init/piety-init.js"></script>
	<script>checkGuild(), listChannels()</script>
	<script src="./vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="./js/plugins-init/datatables.init.js"></script>
	<script src="./vendor/toastr/js/toastr.min.js"></script>
	<script src="./js/plugins-init/toastr-init.js"></script>
	<script src="./vendor/sweetalert2/dist/sweetalert2.min.js"></script>
	<script src="./vendor/owl-carousel/owl.carousel.js"></script>
    <script src="./js/custom.min.js"></script>
	<script src="./js/deznav-init.js"></script>
    <script src="./js/plugins-init/widgets-script-init.js"></script>

</body>
 </html>

<div id="currentChart" class="current-chart" hidden="true"></div>