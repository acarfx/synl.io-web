<!DOCTYPE html>
<html lang="en">
<?php include 'session.php'; ?>
<head>
	<?php include './includes/head.php'; ?>
	<link rel="stylesheet" href="./vendor/select2/css/select2.min.css">
	<link rel="stylesheet" href="./dist/css/component-custom-switch.css">
    <script src="./synl/js/Welcome.API.js"></script>
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
                            <p class="mb-0">Bot hoş geldin ayarları sayfasına hoş geldiniz.</p>
                        </div>
					
				</div>
                <script>
                   setTimeout(async () => {
                    var url = String(API.url)
                    var surum = Number( url.replace(/[^0-9]/g, ""))
                        if(surum <= 5) return alert("Kullandığınız API sürümü v5 ve üstü olmadığından dolayı bu özelliğe sahip değilsiniz.");
                       await get_welcome()
                   }, 1000);
                </script>
				<div class="row">
					<div class="col-xl-12">
						<div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Hoş Geldin Ayarları</h4>
                                <div class="custom-control custom-checkbox mb-3 checkbox-warning">
                                            <button onClick="get_welcome()" class="btn btn-info text-white mb-2"><i class="fa fa-refresh fa-spin"></i> Yenile</button>
                                            <button id="varsayılan" onClick="set_welcome('DEFAULT');" class="btn btn-secondary text-white mb-2"><i class="fa fa-refresh fa-spin"></i> Varsayılan</button>
                                            <button onClick="set_welcome('SET');" class="btn btn-primary text-white mb-2"><i class="fa-solid fa-pen"></i> Güncelle</button>
                                </div>
                            </div>
                            <div class="card-body">
                            <div class="form-group">
                                        <label>Hoş Geldin Mesajı: </label>
                                        <textarea class="form-control" rows="4" id="hosgeldin_mesaji" style="height: 210px;"></textarea>
                </br>
                <div class="custom-control custom-checkbox mb-3 checkbox-warning">
											<input type="checkbox" class="custom-control-input" id="hosgeldin_webhook">
											<label class="custom-control-label" for="hosgeldin_webhook">Webhook şeklinde at (<span style="font-size: 14px; color: #23a891">Engellenemez</span>)</label>
                                </div>                           
                                </div>
								<div class="table table-responsive">
                                    <label>Aşağı da verilen tabloda hoşgeldin mesajına eklenen ve listelenen değişkenler sıralanmaktadır.</label>
                                    <label>Tablo üzerinden veya da değişken kısmında verilen -örn- kodunu ekleyerek işlevli hale getirebilirsiniz.</label>
									<table class="table table-responsive-md">
										<thead>
											<tr>
												<th><strong>Değişken</strong></th>
												<th><strong>Bilgi</strong></th>
                                                <th><strong>İşlem</strong></th>
											</tr>
										</thead>
                                        <tbody>
                                            <tr>
                                                <td>-üye-</td>
                                                <td>Sunucuya katılan üyeyi hoş geldin mesajına yansıtmak veya etiketletmek için kullanılır.</td>
                                                <td><button class="btn btn-info" style="border-radius: 3px; height: 25px; width: 90px; padding: 1px" onClick="degisken_add('-üye-');"><i class="fa fa-plus"></i> Ekle</button></td>
                                            </tr>
                                            <tr>
                                                <td>-üyeid-</td>
                                                <td>Sunucuya katılan üyeyi hoş geldin mesajına numarasını yansıtmak veya belirtmek için kullanılır.</td>
                                                <td><button class="btn btn-info" style="border-radius: 3px; height: 25px; width: 90px; padding: 1px" onClick="degisken_add('-üyeid-');"><i class="fa fa-plus"></i> Ekle</button></td>
                                            </tr>
                                            <tr>
                                                <td>-sunucu-</td>
                                                <td>Sunucuya katılan üyenin hoş geldin yazısına sunucu ismi yansıtmak ve belirtmek için kullanılır.</td>
                                                <td><button class="btn btn-info" style="border-radius: 3px; height: 25px; width: 90px; padding: 1px" onClick="degisken_add('-sunucu-');"><i class="fa fa-plus"></i> Ekle</button></td>
                                            </tr>
                                            <tr>
                                                <td>-tag-</td>
                                                <td>Sunucuya katılan üyenin hoş geldin yazısına tag'ı yansıtmak ve belirtmek için kullanılır.</td>
                                                <td><button class="btn btn-info" style="border-radius: 3px; height: 25px; width: 90px; padding: 1px" onClick="degisken_add('-tag-');"><i class="fa fa-plus"></i> Ekle</button></td>
                                            </tr>
                                            <tr>
                                                <td>-kişi-</td>
                                                <td>Sunucuya katılan üyenin hoş geldin yazısına sunucuda ki toplam üye sayısını yansıtmak ve belirtmek için kullanılır.</td>
                                                <td><button class="btn btn-info" style="border-radius: 3px; height: 25px; width: 90px; padding: 1px" onClick="degisken_add('-kişi-');"><i class="fa fa-plus"></i> Ekle</button></td>
                                            </tr>
                                            <tr>
                                                <td>-davet-</td>
                                                <td>Sunucuya katılan üyenin hoş geldin özel url veya hangi üye tarafından katıldığını yansıtmak ve belirtmek için kullanılır.</td>
                                                <td><button class="btn btn-info" style="border-radius: 3px; height: 25px; width: 90px; padding: 1px" onClick="degisken_add('-davet-');"><i class="fa fa-plus"></i> Ekle</button></td>
                                            </tr>
                                            <tr>
                                                <td>-teyitci-</td>
                                                <td>Sunucuya katılan üyenin hoş geldin yazısına teyitcileri yansıtmak ve belirtmek için kullanılır.</td>
                                                <td><button class="btn btn-info" style="border-radius: 3px; height: 25px; width: 90px; padding: 1px" onClick="degisken_add('-teyitci-');"><i class="fa fa-plus"></i> Ekle</button></td>
                                            </tr>
                                            <tr>
                                                <td>-oluşturma-</td>
                                                <td>Sunucuya katılan üyenin hoş geldin yazısına üyenin hesap oluşturma tarihini (Gün/Ay/Yıl Saat) yansıtmak ve belirtmek için kullanılır.</td>
                                                <td><button class="btn btn-info" style="border-radius: 3px; height: 25px; width: 90px; padding: 1px" onClick="degisken_add('-oluşturma-');"><i class="fa fa-plus"></i> Ekle</button></td>
                                            </tr>
                                            <tr>
                                                <td>-kaçyıl-</td>
                                                <td>Sunucuya katılan üyenin hoş geldin yazısına üyenin hesap oluşturma tarihini (0 yıl önce) yansıtmak ve belirtmek için kullanılır.</td>
                                                <td><button class="btn btn-info" style="border-radius: 3px; height: 25px; width: 90px; padding: 1px" onClick="degisken_add('-kaçyıl-');"><i class="fa fa-plus"></i> Ekle</button></td>
                                            </tr>
                                            <tr>
                                                <td>-kurallar-</td>
                                                <td>Sunucuya katılan üyenin hoş geldin yazısına kurallar kanalını yansıtmak ve belirtmek için kullanılır.</td>
                                                <td><button class="btn btn-info" style="border-radius: 3px; height: 25px; width: 90px; padding: 1px" onClick="degisken_add('-kurallar-');"><i class="fa fa-plus"></i> Ekle</button></td>
                                            </tr>
                                            <tr>
                                                <td>-teyit-</td>
                                                <td>Sunucuya katılan üyenin hoş geldin yazısına teyit ses kanallarından otomatik 1 tane kanalı yansıtmak ve belirtmek için kullanılır.</td>
                                                <td><button class="btn btn-info" style="border-radius: 3px; height: 25px; width: 90px; padding: 1px" onClick="degisken_add('-teyit-');"><i class="fa fa-plus"></i> Ekle</button></td>
                                            </tr>
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