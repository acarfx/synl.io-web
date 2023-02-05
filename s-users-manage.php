<!DOCTYPE html>
<html lang="en">
<?php 
include 'session.php';
if($var['type'] == "USER") {

	header("location:login");
	exit();
}
?>


<head>
	<?php include './includes/head.php'; ?>
	<link rel="stylesheet" href="./vendor/select2/css/select2.min.css">
	<link rel="stylesheet" href="./dist/css/component-custom-switch.css">
<script>
		

function addUser() {
	let names = document.getElementById("add_get_names").value;
	let surnames = document.getElementById("add_get_surnames").value;
	let mails = document.getElementById("add_get_mails").value;
	let phone = document.getElementById("add_get_phone").value;
	let pw = document.getElementById("add_get_password").value;
	let username = document.getElementById("add_username").value;
	if(!names || !surnames || !mails || !phone || !pw || !username) return Swal.fire(
                    `Başarısız!`,
                    `Lütfen bir kullanıcı oluştururken boş bırakmayınız.`,
                    'error'
                );

	Swal.fire({
    title: `Bir kullanıcı oluşturuluyor!`,
    text: `Belirttiğiniz ${names} ${surnames} (${username}) isimli kullanıcıyı eklemek istediğinize emin misiniz?`,
    type: "warning",
    showCancelButton: !0,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Evet",
    cancelButtonText: "Geri Dön!",
}).then((e) => {
    if(e.value == true) {
		$.ajax({type: "POST", url: 'add-user.php', data: {
			username: username,
			name: names,
			surname: surnames,
			email: mails,
			phone: phone,
			password: pw,
	},  success: async function(res) {
		if(res == "OK") {
			setTimeout(() => {
				document.location.reload(true);
				$.ajax({type: "POST", url: 'send-n.php', data: {
            gidenisim: username,
            mesaj: `Merhaba! ${names} ${surnames} Synl.io Web Panele Katıldığınız İçin Teşekkürler.`,
            renk: "success",
            gönderen: "Synl.io",
         }, success: function(res, text) {}});
			}, 1500);
                return Swal.fire(
                    `Başarılı!`,
                    `Başarıyla ${names} ${surnames} isimli kullanıcıyı oluşturdunuz!`,
                    'success'
                );
            } else {
				if(res == "YES-USER") {
					return Swal.fire(
                    `Başarısız!`,
                    `Belirtilen ${username} kullanıcı adı ile başka kullanıcı mevcut.`,
                    'error'
                );
				} else {
					return Swal.fire(
                    `Başarısız!`,
                    `Belirtilen ${names} ${surnames} isimli kullanıcı oluşturulmadı.`,
                    'error'
                );
				}
			}
	}})
 		}
	})
}


 function editUser() {
		let id = document.getElementById("get_id");
		let names = document.getElementById("get_names");
		let surnames = document.getElementById("get_surnames");
		let mails = document.getElementById("get_mails");
		let phone = document.getElementById("get_phone");
		let pw = document.getElementById("get_password");
		if(!id) return;
		Swal.fire({
    title: `Güncelleniyor!`,
    text: `Belirttiğiniz ${names.value} ${surnames.value} isimli kullanıcıyı güncellemek istediğinize emin misiniz?`,
    type: "warning",
    showCancelButton: !0,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Evet",
    cancelButtonText: "Geri Dön!",
}).then((e) => {
    if(e.value == true) {
		$.ajax({type: "POST", url: 'edit-user.php', data: {
			id: id.value ? id.value : undefined,
			name: names.value ? names.value : undefined,
			surname: surnames.value ? surnames.value : undefined,
			email: mails.value ? mails.value : undefined,
			phone: phone.value ? phone.value : undefined,
			password: pw.value ? pw.value : undefined,
	},  success: async function(res) {
		if(res == "OK") {
			setTimeout(() => {
				document.location.reload(true);
			}, 1500);
                return Swal.fire(
                    `Başarılı!`,
                    `Başarıyla ${names.value} ${surnames.value} isimli kullanıcıyı güncellediniz!`,
                    'success'
                );
            } else {
				return Swal.fire(
                    `Başarısız!`,
                    `Belirtilen ${names.value} ${surnames.value} isimli kullanıcı güncellenmedi.`,
                    'error'
                );
			}
	}})
 		}
	})
}

 function updateUser(id) {
	$.ajax({type: "GET", url: `get_user_info.php?id=${id}`,  success: async function(res) {

		_result =  await $.parseJSON(res);
		_result = _result[0]
		let name = document.getElementById("name_get");
		if(name) name.innerHTML = _result.name + " " + _result.surname + " düzenleniyor."
		let id = document.getElementById("get_id");
		if(id) id.value = _result.id
		let names = document.getElementById("get_names");
		if(names) names.value = _result.name
		let surnames = document.getElementById("get_surnames");
		if(surnames) surnames.value = _result.surname
		let mails = document.getElementById("get_mails");
		if(mails) mails.value = _result.email
		let phone = document.getElementById("get_phone");
		if(phone) phone.value = _result.phone
		let status = document.getElementById("statuscuk")
		if(status) status.innerHTML = `<span class="alert md-2 bg-secondary" style="color: whitesmoke;">Bu kullanıcının son giriş yaptığı tarih: ${_result.last_login} (${_result.ip})</span>`
    }})
}


