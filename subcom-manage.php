<!DOCTYPE html>
<html lang="en">
<?php include 'session.php'; ?>
<head>
	<?php include './includes/head.php'; ?>
	<link rel="stylesheet" href="./vendor/select2/css/select2.min.css">
	<link rel="stylesheet" href="./dist/css/component-custom-switch.css">
</head>
<body>
<script>
async function GetCommands() {
    let _get  = await fetch(`${API.url}/get?type=15`, { 
       
            headers: {
                'Content-Type': 'application/json',
                'Authorization': API.token
                },
       
    }).catch(err => {
        console.log({
            status: "ERROR",
            err: err,
            statuscode: 200
        })
    })
    if(!_get) return;
    let _result = await _get.json();
    var table = document.getElementById("ayarlar");
    _result.map((item, index) => {
        const row = table.insertRow();
        const td0 = row.insertCell(0);
        const td1 = row.insertCell(1);
        const td2 = row.insertCell(2);
        const td3 = row.insertCell(3);
        const td4 = row.insertCell(4);
        const td5 = row.insertCell(5);
    
        td0.innerHTML = `${item.Command}`
        td1.innerHTML = `${item.Date}`
        td2.innerHTML = `${item.Permissions.join(", ")}`
        td3.innerHTML = `${item.Roles.join(", ")}`
        td4.innerHTML = `<img src="${item.Author.avatar}" width="32px" height="32px" style="border-radius: 16px;"></img> ${item.Author.tag}`
        td5.innerHTML = `<button type="button" style="width: 100px; padding: 1px;" id="${item.id}" onclick="delete_command('${item.Command}', this)"  name="delete_command" class="btn light btn-danger"> <i class="fa fa-times"></i> Kaldır</button>`
   
    })
}

    GetCommands()
function delete_command(name, table) {
    Swal.fire({
        title: `Komut kaldırılıyor!`,
        text: `Belirtilen ${name} isimli alt komutu kaldırmak istediğinize emin misiniz?`,
        type: "warning",
        showCancelButton: !0,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Evet",
        cancelButtonText: "Geri Dön!",
    }).then((e) => {
        if(e.value == true) {
               postData(`${API.url}/commands/delete`, {
                name: name
               })
               let docs = document.getElementById("ayarlar");
               var i = table.parentNode.parentNode.rowIndex;
               docs.deleteRow(i);
               Swal.fire(
                `Başarılı!`,
                `Başarılı bir şekilde ${name} alt komutu kaldırıldı!`,
                'success'
            );
               }
        });
}
function valid_command() {
    let rolisim = document.getElementById("komutismi").value
    let kullancakroller = getArray("kullanacaklar")
    let verilcekroller = getArray("verilecek")
    if(!rolisim || kullancakroller < 0 || verilcekroller < 0) return  Swal.fire(
            `Başarısız!`,
            `Komut ismini, kullanacak veya da verilecek rolleri boş bıraktınız!`,
            'error'
        );
      Swal.fire({
            title: `Komut ekleniyor!`,
            text: `Belirttiğiniz ${rolisim} komutu eklemek istiyor musunuz?`,
            type: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Evet",
            cancelButtonText: "Geri Dön!",
            }).then((e) => {
                if(e.value == true) {
                    postData(`${API.url}/commands/add`, {
                            name: rolisim,
                            permissions: kullancakroller.length > 0 ? kullancakroller : [],
                            roles:  verilcekroller.length > 0 ? verilcekroller : [],
                    })
                    Swal.fire(
                        `Başarılı!`,
                        `Başarılı bir şekilde sunucunuza ${rolisim} komutu eklendi!`,
                        'success'
                    );
                    }
                });

}

function modal_load() {
    GetAPI(1, "ALL", `kullanacaklar`)
    GetAPI(1, "ALL", `verilecek`)
}
</script>
<div class="modal fade" id="addCommand">
			<div class="modal-dialog">
			  <div class="modal-content">
				<div class="modal-header">
				  <h4 class="modal-title">Yeni Komut Ekleme</h4>
                  <button type="button" style="border: none; background-color: transparent;" data-bs-dismiss="modal"><i class="fa fa-close" style="color: whitesmoke"></i></button>
				</div>
				<div class="modal-body">
				  <div class="form-group">
					<label>Komut ismi belirtin *:</label>
					<input class="form-control" style="background-color: #292f52; color: whitesmoke;" id="komutismi" placeholder="Komut ismi belirtin."></input>
					</br>
					<label>Kullanacak rol(ler) belirtin *:</label>
                    <select multiple class="form-control" style="background-color: #292f52; color: whitesmoke;" id="kullanacaklar"></select>
                    </br>
					<label>Verilecek rol(ler) belirtin *:</label>
                    <select multiple class="form-control" style="background-color: #292f52; color: whitesmoke;" id="verilecek"></select>
				  </div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success light" onclick="valid_command();"><i class="fa fa-plus"></i> Ekle</button>
				  <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Geri Dön</button>
				</div>
			  </div>
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
                            <p class="mb-0">Alt rol komut yönetim sayfasına hoş geldiniz.</p>
                        </div>
				</div>
				<div class="row">
					<div class="col-xl-12">		
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Alt rol komut listesi</h4>
                                <button type="button" class="btn light btn-success" onclick="modal_load();" data-bs-toggle="modal" data-bs-target="#addCommand"> <i class="fa fa-plus"></i> Oluştur</button>
                      
							</div>
							<div class="card-body">			
						<div class="table table-responsive">
							<table id= "ayarlar" class="table table-responsive-md">
								<tr>
									<th><strong>KOMUT İSMİ</strong></th>
									<th><strong>OLUŞTURULMA TARİHİ</strong></th>
									<th><strong>KULLANABİLİR ROL(LER)</strong></th>
									<th><strong>VERİLECEK ROL(LER)</strong></th>
                                    <th><strong>OLUŞTURAN KİŞİ</strong></th>
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