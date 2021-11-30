<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $output = "";

        $sql = "SELECT * FROM  messages WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
                or (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query)>0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['outgoing_msg_id']=== $outgoing_id){//si es igual es un remitente
                    $output .= '<div class="d-flex flex-row-reverse outgoing">
                                    <p class="shadow enviado rounded-top rounded-start p-2 align-text-bottom" style="max-width: 350px;">
                                     ' . $row['msg'] .'
                                    </p>
                                </div>';
                }else{
                    $output .='<div class="incoming">
                                    <p class="shadow recibido rounded-top rounded-end p-2" style="max-width: 350px;">
                                        ' . $row['msg'] .'
                                    </p>
                                </div>';
                }
            }
            echo $output;
        }
        
    }else{
        header("Location: ../index.php");
    }
?>