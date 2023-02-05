
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Synl.io - Ürünler</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="./css/style.css" rel="stylesheet">
    <link href="./vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="./vendor/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="./synl/js/Store.js"></script>
    
</head>

<body>
<div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
<div class="nav-header">
            <a href="anasayfa" class="brand-logo">
				<svg class="logo-abbr" width="50" height="50" viewBox="0 0 48 48" fill="none" xmlns="https://www.w3.org/2000/svg">
					<rect class="svg-logo-rect" width="48" height="48" rx="20" fill="#23272a"/>
					<path fill="#FF4081" d="M10.5,17.5l0.5-0.9l21.7,21.9L32.3,39h-0.5L10.5,17.5z M34,39H14v3h20V39z"/><path fill="#9C27B0" d="M37.4,30.7l-0.5,0.9L15.3,9.5L15.6,9h0.6L37.4,30.7z M32.3,39l1.7,3l11-18h-3.5L32.3,39z"/><path fill="#00BCD4" d="M34,9H14V6h20V9z M32.3,9h-0.6L10.4,30.4l0.5,0.9L32.6,9.5L32.3,9z"/><path fill="#FFC107" d="M15.6,9L5.5,25.6L3,24L14,6L15.6,9z M32.6,9.4L32.3,9h-1.7l-19,6.6l-0.8,1.3L32.6,9.4z"/><path fill="#FF5722" d="M15.7,39L14,42L3,24h3.5L15.7,39z M16,31V9h-0.4L15,10v21h-4.2l0.6,1H15v5.9l0.7,1.1H16v-7h20.6l0.6-1H16z"/><path fill="#03A9F4" d="M36.7,16.2L15.5,38.7l0.2,0.3h0.9l20.5-21.8L31.7,39h0.7l0.6-1l5-19.8L36.7,16.2z M41.5,24L32.3,9L34,6l11,18H41.5z"/>
				</svg>
				<div class="brand-title">
					<h2 class="logo-text" style="padding: 10px; padding-top: 15px;">Synl.io</h2>

				</div>
            </a>
        </div>

        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                <div class="collapse navbar-collapse justify-content-between">
                <div class="header-left">
							<div class="input-group search-area right d-lg-inline-flex d-none">
							
							</div>
                        </div>
                    <ul class="navbar-nav header-right main-notification">
                        <li class="nav-item dropdown header-profile"><button type="button"  onclick="history.back()" class="btn btn-secondary light text-white" style="width: 140px;"><i class="fa fa-arrow-left"></i> Geri dön</button></li>
                    </ul>
                    </div>
                </nav>
                
            </div>

        </div>

 
    <div class="content-body">
			<div class="container-fluid">
                <div class="row">
                    <div class="col-xl-9 col-lg-6 col-sm-6">
                        <div class="card">
						        <div class="card-body">
                                <div class="welcome-text">
                            <h4>Merhaba, Hoş geldin!</h4>
                            <p class="mb-0">Aşağı da ürünler listelenmektedir. Ürünlerin süre seçimi aşağıda bulunan düğmelerden gerçekleştirebilirsiniz.</p>
                        </div>
                                </br>
                                        <div class="btn-group" style="display: flex; justify-content: center; height: 50px;">
                                    <button type="button" class="btn btn-secondary" onclick="time_select(this, 1);" disabled id="aylık">Aylık</button>
                                    <button type="button" class="btn btn-secondary" onclick="time_select(this, 3);" id="3aylık">3 Aylık</button>
                                    <button type="button" class="btn btn-secondary" onclick="time_select(this, 6);" id="6aylık">6 Aylık</button>
                                    <button type="button" class="btn btn-secondary" onclick="time_select(this, 12);" id="yıllık" >1 Yıllık</button>
                                </div>
                                </div>
                        </div>
                    </div>
                </div>
            <div class="row">
				<div class="col-xl-3 col-lg-6 col-sm-6">
					<div class="card">
						<div class="card-body">
							<div class="new-arrival-product">
                                <div class="new-arrivals-img-contnent text-center" style="padding: 1px; margin-bottom: 10px;">
                                    <img src="./packages/02.png" style="width: 100px;"></img>
                                        </br>
								</div>
                                <h3 class="text-center">Beginner</h3>
								<div class="new-arrival-content text-center mt-3">
                                    <ul style="margin-bottom: 10px;">
                                        <li> <img src="https://cdn.discordapp.com/attachments/940106623945437226/1035267343175127050/my-icon_11.png" style="width: 16px;"></img> Otomasyon Sistemleri</li>
                                        <li> <img src="https://cdn.discordapp.com/attachments/940106623945437226/1035267177554657311/my-icon_8.png" style="width: 16px;"></img> Yönetilebilir Kolaylıklar</li>
                                        <li> <img src="https://cdn.discordapp.com/attachments/940106623945437226/1035267246995546233/my-icon_9.png" style="width: 16px;"></img> Kişileştirilebilen Ayarlar</li>
                                        <li> <img src="https://cdn.discordapp.com/attachments/940106623945437226/1035267760764223628/my-icon_18.png" style="width: 16px;"></img> Komut İle Kurulum Sistemi</li>
                                        <li> <img src="https://cdn.discordapp.com/attachments/940106623945437226/1035267501979861143/my-icon_13.png" style="width: 16px;"></img> Şifrelendirilmiş Güvenlik</li>
                                        <li> <img src="https://cdn.discordapp.com/attachments/940106623945437226/1035267295083237536/my-icon_10.png" style="width: 16px;"></img> Özelleştirilmiş Güvenlik</li>
                                    </ul>
                                    </br>
                                    </br>
                                    </br>
									<span class="price" id="beginner">300,00₺/ay</span>
								</br>
                                <button type="button" onclick="package_detail(1)" class="btn btn-info light" style="width: 130px; height: 40px; padding: 1px"><i class="fa fa-info text-white"></i> Paket Bilgisi</button>
									<button type="button" class="btn btn-primary light" style="width: 118px; height: 40px; padding: 1px"><i class="fa fa-cart-plus text-white"></i> Satın Al</button>
								</div>
							</div>
						</div>
					</div>
                    
				</div>
                <div class="col-xl-3 col-lg-6 col-sm-6">
					<div class="card">
						<div class="card-body">
							<div class="new-arrival-product">
                                <div class="new-arrivals-img-contnent text-center" style="padding: 1px; margin-bottom: 10px;">
                                    <img src="./packages/crystal-meth.png" style="width: 100px;"></img>
                                        </br>
								</div>
                                
                                <h3 class="text-center">Experienced</h3>
								<div class="new-arrival-content text-center mt-3">
                                    <ul style="margin-bottom: 10px;">
                                    <li> <img src="https://cdn.discordapp.com/attachments/940106623945437226/1035267343175127050/my-icon_11.png" style="width: 16px;"></img> Otomasyon Sistemleri</li>
                                        <li> <img src="https://cdn.discordapp.com/attachments/940106623945437226/1035267177554657311/my-icon_8.png" style="width: 16px;"></img> Yönetilebilir Kolaylıklar</li>
                                        <li> <img src="https://cdn.discordapp.com/attachments/940106623945437226/1035267246995546233/my-icon_9.png" style="width: 16px;"></img> Kişileştirilebilen Ayarlar</li>
                                        <li> <img src="https://cdn.discordapp.com/attachments/940106623945437226/1035267760764223628/my-icon_18.png" style="width: 16px;"></img> Komut İle Kurulum Sistemi</li>
                                        <li> <img src="https://cdn.discordapp.com/attachments/940106623945437226/1035267501979861143/my-icon_13.png" style="width: 16px;"></img> Şifrelendirilmiş Güvenlik</li>
                                        <li> <img src="https://cdn.discordapp.com/attachments/940106623945437226/1035267295083237536/my-icon_10.png" style="width: 16px;"></img> Özelleştirilmiş Güvenlik</li>
                                        </br>
                                    <li style="color: #0ed69f"> <img src="./packages/gems.png" style="width: 16px;"></img></br> Tavsiye Edilen</li>
                                  </li>
                                    </ul>
									<span class="price" id="experienced">500,00₺/ay</span>
								</br>
                                <button type="button" onclick="package_detail(2)" class="btn btn-info light" style="width: 130px; height: 40px; padding: 1px"><i class="fa fa-info text-white"></i> Paket Bilgisi</button></li>
									<button type="button" class="btn btn-primary light" style="width: 118px; height: 40px; padding: 1px"><i class="fa fa-cart-plus text-white"></i> Satın Al</button>
								</div>
							</div>
						</div>
					</div>
                    
				</div>
                <div class="col-xl-3 col-lg-6 col-sm-6">
					<div class="card">
						<div class="card-body">
							<div class="new-arrival-product">
                                <div class="new-arrivals-img-contnent text-center" style="padding: 1px; margin-bottom: 10px;">
                                    <img src="./packages/crystals.png" style="width: 100px;"></img>
                                        </br>
								</div>
                                <h3 class="text-center">Expert</h3>
								<div class="new-arrival-content text-center mt-3">
                                    <ul style="margin-bottom: 10px;">
                                        <li> <img src="https://cdn.discordapp.com/attachments/940106623945437226/1035267343175127050/my-icon_11.png" style="width: 16px;"></img> Otomasyon Sistemleri</li>
                                        <li> <img src="https://cdn.discordapp.com/attachments/940106623945437226/1035267177554657311/my-icon_8.png" style="width: 16px;"></img> Yönetilebilir Kolaylıklar</li>
                                        <li> <img src="https://cdn.discordapp.com/attachments/940106623945437226/1035267246995546233/my-icon_9.png" style="width: 16px;"></img> Kişileştirilebilen Ayarlar</li>
                                        <li> <img src="https://cdn.discordapp.com/attachments/940106623945437226/1035268435929743380/my-icon_24.png" style="width: 16px;"></img> Web Kontrol Sistemleri</li>
                                        <li> <img src="https://cdn.discordapp.com/attachments/940106623945437226/1035267501979861143/my-icon_13.png" style="width: 16px;"></img> Şifrelendirilmiş Güvenlik</li>
                                        <li> <img src="https://cdn.discordapp.com/attachments/940106623945437226/1035267295083237536/my-icon_10.png" style="width: 16px;"></img> Özelleştirilmiş Güvenlik</li>
                                    </ul>
                                    </br>
                                    </br>
                                    </br>
                                   
									<span class="price" id="expert">650,00₺/ay</span>
								</br>
                                <button type="button" onclick="package_detail(3)" class="btn btn-info light" style="width: 130px; height: 40px; padding: 1px"><i class="fa fa-info text-white"></i> Paket Bilgisi</button>
									<button type="button" class="btn btn-primary light" style="width: 118px; height: 40px; padding: 1px"><i class="fa fa-cart-plus text-white"></i> Satın Al</button>
								</div>
							</div>
						</div>
					</div>
                    
				</div>
                </div>


                <div class="row">
				<div class="col-xl-3 col-lg-6 col-sm-6">
					<div class="card">
						<div class="card-body">
							<div class="new-arrival-product">
                                <div class="new-arrivals-img-contnent text-center" style="padding: 1px; margin-bottom: 10px;">
                                    <img src="./packages/diamond.png" style="width: 100px;"></img>
                                        </br>
								</div>
                                <h3 class="text-center">Professional</h3>
								<div class="new-arrival-content text-center mt-3">
                                    <ul style="margin-bottom: 10px;">
                                    <li> <img src="https://cdn.discordapp.com/attachments/940106623945437226/1035267343175127050/my-icon_11.png" style="width: 16px;"></img> Otomasyon Sistemleri</li>
                                        <li> <img src="https://cdn.discordapp.com/attachments/940106623945437226/1035267177554657311/my-icon_8.png" style="width: 16px;"></img> Yönetilebilir Kolaylıklar</li>
                                        <li> <img src="https://cdn.discordapp.com/attachments/940106623945437226/1035267246995546233/my-icon_9.png" style="width: 16px;"></img> Kişileştirilebilen Ayarlar</li>
                                        <li> <img src="https://cdn.discordapp.com/attachments/940106623945437226/1035268435929743380/my-icon_24.png" style="width: 16px;"></img> Web Kontrol Sistemleri</li>
                                        <li> <img src="https://cdn.discordapp.com/attachments/940106623945437226/1035267501979861143/my-icon_13.png" style="width: 16px;"></img> Şifrelendirilmiş Güvenlik</li>
                                        <li> <img src="https://cdn.discordapp.com/attachments/940106623945437226/1035267295083237536/my-icon_10.png" style="width: 16px;"></img> Özelleştirilmiş Güvenlik</li>
                                    </ul>
                                    </br>
                                    </br>
                                    </br>
									<span class="price" id="professional">850,00₺/ay</span>
								</br>
                                <button type="button" onclick="package_detail(4)" class="btn btn-info light" style="width: 130px; height: 40px; padding: 1px"><i class="fa fa-info text-white"></i> Paket Bilgisi</button>
									<button type="button" class="btn btn-primary light" style="width: 118px; height: 40px; padding: 1px"><i class="fa fa-cart-plus text-white"></i> Satın Al</button>
								</div>
							</div>
						</div>
					</div>
                    
				</div>
                <div class="col-xl-3 col-lg-6 col-sm-6">
					<div class="card">
						<div class="card-body">
							<div class="new-arrival-product">
                                <div class="new-arrivals-img-contnent text-center" style="padding: 1px; margin-bottom: 10px;">
                                    <img src="./packages/crystal.png" style="width: 100px;"></img>
                                        </br>
								</div>
                                
                                <h3 class="text-center">Reseller Platinum</h3>
								<div class="new-arrival-content text-center mt-3">
                                    <ul style="margin-bottom: 10px;">
                                        <li> <img src="https://cdn.discordapp.com/attachments/940106623945437226/1035267343175127050/my-icon_11.png" style="width: 16px;"></img> Beginner + Experienced</li>
                                        <li> <img src="https://cdn.discordapp.com/attachments/940106623945437226/1035268063320363028/my-icon_23.png" style="width: 16px;"></img> 20 Müşteriye Kadar Erişim</li>
                                        <li> <img src="https://cdn.discordapp.com/attachments/940106623945437226/1035267806549266493/my-icon_19.png" style="width: 16px;"></img> Müşterilere Özel Promosyon</li>
                                        <li> <img src="https://cdn.discordapp.com/attachments/940106623945437226/1035267501979861143/my-icon_13.png" style="width: 16px;"></img> Şifrelendirilmiş Yedek Sistemi</li>
                                        <li> <img src="https://cdn.discordapp.com/attachments/940106623945437226/1035268056982765628/my-icon_22.png" style="width: 16px;"></img> 7/24 Telefon Teknik Destek</li>
                                        <li> <img src="https://cdn.discordapp.com/attachments/940106623945437226/1035268435929743380/my-icon_24.png" style="width: 16px;"></img> Web Yönetim İle Bayiliğini Yönet</li>
                                        <li> <img src="https://cdn.discordapp.com/attachments/940106623945437226/1035267598729891870/my-icon_15.png" style="width: 16px;"></img> Github Proje Aktarma/Çalıştırma</li>
                                        <li> <img src="https://cdn.discordapp.com/attachments/940106623945437226/1035267632179458068/my-icon_16.png" style="width: 16px;"></img> JavaScript/TypeScript Desteği</li>
                                        </ul>
                                        </br>
									<span class="price" id="platinum">1.350,00₺/ay</span>
								</br>
                            
									<button type="button" class="btn btn-primary light" style="width: 118px; height: 40px; padding: 1px"><i class="fa fa-cart-plus text-white"></i> Satın Al</button>
								</div>
							</div>
						</div>
					</div>
                    
				</div>
                <div class="col-xl-3 col-lg-6 col-sm-6">
					<div class="card">
						<div class="card-body">
							<div class="new-arrival-product">
                                <div class="new-arrivals-img-contnent text-center" style="padding: 1px; margin-bottom: 10px;">
                                    <img src="./packages/gems.png" style="width: 100px;"></img>
                                        </br>
								</div>
                                <h3 class="text-center">Reseller Diamond</h3>
								<div class="new-arrival-content text-center mt-3">
                                    <ul style="margin-bottom: 10px;">
                                    <li> <img src="https://cdn.discordapp.com/attachments/940106623945437226/1035267343175127050/my-icon_11.png" style="width: 16px;"></img> Tüm Paketler</li>
                                        <li> <img src="https://cdn.discordapp.com/attachments/940106623945437226/1035268063320363028/my-icon_23.png" style="width: 16px;"></img> ~ Müşteriye Kadar Erişim</li>
                                        <li> <img src="https://cdn.discordapp.com/attachments/940106623945437226/1035267806549266493/my-icon_19.png" style="width: 16px;"></img> Müşterilere Özel Promosyon</li>
                                        <li> <img src="https://cdn.discordapp.com/attachments/940106623945437226/1035267501979861143/my-icon_13.png" style="width: 16px;"></img> Şifrelendirilmiş Yedek Sistemi</li>
                                        <li> <img src="https://cdn.discordapp.com/attachments/940106623945437226/1035268056982765628/my-icon_22.png" style="width: 16px;"></img> 7/24 Telefon Teknik Destek</li>
                                        <li> <img src="https://cdn.discordapp.com/attachments/940106623945437226/1035268435929743380/my-icon_24.png" style="width: 16px;"></img> Web Yönetim İle Bayiliğini Yönet</li>
                                        <li> <img src="https://cdn.discordapp.com/attachments/940106623945437226/1035267598729891870/my-icon_15.png" style="width: 16px;"></img> Github Proje Aktarma/Çalıştırma</li>
                                        <li> <img src="https://cdn.discordapp.com/attachments/940106623945437226/1035267632179458068/my-icon_16.png" style="width: 16px;"></img> JavaScript/TypeScript Desteği</li>
                                    </ul>

                                    </br>
                                   
									<span class="price" id="diamond">1.850,00₺/ay</span>
								</br>
                            
									<button type="button" class="btn btn-primary light" style="width: 118px; height: 40px; padding: 1px"><i class="fa fa-cart-plus text-white"></i> Satın Al</button>
								</div>
							</div>
						</div>
					</div>
                    
				</div>
                </div>



                </div>
                </div>

                
</div>


<div class="footer" style="margin-right: 320px;">
<div class="copyright">
                <p>Copyright © Developed by <a href="https://synl.io/" target="_blank">ΛCΛR</a> 2022</p>
            </div>
        </div>


<!--**********************************
	Scripts
***********************************-->
<!-- Required vendors -->
<script src="./vendor/global/global.min.js"></script>
<script src="./vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="./js/custom.min.js"></script>
<script src="./vendor/sweetalert2/dist/sweetalert2.min.js"></script>

<script src="./js/deznav-init.js"></script>
</body>
</html>