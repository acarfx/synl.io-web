
async function PackageBuy() {
    let _get  = await fetch(`${API.url}/get?type=10`, {
        headers: {
                'Authorization': API.token
            },
    })
    if(!_get) return;
    _get = await _get.json();


        Swal.fire({
            title: `Paketiniz yenileniyor!`,
            text: `Şuan bulunduğunuz ${_get.Name} isimli paketin ${_get.Price} ₺ yenilenmesini istiyor musun?`,
            type: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Evet",
            cancelButtonText: "Geri Dön!",
        }).then((e) => {
            if(e.value == true) {
                $.ajax({type: "POST", url: 'payment.php', data: { miktar : _get.Price, tip: "-", package: "Bu bir paket!" }, success: function(res, text) {
                    if(res == "OK") {
                        return Swal.fire(
                            `Başarılı!`,
                            `Başarıyla ${_get.Name} isimli paketinizi yenilendiniz. Güle güle kullanın!`,
                            'success'
                        ),PackageGet(true), bildirimOluştur(`Ödemeniz ${_get.Price} ₺ olarak gerçekleşti.`, "success");
                    }
                    if(res == "BAKIYE") {
                        return Swal.fire(
                            `Hata!`,
                            `Paketinizi yenilemek için yeterli bakiyeniz bulunamadı.`,
                            'warning'
                        ); 
                    }
                    if(res == "HATA") {
                        return Swal.fire(
                            `Hata!`,
                            `Bir hata oluşuğu için işleme iptal edilemedi.`,
                            'warning'
                        ); 
                    }
               
        }});
            }
        })
    
}
async function PackageGet(refresh = false) {
    let _get  = await fetch(`${API.url}/get?type=10`, {
        headers: {
            'Authorization': API.token
            },
    })
    if(!_get) return;
    
    var açıklama = document.getElementById('package_desc');
    var isim = document.getElementById('package_name');
    var tip = document.getElementById('package_type');
    var bitiş = document.getElementById('package_end');
    var başlangıç = document.getElementById('package_start');
    
    var kalangün = document.getElementById('package_days');
    var kalansaat = document.getElementById('package_hours');
    var kalandakika = document.getElementById('package_mins');
    var songüncelleme = document.getElementById('package_updated');

    let t = $('#example3').DataTable();

    _get = await _get.json();
    if(!_get.StartAt) {
        return postData(`${API.url}/package`, {
            type: "START"
        });
    }
    tip.innerHTML = `${_get.Price} ₺`
    isim.innerHTML = `${_get.Name} <span class="badge bg-secondary" style="color: whitesmoke; border-radius: 20px">${_get.Type}</span>`
    açıklama.innerText = `${_get.Desc}`
    başlangıç.innerHTML = `${tarih(_get.StartAt)}`
    songüncelleme.innerHTML = `${tarih(_get.LastPayment ? _get.LastPayment : Date.now())}`
    bitiş.innerHTML = `${tarih(getCookie("end_time"))}`
    kalangün.innerHTML = `${günSay(_get.StartAt, getCookie("end_time"), "GÜN")}`
    kalansaat.innerHTML = `${günSay(_get.StartAt, getCookie("end_time"), "SAAT")}`
    kalandakika.innerHTML = `${günSay(_get.StartAt, getCookie("end_time"), "DAKİKA")}`
    if(refresh) $('#example3').dataTable().fnClearTable();
    if(_get.Payments && t) {
        $(document).ready(function() {
            _get.Payments.sort((a, b) => Number(b.Date) - Number(a.Date)).map((x, index) => {
             t.row.add([
                    `${index + 1}`,
                    `<span class="badge bg-primary" style="color: whitesmoke; border-radius: px">${x.Payment}</span>`,
                    `${tarih(x.Date)}`,
                    `${x.Price} ₺`,
                    `${x.Type}`,
                ]).draw()
            
            })
        });
    } 
}




function günSay(startAt, finishAt, type) {
    baslangic = new Date(Date.now())
    bitis   = new Date(finishAt)
    fark  = Number(bitis - baslangic)

    if(type == "GÜN") return Math.floor(fark/1000/60/60/24)
    if(type == "SAAT") return  Math.floor((fark % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    if(type == "DAKİKA") return Math.floor((fark % (1000 * 60 * 60)) / (1000 * 60))
}


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