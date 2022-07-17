document.addEventListener("DOMContentLoaded", (event) => {

    const results = [];
    const form = document.querySelector('.form')
    const searchInput = document.querySelector('.input')
    const clear = document.getElementById('clear')
    const submit = document.getElementById("submit")
    const url = 'setting/traitement.php'
    res = document.getElementById("list");
    var a = 2

    searchInput.addEventListener("keyup", (e) => {

        //prend la valeur de ce qui est tapé dans la barre de recherche
        let value = e.target.value
         console.log(value)

        // check si la valeur entré est supérieur a 0
        if (value && value.trim().length > 0) {

            value = value.trim().toLowerCase()
            // console.log(searchInput.value)

            let formData = new FormData()
            formData.append('search', searchInput.value)
            // console.log(formData)
            // a append plus bas apores le fetch

            fetch(url, {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                // return console.log(response)
                .then(data => {
                    // console.log(data)
                    res.innerHTML = "";
                    let strStart = data.startResult;
                     console.log(strStart)
                    let strAll = data.allResult;
                    // console.log(strAll)
                    // console.table(strStart)
                    // console.table(strAll)
                    if (data.length !== 0) {
                        // console.log(data)
                        for (i = 0; i < strStart.length; i++) {
                            // console.table(strStart[i])
                            // console.table(strAll[i])

                            const myJSONstart = JSON.stringify(strStart[i].titre);
                           console.log(myJSONstart)
                            res.innerHTML += "<li><a href='produits.php?produits=" + strStart[i].id + "'>" + myJSONstart + "</a></li>";

                        }

                    }
                    if (data.length !== 0) {
                        for (i = 0; i < strAll.length; i++) {
                            
                            // console.log(strAll)
                            const myJSONall = JSON.stringify(strAll[i].nom);
                            // console.log(submit)
                            // console.log(data)
                            // submit.onclick.addEventListener(console.log(myJSONall))
                                // callback(data)
                                    // console.log(myJSONall)
                                    // console.log(strAll)
                                    // console.log(strAll[i].id)

                                    // res.innerHTML += "<li><a href='element.php?id=" + strAll[i].id + "'>" + myJSONall + "</a></li>";
                               
                        }

                    }

                })

        }

    })

})