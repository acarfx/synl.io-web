<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Synl.io - Genel Discord Sunucu Listesi</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="./css/style.css" rel="stylesheet">
    <link href="./vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="./vendor/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="./synl/js/Synlio.Guild.Lists.js"></script>
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
<script>



</script>
    <div class="content-body">
			<div class="container-fluid">
                <div class="row">
                    <div class="col-xl-9 col-lg-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                            <h4 class="card-title">Genel Sunucu Listesi</h4>
                            <div style="padding: 1px;">
                            <button type="button"  onclick="fetch_members()" class="btn btn-success light text-white" style="width: 220px; height: 40px; padding: 1px;"><i class="fa fa-id-card"></i> Kullanıcı Sorgula</button>
                            <button type="button"  onclick="fetch_guilds()" class="btn btn-success light text-white" style="width: 220px; height: 40px; padding: 1px;"><i class="fa fa-server"></i> Sunucu Sorgula</button>
                            </div>
                            </div>
                            <div class="card-body">
                                <div class="welcome-text">
                   
                                        <div class="alert alert-info alert-dismissible fade show">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                            </button>
                                            <div class="media">
                                                <div class="media-body">
                                                    <h5 class="mt-1 mb-1">Bilgilendirme!</h5>
                                                    <p class="mb-0">Sunucu listeleme, sunucu ve kullanıcı sorgulama API hizmetlerini daha yakından izlemek ister misin? <a href="https://synlio.statuspage.io/">Tıkla!</a></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="alert alert-danger alert-dismissible fade show">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                            </button>
                                            <div class="media">
                                                <div class="media-body">
                                                    <h5 class="mt-1 mb-1">Bakım!</h5>
                                                    <p class="mb-0">Sunucu listeleme, sunucu ve kullanıcı sorgulama API hizmetlerini sanal sunucu tarafında problem oluştuğu için API hizmeti geçici olarak durduruldu.</p>
                                                </div>
                                            </div>
                                        </div>
                                
                            <p class="mb-0">Aşağı da Discord'un genel sunucularının ses sıralaması olarak listeleniyor fakat bu sıralamada ses verilerinde kulaklığı ve mikrofonu kapalı olan kullanıcıları filtreliyor. Afk verileri ise kulaklığı ve mikrofonu kapalı olan kullanıcılardan tespit ediliyor. Bu sıralama ise anlık olarak güncellenmektedir. </p>
                            
                        </div>
                        <div class="table-responsive">
                                    <table  id="s31" class="table table-responsive-sm">
                                        <thead>
                                            <tr>
                                                <th style="width:42px;">
													
												</th>
                                                <th><strong></strong></th>
                                                <th style="width:80px;"><strong><center><img src="https://cdn.discordapp.com/attachments/1034818711921643560/1052255292534034584/ses.png" style="width: 16px;"></img></center></strong></th>
                                                <th style="width:80px;"><strong><center><img src="https://cdn.discordapp.com/attachments/1034818711921643560/1052255293511315456/uye.png" style="width: 16px;"></img></center></strong></th>
                                                <th><center><img src="https://cdn.discordapp.com/attachments/1034818711921643560/1052255293066715266/yayn.png" style="width: 16px;"></img></center></th>
                                                <th><center><img src="https://cdn.discordapp.com/attachments/1034818711921643560/1052255292160749599/kamera.png" style="width: 15px;"></img></center></td>
                                                <th><strong><center><img src="https://cdn.discordapp.com/attachments/1034818711921643560/1052255293989458021/afk.png" style="width: 16px;"></img></center></strong></th>
                                                <th><strong><center><img src="https://cdn.discordapp.com/attachments/1034818711921643560/1052255813852475494/65df7100-9b54-4a1c-9571-8cd8486034dd.png" style="width: 24px;"></img></center></strong></th>
                                                <th style="width:40px;"></th>
									
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