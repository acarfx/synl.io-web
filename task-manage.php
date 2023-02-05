<!DOCTYPE html>
<html lang="en">
<?php include 'session.php'; ?>
<head>
	<?php include './includes/head.php'; ?>
	<link rel="stylesheet" href="./vendor/select2/css/select2.min.css">
	<link rel="stylesheet" href="./dist/css/component-custom-switch.css">
    <script src="./synl/js/Task.API.js"></script>
</head>
<body>
<script>
    GetListedTasks()
    GetAPI(1, "ALL", `görevrol`)
    setTimeout(async () => {
                    var url = String(API.url)
                    var surum = Number( url.replace(/[^0-9]/g, ""))
                        if(surum <= 5) return alert("Kullandığınız API sürümü v6 ve üstü olmadığından dolayı bu özelliğe sahip değilsiniz."), history.back();
                   }, 1000);
</script>
    <div class="modal fade" id="addTasks">
			<div class="modal-dialog">
			  <div class="modal-content">
				<div class="modal-header">
				  <h4 class="modal-title">Yeni Görev Ekleme</h4>
                  <button type="button" style="border: none; background-color: transparent;" data-bs-dismiss="modal"><i class="fa fa-close" style="color: whitesmoke"></i></button>
				</div>
				<div class="modal-body">
				  <div class="form-group">
                    <label>Aşağı da bulunan görevlerde en az bir görev vermeniz gerekmektedir. Vermek istemediğiniz görevi boş bırakabilirsiniz.</label>
                    </br>
					<label>Rol belirtin *:</label>
					<select class="form-control" style="background-color: #292f52; color: whitesmoke;" id="görevrol"></select>
					</br>
					<label>Otomasyon belirtin *:</label>
                    <select class="form-control" style="background-color: #292f52; color: whitesmoke;">
                        <option>Otomatik Yükseltim/Düşüm</option>
                        <option>Manuel Yükseltim/Düşüm</option>
                        <option>Toplantıdan Toplantıya</option>
                        <option>Sadece Yapanları Yükselt</option>
                        <option>Sadece Yapmayanları Düşür</option>
                        <option>Hiç bir şey yapma</option>
                    </select>
                    </br>
					<label>Süre belirtin *:</label>
                    <select class="form-control" id="görevsüre" style="background-color: #292f52; color: whitesmoke;">
                        <option value="unlimited">Kalıcı</option>
                        <option value="30m">30 Dakika</option>
                        <option value="1h">1 Saat</option>
                        <option value="3h">3 Saat</option>
                        <option value="6h">6 Saat</option>
                        <option value="12h">12 Saat</option>
                        <option value="1d">1 Gün</option>
                        <option value="3d">3 Gün</option>
                        <option value="5d">5 Gün</option>
                        <option value="7d">1 Hafta</option>
                        <option value="14d">2 Hafta</option>
                        <option value="30d">1 Ay</option>
                        <option value="90d">3 Ay</option>
                    </select>
                    </br>
                    <label>Ödül belirtin *:</label>
                    <input class="form-control" style="background-color: #292f52; color: whitesmoke;" id="görevödül" placeholder="Sunucu parası ve puan belirtin."></input>
                    </br>
                    <label>Genel ses saati belirtin:</label>
                    <input class="form-control" style="background-color: #292f52; color: whitesmoke;" id="görevgenel" placeholder="Örn: 30"></input>
                    </br>
                    <label>Public, streamer ve register ses saati belirtin:</label>
                    <input class="form-control" style="background-color: #292f52; color: whitesmoke;" id="görevpublic" placeholder="Örn: 15"></input>
                    </br>
                    <label>Yetkili belirtin:</label>
                    <input class="form-control" style="background-color: #292f52; color: whitesmoke;" id="görevyetkili" placeholder="Örn: 5"></input>
                    </br>
                    <label>Taglı belirtin:</label>
                    <input class="form-control" style="background-color: #292f52; color: whitesmoke;" id="görevtaglı" placeholder="Örn: 5"></input>
                    </br>
                    <label>Davet belirtin:</label>
                    <input class="form-control" style="background-color: #292f52; color: whitesmoke;" id="görevdavet" placeholder="Örn: 5"></input>
                    </br>
                    <label>Teyit belirtin:</label>
                    <input class="form-control" style="background-color: #292f52; color: whitesmoke;" id="görevteyit" placeholder="Örn: 5"></input>
                    </br>
                    <label>Destek/talep belirtin:</label>
                    <input class="form-control" style="background-color: #292f52; color: whitesmoke;" id="görevdestek" placeholder="Örn: 5"></input>
                    </br>
                    <label>Sorumluluk puan belirtin:</label>
                    <input class="form-control" style="background-color: #292f52; color: whitesmoke;" id="görevsorumluluk" placeholder="Örn: 5"></input>
				  </div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success light" onclick="valid_tasks();"><i class="fa fa-plus"></i> Ekle</button>
				  <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Geri Dön</button>
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
                            <p class="mb-0">Görev yönetim sayfasına hoş geldiniz.</p>
                        </div>
				</div>
				<div class="row">
					<div class="col-xl-12">		
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Görev Listesi</h4>
                                <button type="button" class="btn light btn-success" data-bs-toggle="modal" data-bs-target="#addTasks"> <i class="fa fa-plus"></i> Oluştur</button>
                      
							</div>
							<div class="card-body">			
						<div class="table table-responsive">
							<table id= "ayarlar" class="table table-responsive-md">
								<tr>
									<th><strong>ROL</br>GÖREVLİLER</strong></th>
									<th><strong>PSR.SES GÖREVİ</strong></th>
									<th><strong>T.SES GÖREVİ</strong></th>
									<th><strong>TAGLI GÖREVİ</strong></th>
                                    <th><strong>YETKILI GÖREVİ</strong></th>
                                    <th><strong>KAYIT GÖREVİ</strong></th>
                                    <th><strong>DAVET GÖREVİ</strong></th>
                                    <th><strong>GÖREV SONLANMA</strong></th>
                                    <th><strong>OLUŞTURULMA TARİHİ</strong></th>
                                    <th><strong>ÖDÜL</strong></th>
                                    <th><strong>İŞLEM</strong></th>
									<th></th>
									<th></th>
								</tr>
						  
						  
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
    <script src="./js/plugins-init/select2-init.js"></script>
    <script src="./vendor/peity/jquery.peity.min.js"></script>
	<script>checkGuild()</script>
	<script src="./vendor/toastr/js/toastr.min.js"></script>
	<script src="./js/plugins-init/toastr-init.js"></script>
	<script src="./vendor/sweetalert2/dist/sweetalert2.min.js"></script>
	<script src="./vendor/owl-carousel/owl.carousel.js"></script>
    <script src="./js/custom.min.js"></script>
	<script src="./js/deznav-init.js"></script>
</body>
</html>

<div id="currentChart" class="current-chart" hidden="true"></div>