let BOTSTATUS = "START";
let API_PINGS = []
let _cachesURL = ""


GetBots()

async function patchBots(token, id, username = null, discriminator = null, type, input) {
    if(type == "AVATAR") {
        let button = document.getElementById(`${id}_avatarbutton`)
        if(button) button.disabled = true, button.innerText = `Güncelleniyor`
        await fetch("https://discord.com/api/v10/users/@me", {
            method: 'PATCH',
            headers: {
                "Authorization": `Bot ${token}`,
                "Content-Type": "application/json"
              }, 
            body: JSON.stringify({
                "id": id,
                "username": username,
                "avatar": _cachesURL ? _cachesURL : null,
                "discriminator": discriminator,
                "avatar_decoration": null,
                "public_flags": 0,
                "flags": 0,
                "bot": true,
                "banner": null,
                "banner_color": null,
                "accent_color": null,
                "locale": "en-US",
                "mfa_enabled": true,
                "email": null,
                "verified": true
            }),
        }).then(response => response.json())
        .then(result => {
          if(result.code) {
            toastr.error(`Çok fazla denemeler sonucu ${username} isimli botun resmi değiştirilemedi.`, `${username}`, {
                timeOut: 500000000,
                closeButton: !0,
                debug: !1,
                newestOnTop: !0,
                progressBar: !0,
                positionClass: "toast-top-right",
                preventDuplicates: !0,
                onclick: null,
                showDuration: "200",
                hideDuration: "1000",
                extendedTimeOut: "1000",
                showEasing: "swing",
                hideEasing: "linear",
                showMethod: "fadeIn",
                hideMethod: "fadeOut",
                tapToDismiss: !1
            })
          } else {
            toastr.success(`Başarıyla ${username} isimli botun resmi ${_cachesURL ? "değiştirildi." : "sıfırlandı."}`, `${username}`, {
                timeOut: 500000000,
                closeButton: !0,
                debug: !1,
                newestOnTop: !0,
                progressBar: !0,
                positionClass: "toast-top-right",
                preventDuplicates: !0,
                onclick: null,
                showDuration: "200",
                hideDuration: "1000",
                extendedTimeOut: "1000",
                showEasing: "swing",
                hideEasing: "linear",
                showMethod: "fadeIn",
                hideMethod: "fadeOut",
                tapToDismiss: !1
            })
           
          }
        })
        .catch(error => {
          console.error('Error:', error);
        });
 
        if(button) button.disabled = false, button.innerText = "Güncelle"
     
    } else if(type == "USERNAME") {
        let w = document.getElementById(input)
        if(!w) return alert("BOŞ BIRAKMAYIN!")
        let button = document.getElementById(`${id}_isimbutton`)
        if(button) button.disabled = true, button.innerText = `Güncelleniyor`
        await fetch("https://discord.com/api/v10/users/@me", {
            method: 'PATCH',
            headers: {
                "Authorization": `Bot ${token}`,
                "Content-Type": "application/json"
              }, 
            body: JSON.stringify({
                "id": id,
                "username": w.value,
                "discriminator": discriminator,
                "avatar_decoration": null,
                "public_flags": 0,
                "flags": 0,
                "bot": true,
                "banner": null,
                "banner_color": null,
                "accent_color": null,
                "locale": "en-US",
                "mfa_enabled": true,
                "email": null,
                "verified": true
            }),
        }).then(response => response.json())
        .then(result => { 
            if(result.code) { 
                toastr.error(`Çok fazla denemeler sonucu ${username} isimli botun ismi ${w.value} olarak değiştirilemedi.`, `${w.value}`, {
                    timeOut: 500000000,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    positionClass: "toast-top-right",
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "200",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                })
            } else {
            toastr.success(`Başarıyla ${username} isimli botun ismi ${w.value} olarak değiştirildi.`, `${w.value}`, {
                        timeOut: 500000000,
                        closeButton: !0,
                        debug: !1,
                        newestOnTop: !0,
                        progressBar: !0,
                        positionClass: "toast-top-right",
                        preventDuplicates: !0,
                        onclick: null,
                        showDuration: "200",
                        hideDuration: "1000",
                        extendedTimeOut: "1000",
                        showEasing: "swing",
                        hideEasing: "linear",
                        showMethod: "fadeIn",
                        hideMethod: "fadeOut",
                        tapToDismiss: !1
                    })
            }
        }).catch(err => {
            console.log("Error: "+ err)

        })
        if(button) button.disabled = false, button.innerText = "Güncelle"
       
    }
}
document.querySelector("#image_file").onchange = function(){
    var reader = new FileReader();
    reader.onloadend = function () {
        _cachesURL = reader.result;
    }
    reader.readAsDataURL(this.files[0]);
};

