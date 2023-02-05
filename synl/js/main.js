function parayaÇevirAMK(str) {
    let genel = Intl.NumberFormat('tr-TR');
    let docs = document.getElementById("para")
    str = Number(str)
    if(docs) docs.innerHTML = `${genel.format(str)} TL`
}