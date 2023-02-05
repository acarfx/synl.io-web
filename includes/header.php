<?php 
if(isset($var) && isset($_SESSION['Username'])) {
	$d1 = new DateTime();
	$d2 = new DateTime($dk['timeout']);			
} else {
	echo "<script type='text/javascript'>window.top.location='https://synl.io/login';</script>"; exit;
}
?>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<div class="modal fade" id="giveawayStart">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <h4 class="modal-title" >Bir Çekiliş Oluştur</h4>
              <button type="button" style="border: none; background-color: transparent;" data-bs-dismiss="modal"><i class="fa fa-close" style="color: whitesmoke"></i></button>
            </div>
			
            <div class="modal-body">
			<label>Aşağıda çekiliş oluşturmak istediğinizde isteğe bağlı belirlediğiniz roller veya isteğe bağlı isiminde tagı bulunan veyada isteğe bağlı sadece seste bulunan üyeler için bölmeler verilmiştir. Birden fazla rol seçimi için CTRL + Sol Tık ile birden fazla seçim yapabilirsiniz.</label>
                    </br>
					<label>Ödül belirtin *:</label>
                    <input class="form-control" style="background-color: #292f52; color: whitesmoke;" id="cekilis_odul" placeholder="Çekilişin kazananlarına verilecek ödülü giriniz."></input>
                    </br>
					<label>Kaç kişi kazanacak *:</label>
                    <input class="form-control" style="background-color: #292f52; color: whitesmoke;" id="cekilis_kazanacaklar" placeholder="Örn: 1"></input>
                    </br>
					<label>Süre belirtin *:</label>
                    <select class="form-control" id="cekilis_sure" style="background-color: #292f52; color: whitesmoke;">
					<option value="1m">1 Dakika</option>
					<option value="2m">2 Dakika</option>
					<option value="3m">3 Dakika</option>
					<option value="4m">4 Dakika</option>
					<option value="5m">5 Dakika</option>
					<option value="6m">6 Dakika</option>
					<option value="7m">7 Dakika</option>
					<option value="8m">8 Dakika</option>
					<option value="9m">9 Dakika</option>
					<option value="10m">10 Dakika</option>
					<option value="11m">11 Dakika</option>
					<option value="12m">12 Dakika</option>
					<option value="13m">13 Dakika</option>
					<option value="14m">14 Dakika</option>
					<option value="15m">15 Dakika</option>
					<option value="16m">16 Dakika</option>
					<option value="17m">17 Dakika</option>
					<option value="18m">18 Dakika</option>
					<option value="19m">19 Dakika</option>
					<option value="20m">20 Dakika</option>
					<option value="21m">21 Dakika</option>
					<option value="22m">22 Dakika</option>
					<option value="23m">23 Dakika</option>
					<option value="24m">24 Dakika</option>
					<option value="25m">25 Dakika</option>
					<option value="26m">26 Dakika</option>
					<option value="27m">27 Dakika</option>
					<option value="28m">28 Dakika</option>
					<option value="29m">29 Dakika</option>
                        <option value="30m">30 Dakika</option>
						<option value="45m">45 Dakika</option>
                        <option value="1h">1 Saat</option>
						<option value="2h">2 Saat</option>
                        <option value="3h">3 Saat</option>
						<option value="4h">4 Saat</option>
						<option value="5h">5 Saat</option>
                        <option value="6h">6 Saat</option>
						<option value="7h">7 Saat</option>
						<option value="8h">8 Saat</option>
						<option value="9h">9 Saat</option>
						<option value="10h">10 Saat</option>,
						<option value="11h">11 Saat</option>
                        <option value="12h">12 Saat</option>
                        <option value="1d">1 Gün</option>
						<option value="2d">2 Gün</option>
                        <option value="3d">3 Gün</option>
						<option value="4d">4 Gün</option>
                        <option value="5d">5 Gün</option>
						<option value="6d">6 Gün</option>
                        <option value="7d">1 Hafta</option>
                        <option value="14d">2 Hafta</option>
                        <option value="30d">1 Ay</option>
						<option value="60d">2 Ay</option>
                        <option value="90d">3 Ay</option>
                    </select>
