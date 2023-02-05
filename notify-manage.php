<!DOCTYPE html>
<html lang="en">
<?php 
include 'session.php';
if($var['type'] == "USER") {

	header("location:index.php");
	exit();
}
?>


<head>
	<?php include './includes/head.php'; ?>
	<link rel="stylesheet" href="./vendor/select2/css/select2.min.css">
	<link rel="stylesheet" href="./dist/css/component-custom-switch.css">
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
		
        <div class="content-body">
			<div class="container-fluid">
				<div class="form-head mb-sm-5 mb-3 d-flex flex-wrap align-items-center">
				<div class="welcome-text mr-auto">
                            <h4>Merhaba, <?php echo $var['name'] ?>!</h4>
                            <p class="mb-0">Bildirim merkezi sayfasına hoş geldiniz.</p>
                        </div>
					
				</div>
				<div class="row">
					
					<div class="col-xl-4 col-lg-12 col-sm-12">		
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Bildirim Gönderme</h4>
							</div>
							<div class="card-body">			
							<div class="form-group">
								<label>Gönderen Kullanıcı:</label>
								<input class="form-control" id="gönderen_isim"></input>
								</br>
								<label>Gönderilecek Kullanıcı:</label>
								<input class="form-control" id="gönderilecek_isim"></input>
</br>
								<label>Renk:</label>
								<select class="form-control" id="öncelik">
									<option value="success">Yeşil</option>
									<option value="danger">Kırmızı</option>
									<option value="warning">Sarı</option>
									<option value="primary">Turuncu</option>
									<option value="info">Mavi</option>
									<option value="secondary">Gri</option>
								</select>
</br></br>
								<label>Mesaj:</label>
								<input class="form-control" id="mesaj" type="textarea"></input>
</br>
								<button class="btn btn-info" style="color: whitesmoke;" onclick="bildirimGönder();"> <i class="fa fa-paper-plane"></i> Gönder</button>
				  			</div>
						</div>
					</div>
					</div>
					<div class="col-xl-8 col-xxl-8 col-lg-12 col-sm-12">
                        <div id="user-activity" class="card">
                            <div class="card-header border-0 pb-0 d-sm-flex d-block">
                                <h4 class="card-title">Bildirim Geçmişi</h4>
                                <div class="card-action mb-sm-0 my-2">
                                </div>
                            </div>
                            <div class="card-body">
							<div class="table-responsive">
                                    <table id="example3" class="display" style="width:100%">
                                        <thead>
                                            <tr>
												<th>#</th>
												<th>Tarih</th>
                                                <th>Giden</th>
												<th>Gönderen</th>
												<th>Bilgi</th>
												<th>İşlem</th>
                                            </tr>
                                        </thead>
                                        <tbody>
			
													<?php 
														$getcik = "SELECT * FROM notification ORDER BY notificationID ASC";
														$necik =mysqli_query($con,$getcik);
														$num = mysqli_num_rows($necik);
														if($num > 0) {
															
															while ($result = mysqli_fetch_assoc($necik)) {
																echo "<tr>
																	<td>" . $result["notificationID"] . "</td>
																	<td>" . $result["time"] . "</td>
																	<td>" . $result["forUser"] . "</td>
																	<td><p class='badge badge-outline-". $result["warning"] ."'>" . $result["author"] . "</p></td>
																	<td>" . $result["text"] . "</td>
																	<td><a href='notify-delete.php?id=" . $result["notificationID"] . "' class='btn btn-outline-danger light' style='padding: 1px; width: 50px; color: whitesmoke;'><i class='fa fa-times'></i> Sil</button> </td>
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
	
    order: [ 0, 'desc' ],
    "pageLength": 4,
    }, 
);
	
	
})(jQuery);

	</script>
</body>
</html>