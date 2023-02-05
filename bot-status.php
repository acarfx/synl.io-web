<!DOCTYPE html>
<html lang="en">
<?php include 'session.php'; ?>
<head>
	<?php include './includes/head.php'; ?>
	<link rel="stylesheet" href="./vendor/select2/css/select2.min.css">
	<link rel="stylesheet" href="./dist/css/component-custom-switch.css">

</head>
<body>
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
	<div class="modal fade" id="editBots">
			<div class="modal-dialog">
			  <div class="modal-content">
	
				<div class="modal-header">
				  <h4 class="modal-title">Bot Düzenleme</h4>
				  <button type="button" style="border: none; background-color: transparent;" data-bs-dismiss="modal"><i class="fa fa-close" style="color: whitesmoke"></i></button>
				</div>
	
				<div class="modal-body">
				<div class="accordion">
				<div id="accordion-one" class="accordion accordion-primary">
                                    <div class="accordion__item">
                                        <div class="accordion__header rounded-lg" data-toggle="collapse" data-target="#default_collapseOne">
                                            <span class="accordion__header--text">Genel Ayarlar</span>
                                            <span class="accordion__header--indicator"></span>
                                        </div>
                                        <div id="default_collapseOne" class="collapse accordion__body show" data-parent="#accordion-one">
                                            <div class="accordion__body--text">
												<label>Geçerli sunucu id:</label>
												<input type="text" class="form-control" id="getGuildID"></br>
												<label>Sunucu adı:</label>
												<input type="text" class="form-control" id="getName"></br>
												<label>Bot durumu:</label>
												<input type="text" class="form-control" id="getBotStatus">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion__item">
                                        <div class="accordion__header collapsed rounded-lg" data-toggle="collapse" data-target="#default_collapseTwo">
                                            <span class="accordion__header--text">Bot Tokenleri

											</span>
                                            <span class="accordion__header--indicator"></span>
                                        </div>
                                        <div id="default_collapseTwo" class="collapse accordion__body" data-parent="#accordion-one">
                                            <div class="accordion__body--text">
												
												<label>Moderasyon:</label>
												<input type="text" class="form-control" id="getVoucher"></br>
												<label>Ana moderasyon:</label>
												<input type="text" class="form-control" id="getMain"></br>
												<label>İstatistik:</label>
												<input type="text" class="form-control" id="getStatistics"></br>
												<label>Senkron:</label>
												<input type="text" class="form-control" id="getSync"></br>
												<label>Kontrolcü:</label>
												<input type="text" class="form-control" id="getController">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion__item">
                                        <div class="accordion__header collapsed rounded-lg" data-toggle="collapse" data-target="#default_collapseThree">
                                            <span class="accordion__header--text">Güvenlik Tokenleri</span>
                                            <span class="accordion__header--indicator"></span>
                                        </div>
                                        <div id="default_collapseThree" class="collapse accordion__body" data-parent="#accordion-one">
                                            <div class="accordion__body--text">
												<label>Güvenlik <b>I</b>:</label>
												<input type="text" class="form-control" id="getOne"></br>
												<label>Güvenlik <b>II</b>:</label>
												<input type="text" class="form-control" id="getTwo"></br>
												<label>Dağıtıcılar:</label>
												<div class="input-group mb-3">
													<input type="text" type="password" placeholder="OTM1ODA0MzQ4NTI3Njg5NzU4." class="form-control" id="getDists"></br>
													<div class="input-group-append">
														<button class="btn btn-success" onclick="add_element_to_array();" type="button">Ekle <i class="fa fa-plus"></i></button>
													</div>
												</div>
												<div class="table table-responsive">
													<label>Eklenen tokenler:</label>
												<table id="dist_tokens">
													</table>
												</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
				</div>
				</div>
		
				<div class="modal-footer">
					<button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Geri Dön</button>
					<button type="button" class="btn btn-success light" onclick="updateBotSettings();"><i class="fa fa-pen"></i> Güncelle</button>
				</div>
		  
			  </div>
			</div>
		  </div>
    <div id="main-wrapper">
     <?php include './includes/header.php'; ?>
	<script>

	setInterval(async () => await refreshBotStatus(), 500);
	</script>
        <div class="content-body">
			<div class="container-fluid">
			<div class="alert alert-danger alert-dismissible fade show" id="status-payment" style="display: none;"></div>
				<div class="form-head mb-sm-4 mb-3 d-flex flex-wrap align-items-center">
					
				<div class="welcome-text mr-auto">
                            <h4>Merhaba, <?php echo $var['name'] ?>!</h4>
                            <p class="mb-0">Bot bilgi ve monitör sayfasına hoş geldiniz.</p>
                        </div>
					<div style="padding: 1px">
					<button data-bs-toggle="modal" data-bs-target="#editBots"class="btn btn-secondary text-white mb-2"><i class="fa-solid fa-pen"></i> Düzenle</button>
						<button onclick="RestartBots();" class="btn btn-primary text-white mb-2"><i class="fa-solid fa-rotate-right"></i> Yeniden Başlat</button>
						<button onclick="StartBots();" class="btn btn-danger text-white mb-2" id="status-switch">~</button>
					</div>
					
				</div>
				<div class="row">
				<div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6">
						<div class="widget-stat card bg-primary">
							<div class="card-body  p-4">
								<div class="media">
									<span class="mr-3">
									<i class="fa-solid fa-microchip"></i>
									</span>
									<div class="media-body text-white">
										<p class="mb-1">Sistem Bilgisi</p>
										<small id="işlemci"></small> </br>
										<small id="usedram2"></small>
									</div>
								</div>
							</div>
						</div>
                    </div>
				<div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6">
						<div class="widget-stat card bg-danger">
							<div class="card-body  p-4">
								<div class="media">
									<span class="mr-3">
										<i class="fa-solid fa-memory"></i>
									</span>
									<div class="media-body text-white">
										<p class="mb-1">Toplam Bellek</p>
										<h3 class="text-white" id="totalram"></h3>
										<div class="progress mb-2 bg-secondary" id="barram">
                                           
                                        </div>
										<small id="usedram"></small>
									</div>
								</div>
							</div>
						</div>
                    </div>
					<div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6">
						<div class="widget-stat card bg-warning">
							<div class="card-body  p-4">
								<div class="media">
									<span class="mr-3">
									<i class="fa-solid fa-globe"></i>
									</span>
									<div class="media-body text-white">
										<p class="mb-1">API Bilgisi</p>
										<h3 class="text-white" id="apigecikme"></h3>
										<small id="apiuptime"></small>
									</div>
								</div>
							</div>
						</div>
                    </div>
					<div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6">
						<div class="widget-stat card bg-secondary">
							<div class="card-body  p-4">
								<div class="media">
									<span class="mr-3">
									<i class="fa-solid fa-network-wired"></i>
									</span>
									<div class="media-body text-white">
										<p class="mb-1">Canlı Gecikme</p>
										<div><span class="updating-chart" id="canlıgecikme"></span>
										<span style="font-size: 12px; color: orange;"id="gecmişgecikme"></span>
										<span style="font-size: 12px; color: yellow;"id="suankigecikme"></span>
										</div>
								
									</div>
								</div>
							</div>
						</div>
                    </div>
					<div class="col-xl-12">
						<div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Bot Konsolu</h4>
                            </div>
							<script>
								GetAPI(2, "TEXT", `webhook_announce_chats`)
							</script>

                            <div class="card-body">
								<div style='background-color: black; border-radius: 10px;  font-family: "Lucida Console", "Courier New", monospace; color: #2E8B57' width="600px" id="konsol-log">

								</div>