</script>
</head>
<body>
<div class="modal fade" id="addUser">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <h4 class="modal-title"> <i class="fa fa-user-plus"></i> Yeni bir kullanıcı ekle</h4>
              <button type="button" style="border: none; background-color: transparent;" data-bs-dismiss="modal"><i class="fa fa-close" style="color: whitesmoke"></i></button>
            </div>

            <div class="modal-body">
				<p class="text-muted">Kullanıcı Kimliği:</p>
				<input type="text" class="form-control" id="add_username" ></br>
				<p class="text-muted">İsim:</p>
				<input type="text" class="form-control" id="add_get_names" ></br>
				<p class="text-muted">Soyisim:</p>
				<input type="text" class="form-control" id="add_get_surnames" ></br>
				<p class="text-muted">E-mail:</p>
				<input type="mail" class="form-control" id="add_get_mails" ></br>
				<p class="text-muted">Telefon:</p>
				<input type="text" class="form-control" id="add_get_phone" ></br>
				<p class="text-muted">Şifre:</p>
				<input type="password" class="form-control" id="add_get_password"></br>
			</br>

			
			
            </div>
            <div class="modal-footer">
				<button type="button" class="btn btn-success light" onclick="addUser();"><i class="fa fa-user-plus"></i> Kullanıcıyı Ekle</button>
            </div>
      
          </div>
        </div>
      </div>	  