</br>
<label>Yapılacak kanalı belirtin *:</label>
<select class="form-control" id="cekiliskanal" style="background-color: #292f52; color: whitesmoke;">
					
                    </select>
</br>
					<label>Rol veya rolleri belirtin:</label>
					<select class="form-control" multiple style="background-color: #292f52; color: whitesmoke;" id="cekilis_roller"></select>
					</br>
					<label>Sadece sesteki kullanıcılar:</label> &nbsp;  &nbsp; <input class="custom-switch-input" id="sadeceses_d" type="checkbox">
         
</br>
<label>Sadece taglı kullanıcılar:</label> &nbsp;  &nbsp; <input class="custom-switch-input" id="sadecetagli_d" type="checkbox"></label>
       
            </div>
			<script>
				function startGiveaway() {
					let cekilis_odul = document.getElementById("cekilis_odul").value
					let cekilis_kazanacaklar = document.getElementById("cekilis_kazanacaklar").value
					let cekilis_sure = document.getElementById("cekilis_sure").value
					let cekiliskanal = document.getElementById("cekiliskanal").value
					let cekilisroller = getArray("cekilis_roller");
					let sadeceses = document.getElementById("sadeceses_d").checked
					let sadecetag = document.getElementById("sadecetagli_d").checked
					if(!cekilis_odul || !cekilis_kazanacaklar || !cekilis_sure || !cekiliskanal) return Swal.fire(
                    `Hata!`,
                    `Lütfen çekiliş kanalını, ödülünü, kazanacakların sayısını veyada süresini boş bırakmayın.`,
                    'warning'
    );
						postData(`${API.url}/giveaways/start`, {
							id: cekiliskanal,
							duration: cekilis_sure,
							winners: cekilis_kazanacaklar,
							prize: cekilis_odul,
							voice: sadeceses,
							tag: sadecetag,
							roles: cekilisroller || []
						})

						return Swal.fire(
                    `Başarılı!`,
                    `Başarıyla belirtilen kanalda istediğiniz koşulla çekiliş başlatıldı.`,
                    'success'
    );


				}

			</script>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Geri Dön</button>
			  <button type="button" class="btn btn-success light" onclick="startGiveaway();">Çekilişi Başlat</button>
            </div>
      
          </div>
        </div>
      </div>
<div class="nav-header">
            <a href="anasayfa" class="brand-logo">
				<svg class="logo-abbr" width="50" height="50" viewBox="0 0 48 48" fill="none" xmlns="https://www.w3.org/2000/svg">
					<rect class="svg-logo-rect" width="48" height="48" rx="20" fill="#23272a"/>
					<path fill="#FF4081" d="M10.5,17.5l0.5-0.9l21.7,21.9L32.3,39h-0.5L10.5,17.5z M34,39H14v3h20V39z"/><path fill="#9C27B0" d="M37.4,30.7l-0.5,0.9L15.3,9.5L15.6,9h0.6L37.4,30.7z M32.3,39l1.7,3l11-18h-3.5L32.3,39z"/><path fill="#00BCD4" d="M34,9H14V6h20V9z M32.3,9h-0.6L10.4,30.4l0.5,0.9L32.6,9.5L32.3,9z"/><path fill="#FFC107" d="M15.6,9L5.5,25.6L3,24L14,6L15.6,9z M32.6,9.4L32.3,9h-1.7l-19,6.6l-0.8,1.3L32.6,9.4z"/><path fill="#FF5722" d="M15.7,39L14,42L3,24h3.5L15.7,39z M16,31V9h-0.4L15,10v21h-4.2l0.6,1H15v5.9l0.7,1.1H16v-7h20.6l0.6-1H16z"/><path fill="#03A9F4" d="M36.7,16.2L15.5,38.7l0.2,0.3h0.9l20.5-21.8L31.7,39h0.7l0.6-1l5-19.8L36.7,16.2z M41.5,24L32.3,9L34,6l11,18H41.5z"/>
				</svg>
				<div class="brand-title">
					<h2 class="logo-text" style="padding: 10px; padding-top: 15px;">Synl.io</h2>

				</div>
            </a>
			
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
		<script>getNotifications(), paymentCheck()</script>
