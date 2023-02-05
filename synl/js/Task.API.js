function delete_task(id, name, table) {
    Swal.fire({
        title: `Görev kaldırılıyor!`,
        text: `Belirtilen ${name} rolündeki görevi kaldırmak istediğinize emin misiniz?`,
        type: "warning",
        showCancelButton: !0,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Evet",
        cancelButtonText: "Geri Dön!",
    }).then((e) => {
        if(e.value == true) {
               postData(`${API.url}/tasks/delete`, {
                id: id
               })
               let docs = document.getElementById("ayarlar");
               var i = table.parentNode.parentNode.rowIndex;
               docs.deleteRow(i);
               Swal.fire(
                `Başarılı!`,
                `Başarılı bir şekilde ${name} rolünde bulunan görev silindi!`,
                'success'
            );
               }
        });
}
async function GetListedTasks() {
    let _get  = await fetch(`${API.url}/get?type=17`, { 
       
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
        const row = table.insertRow();
        const td0 = row.insertCell(0);
        const td1 = row.insertCell(1);
        const td2 = row.insertCell(2);
        const td3 = row.insertCell(3);
        const td4 = row.insertCell(4);
        const td5 = row.insertCell(5);
        const td6 = row.insertCell(6);
        const td7 = row.insertCell(7);
        const td8 = row.insertCell(8);
        const td9 = row.insertCell(9);
        const td10 = row.insertCell(10);
        td0.innerText = `${item.role} (${item.members} kişi)`
        td1.innerHTML = item.public
        td2.innerText = item.allvoice 
        td3.innerText = item.tagged  > 0 ? item.tagged + " taglı": "-"
        td4.innerText = item.staff > 0 ? item.staff + " yetkili" : "-"
        td5.innerText = item.register  > 0 ? item.register + " kayıt" : "-"
        td6.innerText = item.invite  > 0 ? item.invite + " davet": "-"
        td9.innerHTML = `${item.tasks} Görev'e <strong>${item.reward * item.tasks}</strong> Puan`
        td7.innerHTML = `${item.time}`
        td8.innerHTML = `${item.date}`
        td10.innerHTML = `<button type="button" style="width: 100px; padding: 1px;" id="${item.id}" onclick="delete_task('${item.id}', '${item.role}', this)"  name="delete_task" class="btn light btn-danger"> <i class="fa fa-times"></i> Kaldır</button>`
   
    })
}
function valid_tasks() {
    let rol = document.getElementById("görevrol").value;
    let süre = document.getElementById("görevsüre").value;
    let ödül = document.getElementById("görevödül").value;
    
    let genelses = document.getElementById("görevgenel").value;
    let public = document.getElementById("görevpublic").value;
    let yetkili = document.getElementById("görevyetkili").value;
    let taglı = document.getElementById("görevtaglı").value;
    let davet = document.getElementById("görevdavet").value;
    let register = document.getElementById("görevteyit").value;
    let ticket = document.getElementById("görevdestek").value;
    let sorumluluk = document.getElementById("görevsorumluluk").value;
    if(!rol || !süre || !ödül || (!genelses && !public && !yetkili && !taglı && !davet && !register && !ticket && !sorumluluk)) {
        return Swal.fire(
        `Başarısız!`,
        `Bir görev verebilmem için bir rol ve en az bir görev belirtmelisiniz aksi taktirde nasıl görev vereyim ki!`,
        'error'
        );
    }

    Swal.fire({
title: `Görev ekleniyor!`,
text: `Belirttiğiniz şekilde görevin eklemek istediğinize emin misiniz?`,
type: "warning",
showCancelButton: !0,
confirmButtonColor: "#DD6B55",
confirmButtonText: "Evet",
cancelButtonText: "Geri Dön!",
}).then((e) => {
    if(e.value == true) {
        postData(`${API.url}/tasks/add`, {
                id: rol,
                genelses: genelses ? genelses : undefined,
                publicses: public ? public : undefined,
                taglı: taglı ? taglı : undefined,
                yetkili: yetkili ? yetkili : undefined,
                davet: davet ? davet : undefined,
                register: register ? register : undefined,
                ticket: ticket ? ticket : undefined,
                rol: rol,
                ödül: ödül ? ödül : undefined,
                sorumluluk: sorumluluk ? sorumluluk : undefined,
                süre: süre != "unlimited" ? süre : undefined,

        })
        setTimeout(() => {
            // location.reload()
        }, 1280);
        Swal.fire(
            `Başarılı!`,
            `Başarılı bir şekilde sunucunuza görev eklendi ve dağıtımı gerçekleşti!`,
            'success'
        );
        }
    });
}