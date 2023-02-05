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
   function format (option) {
			console.log(option);
			if (!option.id) { return option.text; }
			var ob = option.text
			return ob;
		};
        $(document).ready(function() {
            $(`#emoji`).select2({
                placeholder: "İsteğe bağlı ürün emojisi seç!",
                tags: true,
                width: "100%",
                allowClear: true,
                templateResult: format,
                templateSelection: function (option) {
                    if (option.id.length > 0 ) {
                        return option.text + `&nbsp;&nbsp;&nbsp;`;
                    } else {
                        return option.text;
                    }
                },
              escapeMarkup: function (m) {
                        return m;
                    },
               
            });
        });
   async function GetResListed() {
    let _get  = await fetch(`${API.url}/get?type=18`, { 
       
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
        td0.innerText = `${item.name}`
        td1.innerHTML = item.desc
        td2.innerHTML = `${Number(item.coin) > 0 ? `${item.coin} Coin${item.gold > 0 ? ` ve ` : ``}` : ``} ${Number(item.gold) > 0 ? `${item.gold} Altın` : ``}${item.gold <= 0 && item.coin <= 0 ? `Ücretsiz Ürün` : ``}` 
        td3.innerHTML = `${item.emoji == "-" ? `Emoji Bulunamadı!` : `<img src="${item.emoji}" style="width: 32px; height: 32px; border-radius: 3px;"></img>`}`
        td4.innerText = `${item.role}`
        td5.innerHTML = `<button type="button" style="width: 100px; padding: 1px;" onclick="delete_res('${item.name}',this)" class="btn light btn-danger"> <i class="fa fa-times"></i> Kaldır</button>`
   
    })
}

function delete_res(id, table) {
    Swal.fire({
        title: `Ürün kaldırılıyor!`,
        text: `Belirtilen ${id} isminde ki ürünü kaldırmak istediğinize emin misiniz?`,
        type: "warning",
        showCancelButton: !0,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Evet",
        cancelButtonText: "Geri Dön!",
    }).then((e) => {
        if(e.value == true) {
               postData(`${API.url}/shop/delete`, {
                name: id
               })
               let docs = document.getElementById("ayarlar");
               var i = table.parentNode.parentNode.rowIndex;
               docs.deleteRow(i);
               Swal.fire(
                `Başarılı!`,
                `Başarılı bir şekilde ${id} isimli ürün kaldırıldı!`,
                'success'
            );
               }
        });
}
function valid_resp() {
    let isim = document.getElementById("isim").value;
    let rol = document.getElementById("rol").value;
    let açıklama = document.getElementById("açıklama").value;
    let coin = document.getElementById("coin").value;
    let altın = document.getElementById("altın").value;
    let emoji = document.getElementById("emoji").value;
    
    
    if(!isim) {
        return Swal.fire(
        `Başarısız!`,
        `Ürün ismi belirtmelisiniz!`,
        'error'
        );
    }

    Swal.fire({
title: `Ürün ekleniyor!`,
text: `Belirttiğiniz şekilde ${isim} ürününü eklemek istediğinize emin misiniz?`,
type: "warning",
showCancelButton: !0,
confirmButtonColor: "#DD6B55",
confirmButtonText: "Evet",
cancelButtonText: "Geri Dön!",
}).then((e) => {
    if(e.value == true) {
        postData(`${API.url}/shop/add`, {
            name: isim,
            coin: Number(coin) > 0 ? Number(coin) : 0,
            gold: Number(altın) > 0 ? Number(altın) : 0,
            emoji: emoji == "emoji" ? undefined : emoji,
            desc: açıklama ? açıklama : undefined,
            role: rol == "rol" ? undefined : rol
        })
        setTimeout(() => {
                location.reload()
        }, 1280);
        Swal.fire(
            `Başarılı!`,
            `Başarılı bir şekilde mağazaya ürün eklendi!`,
            'success'
        );
        }
    });
}
setTimeout(async () => {
                    var url = String(API.url)
                    var surum = Number( url.replace(/[^0-9]/g, ""))
                    
                        if(surum <= 5) return alert("Kullandığınız API sürümü v6 ve üstü olmadığından dolayı bu özelliğe sahip değilsiniz."), history.back();
                        
                   }, 1000);
