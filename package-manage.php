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
    <div id="main-wrapper">
		<?php include './includes/header.php'; ?>
        <div class="content-body">
			<div class="container-fluid">
			<div class="alert alert-danger alert-dismissible fade show" id="status-payment" style="display: none;"></div>
			<div class="form-head mb-sm-5 mb-3 d-flex align-items-center flex-wrap">
			<div class="welcome-text mr-auto">
                            <h4>Merhaba, <?php echo $var['name'] ?>!</h4>
                            <p class="mb-0">Paket bilgisi ve yönetim sayfasına hoş geldiniz.</p>
                        </div>
				</div>
				<div class="row">
				<div class="col-xl-4 col-lg-12 col-sm-12">
						<div class="card">
                            <div class="card-header border-0 pb-0">
								<h2 class="card-title">Paket Bilgileri</h2>
								<button class="btn btn-success" onclick="PackageGet(true);" style="width: 30px; height: 30px; padding: 2px"><i class="fa fa-refresh" style="color: whitesmoke;"></i></button>
							</div>
							<div class="card-body pb-0">
								<p id="package_desc">~</p>
								<ul class="list-group list-group-flush">
									<li class="list-group-item d-flex px-0 justify-content-between">
										<strong>Paket İsmi</strong>
										<span class="mb-0" id="package_name">~</span>
									</li>
									<li class="list-group-item d-flex px-0 justify-content-between">
										<strong>Paket Fiyatı</strong>
										<span class="mb-0" id="package_type">~</span>
									</li>
									<li class="list-group-item d-flex px-0 justify-content-between">
										<strong>Sonlanma Tarihi</strong>
										<span class="mb-0" id="package_end">~</span>
									</li>
									<li class="list-group-item d-flex px-0 justify-content-between">
										<strong>Satın Alma Tarihi</strong>
										<span class="mb-0" id="package_start">~</span>
									</li>
									<li class="list-group-item d-flex px-0 justify-content-between">
										<strong>Ödeme Tarihi</strong>
										<span class="mb-0" id="package_updated">~</span>
									</li>
								</ul>
                            </div>
                            <div class="card-footer pt-0 pb-0 text-center">
                                <div class="row">
									<div class="col-4 pt-3 pb-3 border-right">
										<h3 class="mb-1 text-primary" id="package_days">0</h3>
										<span>Gün</span>
									</div>
									<div class="col-4 pt-3 pb-3 border-right">
										<h3 class="mb-1 text-primary" id="package_hours">0</h3>
										<span>Saat</span>
									</div>
									<div class="col-4 pt-3 pb-3">
										<h3 class="mb-1 text-primary" id="package_mins">0</h3>
										<span>Dakika</span>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
					<div class="col-xl-8 col-xxl-8 col-lg-12 col-sm-12">
                        <div id="user-activity" class="card">
                            <div class="card-header border-0 pb-0 d-sm-flex d-block">
                                <h4 class="card-title">Ödeme Geçmişi</h4>
                                <div class="card-action mb-sm-0 my-2">
								<button  onclick="PackageBuy()" class="btn btn-secondary "><i class="fa fa-refresh"></i> Paket Yenileme</button>
                                </div>
                            </div>
                            <div class="card-body">
							<div class="table-responsive">
                                    <table id="example3" class="display" style="width:100%">
                                        <thead>
                                            <tr>
												<th>#</th>
                                                <th>Ödeme Yöntemi</th>
												<th>Ödeme Tarihi</th>
												<th>Paket Fiyatı</th>
												<th>Paket Tipi</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="col-xl-12">		
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Paket Düzenlemeleri</h4>
							</div>
							<div class="card-body">			
								Daha önce paket güncellemesi bulunamadı.
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
	<script src="./vendor/toastr/js/toastr.min.js"></script>
	<script src="./js/plugins-init/toastr-init.js"></script>
	<script src="./vendor/sweetalert2/dist/sweetalert2.min.js"></script>
	<script src="./vendor/owl-carousel/owl.carousel.js"></script>
    <script src="./js/custom.min.js"></script>
	<script src="./js/deznav-init.js"></script>
	<script src="./vendor/datatables/js/jquery.dataTables.min.js"></script>
	<script>
		(function($) {
    "use strict"

    let table = $('#example3').DataTable({
		searching: true,
		paging:true,
		"processing": true,
    order: [ 0, 'asc' ],
    "pageLength": 2,
    }, 
);
	
	
})(jQuery);

	</script>
		<script src="./synl/js/Package.API.js"></script>
	<script>checkGuild(), PackageGet()</script>
</body>
</html>

<div id="currentChart" class="current-chart" hidden="true"></div>