afisha = document.getElementById('afisha')
template = document.getElementById('tmplt_afisha')
fetch("cart.php")
    .then((response) =>{
        if(!response.ok){
            throw new Error("Ничего не работает!")
            
        }
        return response.json()
    })
    .then((data) =>{
        data.forEach((element) => {
            afisha.append(template.content.cloneNode(true))
        })
        data.forEach((element,i) => {
            document.querySelectorAll('.img')[i].src = '../'+element['photo']
            document.querySelectorAll('.name')[i].textContent = element['name']
            document.querySelectorAll('.date')[i].innerHTML = "Дата показа: "+element['date_show']
            document.querySelectorAll('.age')[i].innerHTML = "Возрастной рейтинг: "+element['age']+"+"
            document.querySelectorAll('.genre')[i].innerHTML = "Жанр: "+element['genre']
            document.querySelectorAll('.description')[i].innerHTML = "Синопсис: "+element['description']
            document.querySelectorAll('.price')[i].innerHTML = "Цена: "+element['price']+"₽"
            document.querySelectorAll('.btn_movie')[i].id = "btn_movie_"+element['id']
            document.querySelectorAll('.btn_buy')[i].id = "btn_buy_"+element['id']
        })
    })