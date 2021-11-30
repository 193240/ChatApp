<?php
    //asi se usa version 1
    // $mysqli = new mysqli("ejemplo.com", "usuario", "contraseña", "basedatos");
    //asi se usa version 2
    //$pdo = new PDO('mysql:host=ejemplo.com;dbname=basedatos', 'usuario', 'contraseña');
    // $conn = mysqli_connect("localhost", "root","","chatApp" );
    $conn = mysqli_connect("localhost", "id18040726_shannon","2I_qVe-kVPLYo/w#","id18040726_chatapp" );
    if( !$conn ){
        echo "Connect fail to database: ". mysqli_connect_error();
    }
?>