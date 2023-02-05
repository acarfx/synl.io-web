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
	<link href="./vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
	<link href="./vendor/jquery-asColorPicker/css/asColorPicker.min.css" rel="stylesheet">
<script>
		

function addPackage() {
	let paketu = document.getElementById("paket_code").value;
	let sahip = document.getElementById("owner_username").value;
	let bitiş = document.getElementById("emcukdata").value;
	let apiurlcik = document.getElementById("get_api_url").value;
	let apitokencik = document.getElementById("get_api_token").value;
	if(!sahip || !bitiş || !apiurlcik || !apitokencik || !paketu) return Swal.fire(
                    `Başarısız!`,
                    `Bir paket oluşturmak için lütfen API bilgilerini boş bırakmayın.`,
                    'error'
                );

	Swal.fire({
    title: `Bir paket oluşturuluyor!`,
    text: `Belirttiğiniz ${paketu} üretim koduna sahip paketi eklemek istediğinize emin misiniz?`,
    type: "warning",
    showCancelButton: !0,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Evet",
    cancelButtonText: "Geri Dön!",
}).then((e) => {
    if(e.value == true) {
		$.ajax({type: "POST", url: 'add-package.php', data: {
			code: paketu,
			owner: sahip,
			timeout: bitiş,
			apiurl: apiurlcik,
			apitoken: apitokencik
	},  success: async function(res) {
		alert(res)
		if(res == "OK") {
                return Swal.fire(
                    `Başarılı!`,
                    `Başarıyla ${paketu} kodlu paketi oluşturdunuz!`,
                    'success'
                );
            } else {
				if(res == "YES-USER") {
					return Swal.fire(
                    `Başarısız!`,
                    `Belirtilen kullanıcı kimliğine ait bir paket bulunduğundan işleme devam edilemez.`,
                    'error'
                );
				} else {
					return Swal.fire(
                    `Başarısız!`,
                    `Paket oluşumunda hata oluştu lütfen destek ekibine başvurun.`,
                    'error'
                );
				}
			}
	}})
 		}
	})
}

