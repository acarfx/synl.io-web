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
   GetResListed()
   GetAPI(1, "ALL", `rol`)
   GetAPI(1, "ALL", `lider`)
   async function GetResListed() {
    let _get  = await fetch(`${API.url}/get?type=16`, { 
       
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
        td0.innerText = `${item.isim} (${item.kisiler.size} kişi)`
        td1.innerHTML = item.sorumluluk
        td2.innerText = item.lider 
        td3.innerHTML = `<img src="${item.olusturan.avatar}" style="width: 16px; height: 16px; border-radius: 8px;"></img> ${item.olusturan.tag}`
        td4.innerText = `${item.tarih}`
        td5.innerHTML = `<button type="button" style="width: 100px; padding: 1px;" onclick="delete_res('${item.isim}',this)" class="btn light btn-danger"> <i class="fa fa-times"></i> Kaldır</button>`
   
    })
}

function delete_res(id, table) {
    Swal.fire({
        title: `Liderlik veya sorumluluk kaldırılıyor!`,
        text: `Belirtilen ${id} liderliğini veya sorumluluğunu kaldırmak istediğinize emin misiniz?`,
        type: "warning",
        showCancelButton: !0,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Evet",
        cancelButtonText: "Geri Dön!",
    }).then((e) => {
        if(e.value == true) {
               postData(`${API.url}/resp/delete`, {
                name: id
               })
               let docs = document.getElementById("ayarlar");
               var i = table.parentNode.parentNode.rowIndex;
               docs.deleteRow(i);
               Swal.fire(
                `Başarılı!`,
                `Başarılı bir şekilde ${id} isimli liderlik veya sorumluluk kaldırıldı!`,
                'success'
            );
               }
        });
}
function valid_resp() {
    let isim = document.getElementById("isim").value;
    let rol = document.getElementById("rol").value;
    let lider = getArray("lider");
    
    
    if(!isim || !rol || !lider ) {
        return Swal.fire(
        `Başarısız!`,
        `Bir liderlik veya sorumluluk ekleyebilmem için lütfen boş alanları doldurun!`,
        'error'
        );
    }

    Swal.fire({
title: `Liderlik veya sorumluluk ekleniyor!`,
text: `Belirttiğiniz şekilde liderlik veya sorumluluğu eklemek istediğinize emin misiniz?`,
type: "warning",
showCancelButton: !0,
confirmButtonColor: "#DD6B55",
confirmButtonText: "Evet",
cancelButtonText: "Geri Dön!",
}).then((e) => {
    if(e.value == true) {
        postData(`${API.url}/resp/add`, {
            name: isim ,
            role: rol,
            leaders: lider ? lider : [],
        })
        setTimeout(() => {
                location.reload()
        }, 1280);
        Swal.fire(
            `Başarılı!`,
            `Başarılı bir şekilde sunucunuza liderlik ve sorumluluk eklendi ve dağıtımı gerçekleşti!`,
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
				  <h4 class="modal-title">Yeni Liderlik/Sorumluluk Ekleme</h4>
                  <button type="button" style="border: none; background-color: transparent;" data-bs-dismiss="modal"><i class="fa fa-close" style="color: whitesmoke"></i></button>
				</div>
				<div class="modal-body">
				  <div class="form-group">
                    <label>Liderlik ve sorumluluk sistemi için üyeleri ayırt etmenin ve kimin kimi denetleyeceğini buradan ekleyebilirsiniz. Çoklu seçimlerde ise (Çoklu Seçim CTRL + LM) tuşlarıyla yapabilirsiniz.</label>
                    </br>
                    <label>Liderlik/Sorumluluk İsmi*:</label>
                    <input class="form-control" style="background-color: #292f52; color: whitesmoke;" id="isim" placeholder="Bir isim belirtmelisiniz."></input>
                    </br>
					<label>Rol belirtin *:</label>
					<select class="form-control" style="background-color: #292f52; color: whitesmoke;" id="rol"></select>
					</br>
					<label>Liderleri veya sorumluluları belirtin*:</label>
                    <select class="form-control" multiple id="lider" style="background-color: #292f52; color: whitesmoke;"></select>
        
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
                            <p class="mb-0">Liderlik ve sorumluluk yönetim sayfasına hoş geldiniz.</p>
                        </div>
				</div>
				<div class="row">
					<div class="col-xl-12">		
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Liderlik Ve Sorumluluk Listesi</h4>
                                <button type="button" class="btn light btn-success" data-bs-toggle="modal" data-bs-target="#addRes"> <i class="fa fa-plus"></i> Oluştur</button>
                      
							</div>
							<div class="card-body">			
						<div class="table table-responsive">
							<table id= "ayarlar" class="table table-responsive-md">
								<tr>
									<th><strong>İSİM</strong></th>
									<th><strong>ROL</strong></th>
									<th><strong>SORUMLULARI/LİDERLERİ</strong></th>
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