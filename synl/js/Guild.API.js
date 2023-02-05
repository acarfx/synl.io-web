let editRole = '';


async function updateChannels(id, type) {
    let role = await GetChannel(id)
    if(!role) return Swal.fire(
        `Hata!`,
        `Belirtilen kanal bulunamadığından işlem iptal edildi.`,
        'warning'
    )
    role = role[0]
    if(type == "UP") {
        let newPosition = role.position - 1
        if(newPosition == 0) return Swal.fire(
            `Uyarı!`,
            `Belirtilen ${role.name} kanalı en yukarıda olduğu için daha fazla yukarı taşınamıyor.`,
            'warning'
        );

        Swal.fire({
            title: `Kanalı Yukarı Tanışmak Üzere!`,
            text: `Belirttiğiniz ${role.name} kanalını yukarıya taşımak istiyor musunuz?`,
            type: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Evet",
            cancelButtonText: "Geri Dön!",
        }).then((e) => {
            if(e.value == true) {
                postData(`${API.url}/edit`, {
                    type: "CHANNEL",
                    id: role.id,
                    position: newPosition
                })
                toastr.success(`Başarıyla ${role.name} kanalı yukarı taşındı.`, `${role.name}`, {
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
                var table = $('#example2').DataTable();
                bildirimOluştur(`Sunucunuzdan ${role.name} kanalı yukarı taşındı.`, "danger")
                table
                    .rows()
                    .remove()
                    .draw();
                    setTimeout(() => {
                        listChannels()
                    }, 1000);
            }
        })
    }
    if(type == "DOWN") {
        let newPosition = role.position  + 1
        if(newPosition == 0) return Swal.fire(
            `Uyarı!`,
            `Belirtilen ${role.name} kanalı en aşağıda olduğu için daha fazla aşağı taşınamıyor.`,
            'warning'
        )
        Swal.fire({
            title: `Kanalı Aşağı Tanışmak Üzere!`,
            text: `Belirttiğiniz ${role.name} kanalını aşağı taşımak istiyor musunuz?`,
            type: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Evet",
            cancelButtonText: "Geri Dön!",
        }).then((e) => {
            if(e.value == true) {
                postData(`${API.url}/edit`, {
                    type: "CHANNEL",
                    id: role.id,
                    position: newPosition
                })
                toastr.success(`Başarıyla ${role.name} kanalı aşağı taşındı.`, `${role.name}`, {
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
                var table = $('#example2').DataTable();
                bildirimOluştur(`Sunucunuzdan ${role.name} kanalı aşağı taşındı.`, "danger")
                table
                    .rows()
                    .remove()
                    .draw();
                    setTimeout(() => {
                        listChannels()
                    }, 1000);
            }
        })
    }
    if(type == "DELETE") {
        Swal.fire({
            title: `Kanal'ı Silmek Üzeresin!`,
            text: `Belirttiğiniz ${role.name} kanalını sunucudan silmek istiyor musun?`,
            type: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Evet",
            cancelButtonText: "Geri Dön!",
        }).then((e) => {
            if(e.value == true) {
                postData(`${API.url}/edit`, {
                    type: "CHANNEL",
                    id: role.id,
                    deleted: true,
                })
                toastr.success(`Başarıyla ${role.name} kanalı sunucudan silindi.`, `${role.name}`, {
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
                var table = $('#example2').DataTable();
                bildirimOluştur(`Sunucunuzdan ${role.name} kanalı silindi.`, "danger")
                table
                    .rows()
                    .remove()
                    .draw();
                    setTimeout(() => {
                        listChannels()
                    }, 1000);
            }
        })
    }
  
}

async function updateRoles(id, type) {
        let role = await GetRole(id)
        if(!role) return Swal.fire(
            `Hata!`,
            `Belirtilen rol bulunamadığından işlem iptal edildi.`,
            'warning'
        )
        role = role[0]
        if(type == "EDIT") {
            var isim = document.getElementById("rolDuzenleme_isims").value
            if(!isim) return Swal.fire(
                `Uyarı!`,
                `Belirtilen ${role.name} rolü düzenlemek için en az bir değişiklik yapın.`,
                'warning'
            );
            var renk = document.getElementById("rolDuzenleme_renk").value || 0
            var sağda = document.getElementById("rolDuzenleme_sag").checked || false
            var etiket = document.getElementById("rolDuzenleme_etiket").checked || false
            var icon = document.getElementById("rolDuzenleme_icon").value || undefined

            Swal.fire({
                title: `Rol Düzenlenmek Üzere!`,
                text: `Belirttiğiniz ${role.name} rolünü düzenlemek istiyor musun?`,
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Evet",
                cancelButtonText: "Geri Dön!",
            }).then((e) => {
                if(e.value == true) {
                    postData(`${API.url}/edit`, {
                        type: "ROLE",
                        id: role.id,
                        name: isim,
                        color: renk,
                        hoist: sağda,
                        mentionable: etiket,
                        icon: icon
                    })	
                    editRole = '234327427347237'
                    toastr.success(`Başarıyla ${isim == role.name ? role.name : isim} rolü başarıyla güncellendi.`, `${isim == role.name ? role.name : isim}`, {
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
                    var table = $('#example2').DataTable();
                    bildirimOluştur(`Sunucunuzdan ${role.name} rolü güncellendi.`, "danger")
                    table
                        .rows()
                        .remove()
                        .draw();
                        setTimeout(() => {
                            listRoles()
                        }, 1000);
                }
            })
        }
        if(type == "UP") {
            let newPosition = role.position + 1
            if(newPosition == 0) return Swal.fire(
                `Uyarı!`,
                `Belirtilen ${role.name} rolü en yukarıda olduğu için daha fazla yukarı taşınamıyor.`,
                'warning'
            );

            Swal.fire({
                title: `Rol Yukarı Tanışmak Üzere!`,
                text: `Belirttiğiniz ${role.name} rolünü yukarıya taşımak istiyor musunuz?`,
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Evet",
                cancelButtonText: "Geri Dön!",
            }).then((e) => {
                if(e.value == true) {
                    postData(`${API.url}/edit`, {
                        type: "ROLE",
                        id: role.id,
                        position: newPosition
                    })
                    toastr.success(`Başarıyla ${role.name} rolü yukarı taşındı.`, `${role.name}`, {
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
                    bildirimOluştur(`Sunucunuzdan ${role.name} rolü yukarı taşındı.`, "danger")
                    var table = $('#example2').DataTable();
                    table
                        .rows()
                        .remove()
                        .draw();
                        setTimeout(() => {
                            listRoles()
                        }, 1000);
                }
            })
        }
        if(type == "DOWN") {
            let newPosition = role.position - 1
            if(newPosition == 0) return Swal.fire(
                `Uyarı!`,
                `Belirtilen ${role.name} rolü en aşağıda olduğu için daha fazla aşağı taşınamıyor.`,
                'warning'
            )
            Swal.fire({
                title: `Rol Aşağı Tanışmak Üzere!`,
                text: `Belirttiğiniz ${role.name} rolünü aşağı taşımak istiyor musunuz?`,
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Evet",
                cancelButtonText: "Geri Dön!",
            }).then((e) => {
                if(e.value == true) {
                    postData(`${API.url}/edit`, {
                        type: "ROLE",
                        id: role.id,
                        position: newPosition
                    })
                    toastr.success(`Başarıyla ${role.name} rolü aşağı taşındı.`, `${role.name}`, {
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
                    var table = $('#example2').DataTable();
                    bildirimOluştur(`Sunucunuzdan ${role.name} rolü aşağı taşındı.`, "danger")
                    table
                        .rows()
                        .remove()
                        .draw();
                        setTimeout(() => {
                            listRoles()
                        }, 1000);
                }
            })
        }
        if(type == "DELETE") {
            Swal.fire({
                title: `Rol'ü Silmek Üzeresin!`,
                text: `Belirttiğiniz ${role.name} rolünü sunucudan silmek istiyor musun?`,
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Evet",
                cancelButtonText: "Geri Dön!",
            }).then((e) => {
                if(e.value == true) {
                    postData(`${API.url}/edit`, {
                        type: "ROLE",
                        id: role.id,
                        deleted: true,
                    })
                    toastr.success(`Başarıyla ${role.name} rolü sunucudan silindi.`, `${role.name}`, {
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
                    var table = $('#example2').DataTable();
                    bildirimOluştur(`Sunucunuzdan ${role.name} rolü silindi.`, "danger")
                    table
                        .rows()
                        .remove()
                        .draw();
                        setTimeout(() => {
                            listRoles()
                        }, 1000);
                }
            })
        }
      
}

async function selectedRole(id) { 
    editRole = `${id}`
    let _get = await GetRole(id)
    if(!_get) return;
    let rol = _get[0]

    var isim = document.getElementById('rolDüzenleme_isim')
    var isim2 =  document.getElementById('rolDuzenleme_isims')
    var icon = document.getElementById('rolDuzenleme_icon')
    var sag = document.getElementById('rolDuzenleme_sag')
    var etiket = document.getElementById('rolDuzenleme_etiket')
    var renk = document.getElementById('rolDuzenleme_renk')
    if(!isim || !isim2 || !icon || !sag || !etiket || !renk) return;
    isim.innerHTML = `${rol.name}`
    isim2.value = rol.name
    if(rol.icon) icon.value = rol.icon
    sag.checked = rol.hoist
    etiket.checked = rol.mentionable
    renk.value = rol.color
    
 }

 async function listChannels () {
    let _get  = await fetch(`${API.url}/get?type=2`, {
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
    let t = $('#example2').DataTable();
    if(_result && t) {
        $(document).ready(function() {
        _result.sort((a, b) => Number(b.id) - Number(a.id)).map(async (x, index) => {
             let kategori;
             if(x.parent) {
                let __get =  await GetChannel(x.parent)
                if(__get) kategori = __get[0]
             }
             t.row.add( [
                    `${index + 1}`,
                    `#${x.name}`,
                    `${x.type == "GUILD_VOICE" ? `<i class="fa-solid fa-volume-up"></i> <span style="display: none;">Ses</span>` : x.type == "GUILD_TEXT" ? `<i class="fa-solid fa-hashtag"></i> <span style="display: none;">Metin</span>` : `<i class="fa-solid fa-hashtag"></i> <span style="display: none;">Kategori</span>`}`,
                    `${kategori ? `#${kategori.name}` : `~`}`,
                    `<button class="btn btn-primary" style="border-radius: 10px; height: 25px; width: 25px; padding: 1px" onClick="updateChannels('${x.id}', 'UP')"><i class="fa fa-arrow-up"></i></button>
                    <button class="btn btn-primary" style="border-radius: 10px; height: 25px; width: 25px; padding: 1px" onClick="updateChannels('${x.id}', 'DOWN')"><i class="fa fa-arrow-down"></i></button>
<button class="btn btn-danger" style="border-radius: 10px; height: 25px; width: 25px; padding: 1px" onClick="updateChannels('${x.id}', 'DELETE')"><i class="fa fa-times"></i></button>`,
                ]).draw()
            
       })
    });
    }
}

async function listRoles () {
    let _get  = await fetch(`${API.url}/get?type=1`, {
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
    let t = $('#example2').DataTable();
    if(_result && t) {
        $(document).ready(function() {
        _result.filter(x => x.name != "@everyone").sort((a, b) => Number(b.position) - Number(a.position)).map((x, index) => {
      
             t.row.add( [
                    `${index + 1}`,
                    `${x.id}`,
                    `<span style="color: ${x.color}">@${x.name}</span>`,
                    `${!x.managed ? "Yönetilebilir" : "Yönetilemez"}!</br>${x.hoist ? "Sağda Görünüyor" : "Sağda Görünmüyor"}!</br>${x.mentionable ? "Etiketlenebilir" : "Etiketlenemez"}!`,
                    `<button class="btn btn-primary" style="border-radius: 10px; height: 25px; width: 25px; padding: 1px" onClick="updateRoles('${x.id}', 'UP')"><i class="fa fa-arrow-up"></i></button>
<button class="btn btn-primary" style="border-radius: 10px; height: 25px; width: 25px; padding: 1px" onClick="updateRoles('${x.id}', 'DOWN')"><i class="fa fa-arrow-down"></i></button>
<button class="btn btn-secondary" style="border-radius: 10px; height: 25px; width: 25px; padding: 1px"  data-bs-toggle="modal" data-bs-target="#editRole" onClick="selectedRole('${x.id}')"><i class="fa fa-pen"></i></button> 
<button class="btn btn-danger" style="border-radius: 10px; height: 25px; width: 25px; padding: 1px" onClick="updateRoles('${x.id}', 'DELETE')"><i class="fa fa-times"></i></button>`,
                ]).draw()
            
       })
    });
    }
}

async function addChannel (name, opt) {
    if(!name) {
        Swal.fire(
            `Bir isim belirtilmediğinden işleminiz iptal edildi!`,
            ``,
            'warning'
        )
        return 
    };
    Swal.fire({
        title: `Kanal Oluşturuyorsun!`,
        text: `Belirttiğiniz ${name} isminde bir kanal oluşturmak istediğine emin misin?`,
        type: "warning",
        showCancelButton: !0,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Evet",
        cancelButtonText: "Geri Dön!",
    }).then((e) => {
    
        if(e.value == true) {
            postData(`${API.url}/add`, {
                type: "CHANNEL",
                name: name,
                channel_type: opt.type ? opt.type : "GUILD_TEXT",
                parent: opt.parent ? opt.parent : undefined,
                userLimit: opt.userLimit ? opt.userLimit : undefined,  
            })
            Swal.fire(
                `Başarıyla ${name} isminde kanal oluşturuldu!`,
                ``,
                'success'
            )
            bildirimOluştur(`Sunucunuzdan ${name} kanalı oluşturuldu.`, "danger")
            var table = $('#example2').DataTable();
            table
                .rows()
                .remove()
                .draw();
                setTimeout(() => {
                    listChannels()
                }, 1000);
            toastr.success(`Başarıyla sunucuda ${name} isminde kanal oluşturuldu!`, `Yeni Kanal Oluşturuldu!`, {
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

async function addRole (name, opt) {
    if(!name) {
        Swal.fire(
            `Bir isim belirtilmediğinden işleminiz iptal edildi!`,
            ``,
            'warning'
        )
        return 
    };
    Swal.fire({
        title: `Rol Oluşturuyorsun!`,
        text: `Belirttiğiniz ${name} isminde bir rol oluşturmak istediğine emin misin?`,
        type: "warning",
        showCancelButton: !0,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Evet",
        cancelButtonText: "Geri Dön!",
    }).then((e) => {
    
        if(e.value == true) {
            postData(`${API.url}/add`, {
                type: "ROLE",
                name: name,
                color: opt.color ? opt.color : 0,
                icon: opt.icon ? opt.icon : null,
                hoist: opt.hoist ? opt.hoist : false,
                mentionable: opt.mentionable ? opt.mentionable : false,    
            })
            Swal.fire(
                `Başarıyla ${name} isminde rol oluşturuldu!`,
                ``,
                'success'
            )
            bildirimOluştur(`Sunucunuzdan ${name} rolü oluşturuldu.`, "danger")
            toastr.success(`Başarıyla sunucuda ${name} isminde rol oluşturuldu!`, `Yeni Rol Oluşturuldu!`, {
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

// Alt Kodlar
function rolEkle() {
    var isim = document.getElementById("rolOlusturma_p").value
    if(!isim) return alert("Bir rol ismi belirtmek gerekiyor.")
    var renk = document.getElementById("rolOlusturma_r").value || 0
    var sağda = document.getElementById("rolOlusturma_s").checked || false
    var etiket = document.getElementById("rolOlusturma_e").checked || false
    var icon = document.getElementById("rolOlusturma_i").value || undefined
    addRole(isim, {
        color: renk,
        hoist: sağda,
        mentionable: etiket,
        icon: icon
    })						
}
function typeSelector() {
    var select = document.getElementById("kanalOlusturma_t")
    var divcik = document.getElementById("kategoriG")
    var divcikcik = document.getElementById("sesLimitG")
    if(select.value != "GUILD_CATEGORY") divcik.style.display = 'block', GetAPI(2, "CATEGORY", `kanalOlusturma_k`)
    if(select.value == "GUILD_CATEGORY") divcik.style.display = 'none'
    if(select.value != "GUILD_VOICE") divcikcik.style.display = 'none'
    if(select.value == "GUILD_VOICE") divcikcik.style.display = 'block'
}
function kanalEkle() {
    var isim = document.getElementById("kanalOlusturma_i").value
    if(!isim) return alert("Bir kanal ismi belirtmen gerekiyor.")
    var tip = document.getElementById("kanalOlusturma_t").value
    if(!tip) return alert("Bir kanal tipi belirtmen gerekiyor.")
    var kategori = document.getElementById("kanalOlusturma_k").value
    var seslimit = document.getElementById("kanalOlusturma_l").value
    if(seslimit && (isNaN(seslimit))) return alert('Belirttiğiniz ses limitini rakam cinsinde giriniz.');
    if(seslimit && (seslimit < 0 || seslimit > 99)) return alert('Ses limitini 0 ile 99 arası giriniz.');
    addChannel(isim, {
        type: tip,
        parent: kategori ? (kategori == "NO_CATEGORY" || tip == "GUILD_CATEGORY") ? undefined : kategori : undefined,
        userLimit: seslimit ? Number(seslimit) : undefined,
        position: 1,
    })						
}