<!DOCTYPE html>
<html lang="en">
<?php include 'session.php'; ?>
<head>
	<?php include './includes/head.php'; ?>
	<link rel="stylesheet" href="./vendor/select2/css/select2.min.css">
	<link rel="stylesheet" href="./dist/css/component-custom-switch.css">
	<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
</head>
<body>
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
	<div class="modal fade" id="updateNickname">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <h4 class="modal-title" id="update_nick"></h4>
              <button type="button" style="border: none; background-color: transparent;" data-bs-dismiss="modal"><i class="fa fa-close" style="color: whitesmoke"></i></button>
            </div>

            <div class="modal-body">
				<label>Yeni isim belirtin:</label>
				<div class="input-group mb-3">
					<input type="text" class="form-control" id="get_name">
					<div class="input-group-append">
						<button class="btn btn-danger" onclick="patchMember(edit_user_id, 'NICKNAME', true);" type="button">Sıfırla</button>
					</div>
				</div>
            </div>
            <div class="modal-footer">
			
				<button type="button" class="btn btn-success light" onclick="patchMember(edit_user_id, 'NICKNAME');">İsim Değiştir</button>
            </div>
      
          </div>
        </div>
      </div>
	  <div class="modal fade" id="updateRole">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <h4 class="modal-title" id="title_role"></h4>
              <button type="button" style="border: none; background-color: transparent;" data-bs-dismiss="modal"><i class="fa fa-close" style="color: whitesmoke"></i></button>
            </div>

            <div class="modal-body">
				<label>Verilecek/alınacak rol belirtin:</label>
				<select class="form-control" onchange="" style="background-color: #292f52; color: whitesmoke;" id="get_role"></select>
            </div>
            <div class="modal-footer">
			
				<button type="button" class="btn btn-success light" onclick="patchMember(edit_user_id, 'ROLE');">Güncelle</button>
            </div>
      
          </div>
        </div>
      </div>
	  <div class="modal fade" id="setTimeout">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <h4 class="modal-title" id="title_zamanaşımı"></h4>
              <button type="button" style="border: none; background-color: transparent;" data-bs-dismiss="modal"><i class="fa fa-close" style="color: whitesmoke"></i></button>
            </div>

            <div class="modal-body">
				<label>Dakika cinsinde zaman belirtin:</label>
				<div class="input-group mb-3">
					<input type="text" class="form-control" id="get_time" value="5">
					<div class="input-group-append">
						<button class="btn btn-danger" onclick="patchMember(edit_user_id, 'TIMEOUT', true);" type="button">Kaldır</button>
					</div>
				</div>
				</br>
				<label>Zaman aşımı için sebep belirtin:</label>
				<input type="text" class="form-control" id="get_reason">
            </div>
            <div class="modal-footer">
			
				<button type="button" class="btn btn-success light" onclick="patchMember(edit_user_id, 'TIMEOUT');">Zaman Aşımı At</button>
            </div>
      
          </div>
        </div>
      </div>
	  <div class="modal fade" id="setBan">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <h4 class="modal-title" id="title_ban"></h4>
              <button type="button" style="border: none; background-color: transparent;" data-bs-dismiss="modal"><i class="fa fa-close" style="color: whitesmoke"></i></button>
            </div>

            <div class="modal-body">
				<label>Yasaklamak için bir sebep belirtin:</label>
				<input type="text" class="form-control" id="get_reason_ban">
            </div>
            <div class="modal-footer">
			
				<button type="button" class="btn btn-success light" onclick="patchMember(edit_user_id, 'BAN');">Yasakla</button>
            </div>
      
          </div>
        </div>
      </div>
	  <div class="modal fade" id="setKick">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <h4 class="modal-title" id="title_kick"></h4>
              <button type="button" style="border: none; background-color: transparent;" data-bs-dismiss="modal"><i class="fa fa-close" style="color: whitesmoke"></i></button>
            </div>

            <div class="modal-body">
				<label>Atmak için bir sebep belirtin:</label>
				<input type="text" class="form-control" id="get_reason_kick">
            </div>
            <div class="modal-footer">
			
				<button type="button" class="btn btn-success light" onclick="patchMember(edit_user_id, 'KICK');">At</button>
            </div>
      
          </div>
        </div>
      </div>
    <div id="main-wrapper">
		<?php include './includes/header.php'; ?>
	
        <div class="content-body">
			<div class="container-fluid">
      <div class="alert alert-danger alert-dismissible fade show" id="status-payment" style="display: none;"></div>
				<div class="form-head mb-sm-5 mb-3 d-flex flex-wrap align-items-center">
        <div class="welcome-text mr-auto">
                            <h4>Merhaba, <?php echo $var['name'] ?>!</h4>
                            <p class="mb-0">Kullanıcı listesi ve yönetim sayfasına hoş geldiniz.</p>
                        </div>
					
				</div>
				<div class="row">
					<div class="col-xl-12">		
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Genel Kullanıcı Listesi</h4>
							</div>
							<div class="card-body">			
              <div class="alert alert-info alert-dismissible fade show"><strong>Bilgi</strong> Aşağı da bulunan veriler tüm sunucu üyelerini listelemektedir ve sıralama düzeni ise sunucuya giriş tarihine göre sıralamaktadır. </div>
						<div class="table table-responsive">
								<script>
									

								</script>
								<table id="example2" class="display" style="width:100%">
                                        <thead>
                                            <tr>
												<th>#</th>
												<th style="width:80px;">ID</th>
                                                <th>Kullanıcı Adı</th>
												<th>Sunucu Adı</th>
												<th>Oluşturma Tarihi</th>
                                                <th>Üzerinde bulunan roller</th>
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
	<script src="./vendor/select2/js/select2.full.min.js"></script>
	<script src="./synl/js/Guild.Member.API.js"></script>
    <script src="./vendor/peity/jquery.peity.min.js"></script>
	<script>checkGuild()</script>
	<script src="./vendor/toastr/js/toastr.min.js"></script>
	<script src="./js/plugins-init/toastr-init.js"></script>
	<script src="./vendor/sweetalert2/dist/sweetalert2.min.js"></script>
	<script src="./vendor/datatables/js/jquery.dataTables.min.js"></script>
	<script src="./vendor/owl-carousel/owl.carousel.js"></script>
    <script src="./js/custom.min.js"></script>
	<script src="./js/deznav-init.js"></script>
</body>
</html>

<div id="currentChart" class="current-chart" hidden="true"></div>