async function GetBots() {
    let _get  = await fetch(`${API.url}/get?type=7`, {
        headers: {
            
            'Authorization': API.token
            },
    }).catch(err => {
      
    })
    if(!_get) return;
    let _result = await _get.json();
    if(_result) {
       _result.sort((a, b) => Number(b.id) - Number(a.id)).forEach((bot) => {
        table = document.getElementById("botlaramk");
        const row = table.insertRow();
        const td1 = row.insertCell(0);
        const td2 = row.insertCell(1);
        const td3 = row.insertCell(2);
        const td4 = row.insertCell(3);

        td1.innerHTML = `<center><img src="${bot.avatar ? bot.avatar : "https://archive.org/download/discordprofilepictures/discordgrey.png"}" width="48px" style="border-radius: 24px"><center>`
        td2.innerHTML = `<center>${bot.username}#<b style="color: orange;">${bot.discriminator}</b></center>`
    
            td3.innerHTML = `<center><div class="input-group mb-3 input-primary">
          
            <button id="${bot.id}_avatarbutton" class="btn btn-success btn-md" onclick="patchBots('${bot.token}', '${bot.id}' ,'${bot.username}', '${bot.discriminator}', 'AVATAR');" type="button">Güncelle</button>
        
        </div>  </center>`




        td4.innerHTML = `<div class="input-group mb-3 input-primary">
        <div class="input-group-prepend">
 <button class="btn btn-secondary btn-sm" id="${bot.id}_isimbutton" onclick="patchBots('${bot.token}', '${bot.id}' ,'${bot.username}', '${bot.discriminator}', 'USERNAME', '${bot.username}${bot.discriminator}_username');" type="button">Güncelle</button>
</div>
        <input type="text" id="${bot.username}${bot.discriminator}_username" style="width: 1px" class="form-control" placeholder="${bot.username}">
        <div class="input-group-append">
            <span class="input-group-text">#${bot.discriminator}</span>
        </div>
    </div>`

       })
    }
}




async function GetLog() {
    let _get  = await fetch(`${API.url}/logs`, {
        headers: {
            
            'Authorization': API.token
            },
    }).catch(err => {
      
    })
    if(!_get) return;
    let _result = await _get.json();
    if(_result) {
        let konsol = document.getElementById("konsol-log")
        konsol.innerText = `${_result.slice(-16).map(x => x).join("")}`
    }
}

