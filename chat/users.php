<?php
    session_start();
    if(!isset($_SESSION['unique_id'])){
        header('Location: index.php');
    }
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://img.icons8.com/color/48/000000/chat--v1.png"/>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="users.css">
    <title>Usuarios</title>
</head>

<body class="users back">
    <?php
        include_once "php/config.php";
        $sql = mysqli_query($conn, "SELECT * FROM users where unique_id = {$_SESSION['unique_id']}");
        if(mysqli_num_rows($sql)){
            $row = mysqli_fetch_assoc($sql);
        }
    ?>
    <div class="container-fluid ht d-flex align-items-center justify-content-center">
        <div class="card text-white bg-dark profile-card-2 " style="width: 20rem;">
            <img class="card-img-top"
                src="./img/chat.jpg"
                alt="">
            <div class="card-body text-end">
                <img src="images/<?php echo $row['img_perfil'] ?>" alt="profile-image" class="profile">
                <a class="btn btn-outline-light btn-sm"  href="php/logout.php?logout_id=<?php echo $row['unique_id'] ?>">
                 Cerrar sesion
                </a>
                <h5 class="card-title text-start"><?php echo $row['fname'] ." ". $row['lastname'] ?> </h5>
            </div>
            <div class="card-body">
                <div class="input-group d-flex justify-content-center" id="searchBar">
                    <div class="form-outline">
                        <input type="search" id="input_buscar" class="form-control" placeholder="Buscar chat">
                    </div>
                    <button type="button" class="btn btn-outline-light" id="btn_buscar">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </div>
            <div class="card-body  overflow-auto scroll mb-2" style="height: 200px;" >
                <ul class="list-group lista-u d-flex align-items-center">
                    
                    
                </ul>    
               
            </div>
        </div>
    </div>
    <script src="./js/users.js"></script>
    <?php
        $background_url = "./img/wallpaperbetter.com_1920x1200\ \(4\).jpg";
    ?>
    <style>
        .users {
            background: url(<?php echo $background_url; ?>) no-repeat center center fixed;
        }
    </style>
</body>

</html>