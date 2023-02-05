let Girişler = []
let Sesler = []
let Aktifler = []
let Üyeler = []
let Günler = []
let Diger_Giris = []
let Haftalik_Giris = []
let Aylik_Giris = []
let isLogged = false
let _settings = []

let API = {
    token: getCookie("token").replace("+", " "),
    url: String(getCookie("api_url")),
    name: undefined,
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length).replace("+", " ");
      }
    }
    return "";
  }

async function GetChannel(str) {
    let _get  = await fetch(`${API.url}/get?type=2&filter=${str}`, {
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
    if(_result) {
        return _result
    } else {
        return false;
    }
}
async function GetMember(str) {
    let _get  = await fetch(`${API.url}/get?type=5&memberId=${str}`, {
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
    if(_result) {
        return await _result
    } else {
        return false;
    }
}

async function GetRole(str) {
    let _get  = await fetch(`${API.url}/get?type=1&filter=${str}`, {
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
    if(_result) {
        return _result
    } else {
        return false;
    }
}

async function addRow(settings, id, name, puan) {
    // getArray
    let table;
    if(settings == "_chats") table = document.getElementById("chatkategorileri");
    if(settings == "_voices") table = document.getElementById("seskategorileri");
    if(settings == "_staffs") {
        table = document.getElementById("yetkiyükseltimi");
        let kanal = await GetRole(id)
        const row = table.insertRow();
        const td1 = row.insertCell(0);
        const td2 = row.insertCell(1);
        const td3 = row.insertCell(2);
        const td4 = row.insertCell(3);

        let txt = ''
        name.forEach(async (alt) => {
            let _getrole = await GetRole(alt)
            if(_getrole) txt += `@${_getrole[0].name} `
            td2.innerText = txt
        })

        td1.innerText = `#${kanal[0].name}`;
        td3.innerText = `${puan}`;
        td4.innerHTML = `<center><button type="button" onClick="deleteRow('${settings}', '${id}', this);" class="btn btn-danger">Kaldır</button></center>`;
        postData(`${API.url}/push`, {
            name: settings,
            rol: id, 
            exrol: name,
            puan: puan,
        })
        
        toastr.success(`Başarıyla yetki düzenlemesi yapılandırıldı.`, `Başarılı!`, {
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
        return;
    }

    let kanal = await GetChannel(id)
    const row = table.insertRow();
    const td0 = row.insertCell(0);
    const td1 = row.insertCell(1);
    const td2 = row.insertCell(2);
    const td3 = row.insertCell(3);
    td0.innerText = `#${(table.rows.length - 2) + 1}`
    td1.innerText = `#${kanal[0].name}`;
    td2.innerText = `${name}`;
    td3.innerHTML = `<center><button type="button" onClick="deleteRow('${settings}', '${id}', this);" class="btn btn-danger">Kaldır</button></center>`;
    postData(`${API.url}/push`, {
        name: settings,
        id: id, 
        isim: name
    })
    
    toastr.success(`Başarıyla kategori düzenlemesi yapılandırıldı.`, `Başarılı!`, {
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

async function deleteRow(settings, id, table) {
    let docs;
    if(settings == "_chats") docs = document.getElementById("chatkategorileri");
    if(settings == "_voices") docs = document.getElementById("seskategorileri");
    if(settings == "_staffs") docs = document.getElementById("yetkiyükseltimi");
    var i = table.parentNode.parentNode.rowIndex;
    docs.deleteRow(i);

    postData(`${API.url}/pull`, {
        name: settings,
        id: id,
    })
    
    toastr.success(`Başarıyla ${settings} ayarı güncellendi.`, `Kaldırıldı!`, {
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

const GetStaffs = async () => {
    let _get  = await fetch(`${API.url}/get?type=6&filter=_staffs`, {
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
    let chatdata = _result[0]
    if(chatdata) {
        let table = document.getElementById("yetkiyükseltimi")
        chatdata.value.sort((a, b) => {
            return  Number(b.No) - Number(a.No)
        }).filter(x => GetRole(x.rol)).map(async (x, index) => {
            let rol = await GetRole(x.rol)
            let altroller
            const row = table.insertRow();
            const td1 = row.insertCell(0);
            const td2 = row.insertCell(1);
            const td3 = row.insertCell(2);
            const td4 = row.insertCell(3);
            if(x.exrol && x.exrol.length > 0) {
                let txt = ''
                x.exrol.forEach(async (alt) => {
                    let _getrole = await GetRole(alt)
                    if(_getrole) txt += `@${_getrole[0].name} `
                    td2.innerText = txt
                })
               
            }
           
            td1.innerText = `@${rol[0].name}`;
           
            td3.innerText = `${x.Puan}`;
            td4.innerHTML = `<center><button type="button" onClick="deleteRow('_staffs', '${x.rol}', this);" class="btn btn-danger">Kaldır</button></center>`;
        })
    } else {
        console.log({
            status: "ERROR",
            err: err,
            statuscode: 400
        })
    }
}

const GetVoices = async () => {
    let _get  = await fetch(`${API.url}/get?type=6&filter=_voices`, {
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
    let chatdata = _result[0]
    if(chatdata) {
        let table = document.getElementById("seskategorileri")
        chatdata.value.filter(x => GetChannel(x.id)).map(async (x, index) => {
            let kanal = await GetChannel(x.id)
            const row = table.insertRow();
            const td0 = row.insertCell(0);
            const td1 = row.insertCell(1);
            const td2 = row.insertCell(2);
            const td3 = row.insertCell(3);
            td0.innerText = `${index + 1}`
            td1.innerText = `${kanal[0].name}`;
            td2.innerText = `${x.isim}`;
            td3.innerHTML = `<center><button type="button" onClick="deleteRow('_voices', '${x.id}', this);" class="btn btn-danger">Kaldır</button></center>`;
        })
    } else {
        console.log({
            status: "ERROR",
            err: err,
            statuscode: 400
        })
    }
}

const GetChats = async () => {
    let _get  = await fetch(`${API.url}/get?type=6&filter=_chats`, {
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
    let chatdata = _result[0]
    if(chatdata) {
        let table = document.getElementById("chatkategorileri")
        chatdata.value.filter(x => GetChannel(x.id)).map(async (x, index) => {
            let kanal = await GetChannel(x.id)
            const row = table.insertRow();
            const td0 = row.insertCell(0);
            const td1 = row.insertCell(1);
            const td2 = row.insertCell(2);
            const td3 = row.insertCell(3);
            td0.innerText = `#${index + 1}`
            td1.innerText = `#${kanal[0].name}`;
            td2.innerText = `${x.isim}`;
            td3.innerHTML = `<center><button type="button" onClick="deleteRow('_chats', '${x.id}', this);" class="btn btn-danger">Kaldır</button></center>`;
        })
    } else {
        console.log({
            status: "ERROR",
            err: err,
            statuscode: 400
        })
    }
}

const GetEmojiSettings = async () => {
    let _get  = await fetch(`${API.url}/get?type=11`, {
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
        txt = item.value.url ? `<img height="32px" width="32px" src="${item.value.url}"></img>` : "Bulunamadı!";
        
        const row = table.insertRow();
        const td0 = row.insertCell(0);
        const td1 = row.insertCell(1);
        const td2 = row.insertCell(2);
        const td3 = row.insertCell(3);
        td0.innerText = item.name;
        td1.innerHTML = txt;
        td2.innerHTML = `<center><select class="form-control" style="background-color: #292f52; color: whitesmoke;"  id="${item.name}_edit"></select></center>`
        td3.innerHTML = `<center><button type="button" onclick="updateEmojis('${item.name}');" class="btn btn-secondary">Güncelle</button></center>`
        GetEmojis(`${item.name}_edit`)
    	function format (option) {
			console.log(option);
			if (!option.id) { return option.text; }
			var ob = option.text
			return ob;
		};
        $(document).ready(function() {
            $(`#${item.name}_edit`).select2({
                placeholder: "Emoji Seç!",
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
    })
}


function updateEmojis(name) {
    let get = document.getElementById(`${name}_edit`);
    if(!get) return toastr.error(`Lütfen ${name} değerine geçerli bir emoji belirtin.`, `${name}`, {
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
    Swal.fire({
        title: `Emoji güncellenmek üzere!`,
        text: `Belirttiğiniz ${name} emojisini güncellemek istiyor musun?`,
        type: "warning",
        showCancelButton: !0,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Evet",
        cancelButtonText: "Geri Dön!",
    }).then((e) => {
        if(e.value == true) {
            postData(`${API.url}/emojis`, {
                name: name,
                value: get.value
            })
            Swal.fire(
                `Başarılı!`,
                `Belirtilen ${name} emojisi güncellendi ve değişiklikler uygulandı.`,
                'success'
            )
            toastr.success(`Başarıyla ${name} isimli değişken güncellendi.`, `${name}`, {
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

const GetGuardSettings = async () => {
    let _get  = await fetch(`${API.url}/get?type=9`, {
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
        txt = item.value ? Array.isArray(item.value) ? item.type == "cogul" ?  `${item.value.length || 0} adet kullanıcı tokeni bulunuyor.` :  item.value.map(x => x).join(", ") : item.value == true ? "Açık!" : item.value : "Kapalı!"
        
        const row = table.insertRow();
        const td0 = row.insertCell(0);
        const td1 = row.insertCell(1);
        const td2 = row.insertCell(2);
        const td3 = row.insertCell(3);
        const td4 = row.insertCell(4);
        const td5 = row.insertCell(5);
        td0.innerHTML = item.display ? item.display : item.name;
        if(item.type != "BAŞLIK") td1.innerHTML = txt;
        if(item.type == "acmali" || item.type == "type") {
            td2.innerHTML = `	
            <div class="custom-switch pl-0">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; <input class="custom-switch-input" id="${item.name}_d" type="checkbox" ${item.value ? "checked" : ""}>
<label class="custom-switch-btn" for="${item.name}_d" style="align-items: left;"></label>
            </div>`
        }
        if(item.type == "tekil" || item.type == "limit") {
            td2.innerHTML = `<center><input type="text" id="${item.name}_d" class="form-control" placeholder="${item.value ? item.value : "Ayarlanmamış"}"></input></center>`
        }
        if(item.type == "cogul") {
            td2.innerHTML = `<input type="text" id="${item.name}_d" class="form-control" placeholder="Kullanıcı Tokeni"></input>`
           
        } 
       if(item.type != "BAŞLIK") td3.innerHTML = `<button type="button" id="${item.name}" onclick="update('${item.name}', '${item.type}', false, false, true)"  name="güncelle" class="btn btn-secondary">Güncelle</button>`;
       if(item.type == "roller" || item.type == "kanallar" || item.type == "limit" || item.type == "cogul"){
        
         td5.innerHTML = `<button type="button" id="${item.name}" onclick="update('${item.name}', '${item.type}', true, false, true)" name="sıfırla" class="btn btn-danger">Sıfırla</button>`
            td4.innerHTML = `<button type="button"  class="btn btn-primary" onclick="SweetAlertInfo({title: '${item.display ? item.display : item.name}', desc: '${item.description}'})">Bilgilendirme</button>`
        } else {
            if(item.type != "BAŞLIK") td4.innerHTML = `<button type="button" class="btn btn-primary" onclick="SweetAlertInfo({title: '${item.display ? item.display : item.name}', desc: '${item.description}'})">Bilgilendirme</button>`
        }
    })
}


const GetStatSettings = async () => {
    let _get  = await fetch(`${API.url}/get?type=6`, {
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
    _result.filter(x => x.type != "kategori").map((item, index) => {
        txt = item.value ? Array.isArray(item.value) ? item.value.map(x => x).join(", ") : item.value == true ? "Açık!" : item.value : "Kapalı!"
        
        const row = table.insertRow();
        const td0 = row.insertCell(0);
        const td1 = row.insertCell(1);
        const td2 = row.insertCell(2);
        const td3 = row.insertCell(3);
        const td4 = row.insertCell(4);
        const td5 = row.insertCell(5);
        td0.innerText = item.display ? item.display : item.name;
        td1.innerText = txt;
        if(item.type == "acmali" || item.type == "type") {
            td2.innerHTML = `	
            <div class="custom-switch pl-0">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; <input class="custom-switch-input" id="${item.name}_d" type="checkbox" ${item.value ? "checked" : ""}>
<label class="custom-switch-btn" for="${item.name}_d" style="align-items: left;"></label>
            </div>`
        }
        if(item.type == "puan") {
            td2.innerHTML = `<center><input type="text" id="${item.name}_d" class="form-control" style="width: 60px" placeholder="${item.value ? item.value : "Ayarlanmamış"}"></input></center>`
        }
        if(item.type == "kanal" || item.type == "kanallar") {
            if(item.type == "kanal") {
                td2.innerHTML = `<select class="form-control" style="background-color: #292f52; color: whitesmoke;" id="${item.name}_d"></select>`
            } else {
                td2.innerHTML = `<select multiple class="form-control" data-mdb-filter="true" id="${item.name}_d"></select>`
            }

            if(!["TEXT","VOICE","CATEGORY"].includes(item.ctype)) GetAPI(2, "CATVOICE", `${item.name}_d`)
            if(item.ctype == "TEXT")  GetAPI(2, "TEXT", `${item.name}_d`)
            if(item.ctype == "VOICE") GetAPI(2, "VOICE", `${item.name}_d`)
            if(item.ctype == "CATEGORY") GetAPI(2, "CATEGORY", `${item.name}_d`)
    
            $(document).ready(function() {
                $(`#${item.name}_d`).select2({
                  
                    tags: true,
                });
            });
    
        }
        if(item.type == "rol" || item.type == "roller") {
            if(item.type == "rol") {
                td2.innerHTML = `<select class="form-control" style="background-color: #292f52; color: whitesmoke;" id="${item.name}_d"></select>`
               
            } else {
                td2.innerHTML = `<select multiple class="form-control" data-mdb-filter="true" id="${item.name}_d"></select>`
               
            }
            
            $(document).ready(function() {
                $(`#${item.name}_d`).select2({
                  
                    tags: true,
                });
            });
                GetAPI(1, "ALL", `${item.name}_d`)
        
        }  
        td3.innerHTML = `<button type="button" id="${item.name}" onclick="update('${item.name}', '${item.type}', false, true)"  name="güncelle" class="btn btn-secondary">Güncelle</button>`;
       if(item.type == "roller" || item.type == "kanallar" || item.type == "puan"){
         td5.innerHTML = `<button type="button" id="${item.name}" onclick="update('${item.name}', '${item.type}', true, true)" name="sıfırla" class="btn btn-danger">Sıfırla</button>`
            td4.innerHTML = `<button type="button"  class="btn btn-primary" onclick="SweetAlertInfo({title: '${item.name}', desc: '${item.description}'})">Bilgilendirme</button>`
        } else {
            td4.innerHTML = `<button type="button" class="btn btn-primary" onclick="SweetAlertInfo({title: '${item.name}', desc: '${item.description}'})">Bilgilendirme</button>`
        }
    })
}

async function get_backup() {
    let _get  = await fetch(`${API.url}/get?type=20`, { 

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
    let _result = await _get.text();
    const link = document.createElement("a");
    const content = _result;
    const file = new Blob([content], { type: 'application/json' });
    link.href = URL.createObjectURL(file);
    link.download = `Synlio-${String(JSON.parse(_result).Date)}.acar`;
    link.click();
    URL.revokeObjectURL(link.href);
}
function reset_staffs() {
    Swal.fire({
                        title: `Tüm Yetkiler Temizleniyor`,
                        html: `Sunucunuzun tüm yetkileri temizlemek istiyor musunuz?`,
                        type: "warning",
                        showCancelButton: !0,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Evet",
                        cancelButtonText: "Geri Dön!",
                        footer: `<span style="color: whitesmoke;">Bu işlem sonucu kurulumu tekrardan yapmanız gerekecek.</span>`,
                    }).then((e) => {
                        if(e.value == true) {
                            postData(`${API.url}/format/set`, {
                                type: "STAFF"
                            })
                            Swal.fire(
                                `Başarılı!`,
                                `Başarıyla tüm yetki verileri temizlendi.`,
                                'success'
                            );
                        }
                    })
}
function reset_setup() {
    Swal.fire({
                        title: `Tüm Ayarlar Sıfırlanıyor`,
                        html: `Sunucunuzun tüm ayarlarının sıfırlanmasını istiyor musunuz?`,
                        type: "warning",
                        showCancelButton: !0,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Evet",
                        cancelButtonText: "Geri Dön!",
                        footer: `<span style="color: whitesmoke;">Bu işlem sonucu kurulumu tekrardan yapmanız gerekecek.</span>`,
                    }).then((e) => {
                        if(e.value == true) {
                            postData(`${API.url}/format/set`, {
                                type: "SETUP"
                            })
                            bildirimOluştur(`Botun tüm kurulum verileri temizlendi.`,"success")
                            Swal.fire(
                                `Başarılı!`,
                                `Başarıyla tüm sunucunun kurulum verileri temizlendi.`,
                                'success'
                            );
                            document.getElementById('reset_setup').innerHTML = `
                <div class="alert alert-success left-icon-big alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                        </button>
                        <div class="media">
                            <div class="alert-left-icon-big">
                                <span><i class="mdi mdi-check-circle-outline"></i></span>
                            </div>
                            <div class="media-body">
                                <h5 class="mt-1 mb-2">Sıfırlama başarılı!</h5>
                                <p class="mb-0">Başarıyla tüm botun kurulum verileri temizlendi. Tekrardan yapmanız gerekecek.</p>
                            </div>
                        </div>
                    </div>
                `;
                        }
                    })
}

const GetSettings = async () => {
    let _get  = await fetch(`${API.url}/get?type=0`, { 
       
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
        txt = item.value ? Array.isArray(item.value) ? item.value.map(x => x).join(", ") : item.value == true ? "Açık!" : item.value : "Kapalı!"
        
        const row = table.insertRow();
        const td0 = row.insertCell(0);
        const td1 = row.insertCell(1);
        const td2 = row.insertCell(2);
        const td3 = row.insertCell(3);
        const td4 = row.insertCell(4);
        const td5 = row.insertCell(5);
        td0.innerText = item.display ? item.display : item.name;
        td1.innerText = txt;
        if(item.type == "acmali" || item.type == "type") {
            td2.innerHTML = `	
            <div class="custom-switch pl-0">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; <input class="custom-switch-input" id="${item.name}_d" type="checkbox" ${item.value ? "checked" : ""}>
<label class="custom-switch-btn" for="${item.name}_d" style="align-items: left;"></label>
            </div>`
        }
        if(item.type == "tekil") {
            td2.innerHTML = `<input type="text" class="form-control" id="${item.name}_d" value="${item.value ? item.value : ""}"></input>`
        }
        if(item.type == "cogul") {
            td2.innerHTML = `<input type="text" id="${item.name}_d" class="form-control" placeholder=""></input>`
           
        } 
        if(item.type == "kanal" || item.type == "kanallar") {
            if(item.type == "kanal") {
                td2.innerHTML = `<select class="form-control" style="background-color: #292f52; color: whitesmoke;" id="${item.name}_d"></select>`
            } else {
                td2.innerHTML = `<select multiple class="form-control" data-mdb-filter="true" id="${item.name}_d"></select>`
            }

            if(!["TEXT","VOICE","CATEGORY"].includes(item.ctype)) GetAPI(2, "ALL", `${item.name}_d`)
            if(item.ctype == "TEXT")  GetAPI(2, "TEXT", `${item.name}_d`)
            if(item.ctype == "VOICE") GetAPI(2, "VOICE", `${item.name}_d`)
            if(item.ctype == "CATEGORY") GetAPI(2, "CATEGORY", `${item.name}_d`)
    
            $(document).ready(function() {
                $(`#${item.name}_d`).select2({
                  
                    tags: true,
                });
            });
    
        }
        if(item.type == "rol" || item.type == "roller") {
            if(item.type == "rol") {
                td2.innerHTML = `<select class="form-control" style="background-color: #292f52; color: whitesmoke;" id="${item.name}_d"></select>`
               
            } else {
                td2.innerHTML = `<select multiple class="form-control" data-mdb-filter="true" id="${item.name}_d"></select>`
               
            }
            
            $(document).ready(function() {
                $(`#${item.name}_d`).select2({
                  
                    tags: true,
                });
            });
                GetAPI(1, "ALL", `${item.name}_d`)
        
        }  
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
      return new bootstrap.Popover(popoverTriggerEl)
    })

        td3.innerHTML = `<button type="button" id="${item.name}" onclick="update('${item.name}', '${item.type}', false)"  name="güncelle" class="btn btn-secondary">Güncelle</button>`;
       if(item.type == "roller" || item.type == "kanallar" || item.type == "cogul"){
         td5.innerHTML = `<button type="button" id="${item.name}" onclick="update('${item.name}', '${item.type}', true)" name="sıfırla" class="btn btn-danger">Sıfırla</button>`
            td4.innerHTML = `<button type="button"  class="btn btn-primary" onclick="SweetAlertInfo({title: '${item.display ? item.display : item.name}', desc: '${item.description}'})">Bilgilendirme</button>`
        } else {
            td4.innerHTML = `<button type="button" class="btn btn-primary" onclick="SweetAlertInfo({title: '${item.display ? item.display : item.name}', desc: '${item.description}'})">Bilgilendirme</button>`
        }
    })
}


function SweetAlertInfo(opt) {		
    Swal.fire(
        `${opt.title}`,
        `${opt.desc}`,
        'question'
    )
}

function update(itemname, type, sıfırla = false, stat = false, guard = false) {
    let get = document.getElementById(`${itemname}_d`)
    if(type == "type") {
        if(!guard) postData(`${API.url}/post`, {name: itemname, var: get.checked})
        if(guard) postData(`${API.url}/guard`, {name: itemname, var: get.checked})
    }
    if(type == "acmali") {
        if(!guard) postData(`${API.url}/post`, {name: itemname, var: get.checked})
        if(guard) postData(`${API.url}/guard`, {name: itemname, var: get.checked})
    }
    if(type == "cogul") {
        let cogul = get.value ? get.value.split(' ') : []
        if(sıfırla) cogul = []
        if(!guard) postData(`${API.url}/post`, {name: itemname, var: cogul})
        if(guard) postData(`${API.url}/guard`, {name: itemname, var: cogul})
        get.value = ''
        
    }
    if(type == "tekil") {
        let değer = get.value
        if(!guard) postData(`${API.url}/post`, {name: itemname, var: değer})
        if(guard) postData(`${API.url}/guard`, {name: itemname, var: değer})
    }
    if(type == "limit") {
        let değer = get.value
        if(sıfırla) {
            if(!guard) postData(`${API.url}/post`, {name: itemname, var: Number(1)})
            if(guard) postData(`${API.url}/guard`, {name: itemname, var: Number(10)})
        } else {
            if(!guard) postData(`${API.url}/post`, {name: itemname, var: Number(değer)})
            if(guard) postData(`${API.url}/guard`, {name: itemname, var: Number(değer)})
        }
        
    }
    if(type == "kanal") {
        let değer = get.value
        postData(`${API.url}/post`, {name: itemname, var: değer})
    }
    if(type == "puan") {
        let arr = get.value
        if(sıfırla) {
            postData(`${API.url}/post`, {name: itemname, var: 0.5})
        } else {
            if(isNaN(arr)) return toastr.error(`Lütfen ${itemname} değerine geçerli bir puan belirtin.`, `${itemname}`, {
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
            postData(`${API.url}/post`, {name: itemname, var: Number(arr)})
        }
    }
    if(type == "kanallar") {
        let arr = getArray(`${itemname}_d`)
        if(sıfırla) arr = []
        postData(`${API.url}/post`, {name: itemname, var: arr})
    }
    if(type == "rol") {
        let değer = get.value
        postData(`${API.url}/post`, {name: itemname, var: değer})
    }
    if(type == "roller") {
        let arr = getArray(`${itemname}_d`)
        if(sıfırla) arr = []
        postData(`${API.url}/post`, {name: itemname, var: arr})
    }

    
    toastr.success(`Başarıyla ${itemname} ayarı başarıyla ${sıfırla ? `sıfırlandı.` : `güncellendi.`}`, `${itemname}`, {
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

let _listed = []
const GetAPI = async (type = 0, filter = "ALL", list) => {
let _get  = await fetch(`${API.url}/get?type=${type}&filter=${filter}`, {
    headers: {
        'Content-Type': 'application/json',
        'Authorization': API.token
        },
}).catch(err => {
    
    console.log({
        status: "ERROR",
        statuscode: 200
    })
})
if(!_get) return;
let _result = await _get.json();


let dropdown = document.getElementById(list);
dropdown.length = 0
dropdown.selectedIndex = 0;

_result.sort((b, a) => {
    if(type == 1 || type == 2) return a.position - b.position
}).map((item) => {
    option = document.createElement('option');
    txt = item.value ? Array.isArray(item.value) ? item.value.map(x => x).join(", ") : item.value : "Ayarlanmamış."
    option.text = type == 0 ? `${item.name}: ${txt}` : item.name;
    option.value = type == 0 ? item.name : item.id;
    dropdown.add(option);
})
};


const GetEmojis = async (list) => {
    let _get  = await fetch(`${API.url}/get?type=12`, {
        headers: {
            'Content-Type': 'application/json',
            'Authorization': API.token
            },
    }).catch(err => {
        
        console.log({
            status: "ERROR",
            statuscode: 200
        })
    })
    if(!_get) return;
    let _result = await _get.json();
    
    
    let dropdown = document.getElementById(list);
    dropdown.length = 0
    dropdown.selectedIndex = 0;
    
    _result.map((item) => {
        option = document.createElement('option');
        option.style = `background-image:url(${item.url});`
        option.text = `<img width="16px" width="16px" src="${item.url}"></img> ${item.name}`,
        option.value = item.id;

        dropdown.add(option);
    })
};



async function connection(t) {
    Swal.fire({
        title: `Bağlantı Koptu!`,
        text: `API ile bağlantınız bot ve sunucu verileri yüklenemiyor. Lütfen tekrar deneyin!`,
        type: "error",
        showCancelButton: 0,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: '<i class="fa fa-refresh"></i> Yeniden Dene',
        footer: 'Hala sorun devam ediyorsa <a href="index.php?logout"> tekrar giriş yapın?</a>'
    }).then((e) => {
    
        if(e.value == true) {
            if(t) {
                checkServer();
            } else {
                checkGuild();
            }
        } else {
         
        }
    })
}

async function checkGuild() {
    let _get  = await fetch(`${API.url}/get?type=99`, {
        headers: {
            'Content-Type': 'application/json',
            'Authorization': API.token
            },
    }).catch(err => {
        document.title = `Snyl.io ~ Web Panel [Bağlanılmadı!]` 
        let songüncelleme = document.getElementById("songüncelleme")
        songüncelleme.innerHTML = `Sunucu: Bağlanılamadı! <span class="badge bg-danger"><i class="fa-solid fa-globe fa-beat-fade" style="--fa-beat-fade-opacity: 0.1; --fa-beat-fade-scale: 1.25; color: "></i></span>`
        connection();
    })
    if(!_get) return connection();
    let _result = await _get.json();
    let saniye = 0
    let songüncelleme = document.getElementById("songüncelleme")
    document.title = `Snyl.io ~ Web Panel [${_result ? _result.name : "Bağlanılmadı!"}]` 
    songüncelleme.innerHTML = `Sunucu: ${_result.name} <span class="badge bg-success"><i class="fa-solid fa-globe fa-beat-fade" style="--fa-beat-fade-opacity: 0.1; --fa-beat-fade-scale: 1.25; color: "></i></span>`
    let interval = setInterval(async () => {
        getNotifications();
        paymentCheck();
        _get  = await fetch(`${API.url}/get?type=99`, {
            headers: {
                'Content-Type': 'application/json',
                'Authorization': API.token
                },
        }).catch(err => {
            clearInterval(interval);
            return connection();
        })
        if(!_get) return;
         _result = await _get.json();
         let songüncelleme = document.getElementById("songüncelleme")
         songüncelleme.innerHTML = `Sunucu: ${_result.name} <span class="badge bg-success"><i class="fa-solid fa-globe fa-beat-fade" style="--fa-beat-fade-opacity: 0.1; --fa-beat-fade-scale: 1.25; color: "></i></span>`
    }, 1000)

}

async function checkServer() {
    let _get  = await fetch(`${API.url}/get?type=3`, {
        headers: {
            'Content-Type': 'application/json',
            'Authorization': API.token
            },
    }).catch(err => {
        document.title = `Snyl.io ~ Web Panel [Bağlanılmadı!]` 
        let songüncelleme = document.getElementById("songüncelleme")
        songüncelleme.innerHTML = `Sunucu: Bağlanılamadı! <span class="badge bg-danger"><i class="fa-solid fa-globe fa-beat-fade" style="--fa-beat-fade-opacity: 0.1; --fa-beat-fade-scale: 1.25; color: "></i></span>`
         connection(true);
    })
    if(!_get) return;
    let _result = await _get.json();
    if(!_result) return;
    let songüncelleme = document.getElementById("songüncelleme")
    if(songüncelleme) songüncelleme.innerHTML = `Sunucu: ${_result.name} <span class="badge bg-success"><i class="fa-solid fa-globe fa-beat-fade" style="--fa-beat-fade-opacity: 0.1; --fa-beat-fade-scale: 1.25; color: "></i></span>`
    let server = document.getElementById("server_profile")
    let saniye = 0
    let SunucuIsmi = document.getElementById("getName")
    let SunucuAçıklaması = document.getElementById("getDesc")
    let güncellemeModal = document.getElementById("updateName")
    API.name = _result.name
    SunucuIsmi.value = `${_result.name}`
    SunucuAçıklaması.value = `${_result.description != "Açıklama bulunamadı." ? _result.description : `Bu sunucuda bir açıklama yok, bir açıklama eklemek ister misin?`}`
    güncellemeModal.innerHTML = `${_result.name}`
    document.title = `Snyl.io ~ Web Panel [${_result ? _result.name : "Bağlanılmadı!"}]` 
    Girişler = []
    Sesler = []
    Aktifler = []
    Üyeler = []
    _result.charts.filter(x => (new Date().getTime() - x.tarih) < 604800000).slice(0, 7).map((x, ww) => {
      var days = ['Pazar', 'Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi'];
      var d = new Date(x.tarih);
      Günler.push(days[d.getDay()])
      Girişler.push(x.girişler)
      Sesler.push(x.sesler)
      Üyeler.push(x.üyeler)
      Aktifler.push(x.aktifler)
    })
let interval = setInterval(async () => {
        getNotifications();
        paymentCheck();
        _get = await fetch(`${API.url}/get?type=3`, {
            headers: {
                'Content-Type': 'application/json',
                'Authorization': API.token
                },
        }).catch(err => {
              clearInterval(interval);
              return connection(true);
        })
        if(!_get) return;
        _result = await _get.json();
        let aktifses = document.getElementById("aktifses");
         aktifses.innerHTML = `${_result.stats.voice}`
      
         let aktifdetay = document.getElementById("aktifsesdetay")
         aktifdetay.innerHTML = `<span class="text-success mr-1" >${_result.stats.cams > 0 ? `+${_result.stats.cams}` : "0"}</span><i class="fa fa-video-camera"></i> <span class="text-success mr-1">${_result.stats.streams > 0 ? `+${_result.stats.streams}` : "0"}</span><i class="fa fa-desktop" aria-hidden="true"> | </i> <span class="text-warning mr-1">${_result.stats.mutes > 0 ? `+${_result.stats.mutes}` : "0"}</span><i class="fa fa-microphone-slash" aria-hidden="true"></i> <span class="text-warning mr-1">${_result.stats.deafs > 0 ? `+${_result.stats.deafs}` : "0"}</span><i class="fa-solid fa-headphones"></i>`
        
        let _durum = 0

        if(_result.premiumSubscriptionCount >= 2) _durum = 20
        if(_result.premiumSubscriptionCount >= 4) _durum = 40
        if(_result.premiumSubscriptionCount >= 7) _durum = 50
        if(_result.premiumSubscriptionCount >= 9) _durum = 70
        if(_result.premiumSubscriptionCount >= 11) _durum = 85
        if(_result.premiumSubscriptionCount >= 13) _durum = 95
        if(_result.premiumSubscriptionCount >= 14) _durum = 100

        
        let modal_title = document.getElementById("modal-title")
        let modal_body = document.getElementById("modal-body")


        modal_title.innerHTML = _result.name
        modal_body.innerHTML = `
<center>
<div class="banner2" style="background: url('${_result.banner ? _result.banner : './img/back.jpg'}'); background-repeat: no-repeat; background-origin: content-box; background-size: 450px 180px">
</br><img src="${_result.icon ? _result.icon : "#"}" class="server-profile2"></img>    
</div>
Sunucu taviye ilerleme çubuğu
<div class="progress" style="width: 200px">
<div class="progress-bar bg-warning progress-bar progress-bar-striped progress-bar-animated" style="width:${_durum}%"></div>
</div>
</br>
Sunucuda toplamda <span class="badge bg-success text-white">${_result.members}</span> üye bulunmakta.</br>
Sunucuda toplamda <span class="badge bg-success text-white">${_result.roles}</span> rol bulunmakta.</br>
Sunucuda toplamda <span class="badge bg-success text-white">${_result.channels}</span> kanal bulunmakta. </br>
Sunucuda toplamda <span class="badge bg-success text-white">${_result.emojis}</span> emoji bulunmakta. </br>
Sunucuda toplamda <span class="badge bg-success text-white">${_result.stickers}</span> çıkartma bulunmakta. </br>
Sunucuda toplamda <span class="badge bg-success text-white">${_result.premiumSubscriptionCount}</span> takviye bulunmakta. </br>
Sunucuda takviye seviye durumu <span class="badge bg-${_result.premiumTier == "NONE" ? "secondary" : "success"} text-white">${_result.premiumTier == "NONE" ? `bulunamadı.` : _result.premiumTier}</span></br>
${_result.vanityURL ? `Sunucunun özel davet bağlantısı <span class="badge bg-success text-white">${_result.vanityURL}</span> olarak ayarlanmış`: `Sunucuda özel davet bağlantısı bulunmamakta.`} </br>
Sunucunun güvenlik seviyesi <span class="badge bg-success text-white">${_result.verificationLevel}</span> olarak ayarlanmış.</br>
Sunucu <img src="${_result.owner.avatarURL}" width="16px" style="border-radius: 8px"></img> <b>${_result.owner.tag}</b> kullanıcısı tarafından oluşturuldu.</p>        

<div class="btn-group btn-group-sm">
<a href="${_result.icon ? _result.icon : `#bulunamadı`}" class="btn btn-success">Resim</a>
<a href="${_result.banner ? _result.banner : `#bulunamadı`}" class="btn btn-success">Arkaplan</a>
<a href="${_result.discoverySplashURL ? _result.discoverySplashURL : `#bulunamadı`}" class="btn btn-success">Keşfet Arkaplan</a>
<a href="${_result.splash ? _result.splash : `#bulunamadı`}" class="btn btn-success">Davet Arkaplan</a>
</div>

</center>
`

        let songüncelleme = document.getElementById("songüncelleme")
        songüncelleme.innerHTML = `Sunucu: ${_result.name} <span class="badge bg-success"><i class="fa-solid fa-globe fa-beat-fade" style="--fa-beat-fade-opacity: 0.1; --fa-beat-fade-scale: 1.25; color: "></i></span>`
        
        let uyebilgisi = document.getElementById("toplamüye")
        uyebilgisi.innerHTML = `${binlik(_result.members)}`
        let günlükkatılım = document.getElementById("günlükgiriş")
        let katılımdetayamk = document.getElementById("katılımdetay")
        let girişmk = document.getElementById("günlükkatılım")
        girişmk.innerHTML = `${_result.stats.days} günlük`
        katılımdetayamk.innerHTML = `<svg  width="29" height="22" viewBox="0 0 29 22" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g filter="url(#filter0_d1)">
        <path d="M5 16C5.91797 14.9157 8.89728 11.7277 10.5 10L16.5 13L23.5 4" stroke="#2BC155" stroke-width="2" stroke-linecap="round"/>
        </g>
        <defs>
        <filter id="filter0_d1" x="-3.05176e-05" y="-6.10352e-05" width="28.5001" height="22.0001" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
        <feOffset dy="1"/>
        <feGaussianBlur stdDeviation="2"/>
        <feColorMatrix type="matrix" values="0 0 0 0 0.172549 0 0 0 0 0.72549 0 0 0 0 0.337255 0 0 0 0.61 0"/>
        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/>
        </filter>
        </defs>
    </svg>
    <span class="text-success mr-1" id="günlükkatılım">+${_result.stats.weeks}</span>haftalık <svg  width="29" height="22" viewBox="0 0 29 22" fill="none" xmlns="http://www.w3.org/2000/svg">
    <g filter="url(#filter0_d1)">
    <path d="M5 16C5.91797 14.9157 8.89728 11.7277 10.5 10L16.5 13L23.5 4" stroke="#2BC155" stroke-width="2" stroke-linecap="round"/>
    </g>
    <defs>
    <filter id="filter0_d1" x="-3.05176e-05" y="-6.10352e-05" width="28.5001" height="22.0001" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
    <feOffset dy="1"/>
    <feGaussianBlur stdDeviation="2"/>
    <feColorMatrix type="matrix" values="0 0 0 0 0.172549 0 0 0 0 0.72549 0 0 0 0 0.337255 0 0 0 0.61 0"/>
    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/>
    </filter>
    </defs>
</svg>
<span class="text-success mr-1" id="günlükkatılım">+${_result.stats.montly}</span>aylık`
    


        günlükkatılım.innerHTML = `Çevrim-içi <span class="text-success mr-1" id="günlükkatılım">${binlik(_result.stats.online)} <i class="fa-regular fa-circle-user"></i></span> Çevrim-dışı <span class="text-danger mr-1" id="günlükkatılım">${binlik(_result.stats.offline)} <i class="fa-regular fa-circle-user"></i></span>`
        let takviyebilgisi = document.getElementById("takviyebilgisi")
        takviyebilgisi.innerHTML = `${_result.premiumSubscriptionCount} takviye`
        let takviyeseviyesi = document.getElementById("takviyeseviye")
        takviyeseviyesi.innerHTML = `Sunucu taviye ilerleme çubuğu
        <center><div class="progress" style="width: 150px">
        <div class="progress-bar bg-warning progress-bar progress-bar-striped progress-bar-animated" style="width:${Number(_durum)}%"></div></div></center>
${_result.premiumTier == "NONE" ? "Seviye Bulunamadı!" : _result.premiumTier == "TIER_1" ? "<i class='fa-solid fa-caret-up' style='color: #20c997'></i> 1. Seviye" : _result.premiumTier == "TIER_2" ? `<i class='fa-solid fa-caret-up' style='color: #20c997'></i> 2. Seviye` : _result.premiumTier == "TIER_3" ? `<i class='fa-solid fa-caret-up' style='color: #20c997'></i> 3.Seviye` : `Belirlenemedi.`}`
        
let servername = document.getElementById("sunucubakış")
let serversubtitle = document.getElementById("sunucubakışiki")
let serverprofili = document.getElementById("server-profile")
servername.innerHTML = `Sunucuya Bakış <span class="badge bg-primary">${_result.name}</span>`
serversubtitle.innerHTML = `Aşağıda <b>${_result.name}</b> sunucusunun katılım, ses, aktif, ve kullanıcıların periyodik tablosu belirlenmiştir.`


        let songiren = document.getElementById("songiren")
        songiren.innerHTML = `<img src="${_result.stats.lastmember.avatarURL}" width="16px" style="border-radius: 8px"> <span class="fs-14">${_result.stats.lastmember.tag}</span>`


 
        let günlükgiriş = document.getElementById("günlükgirişyapanlar")
        günlükgiriş.innerHTML = `saatlik <b style="color: #20c997">+${_result.stats.hours}</b> sunucuya katılım`
        let toplamkayıt = document.getElementById("toplamkayıt")
        toplamkayıt.innerHTML = `genel <b style="color: #20c997">+${_result.stats.records}</b> toplam kayıtlı kullanıcı`
        let toplamtaglı = document.getElementById("toplamtaglı")
        toplamtaglı.innerHTML = `genel <b style="color: #20c997">+${_result.stats.taggeds}</b> toplam taglı kullanıcı`

        let sonçıkan = document.getElementById("sonçıkan")
        sonçıkan.innerHTML = `<img src="${_result.stats.leaving.avatarURL}" width="16px" style="border-radius: 8px"> <span class="fs-14">${_result.stats.leaving.tag}</span>`
      
        let sonkayıt = document.getElementById("sonkayıtolan")
        sonkayıt.innerHTML = `<img src="${_result.stats.lrecords.id.avatarURL}" width="16px" style="border-radius: 8px">  <span class="fs-14">${_result.stats.lrecords.id.tag} (${_result.stats.lrecords.name})</span>`
        
        let sontaglı = document.getElementById("sontaglı")
        sontaglı.innerHTML = `<img src="${_result.stats.ltagged.avatarURL}" width="16px" style="border-radius: 8px">  <span class="fs-14">${_result.stats.ltagged.tag}</span>`
    }, 1000)

   }

function binlik(n) {
  n = Number(n) 
  
  if(n < 999) {
    return n
  } else {
    if(n > 9999) {
        if(n > 99999) {
            if(n > 999999) {
                return n
            }
            return n.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, `${String(n)[2]}.`)
        } else {
            return n.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, `${String(n)[1]}.`)
        }
    } else {
        return n.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, `${String(n)[0]}.`)
    }
  }
}

async function postData(url = '', data = {}) {
    let response = await fetch(url, {
        method: 'POST',
        mode: 'cors',
        cache: 'no-cache', 
        credentials: 'same-origin', 
        headers: {
        'Content-Type': 'application/json',
        'Authorization': API.token
        },
        redirect: 'follow', 
        body: JSON.stringify(data),
    });
    return console.log(response.json());
}

function getArray(id) {
    var select = document.getElementById(id);
    var selected = [...select.options]
                    .filter(option => option.selected)
                    .map(option => option.value);
               return selected.reverse()
};

async function refreshStatSettings() {
    let w3;
    let table = document.getElementById('ayarlar');
    let newSettings = await fetch(`${API.url}/get?type=6`, {
        headers: {
            'Content-Type': 'application/json',
            'Authorization': API.token
            },
    }).catch(err => {
        console.log({
            status: "ERROR",
            statuscode: 200
        })
    }).then(async (x) => {
        w3 = await x.json()
        w3.filter(x => x.type != "kategori").map((item, int) => {
            let txt = item.value ? Array.isArray(item.value) ? item.value.map(x => x).join(", ") : item.value == true ? "Açık!" : item.value : "Kapalı!"
            table.rows[1 + int].cells[1].innerHTML = `${txt}`
        })
    })
}

async function refreshGuardSettings() {
    let w3;
    let table = document.getElementById('ayarlar');
    let newSettings = await fetch(`${API.url}/get?type=9`, {
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
        w3.map((item, int) => {
            let txt = item.value ? Array.isArray(item.value) ? item.type == "cogul" ?  `${item.value.length || 0} adet kullanıcı tokeni bulunuyor.` :  item.value.map(x => x).join(", ") : item.value == true ? "Açık!" : item.value : "Kapalı!"
            if(item.type != "BAŞLIK") table.rows[1 + int].cells[1].innerHTML = `${txt}`
        })
    })
}

async function refreshEmojiSettings() {
    let w3;
    let table = document.getElementById('ayarlar');
    await fetch(`${API.url}/get??type=11`, {
            headers: {
                'Content-Type': 'application/json',
                'Authorization': API.token
                },
}).catch(err => {
        console.log({
            status: "ERROR",
            statuscode: 200
        })
    }).then(async (x) => {
        w3 = await x.json()
        return w3.map((item, int) => {
            txt = item.value.url ? `<img height="32px" width="32px" src="${item.value.url}"></img>` : "Bulunamadı!";
            table.rows[1 + int].cells[1].innerHTML = `${txt}`
        })
    })
}

async function refreshSettings() {
    let w3;
    let table = document.getElementById('ayarlar');
    await fetch(`${API.url}/get?type=0`, {
        headers: {
            'Content-Type': 'application/json',
            'Authorization': API.token
            },
}).catch(err => {
        console.log({
            status: "ERROR",
            statuscode: 200
        })
    }).then(async (x) => {
        w3 = await x.json()
        return w3.map((item, int) => {
            let txt = item.value ? Array.isArray(item.value) ? item.value.map(x => x).join(", ") : item.value == true ? "Açık!" : item.value : "Kapalı!"
            table.rows[1 + int].cells[1].innerHTML = `${txt}`
        })
    })
}


function getNotifications(ec){  
    if(ec) {
        return Swal.fire({
            title: `Bildirimlerin Temizlencek!`,
            text: `Tüm bildirim listenizi temizlemek istiyor musunuz?`,
            type: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Evet",
            cancelButtonText: "Geri Dön!",
        }).then((e) => {
            if(e.value == true) {
                $.get('../../deleteNotifications.php', function(data) {
                let numbers = document.getElementById("nofi_count");
                if(!numbers) return;
                numbers.innerHTML = `0`
                let nofi = document.getElementById("nofi_list");
                if(!nofi) return;
                nofi.innerHTML = `<h5>Yeni bir bildirim bulunamadı!</h5>`
    
                   Swal.fire(
                    `Başarılı!`,
                    `Başarıyla tüm bildirimlerin temizlendi!`,
                    'success'
                );
            });
            }
            
        })
    } 
    $.get('./getNotifications.php', function(data) {
        var notifications = JSON.parse( data );  
        let numbers = document.getElementById("nofi_count");
        if(!numbers) return;
        numbers.innerHTML = `${notifications.length || 0}`
        let nofi = document.getElementById("nofi_list");
        if(!nofi) return;
        let panel = ''
        if((notifications.length || 0) <= 0) {
            nofi.innerHTML = `<h5>Yeni bir bildirim bulunamadı!</h5>`
        } else  {
          notifications.sort((a, b) => b.id - a.id).map(x => {
            panel += `<li>
            <div class="timeline-badge ${x.warning}"></div>
            <a class="timeline-panel text-muted" href="#">
                <span>${x.author}</span>
                <span>${tarihHesapla(x.time)}</span>
                <h6 class="mb-0">${x.text}</h6>
            </a>
           </li>`
          })
          nofi.innerHTML = `${panel}`
        }
     
      });
}  


function tarihHesapla (date)  {
    const startedAt = Date.parse(date);
    var msecs = Math.abs(new Date() - startedAt);
    const years = Math.floor(msecs / (1000 * 60 * 60 * 24 * 365));
    msecs -= years * 1000 * 60 * 60 * 24 * 365;
    const months = Math.floor(msecs / (1000 * 60 * 60 * 24 * 30));
    msecs -= months * 1000 * 60 * 60 * 24 * 30;
    const weeks = Math.floor(msecs / (1000 * 60 * 60 * 24 * 7));
    msecs -= weeks * 1000 * 60 * 60 * 24 * 7;
    const days = Math.floor(msecs / (1000 * 60 * 60 * 24));
    msecs -= days * 1000 * 60 * 60 * 24;
    const hours = Math.floor(msecs / (1000 * 60 * 60));
    msecs -= hours * 1000 * 60 * 60;
    const mins = Math.floor((msecs / (1000 * 60)));
    msecs -= mins * 1000 * 60;
    const secs = Math.floor(msecs / 1000);
    msecs -= secs * 1000;
    var string = "";
    if (years > 0) string += `${years} yıl`
    else if (months > 0) string += `${months} ay ${weeks > 0 ? weeks+" hafta" : ""}`
    else if (weeks > 0) string += `${weeks} hafta ${days > 0 ? days+" gün" : ""}`
    else if (days > 0) string += `${days} gün ${hours > 0 ? hours+" saat" : ""}`
    else if (hours > 0) string += `${hours} saat ${mins > 0 ? mins+" dakika" : ""}`
    else if (mins > 0) string += `${mins} dakika`
    else string += `şimdi`;
    string = string.trim();
    return `${string == "şimdi" ? `şimdi` : `${string} önce`} `;
};


function bildirimGönder() {
    let sisim = document.getElementById("gönderen_isim").value
    let gisim = document.getElementById("gönderilecek_isim").value
    let renk = document.getElementById("öncelik").value
    let mesaj = document.getElementById("mesaj").value
    if(!sisim || !gisim || !renk || !mesaj) return Swal.fire(
                    `Hata!`,
                    `Lütfen göndereceğiniz bildirimde boş yer bırakmayın.`,
                    'warning'
    );

    Swal.fire({
    title: `Bildirim gönderilecek!`,
    text: `Belirttiğiniz ${gisim} kullanıcısına bildirim göndermek istediğinize emin misiniz?`,
    type: "warning",
    showCancelButton: !0,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Evet",
    cancelButtonText: "Geri Dön!",
}).then((e) => {
    if(e.value == true) {
        $.ajax({type: "POST", url: 'send-n.php', data: {
            gidenisim: gisim,
            mesaj: mesaj,
            renk: renk,
            gönderen: sisim,
         }, success: function(res, text) {
            console.log(res)
            if(res == "OK") {
                return Swal.fire(
                    `Başarılı!`,
                    `Başarıyla ${gisim} isimli kullanıcıya başarıyla bildirim gönderildi!`,
                    'success'
                );
            }
            if(res == "HATA") {
                return Swal.fire(
                    `Hata!`,
                    `Belirttiğiniz ${gisim} isimli kullanıcıya bildirim gönderilemedi.`,
                    'warning'
                ); 
            }
            if(res == "NO-USER") {
                return Swal.fire(
                    `Hata!`,
                    `Belirttiğiniz kullanıcı sistemde bulunamadığından bildirim gönderilemedi.`,
                    'warning'
                ); 
            }
       
}});
    }
})
}

function bildirimOluştur (mesaj, renk, giden) {
    $.ajax({type: "POST", url: 'send-n.php', data: { mesaj: mesaj, renk: renk, sistem: "1", }, success: function(res, text) {}});
}

async function paymentCheck() {
    let _get  = await fetch(`${API.url}/powerStatus`, {
        headers: {
            'Authorization': API.token
            },
    }).catch(err => {
      
    })
    if(!_get) return;
    let _result = await _get.json();
    let docs = document.getElementById("status-payment");
    if(docs && _result.status != "NO-PAYMENT") docs.style = "display: none;"
    if(docs && _result.status == "NO-PAYMENT") docs.innerHTML = `<strong>Bilgi</strong> Gecikmiş ödemeniz bulunduğundan botlarınız tamamen kapatıldı. Ödeme gerçekleştiğinde botlarınızı kullanmaya devam edebilirsiniz.`,
    docs.style = "display: block;"
}


function balanceUpdate(id) {
    Swal.fire({
        icon: 'question',
        text: 'Yeni bakiye belirtin:',
        title: 'Bakiye Güncelleme',
        input: 'text',
        inputAttributes: {
            autocapitalize: 'off'
        },
        showCancelButton: false,
        confirmButtonText: 'Güncelle',
        showLoaderOnConfirm: false,
        preConfirm: (miktar) => {
            if(isNaN(miktar)) {
                return Swal.fire(
                "Başarısız Güncelleme!",
                `Belirtiğiniz bakiye rakam cinsinde olmalı.`,
                'error',
    


            );
            }
            $.ajax({type: "POST", url: 'edit-balance.php', data: { 
        miktar : Number(miktar), 
        id: id
    }, success: function(res) {
                return Swal.fire(
                "Başarılı Güncelleme!",
                 `Başarılı bir şekilde ${miktar} ₺ olarak bakiyesi ayarlandı.`,
                'success',
            


            );
                }});
        }
        })
}

function clearDescription() {
    let description = document.getElementById("getDesc")
    description.value = `Bu sunucuda bir açıklama yok, bir açıklama eklemek ister misin?`	
    toastr.success(`Başarıyla ${API.name} sunucusunun açıklaması kaldırıldı.`, `Başarılı`, {
            timeOut: 500000000,
            closeButton: !0,
            debug: !1,
            newestOnTop: !0,
            progressBar: !0,
            positionClass: "toast-top-right",
            preventDuplicates: !0,
            onclick: null,
            showDuration: "300",
            hideDuration: "1000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
            tapToDismiss: !1
        })


    postData(`${API.url}/edit`, {
        type: "GUILD",
        description: null,
    })
    
}

function updateGuild() {
    let name = document.getElementById("getName")
    let description = document.getElementById("getDesc")
    let iconURL = document.getElementById("getIcon")
    let bannerURL = document.getElementById("getBanner")
    let splashURL = document.getElementById("getSplash")
    let discoverySplashURL = document.getElementById("getDiscoverySplash")
    
    toastr.success(`Başarıyla ${API.name} sunucusunun ayarları güncellendi.`, `Başarılı`, {
            timeOut: 500000000,
            closeButton: !0,
            debug: !1,
            newestOnTop: !0,
            progressBar: !0,
            positionClass: "toast-top-right",
            preventDuplicates: !0,
            onclick: null,
            showDuration: "300",
            hideDuration: "1000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
            tapToDismiss: !1
        })


    postData(`${API.url}/edit`, {
        type: "GUILD",
        name: name.value != API.name ? name.value : undefined,
        splashURL: splashURL.value ? splashURL.value : undefined,
        iconURL: iconURL.value ? iconURL.value : undefined,
        bannerURL: bannerURL.value ? bannerURL.value : undefined,
        discoverySplashURL: discoverySplashURL.value ? discoverySplashURL.value : undefined,
        description: description.value != "Bu sunucuda bir açıklama yok, bir açıklama eklemek ister misin?" ? description.value : undefined,
    })
    
}