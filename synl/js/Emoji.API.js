const GetListedEmojis = async () => {
    let _get  = await fetch(`${API.url}/get?type=12`, { 
       
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
        const td3 = row.insertCell(3)
        const td4 = row.insertCell(4);
        td0.innerText = item.id
        td1.innerHTML = `<img src="${item.url}" width="32px"></img>`
        td2.innerText = item.name
        td3.innerText = item.roles
        td4.innerHTML = `<button type="button" id="${item.id}" onclick="delete_emoji('${item.id}', '${item.name}', this)"  name="delete_emoji" class="btn light btn-danger"> <i class="fa fa-times"></i> Kaldır</button>`
   
    })
}


function add_emoji(name, url, role) {
    Swal.fire({
        title: `Emoji ekleniyor!`,
        text: `Belirtilen ${name} emojisini eklemek istediğinize emin misiniz?`,
        type: "warning",
        showCancelButton: !0,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Evet",
        cancelButtonText: "Geri Dön!",
    }).then((e) => {
        if(e.value == true) {
               postData(`${API.url}/emojis/add`, {
                    name: name,
                    url: url,
                    roles: role ? role : undefined,
                
               })
               setTimeout(() => {
                    location.reload()
               }, 1280);
               Swal.fire(
                `Başarılı!`,
                `Başarılı bir şekilde ${name} emojisi eklendi!`,
                'success'
            );
               }
        });
}


function delete_emoji(id, name, table) {
    Swal.fire({
        title: `Emoji kaldırılıyor!`,
        text: `Belirtilen ${name} emojisini kaldırmak istediğinize emin misiniz?`,
        type: "warning",
        showCancelButton: !0,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Evet",
        cancelButtonText: "Geri Dön!",
    }).then((e) => {
        if(e.value == true) {
               postData(`${API.url}/emojis/delete`, {
                id: id
               })
               let docs = document.getElementById("ayarlar");
               var i = table.parentNode.parentNode.rowIndex;
               docs.deleteRow(i);
               Swal.fire(
                `Başarılı!`,
                `Başarılı bir şekilde ${name} emojisi silindi!`,
                'success'
            );
               }
        });
}