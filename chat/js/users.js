const searchBar = document.getElementById('input_buscar');
//btn_search = document.querySelector('.users .')

// searchBar.addEventListener('keyup', (e) => {
//     console.log(e.target.value);
// });


//lista users 

searchBar.addEventListener('keyup', (e) => {
    let searchTerm = searchBar.value;
    //si esta en suo el input se desabilita la lista general
    if(searchTerm != ""){
        searchBar.classList.add("active");
    }else{
        searchBar.classList.remove("active");
    }
    let xhr = new XMLHttpRequest();
    xhr.open("POST","php/search.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                lista.innerHTML = data;
            }
        }
    }
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.send("searchTerm=" + searchTerm);
})
const lista = document.querySelector('.lista-u');

setInterval(() => {
    //es para ajax prefiero axios
    let xhr = new XMLHttpRequest();
    xhr.open("GET","php/usersC.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                //para activar la lista general o no input search
                if(!searchBar.classList.contains("active")){
                    lista.innerHTML = data;
                }
            }
        }
    }
    xhr.send();
}, 500);//estara corriendo cada 500ms