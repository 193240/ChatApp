//transicion de index php
//caja todos
const todo = document.querySelector('caja-todo');
//caja trasera
const transparente = document.querySelector('caja-transparente');
//caja frontal
const frontal = document.querySelector('caja-frontal');

//login class
const login = document.querySelector('.login');
//register class
const register = document.querySelector('.register');
// boton login
const btn_login = document.querySelector('#btn_login');
//boton register
const btn_register = document.querySelector('#btn_register');


 btn_register.addEventListener('click', () => {
    register.style.display = 'block';
    register.style.left = '360px'
    login.style.display = 'none';
 });


 btn_login.addEventListener('click', () => {
    login.style.display = 'block';
    login.style.right = '360px'
    register.style.display = 'none';
 });