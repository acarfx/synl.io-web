let edit_user_id = ''
let dataSet = [

];
async function patchMember(id, type, reset) {
        let member = await GetMember(id)
        if(!member) return Swal.fire(
            `Hata!`,
            `Böyle bir kullanıcı bulunamadı!`,
            'warning'
        );
        
        if(type == "NICKNAME") {
                if(reset) {
                    return Swal.fire({
                        title: `İsim Sıfırlanıyor!`,
                        text: `Belirttiğiniz ${member.username} kullanıcısının ismini sıfırlamak istiyor musunuz?`,
                        type: "warning",
                        showCancelButton: !0,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Evet",
                        cancelButtonText: "Geri Dön!",
                    }).then((e) => {
                        if(e.value == true) {
                            patchData(`${API.url}/users`, {
                                type: "NICKNAME",
                                id: edit_user_id
                            })
                            bildirimOluştur(`Sunucuda ${member.tag} kullanıcısının ismi sıfırlandı.`, "info");
                            Swal.fire(
                                `Başarılı!`,
                                `Başarıyla ${member.tag} kullanıcısının ismi sıfırlandı.`,
                                'success'
                            ); 
                        }
                    })
                } 
                let new_string = document.getElementById('get_name').value
                if(!new_string) return Swal.fire(
                    `Hata!`,
                    `${member.username} kullanıcısının yeni ismini boş bırakamazsınız.`,
                    'warning'
                ); 
                Swal.fire({
                    title: `İsim Güncelleniyor!`,
                    text: `Belirttiğiniz ${member.username} kullanıcısının ismini ${new_string} olarak ayarlamak istiyor musunuz?`,
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Evet",
                    cancelButtonText: "Geri Dön!",
                }).then((e) => {
                    if(e.value == true) {
                        patchData(`${API.url}/users`, {
                            type: "NICKNAME",
                            id: edit_user_id,
                            value: new_string
                        })
                        bildirimOluştur(`Sunucuda ${member.tag} kullanıcısının ismi ${new_string} olarak ayarlandı.`, "info");
                        Swal.fire(
                            `Başarılı!`,
                            `Başarıyla ${member.username} kullanıcısının ismi ${new_string} olarak ayarlandı.`,
                            'success'
                        ); 
                    }
                })
        }
        if(type == "TIMEOUT") {
            if(reset) {
                return Swal.fire({
                    title: `Zaman aşımı kaldırılıyor!`,
                    text: `Belirttiğiniz ${member.username} kullanıcısının zaman aşımını kaldırmak istiyor musunuz?`,
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Evet",
                    cancelButtonText: "Geri Dön!",
                }).then((e) => {
                    if(e.value == true) {
                        patchData(`${API.url}/users`, {
                            type: "TIMEOUT",
                            id: edit_user_id,
                            reason: "KALDIRILDI!"
                        })
                        bildirimOluştur(`Sunucuda ${member.tag} kullanıcısının zaman aşımı kaldırıldı.`, "info");
                        Swal.fire(
                            `Başarılı!`,
                            `Başarıyla ${member.tag} kullanıcısının zaman aşımı kaldırıldı.`,
                            'success'
                        ); 
                    }
                })
            } 
            let new_string = document.getElementById('get_time').value
            if(!new_string) return Swal.fire(
                `Hata!`,
                `${member.username} kullanıcısına zaman aşımı atabilmeniz için dakika cinsinden zaman belirleyin.`,
                'warning'
            ); 
            let reason_string = document.getElementById('get_reason').value
            Swal.fire({
                title: `Zaman Aşımı!`,
                text: `Belirttiğiniz ${member.username} kullanıcısına ${new_string} dakika boyunca zaman aşımı atmak istiyor musunuz?`,
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Evet",
                cancelButtonText: "Geri Dön!",
            }).then((e) => {
                if(e.value == true) {
                    patchData(`${API.url}/users`, {
                        type: "TIMEOUT",
                        id: edit_user_id,
                        min: Number(new_string),
                        reason: reason_string ? reason_string : undefined,
                    })
                    bildirimOluştur(`Sunucuda ${member.tag} kullanıcısına ${new_string} dakika zaman aşımı uygulandı.`, "info");
                    Swal.fire(
                        `Başarılı!`,
                        `Başarıyla ${member.username} kullanıcısına ${new_string} dakika boyunca zaman aşımı atıldı.`,
                        'success'
                    ); 
                }
            })
    }
    if(type == "BAN") {
        let new_string = document.getElementById('get_reason_ban').value
        Swal.fire({
            title: `Yasaklanmak üzere!`,
            html: `Belirttiğiniz ${member.username} kullanıcısını sunucudan yasaklamak istiyor musunuz?`,
            type: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Evet",
            cancelButtonText: "Geri Dön!",
        }).then((e) => {
            if(e.value == true) {
                patchData(`${API.url}/users`, {
                    type: "BAN",
                    id: edit_user_id,
                    reason: new_string ? new_string : undefined,
                }).then(sonuç => {
                    if(sonuç == "ERROR") return Swal.fire(
                        `Başarısız!`,
                        `Sunucudan ${member.username} kullanıcısını yasaklamaya yetkim yetmiyor.`,
                        'error'
                    ); 
                    bildirimOluştur(`Sunucuda ${member.tag} kullanıcısı yasaklandı.`, "warning");
                    Swal.fire(
                        `Başarılı!`,
                        `Başarıyla ${member.username} kullanıcısı yasaklandı.`,
                        'success'
                    ); 
                }).catch(err => {
                    Swal.fire(
                        `Başarısız!`,
                        `Sunucudan ${member.username} kullanıcısı yasaklanamadı.`,
                        'error'
                    ); 
                })
            }
        })
    }
    if(type == "KICK") {
        let new_string = document.getElementById('get_reason_kick').value
        Swal.fire({
            title: `Atılmak üzere!`,
            html: `Belirttiğiniz ${member.username} kullanıcısını sunucudan atmak istiyor musunuz?`,
            type: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Evet",
            cancelButtonText: "Geri Dön!",
        }).then((e) => {
            if(e.value == true) {
                patchData(`${API.url}/users`, {
                    type: "KICK",
                    id: edit_user_id,
                    reason: new_string ? new_string : undefined,
                }).then(sonuç => {
                    if(sonuç == "ERROR") return Swal.fire(
                        `Başarısız!`,
                        `Sunucudan ${member.username} kullanıcısını atmaya yetkim yetmiyor.`,
                        'error'
                    ); 
                    bildirimOluştur(`Sunucuda ${member.tag} kullanıcısı atıldı.`, "warning");
                    Swal.fire(
                        `Başarılı!`,
                        `Başarıyla ${member.username} kullanıcısı atıldı.`,
                        'success'
                    ); 
                }).catch(err => {
                    Swal.fire(
                        `Başarısız!`,
                        `Sunucudan ${member.username} kullanıcısı yasaklanamadı.`,
                        'error'
                    ); 
                })
            }
        })
    }
    if(type == "ROLE") {
        let new_string = document.getElementById('get_role').value
        if(!new_string) return Swal.fire(
            `Hata!`,
            `${member.username} kullanıcısına rol verip alabilmeniz için bir rol seçin.`,
            'warning'
        );
        let rol = await GetRole(new_string)
        if(rol) rol = rol[0];
        if(!rol) return Swal.fire(
            `Hata!`,
            `Belirtilen rol sunucuda bulunamadı.`,
            'warning'
        );

        Swal.fire({
            title: `Rol Ver/Al!`,
            html: `Belirttiğiniz ${member.username} kullanıcısına <span style="color: ${rol.color};">@${rol.name}</span> rolünü vermek veya almak istiyor musunuz?`,
            type: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Evet",
            cancelButtonText: "Geri Dön!",
        }).then((e) => {
            if(e.value == true) {
                patchData(`${API.url}/users`, {
                    type: "ROLE",
                    id: edit_user_id,
                    value: new_string,
                }).then(sonuç => {
                    if(sonuç == "ROL VERİLDİ!") {
                        bildirimOluştur(`Sunucuda ${member.tag} kullanıcısına ${rol.name} rolü verildi.`, "info");
                        Swal.fire(
                            `Başarılı!`,
                            `Başarıyla ${member.username} kullanıcısına <span style="color: ${rol.color};">@${rol.name}</span> rolü verildi.`,
                            'success'
                        ); 
                    }
                    if(sonuç == "ROL ALINDI!") {
                        bildirimOluştur(`Sunucuda ${member.tag} kullanıcısından @${rol.name} rolü alındı.`, "info");
                        Swal.fire(
                            `Başarılı!`,
                            `Başarıyla ${member.username} kullanıcısından <span style="color: ${rol.color};">@${rol.name}</span> rolü alındı.`,
                            'success'
                        ); 
                    }
                })
            }
        })
    }
}


