async function sort_post(formattedFormData){
    const res = await fetch(
        '../db.php',
        {
            method: 'POST',
            body : JSON.stringify(formattedFormData)
        }
    );
    const data = await res.json();
    
    template = document.getElementById('tmplt_afisha');
    afisha = document.getElementById('afisha')
    afisha.innerHTML = ""
    data.rows_afisha.forEach(() =>{
        afisha.append(template.content.cloneNode(true))
    })

    btn_movie = document.querySelectorAll('.btn_movie')
    btn_buy = document.querySelectorAll('.btn_buy')
    card = document.querySelectorAll('.card')
    data.rows_afisha.forEach((element, i) => {
        card[i].id = "card_"+element['id']
        document.querySelectorAll('.img')[i].src = '../'+element['photo']
        document.querySelectorAll('.name')[i].textContent = element['name']
        document.querySelectorAll('.date')[i].innerHTML = "Дата показа: "+element['date_show']
        document.querySelectorAll('.age')[i].innerHTML = "Возрастной рейтинг: "+element['age']+"+"
        document.querySelectorAll('.genre')[i].innerHTML = "Жанр: "+element['genre']
        document.querySelectorAll('.description')[i].innerHTML = "Синопсис: "+element['description']
        document.querySelectorAll('.price')[i].innerHTML = "Цена: "+element['price']+"₽"
        btn_movie[i].id = "btn_movie_"+element['id']
        btn_buy[i].id = "btn_buy_"+element['id']
    })
    btn_movie.forEach((element, i) => {
        element.addEventListener('click', () => {
            card[i].classList.toggle('card_full');

            if(card[i].classList.contains('card_full')){
                element.textContent = 'Закрыть';
            }
            else{
                element.textContent = 'Открыть';
            }
        })
    })

    btn_buy.forEach((element, i) => {
        element.addEventListener('click', () => {
            if(confirm('Купить '+data.rows_afisha[i]['name']+' '+data.rows_afisha[i]['price']+'₽?')){
                fetch("afisha.php",{
                    method: 'POST',
                    body: JSON.stringify(data.rows_afisha[i]['id'])
                    }
                )
                alert('Куплено!')
            }
        })
    })
}

//форма
const form = document.getElementById('sort_form')
const entform = document.getElementById('ent')

entform.addEventListener('click', function(event){
    event.preventDefault()
    const formattedFormData = {
        sel: form.sel_sort.value,
        chck_desc: form.chck_desc.checked
    }
    sort_post(formattedFormData)
})