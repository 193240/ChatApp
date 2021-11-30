// boton iniciar sesion
const btnInicio = document.querySelector("#logearse")
//formulario login
const loginForm = document.querySelector(".login form")
//div de login
const loginS = document.querySelector(".login")
//alerta de login
const errorLogin = document.querySelector(".alert-login")


loginForm.onsubmit=(e) => {
   e.preventDefault();
}

btnInicio.onclick = () =>{
    //es para ajax prefiero axios
    let xhr = new XMLHttpRequest();
    xhr.open("POST","php/login.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                console.log(data)
                if("certificado" == data){
                    console.log("Success!");
                    location.href = "users.php";
                }else{
                    alertText.style.display = "none";
                    errorLogin.textContent = data;
                    errorLogin.style.display = "block";
                    loginS.style.height = "350px";
                }
            }
        }
    }
    //para enviar el formulario login con ajax a php
    let loginData = new FormData(loginForm);
    xhr.send(loginData);
}
