<?php include 'session.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include './includes/head.php';?>

</head>
<body>
<?php include './includes/_index.php';?>
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>

    <div id="main-wrapper">
		<?php include './includes/header.php';?>
        <div class="content-body">
			<div class="container-fluid">
			<div class="alert alert-danger alert-dismissible fade show" id="status-payment" style="display: none;"></div>
				<div class="form-head mb-sm-0 mb-0 d-flex flex-wrap align-items-center">
					
					<div class="welcome-text mr-auto">
                            <h4>Merhaba, <?php echo $var['name'] ?>!</h4>
                            <p class="mb-0">Sunucu bilgi sayfasına hoş geldiniz.</p>
                        </div>
					<div style="padding: 1px">
					<script>
					</script>
						<button data-bs-toggle="modal" data-bs-target="#updateGuild" class="btn btn-warning text-white mb-2"><i class="las la-edit scale5 mr-3"></i>Sunucuyu Güncelle</button>
						<button data-bs-toggle="modal" data-bs-target="#infoGuild" class="btn btn-secondary text-white mb-2"><i class="las la-server scale5 mr-3"></i>Detaylı Sunucu Bilgisi</button>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-3 col-sm-6 m-t35">
						<div class="card card-coin">
							<div class="card-body text-center">
								
							

								<svg id="fa fa-user" xmlns="https://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#ffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user edit">
									
									<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
									<circle cx="12" cy="7" r="4"></circle>
								</svg>
							
								<h2 class="text-black mb-2 font-w600"  id="toplamüye">~</h2>
								<p class="mb-0 fs-14" id="günlükgiriş">
							
								</p>	
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6 m-t35">
						<div class="card card-coin">
							<div class="card-body text-center">
								<i class="fa-solid fa-users-line" style="color: whitesmoke; font-size: 25px"></i>
							
								<h2 class="text-black mb-2 font-w600" id="günlükkatılım">~</h2>
								<p class="mb-0 fs-14" id="katılımdetay">
							
								</p>	
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6 m-t35">
						<div class="card card-coin">
							<div class="card-body text-center ">
								<span class="fa fa-volume-up" width="20px" height="20px" style="color: whitesmoke; font-size: 25px;"></span>
								<h2 class="text-black mb-1 font-w600" id="aktifses">~</h2>
								<p class="mb-0 fs-14" id="aktifsesdetay">
								</p>	
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6 m-t35">
						<div class="card card-coin">
							<div class="card-body text-center">
								<i class="fa-regular fa-gem" style="color: whitesmoke;; font-size: 30px;"></i>
							
								<h2 class="mb-2" style="font-size: 14px" id="takviyebilgisi"></h2>
								<p class="mb-0 fs-12" id="takviyeseviye">
							
								</p>	
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-9 col-xxl-8">
						<div class="card">
							<div class="card-header border-0 flex-wrap pb-0">
								<div class="mb-3">
									<h4 class="fs-20 text-black" id="sunucubakış">Bağlanıyor...</h4>
									<p class="mb-0 fs-12 text-black" id="sunucubakışiki">Lorem ipsum dolor sit amet, consectetur</p>
								</div>
								<select class="form-control style-1 default-select">
									<option>Detaylı Grafik</option>
								</select>
							</div>
							<div class="card-body pb-0">
								<div id="marketChart" class="market-line"></div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-xxl-4">
						<div class="card">
							<div class="card-header border-0 pb-0">
								<h4 class="fs-20 text-black">Son Kayıtlar</h4>
							</div>
							<div class="card-body pb-0">
								
								<div class="chart-content">	
									<div class="d-flex justify-content-between mb-2 align-items-center">
									    <div id="DZ_W_Todo4" class="widget-media dz-scroll height370">
											<ul class="timeline">
												<li>
													<div class="timeline-panel">
														<div class="custom-control custom-checkbox checkbox-success check-lg mr-2">
															<div class="fa fa-user-plus" style="color: whitesmoke; font-size: 21px;"></div>
														</div>
														<div class="media-body">
															<h5 class="mb-0">Son katılan kullanıcı</h5>
															<small class="text-muted" id="songiren">~</small></br>
												
														</div>
														
													</div>
												</li>
												<li>
													<div class="timeline-panel">
														<div class="custom-control custom-checkbox checkbox-success check-lg mr-2">
															<div class="fa fa-user-minus" style="color: whitesmoke; font-size: 21px;"></div>
														</div>
														<div class="media-body">
															<h5 class="mb-0">Son ayrılan kullanıcı</h5>
															<small class="text-muted" id="sonçıkan">~</small>
														</div>
												
													</div>
												</li>
												<li>
													<div class="timeline-panel">
														<div class="custom-control custom-checkbox checkbox-success check-lg mr-2">
															<div class="fa fa-user-check" style="color: whitesmoke; font-size: 21px;"></div>
														</div>
														<div class="media-body">
															<h5 class="mb-0">Son kayıt olan kullanıcı</h5>
															<small class="text-muted" id="sonkayıtolan">~</small>
														</div>
												
													</div>
												</li>
												<li>
													<div class="timeline-panel">
														<div class="custom-control custom-checkbox checkbox-success check-lg mr-2">
															<div class="fa fa-user-pen" style="color: whitesmoke; font-size: 21px;"></div>
														</div>
														<div class="media-body">
															<h5 class="mb-0">Son taglı kullanıcı</h5>
															<small class="text-muted" id="sontaglı">~</small>
														</div>
												
													</div>
												</li>
												<li>
													<div class="timeline-panel">
														<div class="custom-control custom-checkbox checkbox-success check-lg mr-2">
															<div class="fa fa-users" style="color: whitesmoke; font-size: 18px;"></div>
														</div>
														<div class="media-body">
															<small class="text-muted" id="günlükgirişyapanlar">~</small></br>
															<small class="text-muted" id="toplamkayıt">~</small></br>
															<small class="text-muted" id="toplamtaglı">~</small>
														</div>
													</div>
												</li>
											</ul>
										</div>
									</div>
									</div>
								</div>	
							</div>
						</div>
					</div>
					<div class="col-xl-14">		
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Gecikme Grafiği</h4>
							</div>
							<div class="card-body">			
							<div id="flotLine3" class="flot-chart" style="padding: 0px; position: relative;">
  <canvas class="flot-base" width="417" height="251" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 417px; height: 251.188px;"></canvas>
  <div class="flot-text" style="position: absolute; inset: 0px; font-size: smaller; color: rgb(84, 84, 84);">
    <div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; inset: 0px;">
      <div style="position: absolute; max-width: 57px; top: 239px; font: 400 10px / 12px poppins, sans-serif; color: rgb(255, 255, 255); left: 8px; text-align: center;">0.0</div>
      <div style="position: absolute; max-width: 57px; top: 239px; font: 400 10px / 12px poppins, sans-serif; color: rgb(255, 255, 255); left: 75px; text-align: center;">1.0</div>
      <div style="position: absolute; max-width: 57px; top: 239px; font: 400 10px / 12px poppins, sans-serif; color: rgb(255, 255, 255); left: 139px; text-align: center;">2.0</div>
      <div style="position: absolute; max-width: 57px; top: 239px; font: 400 10px / 12px poppins, sans-serif; color: rgb(255, 255, 255); left: 205px; text-align: center;">3.0</div>
      <div style="position: absolute; max-width: 57px; top: 239px; font: 400 10px / 12px poppins, sans-serif; color: rgb(255, 255, 255); left: 270px; text-align: center;">4.0</div>
      <div style="position: absolute; max-width: 57px; top: 239px; font: 400 10px / 12px poppins, sans-serif; color: rgb(255, 255, 255); left: 336px; text-align: center;">5.0</div>
      <div style="position: absolute; max-width: 57px; top: 239px; font: 400 10px / 12px poppins, sans-serif; color: rgb(255, 255, 255); left: 402px; text-align: center;">6.0</div>
    </div>
    <div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; inset: 0px;">
      <div style="position: absolute; top: 228px; font: 400 10px / 12px poppins, sans-serif; color: rgb(255, 255, 255); left: 3px; text-align: right;">0</div>
      <div style="position: absolute; top: 153px; font: 400 10px / 12px poppins, sans-serif; color: rgb(255, 255, 255); left: 3px; text-align: right;">5</div>
      <div style="position: absolute; top: 77px; font: 400 10px / 12px poppins, sans-serif; color: rgb(255, 255, 255); left: 0px; text-align: right;">10</div>
      <div style="position: absolute; top: 2px; font: 400 10px / 12px poppins, sans-serif; color: rgb(255, 255, 255); left: 0px; text-align: right;">15</div>
    </div>
  </div>
  <canvas class="flot-overlay" width="417" height="251" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 417px; height: 251.188px;"></canvas>
  <div class="legend">
    <div style="position: absolute; width: 150.469px; height: 39.5938px; top: 13px; left: 20px; background-color: rgb(255, 255, 255); opacity: 0.85;"></div>
    <table style="position:absolute;top:13px;left:20px;;font-size:smaller;color:#545454">
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
	<script src="./vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="./vendor/peity/jquery.peity.min.js"></script>
	<script src="./vendor/apexchart/apexchart.js"></script>
	<script src="./vendor/toastr/js/toastr.min.js"></script>