</script>
    <div class="modal fade" id="addRes">
			<div class="modal-dialog">
			  <div class="modal-content">
				<div class="modal-header">
				  <h4 class="modal-title">Yeni Ürün Ekleme</h4>
                  <button type="button" style="border: none; background-color: transparent;" data-bs-dismiss="modal"><i class="fa fa-close" style="color: whitesmoke"></i></button>
				</div>
				<div class="modal-body">
				  <div class="form-group">
                    <label>Mağazaya ürün eklemek için aşağıda bulunan kutucukları doldurunuz. Eklenmiş bir ürün ismi girerseniz o ürünü silmeden güncelleme işlemini tamamlayabilirsiniz. Bir rol belirtirseniz satın alan kullanıcının üstüne o rolü otomatik verir.</label>
                    </br>
                    <label>Ürün İsmi*:</label>
                    <input class="form-control" style="background-color: #292f52; color: whitesmoke;" id="isim" placeholder="Bir ürün ismi belirtmelisiniz."></input>
                    </br>
                    <label>Ürün Açıklaması:</label>
                    <input class="form-control" style="background-color: #292f52; color: whitesmoke;" id="açıklama" placeholder="Bir ürün açıklaması belirtmelisiniz. İsteğe bağlı!"></input>
                    </br>
                    <label>Otomatik verilecek rol:</label>
					<select class="form-control" style="background-color: #292f52; color: whitesmoke;" id="rol">
                    <option selected="selected" value="rol">
                          Rol(ler) için aşağıda ki düğmeyi kullan!
                    </option>
                    </select>
                    <button type="button" class="btn btn-info light" style="width: 120px; height: 35px; padding: 1px;" onclick="GetAPI(1, 'ALL', 'rol');"><i class="fa fa-refresh"></i> Rol Listele</button>
                    </br>
                    </br>
                    <label>Ürün fiyatını aşağı da bulunan Altın ve Coin kutucuğuna belirtin. Boş bırakırsanız ürün ücretsiz olacaktır.</label>
                    </br>
                    <label>Altın:</label>
                    <input class="form-control" style="background-color: #292f52; color: whitesmoke; width: 90px" id="altın" placeholder="Örn: 5"></input>
                    </br>
                    <label>Coin:</label>
                    <input class="form-control" style="background-color: #292f52; color: whitesmoke; width: 90px" id="coin" placeholder="Örn: 1.337"></input>
					</br>
					<label>Emoji:</label>
                    <select class="form-control" id="emoji" style="background-color: #292f52; color: whitesmoke;">
                    <option selected="selected" value="emoji">
                          Emoji(ler) için aşağıda ki düğmeyi kullan!
                    </option>
                </select>
                <button type="button" class="btn btn-info light" style="width: 150px; height: 35px; padding: 1px;" onclick="GetEmojis('emoji')"><i class="fa fa-refresh"></i> Emoji Listele</button>
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
                            <p class="mb-0">Mağaza ürün yönetim sayfasına hoş geldiniz.</p>
                        </div>
				</div>
				<div class="row">
					<div class="col-xl-12">		
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Mağaza Ürün Listesi</h4>
                                <button type="button" class="btn light btn-success" data-bs-toggle="modal" data-bs-target="#addRes"> <i class="fa fa-plus"></i> Oluştur</button>
                      
							</div>
							<div class="card-body">			
						<div class="table table-responsive">
							<table id= "ayarlar" class="table table-responsive-md">
								<tr>
									<th><strong>ÜRÜN İSMİ</strong></th>
									<th><strong>ÜRÜN AÇIKLAMASI</strong></th>
									<th><strong>ÜRÜN FİYATI</strong></th>
									<th><strong>ÜRÜN EMOJİSİ</strong></th>
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