<div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
							<div class="input-group search-area right d-lg-inline-flex d-none">
								<h6 class="mb-1" id="songüncelleme">Sunucu: Bağlanıyor! <span class="badge bg-warning"><i class="fa-solid fa-globe fa-beat-fade" style="--fa-beat-fade-opacity: 0.1; --fa-beat-fade-scale: 1.25"></i></span></h6>
							</div>
                        </div>
                        <ul class="navbar-nav header-right main-notification">
						<li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link  ai-icon"  data-bs-toggle="modal" data-bs-target="#giveawayStart" onclick="on_giveaway();" href="#">
								
						<i class="flaticon-147-medal"></i>
									<span class="badge bg-primary" style="border-radius: 5px;"><i class="fa fa-plus" style="color: #ff9900; font-size: 14px;"></i></span>
                                </a>
                            </li>
						<li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link  ai-icon" href="./Synlio.apk">
								<svg width="28px" height="31px" viewBox="0 0 256 301" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid">
	<g>
		<path d="M78.3890161,0.858476242 C76.9846593,0.871877584 75.5269206,1.21067383 74.1988355,1.94683705 C69.9813154,4.28464966 68.4344792,9.70448752 70.7705059,13.9187887 L80.2936432,31.1148585 C57.3501835,45.3109605 42.146676,69.5583356 42.146676,97.23264 C42.146676,97.3488107 42.1463538,97.5233203 42.146676,97.6951925 C42.1467894,97.7558421 42.1461099,97.7904107 42.146676,97.8584397 C42.1467112,97.9488816 42.146676,98.0809536 42.146676,98.1033235 L42.146676,102.37513 C37.7401995,97.3051619 31.2627337,94.103607 24.0255064,94.103607 C10.766574,94.103607 0,104.870185 0,118.129121 L0,192.137501 C0,205.396437 10.766574,216.163015 24.0255064,216.163015 C31.2627337,216.163015 37.7401995,212.96146 42.146676,207.891492 L42.146676,218.258109 C42.146676,232.234601 53.5833566,243.671281 67.5598484,243.671281 L74.0083724,243.671281 L74.0083724,276.594135 C74.0083724,289.853131 84.774955,300.619649 98.0338856,300.619649 C111.292821,300.619649 122.0594,289.853131 122.0594,276.594135 L122.0594,243.671281 L133.215081,243.671281 L133.215081,276.594135 C133.215081,289.853131 143.981659,300.619649 157.240595,300.619649 C170.499522,300.619649 181.266118,289.853131 181.266118,276.594135 L181.266118,243.671281 L187.714637,243.671281 C201.691129,243.671281 213.127809,232.234601 213.127809,218.258109 L213.127809,207.891492 C217.534299,212.96146 224.011752,216.163015 231.248984,216.163015 C244.507919,216.163015 255.274498,205.396437 255.274498,192.137501 L255.274498,118.129121 C255.274498,104.870185 244.507919,94.103607 231.248984,94.103607 C224.011752,94.103607 217.534299,97.3051619 213.127809,102.37513 L213.127809,98.1849514 L213.127809,98.1033407 C213.128367,97.9723769 213.127955,97.8421262 213.127809,97.8584655 C213.129527,97.5976548 213.127809,97.3898395 213.127809,97.2326572 C213.127809,69.5631979 197.890397,45.339215 174.95363,31.1420821 L184.503985,13.918763 C186.840011,9.70446174 185.293178,4.28462389 181.075655,1.94681128 C179.747565,1.21064805 178.289834,0.871868993 176.885477,0.85845047 C173.770979,0.828641074 170.714038,2.4700306 169.103704,5.37514094 L159.118011,23.4146964 C149.353914,19.811505 138.730068,17.8368515 127.637245,17.8368515 C116.555726,17.8368515 105.912363,19.7912913 96.1564693,23.3874813 L86.1707769,5.37514094 C84.5604527,2.47002201 81.503506,0.828709799 78.3890161,0.85845047 L78.3890161,0.858476242 Z" fill="#FFFFFF"></path>
		<path d="M24.0260725,100.361664 C14.1317,100.361664 6.25861893,108.234747 6.25861893,118.129121 L6.25861893,192.137501 C6.25861893,202.031875 14.1317,209.904958 24.0260725,209.904958 C33.9204441,209.904958 41.7935257,202.031875 41.7935257,192.137501 L41.7935257,118.129121 C41.7935257,108.234747 33.9204441,100.361664 24.0260725,100.361664 L24.0260725,100.361664 Z M231.249551,100.361664 C221.355176,100.361664 213.482094,108.234747 213.482094,118.129121 L213.482094,192.137501 C213.482094,202.031875 221.355176,209.904958 231.249551,209.904958 C241.143925,209.904958 249.016999,202.031875 249.016999,192.137501 L249.016999,118.129121 C249.016999,108.234747 241.143925,100.361664 231.249551,100.361664 L231.249551,100.361664 Z" fill="#A4C639"></path>
		<path d="M98.0338856,184.818075 C88.1395114,184.818075 80.2664341,192.691157 80.2664341,202.585531 L80.2664341,276.593963 C80.2664341,286.488363 88.1395114,294.361308 98.0338856,294.361308 C107.92826,294.361308 115.801342,286.488363 115.801342,276.593963 L115.801342,202.585531 C115.801342,192.691157 107.92826,184.818075 98.0338856,184.818075 L98.0338856,184.818075 Z M157.240595,184.818075 C147.346221,184.818075 139.473138,192.691157 139.473138,202.585531 L139.473138,276.593963 C139.473138,286.488363 147.346221,294.361308 157.240595,294.361308 C167.134969,294.361308 175.008043,286.488363 175.008043,276.593963 L175.008043,202.585531 C175.008043,192.691157 167.134969,184.818075 157.240595,184.818075 L157.240595,184.818075 Z" fill="#A4C639"></path>
		<path d="M78.4434341,7.11654228 C78.0234231,7.12083758 77.6320498,7.22919946 77.2462398,7.44304537 C75.9792855,8.14533584 75.5626532,9.60121987 76.2667168,10.8713836 L88.782836,33.4820338 C64.7023936,46.0117562 48.4373365,69.8232526 48.4047377,97.1510121 L206.869751,97.1510121 C206.837193,69.8232526 190.572096,46.0117562 166.491645,33.4820338 L179.007777,10.8713836 C179.711837,9.60121987 179.295201,8.14533584 178.02825,7.44304537 C177.642438,7.22919946 177.251067,7.1205455 176.831055,7.11654228 C175.931919,7.10786577 175.079646,7.55712 174.599912,8.42257181 L161.920533,31.2781058 C151.548297,26.6773219 139.914231,24.0949434 127.637245,24.0949434 C115.360249,24.0949434 103.726174,26.6773219 93.3539479,31.2781058 L80.6745686,8.42257181 C80.1948375,7.55712 79.3425576,7.10791732 78.4434341,7.11654228 L78.4434341,7.11654228 Z M48.4047377,103.40907 L48.4047377,218.258109 C48.4047377,228.870039 56.9479173,237.413214 67.5598484,237.413214 L187.714637,237.413214 C198.326576,237.413214 206.869751,228.870039 206.869751,218.258109 L206.869751,103.40907 L48.4047377,103.40907 L48.4047377,103.40907 Z" fill="#A4C639"></path>
		<path d="M91.0681772,54.9226953 C87.4507168,54.9226953 84.4563973,57.9170105 84.4563973,61.5344795 C84.4563973,65.1519399 87.4507168,68.146255 91.0681772,68.146255 C94.6856376,68.146255 97.6799528,65.1519399 97.6799528,61.5344795 C97.6799528,57.9170105 94.6856376,54.9226953 91.0681772,54.9226953 L91.0681772,54.9226953 Z M164.205874,54.9226953 C160.588413,54.9226953 157.59409,57.9170105 157.59409,61.5344795 C157.59409,65.1519399 160.588413,68.146255 164.205874,68.146255 C167.823326,68.146255 170.817649,65.1519399 170.817649,61.5344795 C170.817649,57.9170105 167.823326,54.9226953 164.205874,54.9226953 L164.205874,54.9226953 Z" fill="#FFFFFF"></path>
	</g>
