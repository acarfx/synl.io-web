<!DOCTYPE html>
<html lang="en">
<?php include 'session.php'; ?>
<head>
	<?php include './includes/head.php'; ?>
	<link rel="stylesheet" href="./vendor/select2/css/select2.min.css">
	<link rel="stylesheet" href="./dist/css/component-custom-switch.css">
    <script src="./synl/js/Emoji.API.js"></script>
</head>
<body>
	
<script>
	GetAPI(1, "ALL", `emoji_role`)
        function valid_emoji() {
            let name = document.getElementById("emoji_name");
            let url = document.getElementById("emoji_url");
			let roller = document.getElementById("emoji_role").value
            if(!name.value || !url.value) {
                return Swal.fire(
                `Başarısız!`,
                `Bir emoji oluşturabilmem için gerekli bilgilere ihtiyacım var neden boş bıraktın ki!`,
                'error'
                );
            }
            add_emoji(name.value, url.value, roller ? getArray("emoji_role") : undefined)
        }

</script>
<div class="modal fade" id="addEmoji">
			<div class="modal-dialog">
			  <div class="modal-content">
				<div class="modal-header">
				  <h4 class="modal-title">Yeni Emoji Ekleme</h4>
                  <button type="button" style="border: none; background-color: transparent;" data-bs-dismiss="modal"><i class="fa fa-close" style="color: whitesmoke"></i></button>
				</div>
				<div class="modal-body">
				  <div class="form-group">
					<label>Aşağı da bulunan "Sadece bu rol(ler)" seçeneği CTRL ile birden fazla seçerek sadece o rol veya rollerin kullanmasına olanak sağlarsınız.</label>	
					</br>
					<label>Bir isim belirtin:</label>
					<input class="form-control" style="background-color: #292f52; color: whitesmoke;" id="emoji_name"></input>
					</br>
					<label>Resim Bağlantı/URL:</label>
					<input class="form-control" style="background-color: #292f52; color: whitesmoke;" id="emoji_url"></input>
					</br>
					<label>Sadece bu rol(ler):</label>
					<select multiple class="form-control" style="background-color: #292f52; color: whitesmoke;" id="emoji_role"></select>
            	
				  </div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success light" onclick="valid_emoji();"><i class="fa fa-plus"></i> Ekle</button>
				  <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Geri Dön</button>
				</div>
			  </div>
			</div>
		  </div>
	<script>
		GetListedEmojis()
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
        <div class="content-body">
			<div class="container-fluid">
			<div class="alert alert-danger alert-dismissible fade show" id="status-payment" style="display: none;"></div>
				<div class="form-head mb-sm-5 mb-3 d-flex flex-wrap align-items-center">
				<div class="welcome-text mr-auto">
                            <h4>Merhaba, <?php echo $var['name'] ?>!</h4>
                            <p class="mb-0">Emoji yönetim sayfasına hoş geldiniz.</p>
                        </div>
				</div>
				<div class="row">
					<div class="col-xl-12">		
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Genel Emoji Listesi</h4>
                                <button type="button" class="btn light btn-success" data-bs-toggle="modal" data-bs-target="#addEmoji"> <i class="fa fa-plus"></i> Oluştur</button>
							</div>
							<div class="card-body">			
						<div class="table table-responsive">
							<table id= "ayarlar" class="table table-responsive-md">
								<tr>
									<th><strong>ID</strong></th>
									<th><strong>EMOJİ</strong></th>
									<th><strong>İSİM</strong></th>
									<th><strong>ROL</strong></th>
									<th><strong>İŞLEM</strong></th>
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
	<script src="./js/plugins-init/toastr-init.js"></script>
	<script src="./vendor/sweetalert2/dist/sweetalert2.min.js"></script>
	<script src="./vendor/owl-carousel/owl.carousel.js"></script>
    <script src="./js/custom.min.js"></script>
	<script src="./js/deznav-init.js"></script>
</body>
</html>

<div id="currentChart" class="current-chart" hidden="true"></div>