async function set_user(id, type) {
    let member = await GetMember(id)
    if(!member) return Swal.fire(
        `Hata!`,
        `Böyle bir kullanıcı bulunamadı!`,
        'warning'
    );
    edit_user_id = `${id}`

    if(type == "NICKNAME") {
        let new_string = document.getElementById('get_name')
        if(new_string) new_string.value = member.username
        let update_string = document.getElementById('update_nick')
        if(update_string) update_string.innerText = `${member.tag} kullanıcısı düzenleniyor`
    }
    if(type == "TIMEOUT") {
        let update_string = document.getElementById('title_zamanaşımı')
        if(update_string) update_string.innerText = `${member.tag} kullanıcısına zaman aşımı`
    }
    if(type == "BAN") {
        let update_string = document.getElementById('title_ban')
        if(update_string) update_string.innerText = `${member.tag} kullanıcısını yasakla`
    }
    if(type == "KICK") {
        let update_string = document.getElementById('title_kick')
        if(update_string) update_string.innerText = `${member.tag} kullanıcısını at`
    }
    if(type == "ROLE") {
        let new_string = document.getElementById('get_role')
        if(new_string) GetAPI(1, "ALL", `get_role`)
        let update_string = document.getElementById('title_role')
        if(update_string) update_string.innerText = `${member.tag} kullanıcısına rol ver/al`
    }
}

