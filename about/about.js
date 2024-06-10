//получение данных бд
async function sort_post(){
    const res = await fetch('../db.php');
    const data = await res.json();
    console.log(data.rows_about)
    template = document.getElementById('tmplt_movie')
    data.rows_about.forEach(() =>{
        container.append(template.content.cloneNode(true))
    })

    data.rows_about.forEach((element,i) =>{
        document.querySelectorAll('.name')[i].textContent = element['name']
        document.querySelectorAll('.date')[i].textContent += element['date_show']
        document.querySelectorAll('.age')[i].textContent += element['age']+"+"
        document.querySelectorAll('.genre')[i].textContent += element['genre']
        document.querySelectorAll('.description')[i].textContent += element['description']
        document.querySelectorAll('.price')[i].textContent += element['price']+"₽"
        document.querySelectorAll('.page')[i].style.background = "linear-gradient(90deg, rgba(13,13,32,0.6419701669730392) 20%, rgba(24,26,27,1) 35%),url("+'../'+element['photo']+")";
    })
}
//скролл
const container = document.querySelector('.container');
let scrollLine = document.querySelector('.scroll');
container.addEventListener('wheel', (e)=> {
    e.preventDefault();
    container.scrollLeft += e.deltaY;
    scrollLine.style.width = container.scrollLeft / 5 + 'px';
})
sort_post()