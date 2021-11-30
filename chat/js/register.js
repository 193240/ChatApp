
// boton registrarse
const registro = document.querySelector("#registrar")

//formulario registro
const registerForm = document.querySelector(".register form")
//div de registro
const registerS = document.querySelector(".register")
//alerta de registro
const errorText = document.querySelector(".alert-register")
//alerta success de login
const alertText = document.querySelector(".succes-alert")
registerForm.onsubmit=(e) => {
    e.preventDefault();
}
registro.onclick = () =>{
    //es para ajax prefiero axios
    let xhr = new XMLHttpRequest();
    xhr.open("POST","php/registerUp.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                console.log(data);
                console.log(data == "success");
                if(data == "success"){
                    alertText.style.display = "block";
                    //alertText.textContent = "Registro exitoso! Ya puede ingresar"
                    login.style.height = "400px";
                    login.style.display = 'block';
                    login.style.right = '360px';
                    registerS.style.display = 'none';
                }else{
                    errorText.textContent = data;
                    errorText.style.display = "block";
                    registerS.style.height = "520px";
                }
            }
        }
    }
    //para enviar el formulario con ajax a php
    let formData = new FormData(registerForm);
    xhr.send(formData);
}