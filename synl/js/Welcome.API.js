async function set_welcome(type) {
    let eklenecek_textarea = document.getElementById("hosgeldin_mesaji");
    let webhook_bilgi = document.getElementById("hosgeldin_webhook");
    if(!eklenecek_textarea.value && type != "DEFAULT") return  Swal.fire(
                ``,
                `Hoş geldin mesajının içeriğini boş bırakamazsınız.`,
                'error'
            )
    Swal.fire({
        title: `Hoş geldin mesajı ${type == "SET" ? "değişiyor" : `sıfırlanıyor` }?`,
        text: `Hoş geldin mesajını ${type == "SET" ? "değiştirmek" : `sıfırlamak` } istiyor musunuz.`,
        type: "warning",
        showCancelButton: !0,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Evet",
        cancelButtonText: "Hayır!",
    }).then((e) => {
        if(e.value == true) { 
            Swal.fire(
                `Başarıyla hoş geldin mesajınız ${type == "SET" ? "güncellendi." : `sıfırlandı.` }`,
                ``,
                'success'
            )
            postData(`${API.url}/welcome/set`, {
                                            type: type,
                                            webhook: webhook_bilgi.checked,
                                            text: eklenecek_textarea.value
            })
            setTimeout(() => {
                window.location.reload()
            }, 1183)
            toastr.success(`Başarıyla hoş geldin mesajınız ${type == "SET" ? "güncellendi" : `sıfırlandı` }.`, `Hoş Geldin ${type == "SET" ? "Güncelleme" : `Sıfırlama` }`, {
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
async function get_welcome() {
    let eklenecek_textarea = document.getElementById("hosgeldin_mesaji");
    let webhook_bilgi = document.getElementById("hosgeldin_webhook");
    if(eklenecek_textarea) { 
        let _get  = await fetch(`${API.url}/welcome`, {
            headers: {
                'Authorization': API.token
                },
        }).catch(err => {
        
        })
        if(!_get) return;
        let _result = await _get.json();
        if(_result) {
            if(_result.text == "Default") {
                let btn_varsayılan = document.getElementById("varsayılan");
                if(btn_varsayılan) btn_varsayılan.disabled = true;
                eklenecek_textarea.value = `Varsayılan hoş geldin mesajı ayarlıdır.
Değiştirmek için yeni mesajınızı girerek "Güncelle" düğmesine basabilirsiniz.`
            } else {
                if(webhook_bilgi) webhook_bilgi.checked = _result.webhook
                eklenecek_textarea.value = _result.text
            }
        }
    }
}
function degisken_add(değişken) {
    let eklenecek_textarea = document.getElementById("hosgeldin_mesaji");
    if(eklenecek_textarea) {
        let value = eklenecek_textarea.value
        eklenecek_textarea.value = value + `${değişken}`
    }
}