</script>
</head>
<body>
<div class="modal fade" id="addPackage">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"> <i class="fa fa-plus"></i> Yeni bir paket oluştur</h4>
              <button type="button" style="border: none; background-color: transparent;" data-bs-dismiss="modal"><i class="fa fa-close" style="color: whitesmoke"></i></button>
            </div>

            <div class="modal-body">
				<p class="text-muted">Paket Üretim Kodu:</p>
				<input type="text" class="form-control" id="paket_code" ></br>
				<p class="text-muted">Kullanıcı Kimliği:</p>
				<input type="text" class="form-control" id="owner_username" ></br>
				<p class="text-muted">Paket Bitiş Zamanı:</p>
				 <input type="text" class="form-control" placeholder="2017-06-04" id="emcukdata"></br>
				<p class="text-muted">API URL:</p>
				<input type="text" class="form-control" id="get_api_url" ></br>
				<p class="text-muted">Token:</p>
				<input type="password" class="form-control" id="get_api_token" ></br>
			</br>

			
			
            </div>
            <div class="modal-footer">
				<button type="button" class="btn btn-success light" onclick="addPackage();"><i class="fa fa-plus"></i> Paket'i Ekle</button>
            </div>
      
          </div>
        </div>
      </div>	
	  <script>
		async function get_api_more(api, token) {
			let get_api = await fetch(`${api}/get?type=10`, {
					headers: {
						'Authorization': token
						},
				}).catch(err => {
					let docs = document.getElementById("paketgetirdivi");
					if(docs) docs.style = `display: none;`
					let bildir = document.getElementById("bildirapiyiak");
					if(bildir) bildir.style = 'display: block;'

				})
				if(!get_api) return;
				if(get_api && get_api.status && get_api.status == "401") {
					let docs = document.getElementById("paketgetirdivi");
					if(docs) docs.style = `display: none;`
					let bildir = document.getElementById("bildirapiyiak");
					if(bildir) bildir.style = 'display: block;'
					return alert("Token Hatalı!")
				}
				let result = await get_api.json()
				let doc23s = document.getElementById("paketgetirdivi");
					if(doc23s) doc23s.style = `display: block;`
					let bildir = document.getElementById("bildirapiyiak");
					if(bildir) bildir.style = 'display: none;'
				let docs = document.getElementById("getpackagename");
				if(docs) docs.value = result.Name;
				let docs1 = document.getElementById("getpackagedesc");
				if(docs1) docs1.value = result.Desc;
				let docs2 = document.getElementById("getpricepackage");
				if(docs2) docs2.value = result.Price + " ₺";

				return result;
		}

	  </script>
	  <div class="modal fade" id="getapiinfo">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <h4 class="modal-title">API Bilgisi <i class="fa fa-info"></i></h4>
              <button type="button" style="border: none; background-color: transparent;" data-bs-dismiss="modal"><i class="fa fa-close" style="color: whitesmoke"></i></button>
            </div>

            <div class="modal-body">
				<div class="alert alert-danger alert-dismissible fade show" style="display:none;" id="bildirapiyiak">
                            
                                    <strong>Hata!</strong> Paket için <b>API</b> bağlantısı gerçekleşemedi.
                                </div>
				<div id="paketgetirdivi">
				<p class="text-muted">Paket Adı:</p>
				<input type="text" class="form-control" id="getpackagename" disabled ></br>
				<p class="text-muted">Paket Açıklaması:</p>
				<input type="text" class="form-control" id="getpackagedesc" disabled></br>
				<p class="text-muted">Paket Fiyatı:</p>
				<input type="text" class="form-control" id="getpricepackage" disabled></br>
				</div>
			</br>
			
			
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
                            <p class="mb-0">Paket yönetim merkezi sayfasına hoş geldiniz.</p>
                        </div>
					
				</div>
				<div class="row">
					
					<div class="col-xl-12">
                        <div id="user-activity" class="card">
                            <div class="card-header border-0 pb-0 d-sm-flex d-block">
                                <h4 class="card-title">Paket Listesi</h4>
                                <div class="card-action mb-sm-0 my-2">
								<button data-bs-toggle="modal" data-bs-target="#addPackage" class="btn btn-outline-success text-white mb-2"><i class="fa-solid fa-plus"></i> Paket Oluştur</button>
                                </div>
                            </div>
                            <div class="card-body">
							<div class="table-responsive">
                                    <table id="example3" class="display" style="width:100%">
                                        <thead>
                                            <tr>
												<th>#</th>
												<th>Paket Oluşturma Kodu</th>
                                                <th>Paket Sahibi Kullanıcı Adı</th>
												<th>Paket Sonlanma Tarihi</th>
												<th>İşlemler</th>
                                            </tr>
                                        </thead>
                                        <tbody>
							
													<?php 
														$getcik = "SELECT * FROM products ORDER BY id ASC";
														$necik =mysqli_query($con,$getcik);
														$num = mysqli_num_rows($necik);
														if($num > 0) {
															
															while ($result = mysqli_fetch_assoc($necik)) {
																$getuser = "SELECT * FROM users WHERE id='". $result['owner_id'] ."'";
																$getirorospuyu = mysqli_query($con, $getuser);
																$var = mysqli_fetch_array($getirorospuyu);

																if($var) {
																	$kullanici = $var['username'];
																} else {
																	$kullanici = "Sahibi Bulunamadı!";
																}

																echo "<tr>
																	<td>" . $result['id'] ."</td>
																	<td>" . $result['package'] ."</td>
																	<td>". $kullanici ."</td>
																	<td>" . $result['timeout'] ."</td>
																	<td>
																	<button data-toggle='modal' data-target='#getapiinfo' onclick='get_api_more(`" . $result['api_url'] ."`, `" . $result['api_token'] ."`)' style='padding: 1px; width: 140px;' class='btn btn-outline-success bg-outline-success'> <i class='fa fa-info'></i> Paket Bilgileri</button>
																	<a href='package-delete.php?id=" . $result['id'] ."'style='padding: 1px; width: 140px;' class='btn btn-outline-danger bg-outline-danger'> <i class='fa fa-times'></i> Sil</a>
																	
																	</td>
																</tr>";
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