</br>
<label>Belirlenen bir kanala <b>Webhook</b> gönder:</label>
								<div style="background-color: black; width: auto; padding: 5px; border-radius: 10px; display: flex; height: 50px">
										<div style="justify-content: space-between;">
										<div class="input-group mb-3 input-primary-o">
										<div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-comment" style="color: whitesmoke"></i></span>
                                            </div>
											<input id="text_webhook" type="textarea" class="input-group-text" placeholder="Göndermek istediğiniz bir metin belirtin." style="padding:5px; border-radius: 1px 10px 10px 1px;  width: 871px; height: 40px; color: whitesmoke; background-color: color: #2E8B57"></input>
										</div>
										</div>
										<div  style="justify-content: space-between; padding-left: 5px"> 
										<input id="text_webhookname" class="input-group-text" value="Web API" style="padding:5px; border-radius: 10px; width: 120px; height: 40px; color: whitesmoke; background-color: color: #2E8B57"></input>
										</div>
										<div style="justify-content: space-between; padding-left: 5px">
										<select id="webhook_announce_chats" class="input-group-select" class="form-control" style="background-color: #292f52; color: whitesmoke; border-radius: 10px; height: 40px; width: 180px;"></select>
												
										</div>
										<div style="justify-content: space-between; padding-left: 5px; padding: 7px">
										<div class="custom-control custom-checkbox mb-3 checkbox-warning">
											<input type="checkbox" class="custom-control-input" id="checkbox_webhookembed">
											<label class="custom-control-label" for="checkbox_webhookembed">Embed</label>
										</div>
										</div>
										<div style="justify-content: space-between; padding-left: 5px">
										<button class="btn btn-success btn-md" style="height: 40px;  border-radius: 10px; padding: 5px" onclick="sendHook();" id="webhook_gönder">Gönder <i class="fas fa-paper-plane"></i></button>
										</div>
										
									
									
								</div>
							</div>
					  </div>
					</div>
					<div class="col-xl-12">
						<div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Bot Düzenleme</h4>
                            </div>
                            <div class="card-body">
							<div class="input-group-prepend">
                                        
										<label>Buradan resim ekleyerek aşağıda profil resmi kategorisinde <b>Güncelle</b> düğmesine anlık olarak basarak güncelleyebilirsiniz veya da sunucu içerisin de kurulum komutunu çalıştırarak ordan <b>Bot Güncelleme</b> seçeneğini seçerek değiştirebilirsiniz.</label>
						<div class="custom-file">
							<input type="file" class="custom-file-input" id="image_file" name="image_file">
							<label class="custom-file-label">Profil Resmi</label>
						</div>
						</div>
						<div class="table table-responsive">
							
							<table id= "botlaramk" class="table table-responsive-md">
										<thead>
                                            <tr>
                                                <th style="width: 50px"><center><strong>#</strong></center></th>
                                                <th style="width: 250px"><center><strong>KULLANICI ADI</strong></center></th>
                                                <th style="width: 50px"><strong>PROFİL RESMİ</strong></th>
                                                <th style="width: 200px"><center><strong>KULLANICI ADI</strong></center></th>
				
                                            </tr>
                                        </thead>
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
	<script src="./synl/js/Console.API.js"></script>
	<script src="./vendor/chart.js/Chart.bundle.min.js"></script>
	<script src="./vendor/select2/js/select2.full.min.js"></script>
    <script src="./js/plugins-init/select2-init.js"></script>
    <script src="./vendor/peity/jquery.peity.min.js"></script>
	<script src="./js/plugins-init/piety-init.js"></script>
	<script>GetLog()</script>
	<script>checkGuild()</script>
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