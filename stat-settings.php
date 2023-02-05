<!DOCTYPE html>
<html lang="en">
<?php include 'session.php'; ?>
<head>
	<?php include './includes/head.php'; ?>
	<link rel="stylesheet" href="./vendor/select2/css/select2.min.css">
	<link rel="stylesheet" href="./dist/css/component-custom-switch.css">
	<script>

	setInterval(async () => await refreshStatSettings(), 500);

	GetAPI(2, "CATCHAT", `chatEkle_d`)
	GetAPI(2, "CATVOICE", `sesEkle_d`)
	GetAPI(1, "ALL", `yetkiEkle_r`)
	GetAPI(1, "ALL", `yetkiEkle_a`)
	</script>
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

		<script>GetStatSettings()</script>
		<div class="modal fade" id="addStaffData">
			<div class="modal-dialog">
			  <div class="modal-content">
	
				<div class="modal-header">
				  <h4 class="modal-title">Yeni Yetki Yükseltimi Düzeni</h4>
				  <button type="button" style="border: none; background-color: transparent;" data-bs-dismiss="modal"><i class="fa fa-close" style="color: whitesmoke"></i></button>
				</div>
	
				<div class="modal-body">
				  <div class="form-group">
					<label>Bir rol belirleyin:</label>
					<select class="form-control" style="background-color: #292f52; color: whitesmoke;" id="yetkiEkle_r"></select>
				  	</br>
					  <label>Bir alt/rol belirleyin:</label>
					  <select multiple class="form-control" style="background-color: #292f52; color: whitesmoke;" id="yetkiEkle_a"></select>
					</br>
					<label>Bir puan belirleyin:</label>
					<input class="form-control" style="background-color: #292f52; color: whitesmoke;" id="yetkiEkle_p"></select>
				  
				  </div>
				</div>
				<script>
					function ekleYeniStaff() {
						let rol = document.getElementById("yetkiEkle_r")
						let exrol = getArray("yetkiEkle_a")
						let puan = document.getElementById("yetkiEkle_p")
						if(!rol || !exrol || !puan) return alert("Boş bırakmayın!")
						addRow('_staffs', rol.value, exrol, puan.value)						
					}
				</script>
				<div class="modal-footer">
					<button type="button" class="btn btn-success light" onclick="ekleYeniStaff();"><i class="fa fa-plus"></i> Ekle</button>
				  <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Geri Dön</button>
				</div>
		  
			  </div>
			</div>
		  </div>


		<div class="modal fade" id="addVoiceData">
			<div class="modal-dialog">
			  <div class="modal-content">
	
				<div class="modal-header">
				  <h4 class="modal-title">Yeni Ses Kanalı/Kategorisi Oluştur</h4>
				  <button type="button" style="border: none; background-color: transparent;" data-bs-dismiss="modal"><i class="fa fa-close" style="color: whitesmoke"></i></button>
				</div>
	
				<div class="modal-body">
				  <div class="form-group">
					<label>Bir kanal/kategori belirleyin:</label>
					<select class="form-control" style="background-color: #292f52; color: whitesmoke;" id="sesEkle_d"></select>
				  </br>
					<label>Görünen isim belirleyin:</label>
					<input class="form-control" style="background-color: #292f52; color: whitesmoke;" id="sesEkle_i"></select>
				  
				  </div>
				</div>
				<script>
					function ekleYeniSes() {
						let kategori = document.getElementById("sesEkle_d")
						let isim = document.getElementById("sesEkle_i")
						if(!isim || !kategori) {
							return alert(`Boş Bırakmayın!`)
						}
						addRow('_voices', kategori.value, isim.value)						
					}
				</script>
				<div class="modal-footer">
					<button type="button" class="btn btn-success light" onclick="ekleYeniSes();"><i class="fa fa-plus"></i> Ekle</button>
				  <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Geri Dön</button>
				</div>
		  
			  </div>
			</div>
		  </div>
		<div class="modal fade" id="addChatData">
			<div class="modal-dialog">
			  <div class="modal-content">
	
				<div class="modal-header">
				  <h4 class="modal-title">Yeni Sohbet Kanalı/Kategorisi Oluştur</h4>
				  <button type="button" style="border: none; background-color: transparent;" data-bs-dismiss="modal"><i class="fa fa-close" style="color: whitesmoke"></i></button>
				</div>
	
				<div class="modal-body">
				  <div class="form-group">
					<label>Bir kanal/kategori belirleyin:</label>
					<select class="form-control" style="background-color: #292f52; color: whitesmoke;" id="chatEkle_d"></select>
				  </br>
					<label>Görünen isim belirleyin:</label>
					<input class="form-control" style="background-color: #292f52; color: whitesmoke;" id="chatEkle_i"></select>
				  
				  </div>
				</div>
				<script>
					function ekleYeni() {
						let kategori = document.getElementById("chatEkle_d")
						let isim = document.getElementById("chatEkle_i")
						if(!isim || !kategori) {
							return alert(`Boş Bırakmayın!`)
						}
						addRow('_chats', kategori.value, isim.value)						
					}
				</script>
				<div class="modal-footer">
					<button type="button" class="btn btn-success light" onclick="ekleYeni();"><i class="fa fa-plus"></i> Ekle</button>
				  <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Geri Dön</button>
				</div>
		  
			  </div>
			</div>
		  </div>
        <div class="content-body">
			<div class="container-fluid">
			<div class="alert alert-danger alert-dismissible fade show" id="status-payment" style="display: none;"></div>
				<div class="form-head mb-sm-5 mb-3 d-flex flex-wrap align-items-center">
				<div class="welcome-text mr-auto">
                            <h4>Merhaba, <?php echo $var['name'] ?>!</h4>
                            <p class="mb-0">Bot istatistik ayarları sayfasına hoş geldiniz.</p>
                        </div>
					
				</div>
				<div class="row">
					<div class="col-xl-12">
						<div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Genel İstatistik Ayarları</h4>
                            </div>
                            <div class="card-body">
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

											<label>Aşağı da yetki yükseltimine ve istatistik sistemine ait ayarlamalar ve puanlamalar bulunmaktadır.</label>
											<label>Eklenen ve güncellenen her işlem anında bot üzerinde değişikliğini gösterir ve ona göre kendini ayarlar.</label>
											<label>Güncellemekte olduğunuz özelliğin ne anlama geldiğini bilmiyorsanız "Bilgilendirme" düğmesini kullanarak ne işe yaradığını öğrenebilirsiniz.</label>
					</br>
			</br>
								<div class="table table-responsive">
									<table id= "ayarlar" class="table table-responsive-md">
										<thead>
											<tr>
												<th><strong>Değişken</strong></th>
												<th><strong>Güncel Değişken Verisi</strong></th>
												<th width="60px" ><center><strong>Yeni Veri</strong></center></th>
												<th width="120px"></th>
												<th width="60px"></th>
												<th width="1px"></th>
											</tr>
										</thead>
							
									</table>
							</div>
								</div>
							</div>
					</div>
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Sohbet Kategorileri</h4>
								<button data-bs-toggle="modal" data-bs-target="#addChatData" class="btn btn-secondary"><i class="fa fa-plus"></i> Yeni Ekle</button>
							</div>
							<div class="card-body">
								<label>Aşağı da "Kategorilendirilmiş Chat" sistemine tabi olan kategoriler veya kanallar listelenmektedir. Bu kategoriler ve kanallar ayrı olarak istatistik sisteminde gözükmektedir ve ona göre puanlandırılmaktadır.</label>
				</br>
				</br>
								<div class="table table-responsive">
									<table id= "chatkategorileri" class="table table-responsive-md">
										<thead>
                                            <tr>
                                                <th style="width:80px;"><strong>#</strong></th>
                                                <th><strong>KATEGORİ / KANAL</strong></th>
                                                <th><strong>GÖRÜNEN KATEGORİ İSMİ</strong></th>
												<th><center><strong>İŞLEM</strong></center></th>
                                            </tr>
                                        </thead>
									</table>
							</div>
								</div>
							</div>
					</div>
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Ses Kategorileri</h4>
								<button data-bs-toggle="modal" data-bs-target="#addVoiceData" class="btn btn-secondary"><i class="fa fa-plus"></i> Yeni Ekle</button>
							</div>
							<div class="card-body">
							<label>Aşağı da "Kategorilendirilmiş Ses Kanalları" sistemine tabi olan kategoriler veya kanallar listelenmektedir. Bu kategoriler ve kanallar ayrı olarak istatistik sisteminde gözükmektedir ve ona göre puanlandırılmaktadır.</label>
				</br>
				</br>
								<div class="table table-responsive">
									<table id= "seskategorileri" class="table table-responsive-md">
										<thead>
                                            <tr>
                                                <th style="width:80px;"><strong>#</strong></th>
                                                <th><strong>KATEGORİ / KANAL</strong></th>
                                                <th><strong>GÖRÜNEN KATEGORİ İSMİ</strong></th>
                                        		<th><center><strong>İŞLEM</strong></center></th>
                                            </tr>
                                        </thead>
									</table>
							</div>
								</div>
							</div>
					</div>
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Yetki Yükseltimi</h4>
								<div>
								<button class="btn btn-warning" onclick="reset_staffs()"><i class="fa fa-close"></i> Sıfırla</button>
								<button data-bs-toggle="modal" data-bs-target="#addStaffData" class="btn btn-secondary"><i class="fa fa-plus"></i> Yeni Ekle</button>
								</div>
							</div>
							<div class="card-body">
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

											<label>Aşağı da sistemsel yetki yükseltimine ve yetkili olarak ayarlanmış rol ve puanlamalar bulunmaktadır.</label>
											<label>Ekleme yaparken en aşağıdan yukarıya doğru yapmalısınız aksi taktirde sistemsel sıralamayı kaybederseniz düzgün yükseltimi elde edemezsiniz.</label>
											<label>Yeni bir yetki eklemek istiyorsanız görev değil ise bu sayfadaki tüm verileri temizlemelesiniz. Sağda bulunan düğme ile bu işlemi gerçekleştirebilirsiniz.</label>
					</br>
			</br>
								<div class="table table-responsive">
									<table id= "yetkiyükseltimi" class="table table-responsive-md">
										<thead>
                                            <tr>
                                               
                                                <th><strong>YETKİ</strong></th>
                                                <th><strong>ALT YETKİ(LER)</strong></th>
                                                <th><strong>PUAN</strong></th>
												<th><center><strong>İŞLEM</strong></center></th>
		
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
	
	<script src="./vendor/chart.js/Chart.bundle.min.js"></script>
	<script src="./vendor/select2/js/select2.full.min.js"></script>
    <script src="./js/plugins-init/select2-init.js"></script>
    <script src="./vendor/peity/jquery.peity.min.js"></script>
	
	<script>checkGuild(),GetChats(),GetVoices(), GetStaffs()</script>
	<script src="./vendor/toastr/js/toastr.min.js"></script>
	<script src="./js/plugins-init/toastr-init.js"></script>
	<script src="./vendor/sweetalert2/dist/sweetalert2.min.js"></script>
	<script src="./vendor/owl-carousel/owl.carousel.js"></script>
    <script src="./js/custom.min.js"></script>
	<script src="./js/deznav-init.js"></script>
    
</body>
</html>

<div id="currentChart" class="current-chart" hidden="true"></div>