<script src="./vendor/flot/jquery.flot.js"></script>
<script src="./vendor/flot/jquery.flot.pie.js"></script>
<script src="./vendor/flot/jquery.flot.resize.js"></script>
<script src="./vendor/flot-spline/jquery.flot.spline.min.js"></script>
	<script>
		if(getCookie("first_login")) {
			document.cookie = "first_login" +'=; Path=/;  Domain=' + location.host +  '; Expires=Thu, 01 Jan 1970 00:00:01 GMT; SameSite=None; Secure'
			toastr["success"]("<?php echo $var['name']; ?>, Synl.io web paneline tekrardan hoş geldiniz.")
			toastr.options = {
			"closeButton": false,
			"debug": false,
			"newestOnTop": true,
			"progressBar": false,
			"positionClass": "toast-top-right",
			"preventDuplicates": false,
			"onclick": null,
			"showDuration": "300",
			"hideDuration": "1000",
			"timeOut": "5000",
			"extendedTimeOut": "1000",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut"
			}
		}
	</script>
	<script src="./vendor/sweetalert2/dist/sweetalert2.min.js"></script>
	<script src="./vendor/owl-carousel/owl.carousel.js"></script>
	<script src="./js/dashboard/dashboard-1.js"></script>
    <script src="./js/custom.min.js"></script>
	<script src="./js/deznav-init.js"></script>
</body>
</html>

<div id="currentChart" class="current-chart" hidden="true"></div>