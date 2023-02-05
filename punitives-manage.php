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
				<div class="form-head mb-sm-5 mb-3 d-flex flex-wrap align-items-center">
				<div class="welcome-text mr-auto">
                            <h4>Merhaba, <?php echo $var['name'] ?>!</h4>
                            <p class="mb-0">Ceza listesi ve yönetim sayfasına hoş geldiniz.</p>
                        </div>
					
				</div>
				<div class="row">
					<div class="col-xl-12">		
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Genel Ceza Listesi</h4>
                <div>
                <button class="btn btn-danger text-white light" onclick="row_delete_all_punitives()"><i class="fa-solid fa-times"></i> Tüm Cezaları Temizle</button>
                </div>
              </div>
							<div class="card-body">			
              <div class="alert alert-info alert-dismissible fade show"><strong>Bilgi</strong> Aşağı da bulunan veriler tüm sunucu boyunca atılmış cezalar listelemektedir ve sıralama düzeni ise son atılan ceza şeklindedir. </div>
						<div class="table table-responsive">
              <table id="example2" class="display" style="width:100%">
                <thead>
                  <tr>
												<th>#</th>
												<th>Kullanıcı</th>
										<th>Yetkili</th>
										<th>Ceza Türü</th>
										<th>Ceza Sebebi</th>
										<th>Ceza Tarihi</th>
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
	<script src="./synl/js/Guild.Punitives.API.js"></script>
    <script src="./vendor/peity/jquery.peity.min.js"></script>
	<script>checkGuild(), GetPunitives()</script>
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