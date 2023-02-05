function delete_staff(id, name, table) {
    Swal.fire({
        title: `Yetki çekiliyor!`,
        text: `Belirtilen ${name} kullanıcısının yetkisini çekmek istediğinize emin misiniz?`,
        type: "warning",
        showCancelButton: !0,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Evet",
        cancelButtonText: "Geri Dön!",
    }).then((e) => {
        if(e.value == true) {
               postData(`${API.url}/staffs/delete`, {
                id: id
               })
               let docs = document.getElementById("ayarlar");
               var i = table.parentNode.parentNode.rowIndex;
               docs.deleteRow(i);
               Swal.fire(
                `Başarılı!`,
                `Başarılı bir şekilde ${name} kullanıcısının yetkisi çekildi!`,
                'success'
            );
               }
        });
}



            async function GetStaffsListed() {
    let _get  = await fetch(`${API.url}/get?type=14`, { 
       
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
        td0.innerHTML = `<img src="${item.avatar}" width="32px" style="border-radius: 16px;"></img> ${item.tag}`
        const td1 = row.insertCell(1);
        td1.innerHTML = `${item.başlama}`
        const td2 = row.insertCell(2);
        td2.innerHTML = `${item.rolde}`
        const td3 = row.insertCell(3);
        td3.innerHTML = `${item.roles}`
        const td4 = row.insertCell(4);
        td4.innerHTML = `${item.görev}`
        const td5 = row.insertCell(5);
        td5.innerHTML = `<strong>${item.puan}</strong> Puan`
        const td6 = row.insertCell(6);
        td6.innerHTML = `<button type="button" style="width: 120px; padding: 1px;" onclick="delete_staff('${item.id}', '${item.tag}', this)"  class="btn light btn-danger"> <i class="fa fa-times"></i> Yetkiyi Çek</button>`
   
    })
}
function start_staff() {
    let kullanici_id = document.getElementById("k_id").value
    if(!kullanici_id) return  Swal.fire(
        `Başarısız!`,
        `Bir kullanıcıyı yetkiye başlatabilmem için belirtmek gerekir!`,
        'error'
    ); 
     patchData(`${API.url}/staffs/add`, {
              id: kullanici_id
    }).then(req => {
    if(req == "YENI") return Swal.fire(
                        `Başarısız!`,
                        `Kullanıcı 7 gün veya öncesi açıldığı için işleme devam edilemiyor.`,
                        'error'
      ); 
    if(req == "KAYITSIZ") return Swal.fire(
                        `Başarısız!`,
                        `Kullanıcı kayıt edilmediği için işleme devam edilemiyor.`,
                        'error'
      ); 
    if(req == "YASAKLI") return Swal.fire(
                        `Başarısız!`,
                        `Kullanıcının isminde birden fazla tag veya yasaklı tag bulunduğundan işleme devam edilemiyor.`,
                        'error'
      ); 
    if(req == "TAG") return Swal.fire(
                        `Başarısız!`,
                        `Kullanıcının, kullanıcı adında sunucunun tagı bulunamadı.`,
                        'error'
      ); 
    if(req == "YETKILI") return Swal.fire(
                        `Başarısız!`,
                        `Kullanıcının rolleri arasında yetkili rolü olduğundan işleme devam edilemiyor.`,
                        'error'
     ); 
    if(req == "NO") return Swal.fire(
                        `Başarısız!`,
                        `Böyle bir kullanıcı bulunamadı.`,
                        'error'
      ); 
    if(req == "OK") return Swal.fire(
                        `Başarılı!`,
                        `Belirtilen kullanıcının yetkisi başarıyla başlatıldı.`,
                        'success'
      ),setTimeout(() => location.reload(), 1350); 
 })
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