async function GetStatus() {
    let _get  = await fetch(`${API.url}/powerStatus`, {
        headers: {
            'Authorization': API.token
            },
    }).catch(err => {
      
    })
    if(!_get) return;
    let _result = await _get.json();
    let button = document.getElementById("status-switch")
    if(_result) {
        
        let ram = document.getElementById("totalram")
        ram.innerText = `${_result.ram} GB`
        let usedram = document.getElementById("usedram")
        usedram.innerText = `Ortalama olarak ${_result.used_ram} GB bellek kullanılıyor.`
        let barram = document.getElementById("barram")
        let ort = 100/Number(_result.ram)*Number(_result.used_ram).toFixed(0)
        barram.innerHTML = `<div class="progress-bar" style="width: ${ort}%; background-color: green;"></div>`

        function mstotime(ms) {
            var ut_sec = ms;
            var ut_min = ut_sec/60;
            var ut_hour = ut_min/60;
            ut_sec = Math.floor(ut_sec);
            ut_min = Math.floor(ut_min);
            ut_hour = Math.floor(ut_hour);
            ut_hour = ut_hour%60;
            ut_min = ut_min%60;
            ut_sec = ut_sec%60;
            return `${ut_hour} saat, ${ut_min} dakika, ${ut_sec} saniye`
        }

        let işlemci = document.getElementById("işlemci")
        işlemci.innerHTML = `${_result.cpu} <b style="color: green;">x${_result.thread}</b> (${_result.thread / 2} Çekirdek)`

        let apigecikme = document.getElementById("apigecikme")
        apigecikme.innerHTML = `${_result.api_ping}<b style="color: whitesmoke;">ms</b>`

        let apiuptime = document.getElementById("apiuptime")
        apiuptime.innerText = `API ${mstotime(_result.api_uptime)}'dir açık.`
        let canlıgecikme = document.getElementById("canlıgecikme")
        canlıgecikme.innerText = `${_result.last_uptime.join(",")}`
        let gemişveri = document.getElementById("gecmişgecikme")
        gemişveri.innerHTML = `<i class="fa fa-arrow-up"></i> ${_result.last_uptime.slice(-2)[0]}ms`
        let suanki = document.getElementById("suankigecikme")
        suanki.innerHTML = `<i class="fa fa-arrow-down" style="color: lightgreen;"></i> ${_result.last_uptime.slice(-1)[0]}ms`
        let usedram2 = document.getElementById("usedram2")
        usedram2.innerText = `Sistem ${mstotime(_result.uptime)}'dir açık.`
        if(_result.status == "START") button.innerHTML = `<i class="fa-solid fa-power-off"></i> Durdur`,button.classList = "btn btn-danger text-white mb-2", BOTSTATUS = "START"
        if(_result.status == "STOP") button.innerHTML = `<i class="fa-solid fa-play"></i> Başlat`,button.classList = "btn btn-success text-white mb-2", BOTSTATUS = "STOP"
        if(_result.status == "NO-PAYMENT") button.innerHTML = `<i class="fa-solid fa-play"></i> Başlat`,button.classList = "btn btn-success text-white mb-2", BOTSTATUS = "STOP"
    }
}

setInterval(( ) => GetLog(), 1000)
setInterval(() => GetStatus(), 1000)


async function StartBots() {

    Swal.fire({
        title: `${BOTSTATUS == "START" ? "Botları kapatmak üzeresin!" : "Botları açmak istiyor musun?"}`,
        text: `${BOTSTATUS == "START" ? "Bu işlem sonucu botlarınız açılana kadar tepki veremez. İstiyor musun?" : "Kapalı olan tüm botlarınızı açmak istiyor musun?"}`,
        type: "warning",
        showCancelButton: !0,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Evet",
        cancelButtonText: "Geri Dön!",
    }).then((e) => {
    
        if(e.value == true) {
            postData(`${API.url}/power`, {
                type: BOTSTATUS == "START" ? "STOP" : "START",
            })
            Swal.fire(
                `${BOTSTATUS == "START" ? "Başarıyla botlar durduruldu!" : "Başarıyla botlar başlatıldı!"}`,
                ``,
                'success'
            )
            toastr.success(`Başarıyla botlar ${BOTSTATUS == "START" ? "durduruldu." : "başlatıldı."}`, `Bot Durumu`, {
                timeOut: 500000000,
                closeButton: !0,
                debug: !1,
                newestOnTop: !0,
                progressBar: !0,
                positionClass: "toast-top-right",
                preventDuplicates: !0,
                onclick: null,
                showDuration: "200",
                hideDuration: "1000",
                extendedTimeOut: "1000",
                showEasing: "swing",
                hideEasing: "linear",
                showMethod: "fadeIn",
                hideMethod: "fadeOut",
                tapToDismiss: !1
            })
        } else {
        }
    })
   
}