</svg>
									<span class="badge bg-primary" style="border-radius: 5px;"><i class="fa fa-download" style="color: #ff9900; font-size: 14px;"></i></span>
                                </a>
                            </li>
						<li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link  ai-icon" href="./Synl.io.rar">
								
<svg width="28px" height="28px" viewBox="-0.5 0 257 257" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid"><path d="M0 36.357L104.62 22.11l.045 100.914-104.57.595L0 36.358zm104.57 98.293l.08 101.002L.081 221.275l-.006-87.302 104.494.677zm12.682-114.405L255.968 0v121.74l-138.716 1.1V20.246zM256 135.6l-.033 121.191-138.716-19.578-.194-101.84L256 135.6z" fill="#00ADEF"/></svg>
<span class="badge bg-primary" style="border-radius: 5px;"><i class="fa fa-download" style="color: #ff9900; font-size: 14px;"></i></span>
                                </a>
                            </li>
						<li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link  ai-icon" href="javascript:void(0)" role="button" data-toggle="dropdown">
								<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M22.75 15.8385V13.0463C22.7471 10.8855 21.9385 8.80353 20.4821 7.20735C19.0258 5.61116 17.0264 4.61555 14.875 4.41516V2.625C14.875 2.39294 14.7828 2.17038 14.6187 2.00628C14.4546 1.84219 14.2321 1.75 14 1.75C13.7679 1.75 13.5454 1.84219 13.3813 2.00628C13.2172 2.17038 13.125 2.39294 13.125 2.625V4.41534C10.9736 4.61572 8.97429 5.61131 7.51794 7.20746C6.06159 8.80361 5.25291 10.8855 5.25 13.0463V15.8383C4.26257 16.0412 3.37529 16.5784 2.73774 17.3593C2.10019 18.1401 1.75134 19.1169 1.75 20.125C1.75076 20.821 2.02757 21.4882 2.51969 21.9803C3.01181 22.4724 3.67904 22.7492 4.375 22.75H9.71346C9.91521 23.738 10.452 24.6259 11.2331 25.2636C12.0142 25.9013 12.9916 26.2497 14 26.2497C15.0084 26.2497 15.9858 25.9013 16.7669 25.2636C17.548 24.6259 18.0848 23.738 18.2865 22.75H23.625C24.321 22.7492 24.9882 22.4724 25.4803 21.9803C25.9724 21.4882 26.2492 20.821 26.25 20.125C26.2486 19.117 25.8998 18.1402 25.2622 17.3594C24.6247 16.5786 23.7374 16.0414 22.75 15.8385ZM7 13.0463C7.00232 11.2113 7.73226 9.45223 9.02974 8.15474C10.3272 6.85726 12.0863 6.12732 13.9212 6.125H14.0788C15.9137 6.12732 17.6728 6.85726 18.9703 8.15474C20.2677 9.45223 20.9977 11.2113 21 13.0463V15.75H7V13.0463ZM14 24.5C13.4589 24.4983 12.9316 24.3292 12.4905 24.0159C12.0493 23.7026 11.716 23.2604 11.5363 22.75H16.4637C16.284 23.2604 15.9507 23.7026 15.5095 24.0159C15.0684 24.3292 14.5411 24.4983 14 24.5ZM23.625 21H4.375C4.14298 20.9999 3.9205 20.9076 3.75644 20.7436C3.59237 20.5795 3.50014 20.357 3.5 20.125C3.50076 19.429 3.77757 18.7618 4.26969 18.2697C4.76181 17.7776 5.42904 17.5008 6.125 17.5H21.875C22.571 17.5008 23.2382 17.7776 23.7303 18.2697C24.2224 18.7618 24.4992 19.429 24.5 20.125C24.4999 20.357 24.4076 20.5795 24.2436 20.7436C24.0795 20.9076 23.857 20.9999 23.625 21Z" fill="#EB8153"/>
									</svg>
									<span class="badge light text-white bg-primary rounded-circle" id="nofi_count">0</span>
                                </a>
								<div class="dropdown-menu dropdown-menu-right p-3">
									<div id="DZ_W_TimeLine11" class="widget-timeline dz-scroll style-1 height370">
									Bildirimler<button onclick="getNotifications(true);" style="border-radius: 8px; width: 18px; height: 18px; padding: 0px; margin-left: 8px; font-size:16px; margin-bottom: 12px; color: whitesmoke;" class="btn btn-transparent"><i class="fa-solid fa-trash" tag="Bildirimleri Temizle!"></i></button>
										<ul class="timeline" id="nofi_list">
										
										</ul>
									</div>
								</div>
                            </li>
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <img src="<?php 
									if($var["photo"]) {
										echo $var["photo"];
									} else 
									{
										echo 'images/profile/pic1.jpg';
									}
								
									?>" width="20" alt=""/>
									<div class="header-info">
										<span><?php echo '' . $var['username'] . ''; ?></span>
						
										<small><?php 
											if($var['type'] == "STAFF") {
												echo 'Synl.io Yöneticisi';
											} 
											else
											{
												echo 'Synl.io Kullanıcı';
											}
										?></small>
										
									</div>
									
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
								<a href="./profile" class="dropdown-item ai-icon">
								<svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <span class="ml-2">Profil</span>
                                    </a>
                                    <a href="./login?logout" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="https://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                        <span class="ml-2">Çıkış Yap</span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
