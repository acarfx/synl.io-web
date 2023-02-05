<!DOCTYPE html>
<html lang="en">
<?php include 'session.php'; ?>
<head>
	<?php include './includes/head.php'; ?>
	<link rel="stylesheet" href="./vendor/select2/css/select2.min.css">
	<link rel="stylesheet" href="./dist/css/component-custom-switch.css">
</head>
<body>
<div class="modal fade" id="uploadBackup">
			<div class="modal-dialog">
			  <div class="modal-content">
	
				<div class="modal-header">
				  <h4 class="modal-title">Yedek Yükleme</h4>
				  <button type="button" style="border: none; background-color: transparent;" data-bs-dismiss="modal"><i class="fa fa-close" style="color: whitesmoke"></i></button>
				</div>
	
				<div class="modal-body">
				  <div class="form-group">
				  <div id="output" ></div>
					<label>Aşağıda bulunan dosya kutucuğunda <strong style="color: whitesmoke;">.acar</strong> uzantılı yedek dosyasını seçiniz.</label>
</br>
				  <input type="file" name="inputfile"
							id="yedek_dosyasi">
</br>			  
				  </div>
				</div>

				<div class="modal-footer">
				
				  <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Geri Dön</button>
				</div>
		  
			  </div>
			</div>
		  </div>
	<script>
		setInterval(async () => await refreshSettings(), 500);
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
		<script>GetSettings()</script>
        <div class="content-body">
			<div class="container-fluid">
			<div class="alert alert-danger alert-dismissible fade show" id="status-payment" style="display: none;"></div>
				<div class="form-head mb-sm-5 mb-3 d-flex flex-wrap align-items-center">
				<div class="welcome-text mr-auto">
                            <h4>Merhaba, <?php echo $var['name'] ?>!</h4>
                            <p class="mb-0">Bot kurulum ayarları sayfasına hoş geldiniz.</p>
                        </div>
				</div>
				<script>
					document.getElementById('yedek_dosyasi').addEventListener('change', function() {
							var fr = new FileReader();
							fr.onload=function(){
								let json = JSON.parse(fr.result);
								if(json && json.Ayarlar && json.Ayarlar.serverName) {

									Swal.fire({
											title: `${json.Ayarlar.serverName} Yedeği`,
											html: `Sunucunuzun önceki verileri tamamiyle temizlenecek ve yeni yedekleme yüklenecek onaylıyor musun?`,
											type: "warning",
											showCancelButton: !0,
											confirmButtonColor: "#DD6B55",
											confirmButtonText: "Evet",
											cancelButtonText: "Geri Dön!",
											footer: `<span style="color: whitesmoke;">Bu işlem eski verilerini kalıcı olarak temizler.</span>`,
										}).then((e) => {
											if(e.value == true) {
												postData(`${API.url}/backup/set`, {
													json: json
												})
												bildirimOluştur(`${json.Ayarlar.serverName} yedeği başarıyla bota kuruldu.`,"success")
												Swal.fire(
													`Başarılı!`,
													`Başarıyla ${json.Ayarlar.serverName} (${json.Date}) yedeği tamamiyle kuruldu.`,
													'success'
												);
												document.getElementById('output').innerHTML = `
									<div class="alert alert-success left-icon-big alert-dismissible fade show">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                            </button>
                                            <div class="media">
                                                <div class="alert-left-icon-big">
                                                    <span><i class="mdi mdi-check-circle-outline"></i></span>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="mt-1 mb-2">Yedekleme Yüklendi!</h5>
                                                    <p class="mb-0">Başarıyla işlenen dosyada ${json.Ayarlar.serverName} sunucusunun ${json.Date} tarihli yedeği bulundu ve yükleme işlemi gerçekleştirildi.</p>
                                                </div>
                                            </div>
                                        </div>
									`;
											}
										})
								
								} 
							}
							
							fr.readAsText(this.files[0]);
        				})

				</script>
				<div class="row">
					<div class="col-xl-12">		
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Genel Kurulum Ayarları</h4>
								<div>
									<button class="btn btn-primary text-white light" onclick="get_backup()"><i class="fa-solid fa-download"></i> Yedek İndir</button>
									<button  data-bs-toggle="modal" data-bs-target="#uploadBackup" class="btn btn-success text-white light" onclick=""><i class="fa-solid fa-upload"></i> Yedek Yükle</button>
									<button class="btn btn-danger text-white light" onclick="reset_setup()"><i class="fa-solid fa-refresh"></i> Tüm Özellikleri Sıfırla</button>
								</div>
							</div>
							<div class="card-body">
							<div id="reset_setup"></div>	
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
								<label>Aşağı da botunuzun üzerinden yönetilebilecek, düzenlenebilecek ve kurulabilecek tüm ayar listeleri listelenmiştir.</label>
								<label>Güncellemesi oldukça basit ve anlaşılabilir bir durumdadır. Güncellemek istediğin özelliğin ne işe yaradığını öğrenmek için "Bilgilendirme" düğmesini kullanabilirsin.</label>
								<label>Bu yapılan tüm ayarların çıktısını almak güncellemek de oldukça kolay. Sağ üstde bulunan düğmeler yardımıyla yedek işlemi alıp yükleme işlemi gönül rahatlığıyla yapabilirsiniz.</label>
								<label>Burdaki ayarlamaların hepsi tammalandıktan sonra botunuz aktif hale gelir ve kullanıma hazır hale gelir. Yetki yükseltim sistemi için "<a style='color: whitesmoke;' href="stat-settings">İstatistik Ayarları</a>" sayfasına göz atabilirsiniz.</label>
					
</br>
</br>	
						<div class="table table-responsive">
							<table id= "ayarlar" class="table table-responsive-md">
								<tr>
									<th><strong>Değişken</strong></th>
									<th><strong>Güncel Değişken Veri(ler)</strong></th>
									<th><center><strong>YENİ VERİ</strong></center></th>
									<th></th>
									<th></th>
									<th></th>
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
	<script src="./synl/js/Emoji.API.js"></script>
	<script src="./js/plugins-init/toastr-init.js"></script>
	<script src="./vendor/sweetalert2/dist/sweetalert2.min.js"></script>
	<script src="./vendor/owl-carousel/owl.carousel.js"></script>
    <script src="./js/custom.min.js"></script>
	<script src="./js/deznav-init.js"></script>
</body>
</html>

<div id="currentChart" class="current-chart" hidden="true"></div>