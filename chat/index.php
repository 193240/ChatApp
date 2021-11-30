<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        header('Location: users.php');
    }
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://img.icons8.com/color/48/000000/chat--v1.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    
    <title>Chat Inicio</title>
</head>

<body class="index">
    <div class="container-fluid ht d-flex align-items-center justify-content-center">
        <div class="container caja-todo">
            <div class="container caja-transparente shadow d-flex align-items-center justify-content-center text-white rounded">
                <div class="container text-center">
                    <h3>¿Ya tienes una cuenta?</h3>
                    <p>Inicia sesion para Chatear </p>
                    <footer class="d-grid">
                        <button type="button" id="btn_login" class="btn btn-outline-light">Iniciar sesion</button>
                    </footer>
    
                </div>
                <div class="container text-center">
                    <h3>¿Aún no tienes cuenta?</h3>
                    <p>Registrate para Chatear</p>
                    <footer class="d-grid">
                        <button type="button" id="btn_register" class="btn btn-outline-light">Registrarse</button>
                    </footer>
                </div>
            </div>
            <!-- caja frontal -->
            <div class="caja-frontal">
                <div class="container login rounded  px-5 pt-4" id="login">
                    <form>
                        <legend class="fw-bold text-center ">Chat app</legend>
                        
                        <div class="alertas">
                        <div class="alert alert-success succes-alert py-0" role="alert">
                            <p class="mb-0">Registro exitoso!</p>
                            <p class="mb-0">Ya puede ingresar</p>
                        </div>
                        <div class="alert alert-danger py-0 alert-login" role="alert">
                      
                        </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="login_mail" name="mail_login" aria-describedby="emailHelp" 
                            placeholder="Mail" required>
                        </div>
    
                        <label for="" class="form-label">Password</label>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control " name="login_password" id="login_pass"
                                placeholder="Contraseña" required>
                            <button class="btn btn-outline-dark " type="button" id="togglePassword">
                                <i class="bi bi-eye-slash"></i>
                            </button>
                        </div>
                        <footer class="d-grid">
                            <button type="button" class="btn btn-dark " name="iniciar_sesion" id="logearse">Iniciar</button>
                        </footer>
    
                    </form>
                </div>
                <div class="container rounded register  pt-3">
                    <form action="#" enctype="multipart/form-data" autocomplete="off">
                        <legend class="fw-bold text-center">Chat app</legend>
                        <div class="alert alert-danger alert-register py-0" id="liveAlertR" role="alert">
                            
                        </div>
                        <div class="row">
                            <div class=" col">
                                <label for="formGroupExampleInput" class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre_user" 
                                placeholder="Nombre" required>
                            </div>
                            <div class=" col">
                                <label for="formGroupExampleInput" class="form-label">Apellido</label>
                                <input type="text" class="form-control" name="apellido" id="apellido_user" 
                                placeholder="Apellido" required>
                            </div>
                        </div>
                        
                        <div class="">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="mail_user" name="register_mail" aria-describedby="emailHelp"
                                placeholder="Mail" required>
                        </div>
                        <label for="" class="form-label">Password</label>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="register_password" id="user_pass"
                                placeholder="Contraseña" required>
                            <button class="btn btn-outline-dark" type="button" id="togglePassword2">
                                <i class="bi bi-eye-slash"></i>
                            </button>
                        </div>
                        <div class="mb-4">
                            <label for="formFile" class="form-label">Subir foto</label>
                            <input class="form-control" type="file" name="fotoPerfil" id="formFile_perfil" required>
                        </div>
                        <!-- <div class="mb-3">
                            <label for="formFile" class="form-label">Subir portada</label>
                            <input class="form-control" type="file" name="fotoPortada" id="formFile_portada" required>
                        </div> -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-dark " name="registro" id="registrar">Continuar para Chatear</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="./js/pass.js"></script>
    <script src="./js/transicion.js"></script>
    <script src="./js/login.js"></script>
    <script src="./js/register.js"></script>
    <?php
        $background_url = "./img/wallpaperbetter.com_1920x1200\ \(3\).jpg";
    ?>
    <style>
        .index {
            background: url(<?php echo $background_url; ?>) no-repeat center center fixed;
        }
    </style>
</body>

</html>