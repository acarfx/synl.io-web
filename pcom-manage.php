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
    var url = String(API.url)
    var surum = Number( url.replace(/[^0-9]/g, ""))
    if(surum <= 5) return alert("Kullandığınız API sürümü v6 ve üstü olmadığından dolayı bu özelliğe sahip değilsiniz.");
    let _get  = await fetch(`${API.url}/get?type=21`, { 
       
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
    
        td0.innerHTML = `${item.name}`
        td1.innerHTML = `${item.date}`
        td2.innerHTML = `${item.access ? item.access.map(x => {
            if(x.type == "member") return `<img src="${x.avatar}" width="16px" height="16px" style="border-radius: 8px;"></img> ${x.tag}`
            if(x.type == "role") return `<span style='color: ${x.color}'>${x.name}</span>`
            if(x.type == "more") return `${x.name}`
        }).join(", ") : `Herkes Kullanabilir!`}`
        td3.innerHTML = `${item.prefix}</br>${item.type}`
        td4.innerHTML = `<img src="${item.created.avatar}" width="32px" height="32px" style="border-radius: 16px;"></img> ${item.created.tag}`
        td5.innerHTML = `<button type="button" style="width: 100px; padding: 1px;" onclick="delete_command('${item.name}', this)"  name="delete_command" class="btn light btn-danger"> <i class="fa fa-times"></i> Kaldır</button>`
   
    })
}

    GetCommands()
function delete_command(name, table) {
    Swal.fire({
        title: `Komut kaldırılıyor!`,
        text: `Belirtilen ${name} isimli özel komutu kaldırmak istediğinize emin misiniz?`,
        type: "warning",
        showCancelButton: !0,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Evet",
        cancelButtonText: "Geri Dön!",
    }).then((e) => {
        if(e.value == true) {
               postData(`${API.url}/privatecommands/delete`, {
                name: name
               })
               let docs = document.getElementById("ayarlar");
               var i = table.parentNode.parentNode.rowIndex;
               docs.deleteRow(i);
               Swal.fire(
                `Başarılı!`,
                `Başarılı bir şekilde ${name} isimli özel komutu kaldırıldı!`,
                'success'
            );
               }
        });
}
function valid_command() {
    let rolisim = document.getElementById("komutismi").value
    let kullancakroller = getArray("kullanacaklar_roller")
    let kullanacakyetkiler = getArray("kullanacaklar_yetkiler")
    let kullanacakuyeler = document.getElementById("kullanacak_kullanicilar").value ?  String(document.getElementById("kullanacak_kullanicilar").value).split(' ') : []
    let komuttipi = document.getElementById("komuttipi").value
    let komutiçerik = document.getElementById("komuticerigi").value
    let prefix = document.getElementById("prefix").checked
    if(!rolisim || !komuttipi || !komutiçerik) return  Swal.fire(
            `Başarısız!`,
            `Komut ismini, tipini veya içeriğini seçmediniz lütfen daha sonra tekrar deneyin!`,
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
                    postData(`${API.url}/privatecommands/add`, {
                            name: rolisim,
                            type: komuttipi,
                            prefix: prefix,
                            access: [...kullancakroller, ...kullanacakyetkiler, ...kullanacakuyeler],
                            content: komutiçerik,
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
    GetAPI(1, "ALL", `kullanacaklar_roller`)
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
					<label>Kullanacak rol(ler) belirtin:</label>
                    <select multiple class="form-control" style="background-color: #292f52; color: whitesmoke;" id="kullanacaklar_roller"></select>
                    </br>
                    <label>Kullanacak yetki(ler) belirtin:</label>
                    <select multiple class="form-control" style="background-color: #292f52; color: whitesmoke;" id="kullanacaklar_yetkiler">
                        <option value="ADMINISTRATOR">Yöneticiye Sahip Kullanıcılar</option>
                        <option value="MANAGE_GUILD">Sunucu Yönete Sahip Kullanıcılar</option>
                        <option value="MANAGE_ROLES">Rol Yönete Sahip Olan Kullanıcılar</option>
                        <option value="MANAGE_CHANNELS">Kanal Yönete Sahip Olan Kullanıcılar</option>
                        <option value="MANAGE_NICKNAMES">İsimleri Yönete Sahip Olan Kullanıcılar</option>
                        <option value="MANAGE_EMOJIS">Emoji Yönete Sahip Olan Kullanıcılar</option>
                        <option value="MANAGE_MESSAGES">Mesaj Yönete Sahip Olan Kullanıcılar</option>
                    </select>
                    </br>
                    <label>Kullanacak kullanıcı(lar) belirtin:</label>
					<textarea class="form-control" style="background-color: #292f52; color: whitesmoke;" id="kullanacak_kullanicilar" placeholder="Birden fazla için boşluk ile ayırınız"></textarea>
					</br>
                    <label>Komutun tipini belirtin *:</label>
                    <select class="form-control" style="background-color: #292f52; color: whitesmoke;" id="komuttipi">
                        <option value="MESSAGE">Mesaj ile yanıt</option>
                        <option value="EMBED">Embed ile yanıt</option>
                        <option value="CODE">Kod ile yanıt</option>
                    </select>
                    </br>
                    <div class="custom-switch pl-0">
           			Prefix olsun mu? </br></br>  <input class="custom-switch-input" id="prefix" type="checkbox">
					<label class="custom-switch-btn" for="prefix" style="align-items: left;"></label>
            		</div>    
                    </br>
                    <label>Komut İçeriği:</label>
					<textarea class="form-control" style="height: 185px;" style="background-color: #292f52; color: whitesmoke;" id="komuticerigi" placeholder="Mesaj ile yanıt seçilirse komut girildiği gibi buraya girilen yazı bot tarafından yanıtlanır, Embed ile yanıtda ise buraya girilen yazı bot embed kutucuğu içerisinde yanıtlanır. Kod ile yanıtda belirtilen kod ile komutu işler sanki bot'a komut eklermişcesine."></textarea>
					</br>
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
                            <p class="mb-0">Özel komut yönetim sayfasına hoş geldiniz.</p>
                        </div>
				</div>
				<div class="row">
					<div class="col-xl-12">		
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Özel komut listesi</h4>
                                <button type="button" class="btn light btn-success" onclick="modal_load();" data-bs-toggle="modal" data-bs-target="#addCommand"> <i class="fa fa-plus"></i> Oluştur</button>
                      
							</div>
							<div class="card-body">			
						<div class="table table-responsive">
							<table id= "ayarlar" class="table table-responsive-md">
								<tr>
									<th><strong>KOMUT İSMİ</strong></th>
									<th><strong>OLUŞTURULMA TARİHİ</strong></th>
									<th><strong>KULLANABİLİR</strong></th>
									<th><strong>DETAY</strong></th>
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