async function RestartBots() {
    Swal.fire({
        title: `Botları yeniden başlatmak ister misin?`,
        text: `Bu işlem sizin verilerinize göre hızı değişkenlik gösterebilir.`,
        type: "warning",
        showCancelButton: !0,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yeniden Başlat",
        cancelButtonText: "Geri Dön!",
    }).then((e) => {
        if(e.value == true) { 
            Swal.fire(
                `Başarıyla botunuz yeniden başlatıldı.`,
                ``,
                'success'
            )
            postData(`${API.url}/power`, {
                type: "RESTART",
            })
            
            toastr.success(`Başarıyla botlar yeniden başlatıldı.`, `Yeniden Başlatılma`, {
                timeOut: 500000000,
                closeButton: !0,
                debug: !1,
                newestOnTop: !0,
                progressBar: !0,
                positionClass: "toast-top-right",
                preventDuplicates: !0,
                onclick: null,
                showDuration: "200",
                hideDuration: "1000",
                extendedTimeOut: "1000",
                showEasing: "swing",
                hideEasing: "linear",
                showMethod: "fadeIn",
                hideMethod: "fadeOut",
                tapToDismiss: !1
            })
        }
    })
}

let _dagiticitokenler = []

			function updateBotSettings() {
				let sunucuId = document.getElementById("getGuildID").value
				let isim = document.getElementById("getName").value
				let botdurum = document.getElementById("getBotStatus").value
				
				let distmain = document.getElementById("getMain").value
				let voucher = document.getElementById("getVoucher").value
				let stat = document.getElementById("getStatistics").value
				let sync = document.getElementById("getSync").value
				let controller = document.getElementById("getController").value
				
				let one = document.getElementById("getOne").value
				let two = document.getElementById("getTwo").value
		
				Swal.fire({
										title: `Bot ayarları güncellenmek üzere?`,
										text: `Botun tokenlerini, durumunu ve sunucu numarasını değiştirmek istediğine emin misin?`,
										type: "warning",
										showCancelButton: !0,
										confirmButtonColor: "#DD6B55",
										confirmButtonText: "Evet",
										cancelButtonText: "Geri Dön!",
									}).then((e) => {
						
										if(e.value == true) {
											toastr.success(`Başarıyla genel bot ayarları tamamiyle düzenlendi.`, `Bot Ayarları`, {
												timeOut: 500000000,
												closeButton: !0,
												debug: !1,
												newestOnTop: !0,
												progressBar: !0,
												positionClass: "toast-top-right",
												preventDuplicates: !0,
												onclick: null,
												showDuration: "200",
												hideDuration: "1000",
												extendedTimeOut: "1000",
												showEasing: "swing",
												hideEasing: "linear",
												showMethod: "fadeIn",
												hideMethod: "fadeOut",
												tapToDismiss: !1
											})
											postData(`${API.url}/editBots`, {
												guildID: sunucuId ? sunucuId : null,
												name: isim ? isim : null,
												botStatus: botdurum ? botdurum : null,
												Voucher: voucher ? voucher : null,
												Sync: sync ? sync : null,
												Controller: controller ? controller : null,
												Statistics: stat ? stat : null,
												Security: {
													Main: distmain ? distmain : null,
													One: one ? one : null,
													Two: two ? two : null,
													Dists: _dagiticitokenler.length > 0 ? _dagiticitokenler : undefined
												}
											})
										}
										})
									
									
			}

			function add_element_to_array() {
				let added_item = document.getElementById("getDists").value
				if(!_dagiticitokenler.includes(added_item)) {
					_dagiticitokenler.push(added_item)
					let table = document.getElementById("dist_tokens");
					const row = table.insertRow();
					const td1 = row.insertCell(0);
					const td2 = row.insertCell(1);
					const td3 = row.insertCell(2);
					td1.innerHTML = `${_dagiticitokenler.length}.`
					td2.innerHTML = `<span style="font-size: 10px">${added_item}<span>`
					td3.innerHTML = `<button class="btn btn-danger" style="height: 25px; width: 25px; padding: 1px; border-radius: 10px" onclick="delete_array_item('${_dagiticitokenler.length - 1}', this);" type="button"><i class="fa fa-xmark"></i></button>`
				}
	
      		}

			function delete_array_item(index, table) {
				let docs = document.getElementById("dist_tokens")
				var i = table.parentNode.parentNode.rowIndex;
    			docs.deleteRow(i);
				_dagiticitokenler.splice(i, 1); 
			}

            async function refreshBotStatus() {
                let w3;
                let table = document.getElementById('botlaramk');
                let newSettings = await fetch(`${API.url}/get?type=7`, {
                    headers: {
                        
                        'Authorization': API.token
                        },
                }).catch(err => {
                    console.log({
                        status: "ERROR",
                        statuscode: 200
                    })
                }).then(async (x) => {
                    w3 = await x.json()
                    w3.sort((a, b) => Number(b.id) - Number(a.id)).map((bot, int) => {
                        table.rows[1 + int].cells[0].innerHTML = `<center><img src="${bot.avatar ? bot.avatar : "https://archive.org/download/discordprofilepictures/discordgrey.png"}" width="48px" style="border-radius: 24px"><center>`
                        table.rows[1 + int].cells[1].innerHTML = `<center>${bot.username}#<b style="color: orange;">${bot.discriminator}</b></center>`
        
                    })
                })
            }
            function sendHook() {
                let text = document.getElementById("text_webhook").value
                let channel = document.getElementById("webhook_announce_chats").value
                let embed = document.getElementById("checkbox_webhookembed")
                let name = document.getElementById("text_webhookname").value
                Swal.fire({
                    title: `Bir kanal mesaj gönderilecek!`,
                    text: `Belirtilen ${text} mesajını kanala göndermek istiyor musunuz?`,
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Evet",
                    cancelButtonText: "Geri Dön!",
                }).then((e) => {
    
                    if(e.value == true) {
        
                        if(!text) return toastr.error(`Başarıyla mesajınız belirtilen kanala gönderilemedi boş metin girilemez.`, `Webhook Bildirimi`, {
                            timeOut: 500000000,
                            closeButton: !0,
                            debug: !1,
                            newestOnTop: !0,
                            progressBar: !0,
                            positionClass: "toast-top-right",
                            preventDuplicates: !0,
                            onclick: null,
                            showDuration: "200",
                            hideDuration: "1000",
                            extendedTimeOut: "1000",
                            showEasing: "swing",
                            hideEasing: "linear",
                            showMethod: "fadeIn",
                            hideMethod: "fadeOut",
                            tapToDismiss: !1
                        })
                        toastr.success(`Başarıyla mesajınız belirtilen kanala gönderildi.`, `Webhook Bildirimi`, {
                            timeOut: 500000000,
                            closeButton: !0,
                            debug: !1,
                            newestOnTop: !0,
                            progressBar: !0,
                            positionClass: "toast-top-right",
                            preventDuplicates: !0,
                            onclick: null,
                            showDuration: "200",
                            hideDuration: "1000",
                            extendedTimeOut: "1000",
                            showEasing: "swing",
                            hideEasing: "linear",
                            showMethod: "fadeIn",
                            hideMethod: "fadeOut",
                            tapToDismiss: !1
                        })
                        postData(`${API.url}/sendhook`, {
                            channelId: channel,
                            text: text,
                            name: name ? name : "Web API",
                            embed: embed.checked ? true : false
                        })
                    document.getElementById("text_webhook").value = ''
                    }
                })
            }