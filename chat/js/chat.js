const form =document.querySelector(".typing-area"),
 btnSend = document.getElementById('send'),
 inputS = document.getElementById('sendInput'),
 chatBox = document.querySelector('.chat-body');
 
form.onsubmit=(e) => {
    e.preventDefault();
}

btnSend.onclick = () =>{
    //es para ajax prefiero axios
    let xhr = new XMLHttpRequest();
    xhr.open("POST","php/insert-chat.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                inputS.value = "";//eliminar contenido del input
                scrollTopBottom();
            }
        }
    }
    //para enviar el formulario login con ajax a php
    let formData = new FormData(form);
    xhr.send(formData);
}
chatBox.onmouseenter = () => {
    chatBox.classList.add("active");
}
chatBox.onmouseleave = () => {
    chatBox.classList.remove("active");
}
setInterval(() => {
    //es para ajax prefiero axios
    let xhr = new XMLHttpRequest();
    xhr.open("POST","php/get-chat.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                chatBox.innerHTML = data;
                if(!chatBox.classList.contains("active")){
                    scrollTopBottom();
                }
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}, 500);//estara corriendo cada 500ms

function scrollTopBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
}