<div class="modal fade" id="updateUser">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <h4 class="modal-title" id="name_get"></h4>
              <button type="button" style="border: none; background-color: transparent;" data-bs-dismiss="modal"><i class="fa fa-close" style="color: whitesmoke"></i></button>
            </div>

            <div class="modal-body">
				<p class="text-muted" id="statuscuk"></p>
				</br>
				<input type="text" class="form-control" id="get_id" disabled hidden="true">
				<p class="text-muted">İsim:</p>
				<input type="text" class="form-control" id="get_names" ></br>
				<p class="text-muted">Soyisim:</p>
				<input type="text" class="form-control" id="get_surnames" ></br>
				<p class="text-muted">E-mail:</p>
				<input type="mail" class="form-control" id="get_mails" ></br>
				<p class="text-muted">Telefon:</p>
				<input type="text" class="form-control" id="get_phone" ></br>
				<p class="text-muted">Yeni Şifre Belirle:</p>
				<input type="password" class="form-control" id="get_password"></br>
			</br>

			
			
            </div>
            <div class="modal-footer">
				<button type="button" class="btn btn-success light" onclick="editUser();">Kullanıcıyı Güncelle</button>
				<button type="button" class="btn btn-danger light" data-dismiss="modal">Geri Dön</button>
            </div>
      
          </div>
        </div>
      </div>
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
				<div class="form-head mb-sm-5 mb-3 d-flex flex-wrap align-items-center">
				<div class="welcome-text mr-auto">
                            <h4>Merhaba, <?php echo $var['name'] ?>!</h4>
                            <p class="mb-0">Kullanıcı yönetim merkezi sayfasına hoş geldiniz.</p>
                        </div>
					
				</div>
				<div class="row">
					
					<div class="col-xl-12">
                        <div id="user-activity" class="card">
                            <div class="card-header border-0 pb-0 d-sm-flex d-block">
                                <h4 class="card-title">Kullanıcı Listesi</h4>
                                <div class="card-action mb-sm-0 my-2">
								<button data-bs-toggle="modal" data-bs-target="#addUser" class="btn btn-outline-success text-white mb-2"><i class="fa-solid fa-user-plus"></i> Kullanıcı Oluştur</button>
                                </div>
                            </div>
                            <div class="card-body">
							<div class="table-responsive">
                                    <table id="example3" class="display" style="width:100%">
                                        <thead>
                                            <tr>
												<th>#</th>
                                                <th>Resim</th>
												<th>Kullanıcı Adı</th>
												<th>İsim Soyisim</th>
												<th>Bakiye</th>
												<th>Son Giriş</th>
												<th>IP</th>
												<th>Katılma Tarihi</th>
												<th>İşlemler</th>
                                            </tr>
                                        </thead>
                                        <tbody>
							
													<?php 
														$getcik = "SELECT * FROM users ORDER BY id ASC";
														$necik =mysqli_query($con,$getcik);
														$num = mysqli_num_rows($necik);
														if($num > 0) {
															
															while ($result = mysqli_fetch_assoc($necik)) {
																if($result["photo"]) {
																	$profil = $result["photo"];
																} else {
																	$profil = 'images/profile/pic1.jpg';
																}

																echo "<tr>
																<td>" . $result["id"] . "</td>
																<td><img class='server-profile' style='width: 32px;' src='" . $profil ."'></img></td>
																<td>" . $result["username"] . "</td>
																	<td>" . $result["name"] . " " . $result["surname"] . "</td>
																	<td>" . $result["balance"] . " ₺</td>
																	<td>" . $result["last_login"] . "</td>
																	<td>" . $result["ip"] . "</td>
																	<td>" . $result["created_time"] . "</td>
																	<td>
																	<a href='user-delete.php?id=" . $result["id"] . "' class='btn btn-outline-danger ' style='padding: 0px; width: 120px; color: whitesmoke; font-size: 12px'><i class='fa fa-times'></i> Sil</a></br>
																	<button onclick = 'updateUser(" . $result["id"] . ")' data-toggle='modal' data-target='#updateUser' class='btn btn-outline-secondary' style='padding: 0px; width: 120px; color: whitesmoke; font-size: 12px'><i class='fa fa-pen'></i> Düzenle</button></br>
																	<a href='s-package-manage.php' class='btn btn-outline-success' style='padding: 0px; width: 120px; color: whitesmoke; font-size: 12px'><i class='fa fa-check'></i> Paket Tanımla</a></br>
																	<button onclick ='balanceUpdate(" . $result["id"] . ")' class='btn btn-outline-primary ' style='padding: 0px; width: 120px; color: whitesmoke; font-size: 12px'><i class='fa fa-money'></i> Bakiye Güncelle</button>

																	
																	</td>
																	</tr>
																";
															}
														}
													?>

												
                                        </tbody>
                                
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
				
			
		</div>
		</div>
		<script>
		function format (option) {
			console.log(option);
			if (!option.id) { return option.text; }
			var ob = option.text
			return ob;
		};
        $(document).ready(function() {
            $(`#öncelik`).select2({
                placeholder: "Renk Seç!",
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
		</script>
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
	<script src="./vendor/datatables/js/jquery.dataTables.min.js"></script>
	<script>
		(function($) {
    "use strict"

    let table = $('#example3').DataTable({
		searching: false,
		paging:true,
	
    order: [ 0, 'asc' ],
    "pageLength": 10,
    }, 
);
	
	
})(jQuery);

	</script>
</body>
</html>