<div class="deznav">
<div class="deznav-scroll">
<div class="main-profile">
	
					<img class="rounded" width="200px" src="<?php 
									if($var["photo"]) {
										echo $var["photo"];
									} else 
									{
										echo 'images/profile/pic1.jpg';
									}
								
									?>" alt="">
					</br>
							
					Hoş Geldin!
					<h6 class="mb-0 fs-20 text-black ">Sn. <?php   echo '' . $var['name']. ' ' . $var['surname'] . ''; ?></h6>
					<div style="padding: 8px;" style="border: 1px;	border-color: white;">
						<span class="badge badge badge-outline-primary" id="" style="padding: 4px; font-size: 13px; border-radius: 5px 0px 0px 5px">₺</span>
						<span class="badge badge badge-outline-secondary" id="para" style="padding: 4px; font-size: 13px; border-radius: 0px"></span>
						<span class="badge badge badge-outline-success" style="padding: 4px; font-size: 13px; border-radius: 0px 5px 5px 0px"> <a href="#s" class="fa fa-hand-holding-usd"> </a></span>
					</div>
				</div>
				<ul class="metismenu" id="menu">
                    <li>
						<a href="anasayfa" class="ai-icon" aria-expanded="false">
						<i class="flaticon-141-home"></i>
						<span class="nav-text">Pano</span>
						</a>
					</li>
                    <li>
						<a href="bot-status" class="ai-icon" aria-expanded="false">
						<i class="flaticon-001-monitor"></i>
						<span class="nav-text">Bot Monitörü</span>
						</a>
					</li>
					<script>
							function on_giveaway() {
							GetAPI(1, "ALL", `cekilis_roller`)
							GetAPI(2, "TEXT", "cekiliskanal")
						}


					</script>
					<li>
						<a href="shop" class="ai-icon" aria-expanded="false">
						<i class="flaticon-091-shopping-cart"></i>
						<span class="nav-text">Mağaza <span class="badge bg-secondary" style="color:whitesmoke; font-size:12px; padding: 1px;">ÜRÜNLER</span></span>
						</a>
					</li>
					<li>
						<a href="api-manage" class="ai-icon" aria-expanded="false">
						<i class="flaticon-381-networking-1"></i>
						<span class="nav-text">API Yönetimi</span>
						</a>
					</li> 
					<li>
						<a href="server-list" class="ai-icon" aria-expanded="false">
						<i class="flaticon-004-bar-chart"></i>
						<span class="nav-text">Sunucu Listesi</span>
						</a>
					</li>
					
					<li>
						<a href="package-manage" class="ai-icon" aria-expanded="false">
						<i class="flaticon-008-credit-card"></i>
						<span class="nav-text">Paket Yönetimi</span>
						</a>
					</li>

					<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
						<i class="flaticon-061-puzzle"></i>
							<span class="nav-text">Sunucu Yönetimi</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="punitives-manage">Ceza Yönetimi</a></li>
							<li><a href="emoji-manage">Emoji Yönetimi</a></li>
							<li><a href="task-manage">Görev Yönetimi</a></li>
							<li><a href="staff-manage">Yetkili Yönetimi</a></li>
							<li><a href="users-manage">Kullanıcı Yönetimi</a></li>
							<li><a href="stat-manage">İstatistik Yönetimi</a></li>
							<li><a href="responsibility-manage">Sorumluluk Yönetimi</a></li>
							<li><a href="shop-manage">Mağaza Yönetimi</a></li>
							<li><a href="channel-manage">Kanal Yönetimi</a></li>
							<li><a href="role-manage">Rol Yönetimi</a></li>
                        </ul>
                    </li>
					<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
						<i class="flaticon-073-settings"></i>
							<span class="nav-text">Genel Bot Ayarları</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="emoji-settings">Emoji Ayarları</a></li>
							<li><a href="stat-settings">İstatistik Ayarları</a></li>
                            <li><a href="setup-settings">Kurulum Ayarları</a></li>
							<li><a href="guard-settings">Güvenlik Ayarları</a></li>
							<li><a href="subcom-manage">Alt Komut Ayarları</a></li>
							<li><a href="pcom-manage">Özel Komut Ayarları</a></li>
							<li><a href="select-manage">Seçmeli Menü Ayarları</a></li>
							<li><a href="welcome-settings">Hoşgeldin Ayarları</a></li>
                        </ul>
                    </li>
					<?php 
											if($var['type'] == "STAFF") {
												echo '<li class="nav-label"></li>
												<li>
												<a href="notify-manage" class="ai-icon" aria-expanded="false">
												<i class="flaticon-082-alarm-1"></i>
												<span class="nav-text">Bildirim Merkezi <span class="badge bg-primary" style="color:whitesmoke; font-size:12px; padding: 1px;">YÖNETİCİ</span></span>
												</a>
											</li>
											<li>
											<a href="s-users-manage" class="ai-icon" aria-expanded="false">
											<i class="flaticon-381-user-9"></i>
											<span class="nav-text">Kullanıcılar</span>
											</a>
										</li>
										<li>
										<a href="s-package-manage" class="ai-icon" aria-expanded="false">
										<i class="flaticon-381-diamond"></i>
										<span class="nav-text">Paket Yönetimi</span>
										</a>
									</li>
									';
											} 
											
										?>
                </ul>
				<div class="copyright">
					<p><strong>Synl.io</strong> © 2022 Tüm Hakları Saklıdır.</p>
                    <p>Developed by <a href="https://synl.io/" target="_blank">ΛCΛR</a></p>
				</div>
			</div>
            </div>
			<script>parayaÇevirAMK("<?php   echo '' . $var['balance'] . ''; ?>")</script>
			<div class="sidebar-right">
  <div class="bg-overlay"></div>
  <a class="btn text-white mb-2 sidebar-right-trigger wave-effect wave-effect-x" href="./profile" style="padding: 1px; background-color: #191e3a">
    <span>
      <i class="fa fa-cog fa-spin"></i>
    </span>
										</a>
  <a class="sidebar-close-trigger" href="./profile">
    <span>
      <i class="la-times las"></i>
    </span>
  </a>
</div>