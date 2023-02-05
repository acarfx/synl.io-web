async function row_delete_all_punitives() {
    Swal.fire({
        title: `Cezalar temizleniyor!`,
        html: `Sunucunuzun tüm ceza veritabanlarının temizlenmesini istiyor musun?`,
        type: "warning",
        showCancelButton: !0,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Evet",
        cancelButtonText: "Geri Dön!",
        footer: `<span style="color: whitesmoke;">Bu işlem tüm veritabanını temizleyerek kayıt bırakmaz. Kalıcı olarak temizler.</span>`,
    }).then((e) => {
        if(e.value == true) {
            postData(`${API.url}/punitives/purge`, {})
            bildirimOluştur("Sunucunun tüm ceza verileri kaldırıldı.","secondary")
            Swal.fire(
                `Başarılı!`,
                `Başarıyla tüm ceza verileri kaldırıldı!`,
                'success'
            );
        }
    })
}

async function GetPunitives() {
    let _get  = await fetch(`${API.url}/get?type=Punitives`, {
        headers: {
            'Authorization': API.token
            },
    })
    if(!_get) return;
    _get = await _get.json();
    var t = $('#example2').DataTable();
    if(_get && t) {
        $(document).ready(function() {
            _get.sort((a, b) => Date.parse(b.Date) - Date.parse(a.Date)).forEach(async (x, index) => {
                let member = await GetMember(x.Member)
                if(!member) return;
                let staff = await GetMember(x.Staff)
                t.row.add( [
                        `${index + 1}`,
                        `${member.avatarURL ? `<img class="server-profile2" style="width: 30px" src="${member.avatarURL}"></img>` : ""} ${member.tag}`,
                        `${staff ? staff.avatarURL ? `<img class="server-profile2" style="width: 30px" src="${staff.avatarURL}"></img> ${staff.tag}` : staff.displayAvatarURL ? `<img class="server-profile2" style="width: 30px" src="${staff.displayAvatarURL}"></img> ${staff.tag}` : `${staff.tag}` : `Yetkili Bulunamadı!`}`,
                        `${x.Type} <span class="badge bg-${x.Active ? x.Type == "Uyarılma" ? "primary"  : "success"  : "secondary"}" style="color: whitesmoke;">${x.Active ? x.Type == "Uyarılma" ? "UYARI" : "AKTİF" : "BİTTİ"}</span>`,
                        `${x.Reason}`,
                        `${tarihHesapla(x.Date)}`,
                   ]).draw()
            
       })
    });
    }
}

function timing(duration) {  
    let arr = []
    if (duration / 3600000 > 1) {
      let val = parseInt(duration / 3600000)
      let durationn = parseInt((duration - (val * 3600000)) / 60000)
      arr.push(`${val} Saat`)
      arr.push(`${durationn} Dk.`)
    } else {
      let durationn = parseInt(duration / 60000)
      arr.push(`${durationn} Dk.`)
    }
    return arr.join(", ") };