
            function time_select(
                btn,
                time
            ) {
                let opt = {
                    one: document.getElementById("beginner"),
                    two: document.getElementById("experienced"),
                    three: document.getElementById("expert"),
                    four: document.getElementById("professional"),
                    five: document.getElementById("platinum"),
                    six: document.getElementById("diamond"),
                }
                let buttons = {
                    01: document.getElementById("aylık"),
                    02: document.getElementById("3aylık"),
                    03: document.getElementById("6aylık"),
                    04: document.getElementById("yıllık"),
                }
                let arr = ["aylık","3aylık","6aylık","yıllık"];
                arr.filter(x =>  btn.id != x).map(x => {
                        var docs = document.getElementById(x)
                        if(docs) docs.disabled = false;
                })
                btn.disabled = true;

                let arr2 = [
                    {
                        periyot: 1,
                        one: "300,00₺/ay",
                        two: "500,00₺/ay",
                        three: "650,00₺/ay",
                        four: "850,00₺/ay",
                        five: "1.350,00₺/ay",
                        six: "1.850,00₺/ay"
                    },
                    {
                        periyot: 3,
                        one: "900,00₺/3ay",
                        two: "1.200,00₺/3ay",
                        three: "1.450₺/3ay",
                        four: "1.650,00₺/3ay",
                        five: "2.050,00₺/3ay",
                        six: "3.550,00₺/3ay"
                    },
                    {
                        periyot: 6,
                        one: "1.100,00₺/6ay",
                        two: "1.650,00₺/6ay",
                        three: "1.950,00₺/6ay",
                        four: "2.300,00₺/6ay",
                        five: "3.100,00₺/6ay",
                        six: "4.100,00₺/6ay"
                    },
                    {
                        periyot: 12,
                        one: "1.800,00₺/yıl",
                        two: "2.350,00₺/yıl",
                        three: "2.700,00₺/yıl",
                        four: "2.930,00₺/yıl",
                        five: "4.200,00₺/yıl",
                        six: "5.200,00₺/yıl"
                    }
                ]

                let secilen = arr2.find(x => x.periyot == time);
                if(secilen) {
                    opt.one.innerText = secilen.one
                    opt.two.innerText = secilen.two
                    opt.three.innerText = secilen.three
                    opt.four.innerText = secilen.four
                    opt.five.innerText = secilen.five
                    opt.six.innerText = secilen.six
                }
                
            }

            function package_detail(type) {
                if(type == 1) {
                    Swal.fire({
                        html: `
                        <img src="./packages/02.png" style="width: 64px;"></img>
                        </br>
                        <h3 class="text-center"> Beginner Paket Özellikleri</h3>
                        <label style="color: whitesmoke; text-align: left">
                        
                        </br>
                        <img src="https://cdn.discordapp.com/emojis/1023821496025612359.gif?size=96&quality=lossless" style="width: 16px;"></img> İstatistik, yetkili ve görev sistemleri</br>
                        <img src="https://cdn.discordapp.com/emojis/1023821496025612359.gif?size=96&quality=lossless" style="width: 16px;"></img> Özelleştirilebilir token ve komut yapıları</br>
                        <img src="https://cdn.discordapp.com/emojis/1023821496025612359.gif?size=96&quality=lossless" style="width: 16px;"></img> Özelleştirilebilir taglı veya tagsız sistemleri</br>
                        <img src="https://cdn.discordapp.com/emojis/1023821496025612359.gif?size=96&quality=lossless" style="width: 16px;"></img> Genel moderasyon sistemleri ve kayıt sistemleri</br>
                        <img src="https://cdn.discordapp.com/emojis/1023821496025612359.gif?size=96&quality=lossless" style="width: 16px;"></img> Senkronizasyon, güvenlik ve veritabanı sistemleri</br>
                        </br>
    Bu sistemler satın alınma onaylandığında otomatik olarak teslim için kurulum süresi içerisinde kurulmaktadır. İşlem bittiğinde size sadece botları sokmanız için sadece davet bağlantısı vermektedir.
    </label>`,
                        width: 600,
                        padding: '3em',
                        color: '#716add',
                        backdrop: `
                            rgba(0,0,123,0.4)
                            url("https://cdn.discordapp.com/attachments/940106623945437226/1035282496214016030/giphy.gif")
                            left top
                            no-repeat
                        `
                        })
                }
                if(type == 2) {
                    Swal.fire({
                        html: `
                        <img src="./packages/crystal-meth.png" style="width: 64px;"></img>
                        </br>
                        <h3 class="text-center"> Experienced Paket Özellikleri</h3>
                        <label style="color: whitesmoke; text-align: left">
                        
                        </br>
                        <img src="https://cdn.discordapp.com/emojis/1023821496025612359.gif?size=96&quality=lossless" style="width: 16px;"></img> Ekonomi, mağaza ve eğlence sistemleri</br>
                        <img src="https://cdn.discordapp.com/emojis/1023821496025612359.gif?size=96&quality=lossless" style="width: 16px;"></img> İstatistik, yetkili ve görev sistemleri</br>
                        <img src="https://cdn.discordapp.com/emojis/1023821496025612359.gif?size=96&quality=lossless" style="width: 16px;"></img> Hoş geldin ses teyit müzik ile karşılama</br>
                        <img src="https://cdn.discordapp.com/emojis/1023821496025612359.gif?size=96&quality=lossless" style="width: 16px;"></img> Özelleştirilebilir token ve komut yapıları</br>
                        <img src="https://cdn.discordapp.com/emojis/1023821496025612359.gif?size=96&quality=lossless" style="width: 16px;"></img> Özelleştirilebilir taglı veya tagsız sistemleri</br>
                        <img src="https://cdn.discordapp.com/emojis/1023821496025612359.gif?size=96&quality=lossless" style="width: 16px;"></img> Genel moderasyon sistemleri ve kayıt sistemleri</br>
                        <img src="https://cdn.discordapp.com/emojis/1023821496025612359.gif?size=96&quality=lossless" style="width: 16px;"></img> Senkronizasyon, güvenlik ve veritabanı sistemleri</br>
                        <img src="https://cdn.discordapp.com/emojis/1023821496025612359.gif?size=96&quality=lossless" style="width: 16px;"></img> Özelleştirilmiş alt kullanıcılar ile yetki dağılımı</br>
                        </br>
    Bu sistemler satın alınma onaylandığında otomatik olarak teslim için kurulum süresi içerisinde kurulmaktadır. İşlem bittiğinde size sadece botları sokmanız için sadece davet bağlantısı vermektedir.
    </label>`,
                        width: 600,
                        padding: '3em',
                        color: '#716add',
                        backdrop: `
                            rgba(0,0,123,0.4)
                            url("https://cdn.discordapp.com/attachments/940106623945437226/1035282496214016030/giphy.gif")
                            left top
                            no-repeat
                        `
                        })
                }
                if(type == 3) {
                    Swal.fire({
                        html: `
                        <img src="./packages/crystals.png" style="width: 64px;"></img>
                        </br>
                        <h3 class="text-center"> Expert Paket Özellikleri</h3>
                        <label style="color: whitesmoke; text-align: left">
                        
                        </br>
                        <img src="https://cdn.discordapp.com/emojis/1023821496025612359.gif?size=96&quality=lossless" style="width: 16px;"></img> Ekonomi, mağaza ve eğlence sistemleri</br>
                        <img src="https://cdn.discordapp.com/emojis/1023821496025612359.gif?size=96&quality=lossless" style="width: 16px;"></img> İstatistik, yetkili ve görev sistemleri</br>
                        <img src="https://cdn.discordapp.com/emojis/1023821496025612359.gif?size=96&quality=lossless" style="width: 16px;"></img> Özelleştirilebilir token ve komut yapıları</br>
                        <img src="https://cdn.discordapp.com/emojis/1023821496025612359.gif?size=96&quality=lossless" style="width: 16px;"></img> Özelleştirilebilir taglı veya tagsız sistemleri</br>
                        <img src="https://cdn.discordapp.com/emojis/1023821496025612359.gif?size=96&quality=lossless" style="width: 16px;"></img> Genel moderasyon sistemleri ve kayıt sistemleri</br>
                        <img src="https://cdn.discordapp.com/emojis/1023821496025612359.gif?size=96&quality=lossless" style="width: 16px;"></img> Senkronizasyon, güvenlik ve veritabanı sistemleri</br>
                        <img src="https://cdn.discordapp.com/emojis/1023821496025612359.gif?size=96&quality=lossless" style="width: 16px;"></img> Özelleştirilmiş alt kullanıcılar ile yetki dağılımı</br>
                        <img src="https://cdn.discordapp.com/emojis/1023821496025612359.gif?size=96&quality=lossless" style="width: 16px;"></img> Yönetilebilir hoş geldin ses teyit müzik ile karşılama</br>
                        <img src="https://cdn.discordapp.com/emojis/1023821496025612359.gif?size=96&quality=lossless" style="width: 16px;"></img> Ayrıcalıklı log kayıtlarının yönetimi ve kontrolü (Özel Sunucu)</br>
                        <img src="https://cdn.discordapp.com/emojis/1023821496025612359.gif?size=96&quality=lossless" style="width: 16px;"></img> Sunucu içerisi özel yönetim paneli ve sunucu yedek kurulumu (Özel Sunucu)</br>
                        <img src="https://cdn.discordapp.com/emojis/1023821496025612359.gif?size=96&quality=lossless" style="width: 16px;"></img> Güvenliğe takılmış ve sunucu raporlarını SMS bildirimi</br>
                        </br>
    Bu sistemler satın alınma onaylandığında otomatik olarak teslim için kurulum süresi içerisinde kurulmaktadır. İşlem bittiğinde size sadece botları sokmanız için sadece davet bağlantısı vermektedir.
    </label>`,
                        width: 600,
                        padding: '3em',
                        color: '#716add',
                        backdrop: `
                            rgba(0,0,123,0.4)
                            url("https://cdn.discordapp.com/attachments/940106623945437226/1035282496214016030/giphy.gif")
                            left top
                            no-repeat
                        `
                        })
                }
                if(type == 4) {
                    Swal.fire({
                        html: `
                        <img src="./packages/diamond.png" style="width: 64px;"></img>
                        </br>
                        <h3 class="text-center"> Professional Paket Özellikleri</h3>
                        <label style="color: whitesmoke; text-align: left">
                        
                        </br>
                        <img src="https://cdn.discordapp.com/emojis/1023821496025612359.gif?size=96&quality=lossless" style="width: 16px;"></img> Ekonomi, mağaza ve eğlence sistemleri</br>
                        <img src="https://cdn.discordapp.com/emojis/1023821496025612359.gif?size=96&quality=lossless" style="width: 16px;"></img> Çekiliş, etkinlik ve eğlence sistemleri</br>
                        <img src="https://cdn.discordapp.com/emojis/1023821496025612359.gif?size=96&quality=lossless" style="width: 16px;"></img> İstatistik, yetkili ve görev sistemleri</br>
                        <img src="https://cdn.discordapp.com/emojis/1023821496025612359.gif?size=96&quality=lossless" style="width: 16px;"></img> Özelleştirilebilir token ve komut yapıları</br>
                        <img src="https://cdn.discordapp.com/emojis/1023821496025612359.gif?size=96&quality=lossless" style="width: 16px;"></img> Özelleştirilebilir istatistik, görev ve yetkili sistemleri</br>
                        <img src="https://cdn.discordapp.com/emojis/1023821496025612359.gif?size=96&quality=lossless" style="width: 16px;"></img> Özelleştirilebilir taglı, tagsız ve ekip sistemleri</br>
                        <img src="https://cdn.discordapp.com/emojis/1023821496025612359.gif?size=96&quality=lossless" style="width: 16px;"></img> Genişletilmiş moderasyon sistemleri ve kayıt sistemleri</br>
                        <img src="https://cdn.discordapp.com/emojis/1023821496025612359.gif?size=96&quality=lossless" style="width: 16px;"></img> Senkronizasyon, güvenlik ve veritabanı sistemleri</br>
                        <img src="https://cdn.discordapp.com/emojis/1023821496025612359.gif?size=96&quality=lossless" style="width: 16px;"></img> Özelleştirilmiş alt kullanıcılar ile yetki dağılımı</br>
                        <img src="https://cdn.discordapp.com/emojis/1023821496025612359.gif?size=96&quality=lossless" style="width: 16px;"></img> Yönetilebilir hoş geldin ses teyit müzik ile karşılama</br>
                        <img src="https://cdn.discordapp.com/emojis/1023821496025612359.gif?size=96&quality=lossless" style="width: 16px;"></img> Ayrıcalıklı log kayıtlarının yönetimi ve kontrolü (Özel Sunucu)</br>
                        <img src="https://cdn.discordapp.com/emojis/1023821496025612359.gif?size=96&quality=lossless" style="width: 16px;"></img> Web üzerinden her etkinlikleri(event) yönetebilme ve isteğe bağlı özellik ekleme</br>
                        <img src="https://cdn.discordapp.com/emojis/1023821496025612359.gif?size=96&quality=lossless" style="width: 16px;"></img> Sunucu içerisi özel yönetim paneli ve sunucu yedek kurulumu (Özel Sunucu)</br>
                        <img src="https://cdn.discordapp.com/emojis/1023821496025612359.gif?size=96&quality=lossless" style="width: 16px;"></img> Güvenliğe takılmış ve sunucu raporlarını SMS bildirimi</br>
                        </br>
    Bu sistemler satın alınma onaylandığında otomatik olarak teslim için kurulum süresi içerisinde kurulmaktadır. İşlem bittiğinde size sadece botları sokmanız için sadece davet bağlantısı vermektedir.
    </label>`,
                        width: 600,
                        padding: '3em',
                        color: '#716add',
                        backdrop: `
                            rgba(0,0,123,0.4)
                            url("https://cdn.discordapp.com/attachments/940106623945437226/1035282496214016030/giphy.gif")
                            left top
                            no-repeat
                        `
                        })
                }
            }