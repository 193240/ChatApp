<?php

   session_start();
   include_once "config.php";
   //name de index login
   $mail_login = mysqli_real_escape_string($conn, $_POST['mail_login']);
   $login_password = mysqli_real_escape_string($conn, $_POST['login_password']);
   
   if(!empty($mail_login) && !empty($login_password) ){
       //validar usuario
        $sql = mysqli_query($conn,"SELECT email from users where email = '{$mail_login}'");
        if(mysqli_num_rows($sql)>0){
            $sql2 = mysqli_query($conn,"SELECT * from users where email = '{$mail_login}' and password = '{$login_password}'");
            if(mysqli_num_rows($sql2)>0){
                $row = mysqli_fetch_assoc($sql2);
                $_SESSION['unique_id'] = $row['unique_id'];// usando esta sesion en otro php
                $data = "Session";
                return $data;
            }else{
                echo "Contraseña incorrecta";
            }
        }else{
            echo "Correo no registrado o incorrecto";
        }
   }else{
       echo "Debe llenar todos los campos";
   }
//    session_start();
//    include_once "config.php";
//    //name de los input de index login php 
//    $mail_login = mysqli_real_escape_string($conn, $_POST['mail_login']);
//    $login_password = mysqli_real_escape_string($conn, $_POST['login_password']);

//    if(!empty($mail_login) && !empty($login_password)){
//        //validar usuario
//        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$mail_login}' and password = '{$login_password}'");
//        if(mysqli_num_rows($sql)>0){
//            $row = mysqli_fetch_assoc($sql);
//            $_SESSION['unique_id'] = $row['unique_id'];
//            echo "certificado";
//        }else{
//            echo "Correo o contraseña incorrectos";
//        }
//    }else{
//        echo "Debe llenar todos los campos";
//    }
?>   