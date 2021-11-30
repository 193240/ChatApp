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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="chat.css">
    <title>Chat</title>
</head>

<body class="chat">
    <?php
        include_once "php/config.php";
        $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
        $sql = mysqli_query($conn, "SELECT * FROM users where unique_id = {$user_id}");
        if(mysqli_num_rows($sql)){
            $row = mysqli_fetch_assoc($sql);
        }
    ?>
    <div class="container-fluid ht d-flex align-items-center justify-content-center">
        <div class="container rounded px-0 shadow box-chat ">
            <div class="chat-header rounded-top py-3 d-flex">
                <div class="col-1 d-flex align-items-center justify-content-center ">
                    <button class="btn  btn-outline-dark btn-sm " onclick="window.location.href='users.php'">
                        <i class="bi bi-arrow-left"></i>
                    </button>
                </div>
                <div class="p-0">
                    <div class="perfil">
                        <img src="images/<?php echo $row['img_perfil'] ?>" class=" rounded-circle" alt="">
                    </div>
                </div>

                <div class="px-2">
                    <h5><?php echo $row['fname'] ." ". $row['lastname'] ?></h5>
                    <p><?php echo $row['status'] ?></p>
                </div>

            </div>
            <div class="chat-body p-4 overflow-auto mb-2" style="height:400px">
                
            </div>
            <div class="chat-footer p-2 rounded-bottom" >
                <form action="#" Class="typing-area" autocomplete="off">
                    <input type="text" class="form-control" name="outgoing_id" value="<?php echo $_SESSION['unique_id']; ?>" hidden>
                    <input type="text" class="form-control" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
                    <div class="input-group">
                        <input type="text" class="form-control" name="inputSend" id="sendInput" placeholder="Escribir mensaje" aria-label="">
                        <button class="btn btn-outline-dark" id="send" type="button">Enviar <i class="bi bi-send-fill"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
        $background_url = "./img/wallpaperbetter.com_1920x1200.jpg";
    ?>
    <style>
        .chat {
            background: url(<?php echo $background_url; ?>) no-repeat center center fixed;
        }
    </style>
    <script src="./js/chat.js"></script>
</body>

</html>