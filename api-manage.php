<!DOCTYPE html>
<html lang="en">
<?php include 'session.php'; ?>
<head>
	<?php include './includes/head.php'; ?>
	<link rel="stylesheet" href="./vendor/select2/css/select2.min.css">
	<link rel="stylesheet" href="./dist/css/component-custom-switch.css">
    <script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-2c7831bb44f98c1391d6a4ffda0e1fd302503391ca806e7fcc7b9b87197aec26.js"></script>

<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script src='https://use.fontawesome.com/b2c0f76220.js'></script>
<script src='https://raw.githubusercontent.com/emmetio/textarea/master/emmet.min.js'></script>
<script src='//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.5.0/highlight.min.js'></script>
    <style>
            .editor-holder {
            width: 650px;
            height: 520px;
            margin-top: 50px;
            border-radius: 3px;
            position: sticky;
            top: 0;
            margin-right: 1000px;
            margin-bottom: 50px;
            left: 50%;
            background: #1f1f1f !important;
            overflow: hidden;
            box-shadow: 5px 5px 10px 0px rgba(0, 0, 0, 0.4);
            transition: all 0.5s ease-in-out;
            }
            .editor-holder.fullscreen {
            width: 100%;
            height: 100%;
            margin: 0;
            left: 0;
            }
            .editor-holder .toolbar {
            width: 100%;
            list-style: none;
            position: absolute;
            top: -2px;
            margin: 0;
            left: 0;
            z-index: 3;
            padding: 8px;
            background: #afafaf;
            }
            .editor-holder .toolbar li {
            display: inline-block;
            }
            .editor-holder .toolbar a {
            line-height: 20px;
            background: rgba(144, 144, 144, 0.6);
            color: grey;
            box-shadow: inset -1px -1px 1px 0px rgba(0, 0, 0, 0.28);
            display: block;
            border-radius: 3px;
            cursor: pointer;
            }
            .editor-holder .toolbar a:hover {
            background: rgba(144, 144, 144, 0.8);
            }
            .editor-holder .toolbar a.active {
            background: rgba(144, 144, 144, 0.8);
            box-shadow: none;
            }
            .editor-holder .toolbar i {
            color: #565656;
            padding: 8px;
            }
            .editor-holder textarea, .editor-holder code {
            width: 100%;
            height: auto;
            min-height: 450px;
            font-size: 14px;
            border: 0;
            margin: 0;
            left: 0;
            top: 47px;
            padding: 20px !important;
            line-height: 21px;
            position: absolute;
            font-family: Consolas, Liberation Mono, Courier, monospace;
            overflow: hidden;
            transition: all 0.5s ease-in-out;
            }
            .editor-holder textarea {
            background: transparent !important;
            z-index: 2;
            height: auto;
            resize: none;
            color: #fff;
            text-shadow: 0px 0px 0px rgba(0, 0, 0, 0);
            text-fill-color: transparent;
            -webkit-text-fill-color: transparent;
            }
            .editor-holder textarea::-webkit-input-placeholder {
            color: white;
            }
            .editor-holder textarea:focus {
            outline: 0;
            border: 0;
            box-shadow: none;
            }
            .editor-holder code {
            z-index: 1;
            }

            pre {
            white-space: pre-wrap;
            white-space: -moz-pre-wrap;
            white-space: -pre-wrap;
            white-space: -o-pre-wrap;
            word-wrap: break-word;
            }
            pre code {
            background: #1f1f1f !important;
            color: #adadad;
            }
            pre code .hljs {
            color: #a9b7c6;
            background: #282b2e;
            display: block;
            overflow-x: auto;
            padding: 0.5em;
            }
            pre code .hljs-number,
            pre code .hljs-literal,
            pre code .hljs-symbol,
            pre code .hljs-bullet {
            color: #6897BB;
            }
            pre code .hljs-keyword,
            pre code .hljs-selector-tag,
            pre code .hljs-deletion {
            color: #cc7832;
            }
            pre code .hljs-variable,
            pre code .hljs-template-variable,
            pre code .hljs-link {
            color: #629755;
            }
            pre code .hljs-comment,
            pre code .hljs-quote {
            color: #808080;
            }
            pre code .hljs-meta {
            color: #bbb529;
            }
            pre code .hljs-string,
            pre code .hljs-attribute,
            pre code .hljs-addition {
            color: #6A8759;
            }
            pre code .hljs-section,
            pre code .hljs-title,
            pre code .hljs-type {
            color: #ffc66d;
            }
            pre code .hljs-name,
            pre code .hljs-selector-id,
            pre code .hljs-selector-class {
            color: #e8bf6a;
            }
            pre code .hljs-emphasis {
            font-style: italic;
            }
            pre code .hljs-strong {
            font-weight: bold;
            }