async function patchData(url = '', data = {}) {
    return new Promise(async function (s, h) {
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
        }).catch(err => {});
        if(response) {
            s(response.text());
        } else {
            h("ERROR");
        }
    })
}


async function test() {
    let _get  = await fetch(`${API.url}/get?type=13`, {
        headers: {
            'Authorization': API.token
            },
    })
    if(!_get) return;
    _get = await _get.json();
    if(_get) {
      let arr = _get.reverse().map(async (x, index) => {
           
               
               return [
                `${index + 1}`,
                `${x.userId}`,
                `${x.displayAvatarURL ? `<img class="server-profile2" style="width: 30px" src="${x.displayAvatarURL}"></img>` : ""} ${x.tag} ${x.owner ? `<img class="server-profile2" style="width: 18px; margin-bottom: 5px;" src="https://cdn.discordapp.com/attachments/1018257816638734338/1027280623372607498/staffowner.png"></img>` : ``} ${x.premiumSinceTimestamp ? `<img class="server-profile2" style="width: 16px; margin-bottom: 5px;" src="https://cdn.discordapp.com/attachments/1018257816638734338/1027280623762681937/TwoTonePentagoneBoost.png"></img>` : ``}`,
                `${x.displayName}`,
                `${tarih(x.joinedTimestamp)}`,
                `${x.roller.map(element => `<span style="color: ${element.color};">@${element.name}</span>`).join(", ")}`,
                `<button type="button" class="btn btn-secondary" style="width: 100px; padding: 1px; font-size:12px;" data-bs-toggle="modal" data-bs-target="#updateNickname" onclick="set_user('${x.userId}', 'NICKNAME')"><i class="fa fa-pen"></i> İsim Değiştir</button>
                <button type="button" class="btn btn-success" style="width: 100px; padding: 1px; font-size:12px;"  data-bs-toggle="modal" data-bs-target="#updateRole" onclick="set_user('${x.userId}', 'ROLE')"><i class="fa fa-plus"></i> Rol Ver / Al</button>
                <button type="button" class="btn btn-secondary light" style="width: 100px; padding: 1px; font-size:12px;" data-bs-toggle="modal" data-bs-target="#setTimeout" onclick="set_user('${x.userId}', 'TIMEOUT')"><i class="fa fa-clock"></i> Zaman aşımı</button>
                <button type="button" class="btn btn-danger light" style="width: 100px; padding:  1px; font-size:12px;" data-bs-toggle="modal" data-bs-target="#setBan" onclick="set_user('${x.userId}', 'BAN')"><i class="fa fa-times"></i> Yasakla</button>
                <button type="button" class="btn btn-warning light" style="width: 100px; padding: 1px; font-size:12px;" data-bs-toggle="modal" data-bs-target="#setKick" onclick="set_user('${x.userId}', 'KICK')""><i class="fa fa-hammer"></i> At</button>`
            ]
        
   })
        dataSet = await Promise.all(arr);
        $(document).ready(function() {
          
           $('#example2').DataTable({
            data: dataSet,
            columns: [
                { title: '#' },
                { title: 'ID' },
                { title: 'KULLANICI ADI' },
                { title: 'SUNUCU ADI' },
                { title: 'OLUŞTURMA TARİHİ' },
                { title: 'ÜZERİNDE BULUNAN ROLLER' },
                { title: 'İŞLEMLER'}
            ],
        });
    });
    }
}

test()
        
  

var aylar = new Array("Ocak", "Şubat", "Mart", "Nisan", "Mayıs", "Haziran", "Temmuz", "Ağustos", "Eylül", "Ekim", "Kasım", "Aralık");
var gunler = new Array("Pazar", "Pazartesi", "Salı", "Çarşamba", "Perşembe", "Cuma", "Cumartesi");
function tarih(date) {
    var now = new Date(date);
    var yil = now.getFullYear();
    var ay = now.getMonth();
    var gun = now.getDate();
    var haftagun = now.getDay();       
    var saat = now.getHours();
    var dakika = now.getMinutes();
    saat = sifirekle(saat);
    dakika = sifirekle(dakika);
    return `${gun + " " + aylar[ay] + " " + yil + " " + gunler[haftagun] + " " + saat + ":" + dakika}`
}
function sifirekle(sayi) {
    if (sayi < 10) {
        return "0" + sayi.toString();
    } else {
        return sayi.toString();
    }
}