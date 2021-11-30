
// boton del input
const togglePassword = document.querySelector('#togglePassword');
//input  
const password = document.querySelector('#login_pass');
togglePassword.addEventListener('click', () => {
    // Toggle the type attribute using
    // getAttribure() method
    const type = password
    //usamos operador ternario
        .getAttribute('type') === 'password' ?
        'text' : 'password';     
    password.setAttribute('type', type);

    // Toggle the eye and bi-eye icon
    //this.classList.toggle('bi-eye');
});

// boton del input
const togglePassword2 = document.querySelector('#togglePassword2');
//input  
const password2 = document.querySelector('#user_pass');
  
togglePassword2.addEventListener('click', () => {
    // Toggle the type attribute using
    // getAttribure() method
    const type = password2
    //usamos operador ternario
        .getAttribute('type') === 'password' ?
        'text' : 'password';    
    password2.setAttribute('type', type);

    // Toggle the eye and bi-eye icon
    //this.classList.toggle('bi-eye');
});


