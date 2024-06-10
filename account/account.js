fetch("../session.php")
    .then((response) =>{
        if(!response.ok){
            throw new Error("Ничего не работает!")
            
        }
        return response.json()
    })
    .then((data) =>{
        if(data['users_role'] == 'adm'){
            
        }
        users_name = document.getElementsByClassName('users_name')
        users_name[0].innerHTML = "Добро пожаловать "+data['users_name']
        document.getElementById('exit').addEventListener("click",() => {
            fetch("../session.php",{
                method: 'POST',
                body: JSON.stringify("destroy")
                }
            ).then(() => {
            window.location.href = "../about/about.html";
            })
        })
    })