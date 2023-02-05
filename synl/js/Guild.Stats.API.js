async function row_delete_all_stats() {
    Swal.fire({
        title: `Veriler kaldırılıyor!`,
        html: `Sunucunuzun tüm istatistik veritabanlarının temizlenmesini istiyor musun?`,
        type: "warning",
        showCancelButton: !0,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Evet",
        cancelButtonText: "Geri Dön!",
        footer: `<span style="color: whitesmoke;">Bu işlem tüm veritabanını temizleyerek kayıt bırakmaz. Kalıcı olarak temizler.</span>`,
    }).then((e) => {
        if(e.value == true) {
            postData(`${API.url}/stats/purge`, {})
            bildirimOluştur("Sunucunun tüm istatistik verileri kaldırıldı.","danger")
            Swal.fire(
                `Başarılı!`,
                `Başarıyla tüm istatistik verileri kaldırıldı!`,
                'success'
            );
        }
    })
}

async function purge_stats(a) {
    if(a) {
        let member = await GetMember(a)
        if(!member) return Swal.fire(
            `Hata!`,
            `Böyle bir kullanıcı bulunamadı!`,
            'warning'
        );
        Swal.fire({
            title: `Bir veri kaldırılacak!`,
            html: `Belirttiğiniz ${member.tag} kullanıcısının tüm istatistik verilerinin silinmesini istiyor musun?`,
            type: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Evet",
            cancelButtonText: "Geri Dön!",

        }).then((e) => {
            if(e.value == true) {
                postData(`${API.url}/stats/delete`, {
                    id: member.id
                })
                Swal.fire(
                    `Başarılı!`,
                    `Başarıyla ${member.tag} kullanıcısının tüm istatistik verileri temizlendi!`,
                    'success'
                );
            }
        })
    }  else {
        Swal.fire({
            title: `Sunucu istatistikleri sıfırlanacak!`,
            html: `Sunucunuzun tüm zaman boyunca kayıt edilen istatistik verileri temizlenmesini istiyor musun?`,
            type: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Evet",
            cancelButtonText: "Geri Dön!",
            footer: `<span style="color: whitesmoke;">Bu işlem sadece istatistik verilerini temizler.</span>`,
        }).then((e) => {
            if(e.value == true) {
                postData(`${API.url}/stats/reset`, {})
                bildirimOluştur("Sunucunun tüm istatistik verileri temizlendi.","danger")
                Swal.fire(
                    `Başarılı!`,
                    `Başarıyla tüm veriler ve seviyeler temizlendi!`,
                    'success'
                );
            }
        })
    }
}
async function GetListStats() {
    let _get  = await fetch(`${API.url}/stats`, {
        headers: {
            'Authorization': API.token
            },
    })
    if(!_get) return;
    _get = await _get.json();
    var t = $('#example2').DataTable();
    if(_get && t) {
        $(document).ready(function() {
            _get.sort((a, b) => b.lifeTotalVoiceStats - a.lifeTotalVoiceStats).forEach(async (x, index) => {
                let member = await GetMember(x.userID)
                if(!member) return;
                t.row.add( [
                        `${index + 1}`,
                        `${member.avatarURL ? `<img class="server-profile2" style="width: 30px" src="${member.avatarURL}"></img>` : ""} ${member.tag}`,
                        `${timing(x.lifeTotalVoiceStats)}`,
                        `${x.lifeTotalChatStats} mesaj`,
                        `${timing(x.totalVoiceStats)}`,
                        `${x.totalChatStats} mesaj`,
                        `<span class="badge bg-secondary" style="color: whitesmoke;"><i class="fa-solid fa-headphones"></i></span><span class="badge badge badge-outline-warning" style="color: whitesmoke; margin-left: 5px;">${x.voiceLevel} Sv.</span><span class="badge badge badge-outline-secondary" style="color: whitesmoke; margin-left: 5px;">%${Math.floor((x.voiceXP ? x.voiceXP.toFixed(1) : 0)/((x.voiceLevel + 1) * 447)*100)}</span>`,
                        `<span class="badge bg-secondary" style="color: whitesmoke;"><i class="fa fa-message"></i></span><span class="badge badge badge-outline-warning" style="color: whitesmoke; margin-left: 5px">${x.messageLevel} Sv.</span><span class="badge badge badge-outline-secondary" style="color: whitesmoke; margin-left: 5px;">%${Math.floor((x.messageXP ? x.messageXP.toFixed(1) : 0)/((x.messageLevel + 1) * 647)*100)}</span>`,
                        `<button type="button" class="btn btn-danger" style="width: 100px; height: 30px; border-radius: 0.275rem; padding: 1px; font-size:12px;" onclick="purge_stats('${member.id}')"><i class="fa fa-times"></i> Temizle</button>`,
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