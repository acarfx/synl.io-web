<!DOCTYPE html>
<html lang="en">
<?php include 'session.php'; ?>
<head>
	<?php include './includes/head.php'; ?>
	<link rel="stylesheet" href="./vendor/select2/css/select2.min.css">
	<link rel="stylesheet" href="./dist/css/component-custom-switch.css">
</head>
<body>
	<script>
		GetGuardSettings()
		setInterval(async () => await refreshGuardSettings(), 500);
	</script>
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
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
                            <p class="mb-0">Güvenlik ayarları sayfasına hoş geldiniz.</p>
                        </div>
					
				</div>
				<div class="row">
					<div class="col-xl-12">		
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Genel Güvenlik Ayarları</h4>
							</div>
							<div class="card-body">
							<div class="alert alert-warning left-icon-big alert-dismissible fade show">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                            </button>
                                            <div class="media">
                                                <div class="alert-left-icon-big">
                                                    <span><i class="mdi mdi-alert"></i></span>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="mt-1 mb-2">Bilgilendirme!</h5>
                                                    <p class="mb-0">Hızlı güncellemelerde anlık olarak sayfa yenilemelisiniz aksi taktirde fazla istekten yaptığınız işlemler geçersiz olacaktır.</p>
                                                </div>
                                            </div>
                                        </div>
								<label>Aşağı da sunucu içerisinde bulunan güvenlik botlarının ve güvenlik sistemlerinin ayarlamaları sıralandırılmıştır.</label>
								<label>Self hesap ile url tekrarlama sistemini kullanmak için sunucuzun içerisinde normal bir hesap ve yöneticiye sahip olmalıdır aksi taktirde url değişimi yapamayacaktır.</label>			
</br>		
							</br>
								<div class="table table-responsive">
							<table id= "ayarlar" class="table table-responsive-md">
							<tr >
									<th><h5 style='color: whitesmoke;'>Genel Koruma Yönetimi</h5></th>
									<th></th>
									<th></th>
									<th style="width: 60px;"></th>
									<th style="width: 60px;"></th>
									<th style="width: 60px;"></th>
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