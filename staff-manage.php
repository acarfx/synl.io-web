<!DOCTYPE html>
<html lang="en">
<?php include 'session.php'; ?>
<head>
	<?php include './includes/head.php'; ?>
	<link rel="stylesheet" href="./vendor/select2/css/select2.min.css">
	<link rel="stylesheet" href="./dist/css/component-custom-switch.css">
    <script src="./synl/js/Staff.API.js"></script>
</head>
<body>
	<div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <script>
		          setTimeout(async () => {
                    var url = String(API.url)
                    var surum = Number( url.replace(/[^0-9]/g, ""))
                        if(surum <= 5) return alert("Kullandığınız API sürümü v6 ve üstü olmadığından dolayı bu özelliğe sahip değilsiniz."), history.back();
            
                   }, 1000);
GetStaffsListed()
        </script>
            <div class="modal fade" id="startStaff">
			<div class="modal-dialog">
			  <div class="modal-content">
				<div class="modal-header">
				  <h4 class="modal-title">Bir Kullanıcıyı Yetkiye Başlatma</h4>
                  <button type="button" style="border: none; background-color: transparent;" data-bs-dismiss="modal"><i class="fa fa-close" style="color: whitesmoke"></i></button>
				</div>
				<div class="modal-body">
				  <div class="form-group">
                    <label>Bir kullanıcıyı sistemde ayarladığınız en alt yetkiden başlatmak istediğiniz de aşağıda bulunan kutucuğa kullanıcının idsini giriniz.</label>
                    </br>
					<label>Bir kullanıcı id belirtin *:</label>
					<input class="form-control" style="background-color: #292f52; color: whitesmoke;" id="k_id"></input>
				  </div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success light" onclick="start_staff();"><i class="fa fa-user-plus"></i> Başlat</button>
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
                            <p class="mb-0">Yetkili yönetim sayfasına hoş geldiniz.</p>
                        </div>
				</div>
				<div class="row">
					<div class="col-xl-12">		
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Genel Yetkili Listesi</h4>
                               
                                <button type="button" class="btn light btn-success" data-bs-toggle="modal" data-bs-target="#startStaff"> <i class="fa fa-user-plus"></i> Bir Kullanıcıyı Yetkiye Başlat</button>
							</div>
							<div class="card-body">
                            <p class="mb-0">Sistem de yetkili olan kullanıcılar listelenmektedir.</p>
                            <p class="mb-0">Burada bulunan yetkililerin yetkisini güncellemek/yükseltmek/düşürmek için <strong>prefix+yetki</strong> komutu ile işlemleri gerçekleştirebilirsiniz.</p>
                            </br>			
						<div class="table table-responsive">
							<table id= "ayarlar" class="table table-responsive-md">
								<tr>
									<th><strong>KULLANICI</strong></th>
									<th><strong>BAŞLAMA TARİHİ</strong></th>
									<th><strong>ROLDE KALMA</strong></th>
                                    <th><strong>YETKİ ROL(LER)</strong></th>
                                    <th><strong>SORUMLULUK</strong></th>
                                    <th><strong>PUAN</strong></th>
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