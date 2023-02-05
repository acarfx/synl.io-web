<!DOCTYPE html>
<html lang="en">
<?php include 'session.php'; ?>
<?php
include('./notify.php');
if (count($_POST) > 0) {
	$kadi = $_SESSION['Username'];
	$result = mysqli_query($con,"SELECT *from users WHERE username='" . $kadi . "'");
	$row=mysqli_fetch_array($result);
	if($_POST["currentPassword"] == $row["password"] && $_POST["newPassword"] == $_POST["confirmPassword"] ) {
	mysqli_query($con,"UPDATE users set password='" . $_POST["newPassword"] . "' WHERE username='" . $kadi . "'");
	$message = '<div class="alert alert-success alert-dismissible fade show">
	<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>	
	<strong>Başarılı!</strong> Başarıyla parolanız değiştirildi.
	<button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
	</button>
</div>';
$postID = rand(0, 237727);
notify("comment", $kadi, $postID, "Sistemsel", "Hesabınızın parolası değiştirildi.", "warning" );
header("Refresh:3; url=profile");
	} else{
	 $message = '<div class="alert alert-danger alert-dismissible fade show">
	 <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
	 <strong>Hata!</strong> Parolanız güncellenemedi.
	 <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
	 </button>
 </div>';
 header("Refresh:3; url=profile");
	}
}
?>
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
			<div class="welcome-text">
                            <h4>Merhaba, <?php echo $var['name'] ?>!</h4>
                            <p class="mb-0">Profilin ile havalara hava katıyorsun.</p>
                        </div>
				</div>
				<div class="row">
				<div class="col-xl-7">		
						<div class="card">
							<div class="card-header">
								<h4 class="card-title"><img src="<?php 
									if($var["photo"]) {
										echo $var["photo"];
									} else 
									{
										echo 'images/profile/pic1.jpg';
									}
								
									?>" width="32" height="32" class="img-fluid rounded-circle" alt=""> <?php echo '' . $var['name'] . ''; ?> <?php echo '' . $var['surname'] . ''; ?>	</h4>
								
							</div>
							<div class="card-body">		
									<div class="basic-list-group">
                                    <ul class="list-group">
									<li class="list-group-item">
								Kullanıcı adı: <?php echo '' . $var['username'] . ''; ?> (#<?php echo '' . $var['id'] . ''; ?>)
								</li>
										<li class="list-group-item">
								Telefon numarası: +90<?php echo '' . $var['phone'] . ''; ?>
								</li>
									<li class="list-group-item">
								Email adresi: <?php echo '' . $var['email'] . ''; ?>
								</li>
								<li class="list-group-item">
									Hesabınız <?php echo '' . $var['created_time'] . ''; ?> tarihinde oluşturulmuş.
								</li>
								<li class="list-group-item">
									Son giriş <?php echo '' . $var['last_login'] . ''; ?> tarihinde <?php echo '' . $var['ip'] . ''; ?> ip numarası ile yapılmış.
								</li>
                                        <li class="list-group-item">	
										<form method="POST" action="profile-avatar" enctype="multipart/form-data">
									<label>Aşağı da profil resmi güncelleme/kaldırma işlemi yapabilirsiniz.</label>
									<div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-info btn-sm"  type="submit" name="upload">Güncellle</button>
												<button class="btn btn-danger btn-sm"  type="button" onclick="deletePhoto();">Kaldır</button>
                                            </div>
                                            <div class="custom-file">
                                                <input  type="file" name="uploadfile" value=""  class="custom-file-input">
                                                <label class="custom-file-label">Seç</label>
                                            </div>
                                        </div>
								</form></li>
                                    </ul>
                                </div>
						
							
							</div>
						</div>
					</div>
				
					<div class="col-xl-5">		
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Parola Güncelleme</h4>
								
							</div>
							<div class="card-body">			
								
								<script>
									function deletePhoto() {
										    Swal.fire({
													title: `Profil resminiz kaldırılıyor?`,
													text: `Profil resminizin kaldırılmasını istiyor musunuz?`,
													type: "warning",
													showCancelButton: !0,
													confirmButtonColor: "#DD6B55",
													confirmButtonText: "Evet",
													cancelButtonText: "Hayır!",
												}).then((e) => {
													if(e.value == true) { 
														$.ajax({type: "POST", url: 'profile-avatar', data: {
																	delete_avatar: "OK"
																}, success: function(res, text) {
										
																	Swal.fire(
																			`Başarıyla profil resminiz kaldırıldı`,
																			``,
																			'success'
																		)
																		setTimeout(() => {
																			window.location.reload()
																		}, 1183)
																		toastr.success(`Başarıyla profil resminiz kaldırıldı.`, {
																			timeOut: 500000000,
																			closeButton: !0,
																			debug: !1,
																			newestOnTop: !0,
																			progressBar: !0,
																			positionClass: "toast-top-right",
																			preventDuplicates: !0,
																			onclick: null,
																			showDuration: "200",
																			hideDuration: "1000",
																			extendedTimeOut: "1000",
																			showEasing: "swing",
																			hideEasing: "linear",
																			showMethod: "fadeIn",
																			hideMethod: "fadeOut",
																			tapToDismiss: !1
																		})
															
														}})
													}
												})
									}
									function validatePassword() {
										var currentPassword, newPassword, confirmPassword, output = true;

										currentPassword = document.frmChange.currentPassword;
										newPassword = document.frmChange.newPassword;
										confirmPassword = document.frmChange.confirmPassword;

										if (!currentPassword.value) {
											currentPassword.focus();
											document.getElementById("currentPassword").innerHTML = "required";
											output = false;
										}
										else if (!newPassword.value) {
											newPassword.focus();
											document.getElementById("newPassword").innerHTML = "required";
											output = false;
										}
										else if (!confirmPassword.value) {
											confirmPassword.focus();
											document.getElementById("confirmPassword").innerHTML = "required";
											output = false;
										}
										if (newPassword.value != confirmPassword.value) {
											newPassword.value = "";
											confirmPassword.value = "";
											newPassword.focus();
											document.getElementById("confirmPassword").innerHTML = "not same";
											output = false;
										}
										return output;
									}

								</script>
							<form class="form-valide-with-icon" action="#" name="frmChange" method="post" novalidate="novalidate" onSubmit="return validatePassword()">
							<div class="validation-message text-center"><?php if(isset($message)) { echo $message; } ?></div>
							<div class="form-group">
                                            <label class="text-label">Eski Parola <span style="color: red;">*</span></label>
                                            <div class="input-group transparent-append">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                                </div>
                                                <input type="password" class="form-control" id="currentPassword" name="currentPassword" placeholder="Eski parolanızı giriniz..">
                                            
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="text-label">Yeni Parola <span style="color: red;">*</span></label>
                                            <div class="input-group transparent-append">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                                </div>
                                                <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Güvenli bir parola belirtin..">
                                               
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="text-label">Tekrar Yeni Parola <span style="color: red;">*</span></label>
                                            <div class="input-group transparent-append">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                                </div>
                                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Güvenli bir parola belirtin..">
                                             
                                            </div>
                                        </div>
										<div class="text-center" style="padding: 15px;">
										<button type="submit" class="btn mr-2 btn-secondary "><i class="fa fa-pen"></i> Parolayı Güncelle</button>
										</div>
                                    </form>
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
	<script src="./synl/js/Package.API.js"></script>
	<script>checkGuild()</script>
	<script src="./vendor/toastr/js/toastr.min.js"></script>
	<script src="./js/plugins-init/toastr-init.js"></script>
	<script src="./vendor/sweetalert2/dist/sweetalert2.min.js"></script>
	<script src="./vendor/owl-carousel/owl.carousel.js"></script>
    <script src="./js/custom.min.js"></script>
	<script src="./js/deznav-init.js"></script>
	<script src="./vendor/datatables/js/jquery.dataTables.min.js"></script>
</body>
</html>

<div id="currentChart" class="current-chart" hidden="true"></div>