</style>


<script id="rendered-js" >
            var tabCharacter = "  ";
            var tabOffset = 2;

            $(document).on('click', '#indent', function (e) {
            e.preventDefault();
            var self = $(this);

            self.toggleClass('active');

            if (self.hasClass('active'))
            {
                tabCharacter = "\t";
                tabOffset = 1;
            } else

            {
                tabCharacter = "  ";
                tabOffset = 2;
            }
            });

            $(document).on('click', '#fullscreen', function (e) {
            e.preventDefault();
            var self = $(this);

            self.toggleClass('active');
            self.parents('.editor-holder').toggleClass('fullscreen');
            });

            $(document).on('ready', function () {
            hightlightSyntax();

            emmet.require('textarea').setup({
                pretty_break: true,
                use_tab: true });

            });


            $(document).on('ready load keyup keydown change', '.editor', function () {
            correctTextareaHight(this);
            hightlightSyntax();
            });


            function correctTextareaHight(element)
            {
            var self = $(element),
            outerHeight = self.outerHeight(),
            innerHeight = self.prop('scrollHeight'),
            borderTop = parseFloat(self.css("borderTopWidth")),
            borderBottom = parseFloat(self.css("borderBottomWidth")),
            combinedScrollHeight = innerHeight + borderTop + borderBottom;

            if (outerHeight < combinedScrollHeight)
            {
                self.height(combinedScrollHeight);
            }
            }

            function textCopy(code) {
                var copyText = document.getElementById(code);
                copyText.select();
                copyText.setSelectionRange(0, 99999); 
                navigator.clipboard.writeText(copyText.value);
            }


            function hightlightSyntax() {
            var me = $('.editor');
            var content = me.val();
            var codeHolder = $('code');
            var escaped = escapeHtml(content);

            codeHolder.html(escaped);

            $('.syntax-highight').each(function (i, block) {
                hljs.highlightBlock(block);
            });
            }


            function escapeHtml(unsafe) {
            return unsafe.
            replace(/&/g, "&amp;").
            replace(/</g, "&lt;").
            replace(/>/g, "&gt;").
            replace(/"/g, "&quot;").
            replace(/'/g, "&#039;");
            }

            $(document).delegate('.allow-tabs', 'keydown', function (e) {
            var keyCode = e.keyCode || e.which;

            if (keyCode == 9) {
                e.preventDefault();
                var start = $(this).get(0).selectionStart;
                var end = $(this).get(0).selectionEnd;

                $(this).val($(this).val().substring(0, start) +
                tabCharacter +
                $(this).val().substring(end));

                $(this).get(0).selectionStart =
                $(this).get(0).selectionEnd = start + tabOffset;
            }
            });
    </script>
  

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
			<div class="alert alert-danger alert-dismissible fade show" id="status-payment" style="display: none;"></div>
				<div class="form-head mb-sm-5 mb-3 d-flex flex-wrap align-items-center">
				<div class="welcome-text mr-auto">
                            <h4>Merhaba, <?php echo $var['name'] ?>!</h4>
                            <p class="mb-0">API yönetim sayfasına hoş geldiniz.</p>
                        </div>
				</div>
				<div class="row">
					<div class="col-xl-12">		
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Ücretsiz API Hizmeti</h4>
                                
							</div>
							<div class="card-body">
                            <div class="basic-list-group">
                                    <div class="row">
                                        <div class="col-lg-6 col-xl-2">
                                            <div class="list-group mb-4 " id="list-tab" role="tablist">
                                                <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-guilds" role="tab" aria-selected="false"><span class="badge badge-rounded badge-outline-success">GET</span> <span style="font-size: 12px; color: whitesmoke;">/get_guild_list</span></a>
                                                <a class="list-group-item list-group-item-action" id="list-users-list" data-toggle="list" href="#get-users" role="tab" aria-selected="false"><span class="badge badge-rounded badge-outline-success">GET</span> <span style="font-size: 10px; color: whitesmoke;">/get_users_more</span></a>
                                                <a class="list-group-item list-group-item-action" id="list-guilds-more" data-toggle="list" href="#get-guilds" role="tab" aria-selected="false"><span class="badge badge-rounded badge-outline-success">GET</span> <span style="font-size: 10px; color: whitesmoke;">/get_guilds_more</span></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-xl-10">
                                            <div class="tab-content" id="nav-tabContent">
                                                <div class="tab-pane fade show active" id="list-guilds" role="tabpanel">
                                                    <h4 class="mb-4">Sunucu Sıralaması</h4>
                                                    <p>Aşağı da bulunan çıktılardan yola çıkarak kolay bir şekilde sunucu sıralama sistemi yapabilirsiniz. Sadece "GET" şeklinde verileri çekebilirsin.</p>

                                                       <table class="table table-bordered table-striped verticle-middle table-responsive-sm">
                                                        <thead>
                                                            <th>Çıktılar</th>
                                                            <th>Sonuçlar</th>
                                                            <th>Bu çıktılar JSON şeklinde aktarılır.</th>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>id</td>
                                                                <td>Number</td>
                                                                <td>Sunucunun numarasını belirtir.</td>
                                                            </tr>
                                                            <tr>
                                                                <td>name</td>
                                                                <td>String</td>
                                                                <td>Sunucunun ismini belirtir.</td>
                                                            </tr>
                                                            <tr>
                                                                <td>voice</td>
                                                                <td>Number</td>
                                                                <td>Seste bulunan kullanıcılarını belirtir. (AFK saymaz)</td>
                                                            </tr>
                                                            <tr>
                                                                <td>icon</td>
                                                                <td>String</td>
                                                                <td>Sunucunun resmini url şeklinde döndürür.</td>
                                                            </tr>
                                                            <tr>
                                                                <td>banner</td>
                                                                <td>String || Boolean</td>
                                                                <td>Sunucunun arka plan resmini var ise url şeklinde yok ise false olarak döndürür.</td>
                                                            </tr>
                                                            <tr>
                                                                <td>voicebots</td>
                                                                <td>Number</td>
                                                                <td>Seste bulunan bot sayısını belirtir.</td>
                                                            </tr>
                                                            <tr>
                                                                <td>members</td>
                                                                <td>Number</td>
                                                                <td>Sunucunun toplam üyelerini belirtir.</td>
                                                            </tr>
                                                            <tr>
                                                                <td>bots</td>
                                                                <td>Number</td>
                                                                <td>Sunucuda bulunan toplam botları belirtir.</td>
                                                            </tr>
                                                            <tr>
                                                                <td>cam</td>
                                                                <td>Number</td>
                                                                <td>Sunucuda seste kamera açan kullanıcıları belirtir.</td>
                                                            </tr>
                                                            <tr>
                                                                <td>stream</td>
                                                                <td>Number</td>
                                                                <td>Sunucuda seste yayın açan kullanıcıları belirtir.</td>
                                                            </tr>
                                                            <tr>
                                                                <td>muted</td>
                                                                <td>Number</td>
                                                                <td>Sunucuda seste kendini susturmuş kullanıcıları belirtir.</td>
                                                            </tr>
                                                            <tr>
                                                                <td>deafs</td>
                                                                <td>Number</td>
                                                                <td>Sunucuda seste kendini sağırlaştırmış kullanıcıları belirtir.</td>
                                                            </tr>
                                                            <tr>
                                                                <td>url</td>
                                                                <td>String || Boolean</td>
                                                                <td>Sunucunun urlsi var ise onu belirtir bulunmuyorsa false döndürür.</td>
                                                            </tr>
                                                            <tr>
                                                                <td>afk</td>
                                                                <td>Number</td>
                                                                <td>Sunucuda kulaklığı ve mikrofonu kapalı olan kullanıcıları belirtir.</td>
                                                            </tr>
                                                        </tbody>
                                                       </table>
                                                       
                                                
                                                </div>
                                                <div class="tab-pane fade show" id="get-users" >
                                                    <h4 class="mb-4">Kullanıcı Bilgisi Getirme</h4>
                                                    <p>Aşağı da bulunan çıktılar ile bir kullanıcının sorgusunu yapabilirsiniz fakat get şeklinde <span style="color: whitesmoke;">"?kim=İD"</span> sorgu işlemi yapabilirsiniz. Doğru sonuçlarda aşağıda ki tabloda verilen veriler çıkmaktadır.</p>
                                                    <table class="table table-bordered table-striped verticle-middle table-responsive-sm">
                                                        <thead>
                                                            <th>Çıktılar</th>
                                                            <th>Sonuçlar</th>
                                                            <th>Bu çıktılar JSON şeklinde aktarılır.</th>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>id</td>
                                                                <td>Number</td>
                                                                <td>Kullanıcının numarasını belirtir.</td>
                                                            </tr>
                                                            <tr>
                                                                <td>username</td>
                                                                <td>String</td>
                                                                <td>Kullanıcının kullanıcı adını belirtir.</td>
                                                            </tr>
                                                            <tr>
                                                                <td>tag</td>
                                                                <td>String</td>
                                                                <td>Kullanıcının kullanıcıadı#etiket şeklinde bilgisini belirtir.</td>
                                                            </tr>
                                                            <tr>
                                                                <td>avatar</td>
                                                                <td>String</td>
                                                                <td>Kullanıcının resmini url şeklinde döndürür.</td>
                                                            </tr>
                                                            <tr>
                                                                <td>guilds</td>
                                                                <td>Array [{</br>
                                                                    &nbsp;&nbsp;name: "String",</br>
                                                                    &nbsp;&nbsp;icon: "String",</br>
                                                                    &nbsp;&nbsp;tag: "Sunucudaki İsmi"</br>}]</td>
                                                                <td>Bulunduğu sunucuların bilgilerini dize olarak belirtir.</td>
                                                            </tr>
                                                            <tr>
                                                                <td>voice</td>
                                                                <td>Array [{</br>
                                                                    &nbsp;&nbsp;channel: "String",</br>
                                                                    &nbsp;&nbsp;friends: [{</br>
                                                                        &nbsp;&nbsp;&nbsp;tag: "String",</br>
                                                                        &nbsp;&nbsp;&nbsp;avatar: "String"</br>
                                                                    &nbsp;&nbsp;}],</br>
                                                                    &nbsp;&nbsp;status: {</br>
                                                                        &nbsp;&nbsp;&nbsp;cam: Boolean,
                                                                        &nbsp;&nbsp;&nbsp;mute: Boolean,</br>
                                                                        &nbsp;&nbsp;&nbsp;deaf: Boolean,</br>
                                                                        &nbsp;&nbsp;&nbsp;stream: Boolean</br>
                                                                    &nbsp;&nbsp;},</br>
                                                                    &nbsp;&nbsp;guild: "String"</br>}]</td>
                                                                <td>Seste bulunan sunucunun ve üyelerin verilerini belirtir.</td>
                                                            </tr>
                                                            <tr>
                                                                <td>olusturma</td>
                                                                <td>Date[Number]</td>
                                                                <td>Hesap oluşturma tarihini belirtir.</td>
                                                            </tr>
                                                         
                                                        </tbody>
                                                       </table>
                                                </div>
                                                <div class="tab-pane fade show" id="get-guilds" >
                                                    <h4 class="mb-4">Sunucu Bilgisi Getirme</h4>
                                                    <p>Aşağı da bulunan çıktılar ile bir sunucuların sorgusunu yapabilirsiniz fakat get şeklinde <span style="color: whitesmoke;">"?kim=Sunucu Adı veya ID"</span> sorgu işlemi yapabilirsiniz. Doğru sonuçlarda aşağıda ki tabloda verilen veriler çıkmaktadır.</p>
                                                    <table class="table table-bordered table-striped verticle-middle table-responsive-sm">
                                                        <thead>
                                                            <th>Çıktılar</th>
                                                            <th>Sonuçlar</th>
                                                            <th>Bu çıktılar JSON şeklinde aktarılır.</th>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>id</td>
                                                                <td>Number</td>
                                                                <td>Sunucunun numarasını belirtir.</td>
                                                            </tr>
                                                            <tr>
                                                                <td>name</td>
                                                                <td>String</td>
                                                                <td>Sunucunun ismini belirtir.</td>
                                                            </tr>
                                                            <tr>
                                                                <td>icon</td>
                                                                <td>String</td>
                                                                <td>Sunucunun resmini belirtir.</td>
                                                            </tr>
                                                            <tr>
                                                                <td>banner</td>
                                                                <td>String</td>
                                                                <td>Sunucunun arkaplan resmi varsa belirtir.</td>
                                                            </tr>
                                                            <tr>
                                                                <td>url</td>
                                                                <td>String || Boolean</td>
                                                                <td>Sunucunun bağlantısı varsa belirtir yoksa false döndürür.</td>
                                                            </tr>
                                                            <tr>
                                                                <td>members</td>
                                                                <td>Number</td>
                                                                <td>Sunucuda bulunan kullanıcıların sayısını belirtir.</td>
                                                            </tr>
                                                            <tr>
                                                                <td>roles</td>
                                                                <td>Number</td>
                                                                <td>Sunucuda bulunan tüm rollerin sayısını belirtir.</td>
                                                            </tr>
                                                            <tr>
                                                                <td>channels</td>
                                                                <td>Number</td>
                                                                <td>Sunucuda bulunan tüm kanalların sayısını belirtir.</td>
                                                            </tr>
                                                            <tr>
                                                                <td>emojis</td>
                                                                <td>Object {</br>
                                                                    &nbsp;&nbsp;size: Number,</br>
                                                                    &nbsp;&nbsp;emojis: Array ["emoji url", "emoji url", ...],</br>
                                                                }</td>
                                                                <td>Sunucuda bulunan emojilerin sayısını ve emojinin bağlantılarını belirtir.</td>
                                                            </tr>
                                                            <tr>
                                                                <td>owner</td>
                                                                <td>Object {</br>
                                                                    &nbsp;&nbsp;id: Number,</br>
                                                                    &nbsp;&nbsp;tag: "String"</br>
                                                                    &nbsp;&nbsp;avatar: "String"</br>
                                                                        ]</td>
                                                                <td>Sunucunun sahibinin bilgilerini belirtir.</td>
                                                            </tr>
                                                            <tr>
                                                                <td>boost</td>
                                                                <td>String ["TIER_1", "TIER_2", ...]</td>
                                                                <td>Sunucunun takviye durumunu belirtir.</td>
                                                            </tr>
                                                         
                                                        </tbody>
                                                       </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
						</div>
                        <div style="margin-left: 400px;">
<div class="editor-holder">
<ul class="toolbar">
		<li><a href="#" id="indent" title="Sıralama"><i class="fa fa-indent"></i></a></li>
		<li><a href="#" id="copy" onClick="textCopy('codeaq');" title="Kopyala"><i class="fa fa-code"></i></a></li>
        <li style="color: whitesmoke;">Örnek AJAX Kod Bloğu</li>
	</ul>
	<div class="scroller">
		<textarea id="codeaq" disabled class="editor allow-tabs">
    &lt;script 
        src="https://code.jquery.com/jquery-3.3.1.js" 
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" 
        crossorigin="anonymous"&gt;
    &lt;/script&gt;

    &lt;script&gt;
        $.ajax({
            // Aşağı da bulunan yukarda verilen API bilgilerinin kullanılabilir bağlantıları.
            // url : 'https://synl.io/get_guild_list',
            // url : 'https://synl.io/get_users_more?kim=Kullanıcı ID',
            // url : 'https://synl.io/get_guilds_more?kim=Sunucu ID veya İsmi',
            type : 'GET',
            dataType : 'json',
            async: true,
            success : function (response) {
                console.log(response)
            }
        })
    &lt;/script&gt;
        </textarea>
		<pre><code class="syntax-highight html"></code></pre>
	</div>
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