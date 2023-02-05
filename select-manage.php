<!DOCTYPE html>
<html lang="en">
<?php include 'session.php'; ?>
<head>
	<?php include './includes/head.php'; ?>
	<link rel="stylesheet" href="./vendor/select2/css/select2.min.css">
	<link rel="stylesheet" href="./dist/css/component-custom-switch.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
</head>
<body>
<script>
   GetResListed()
   async function GetResListed() {
    let _get  = await fetch(`${API.url}/get?type=19`, { 
       
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
        const td6 = row.insertCell(3);
        const td3 = row.insertCell(4);
        const td4 = row.insertCell(5);
        const td5 = row.insertCell(6);
        td0.innerText = `${item.Name}`
        td1.innerHTML = item.Text
        td2.innerHTML = `${item.Roles}` 
        td3.innerHTML = `<img src="${item.Author.avatar}" style="width: 32px; height: 32px; border-radius: 16px;"></img> ${item.Author.tag}`
        td6.innerText = `${item.Access ? item.Access : "Herkes Kullanabilir!"}`
        td4.innerText = `${item.Date}`
        td5.innerHTML = `<button type="button" style="width: 100px; padding: 1px;" onclick="delete_res('${item.Secret}',this)" class="btn light btn-danger"> <i class="fa fa-times"></i> Kaldır</button>`
   
    })
}

function delete_res(id, table) {
    Swal.fire({
        title: `Seçmeli menü kaldırılıyor!`,
        text: `Belirtilen seçmeli menüyü kaldırmak istediğinize emin misiniz?`,
        type: "warning",
        showCancelButton: !0,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Evet",
        cancelButtonText: "Geri Dön!",
    }).then((e) => {
        if(e.value == true) {
               postData(`${API.url}/selectmenu/delete`, {
                secret: id
               })
               let docs = document.getElementById("ayarlar");
               var i = table.parentNode.parentNode.rowIndex;
               docs.deleteRow(i);
               Swal.fire(
                `Başarılı!`,
                `Başarılı bir şekilde seçmeli menü kaldırıldı!`,
                'success'
            );
               }
        });
}
function valid_resp() {
    let isim = document.getElementById("isim").value;
    let açıklama = document.getElementById("açıklama").value;
    let kanal = document.getElementById("kanal").value;
    let rol = getArray("rol");
    let kullanacak_roller = getArray("k_rol");
    
    if(!isim || !rol || !açıklama) {
        return Swal.fire(
        `Başarısız!`,
        `Bir seçmeli menü ekleyebilmem için boş alanlarımı doldurman gerekiyor!`,
        'error'
        );
    }

    Swal.fire({
title: `Seçmeli menü ekleniyor!`,
text: `Belirttiğiniz şekilde ${isim} isimli seçmeli menüyü eklemek istediğinize emin misiniz?`,
type: "warning",
showCancelButton: !0,
confirmButtonColor: "#DD6B55",
confirmButtonText: "Evet",
cancelButtonText: "Geri Dön!",
}).then((e) => {
    if(e.value == true) {
        postData(`${API.url}/selectmenu/create`, {
            name: isim,
            desc: açıklama ? açıklama : undefined,
            roles: rol,
            channel: kanal,
            access: kullanacak_roller || []
        })
        setTimeout(() => {
                location.reload()
        }, 1280);
        Swal.fire(
            `Başarılı!`,
            `Başarılı bir şekilde seçmeli menü eklendi ve belirtilen kanala kurulu.`,
            'success'
        );
        }
    });
}

</script>
    <div class="modal fade" id="addRes">
			<div class="modal-dialog">
			  <div class="modal-content">
				<div class="modal-header">
				  <h4 class="modal-title">Yeni Seçmeli Menü Ekleme</h4>
                  <button type="button" style="border: none; background-color: transparent;" data-bs-dismiss="modal"><i class="fa fa-close" style="color: whitesmoke"></i></button>
				</div>
				<div class="modal-body">
				  <div class="form-group">
                    <label>Aşağı da bulunan seçmeli menü için rolleri birden fazla eklemek için (CTRL+LM) tuş kombinasyonu ile birden fazla seçerek ekleme işlemi yapabilirsiniz.</label>
                    </br>
                    <label>Seçmeli menü ismi*:</label>
                    <input class="form-control" style="background-color: #292f52; color: whitesmoke;" id="isim" placeholder="Bir seçmeli menü ismi belirtmelisiniz."></input>
                    </br>
                    <label>Seçmeli menü kanal yazısı*:</label>
                    <textarea class="form-control" rows="2" id="açıklama" style="height: 140px;" placeholder="Discord yazı fontları ve yazı stillerini desteklemektedir. Kanal'da yazıcak yazıyı belirtiniz."></textarea>
                    </br>
                    <label>Kullanabilecek Rol(ler)*:</label>
					    <select class="form-control" multiple style="background-color: #292f52; color: whitesmoke;" id="k_rol">                  
                        </select>
                    </br>
                    </br>
                    <label>Rol(ler)*:</label>
					<select class="form-control" multiple style="background-color: #292f52; color: whitesmoke;" id="rol">
                   
                    </select>
</br>
<label>Kurulacak Kanal*:</label>
					<select class="form-control" style="background-color: #292f52; color: whitesmoke;" id="kanal">
                   
                    </select>
				  </div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success light" onclick="valid_resp();"><i class="fa fa-plus"></i> Ekle</button>
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
                            <p class="mb-0">Seçmeli menü yönetim sayfasına hoş geldiniz.</p>
                        </div>
				</div>
				<div class="row">
					<div class="col-xl-12">		
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Seçmeli Menü Listesi</h4>
                                <button type="button" onclick="GetAPI(1, 'ALL', 'rol'), GetAPI(1, 'ALL', 'k_rol'), GetAPI(2, 'TEXT', 'kanal')" class="btn light btn-success" data-bs-toggle="modal" data-bs-target="#addRes"> <i class="fa fa-plus"></i> Oluştur</button>
                      
							</div>
							<div class="card-body">			
						<div class="table table-responsive">
							<table id= "ayarlar" class="table table-responsive-md">
								<tr>
									<th><strong>İSİM</strong></th>
									<th><strong>MENÜ AÇIKLAMASI</strong></th>
									<th><strong>ROL(LER)</strong></th>
                                    <th><strong>KULLANACAK ROL(LER)</strong></th>
									<th><strong>OLUŞTURAN</strong></th>
                                    <th><strong>TARİH</strong></th>
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