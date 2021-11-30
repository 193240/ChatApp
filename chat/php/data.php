<?php
    while($row = mysqli_fetch_assoc($sql)){
         $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
                     OR outgoing_msg_id = {$row['unique_id']}) AND (incoming_msg_id = {$outgoing_id}
                     OR outgoing_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
         $query2 = mysqli_query($conn, $sql2);
         $row2 = mysqli_fetch_assoc($query2);
         if(mysqli_num_rows($query2) > 0){
             $result = $row2['msg'];
         }else{
             $result = "Mensaje no disponible";
         }            
         //se recorta el mensaje para no ocupar todo
         (strlen($result) > 16) ? $msg = substr($result, 0, 16).'...' : $msg = $result;
         //añadir un tu para diferenciar  mensajes
         
        if(isset($row2['outgoing_msg_id'])){
        ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "Tú: " : $you = "";
        }else{
            $you = "";
        }
        ($row['status'] == "Active now") ? $online = "online": $online = "";

        $output .= '<a class="list-group-item d-flex row align-items-center container p-0" 
                        href="chat.php?user_id='. $row['unique_id'].'" style="height:60px">
                        <div class="profile-userpic col">
                            <img src="images/'. $row['img_perfil'] .' " class="img-responsive" alt="">
                        </div>
                        <div class="text-nowrap text-start col-7 py-0">
                           <p class="m-0 fw-bold">'. $row['fname'] . " ".  $row['lastname'].'</p>
                           <p class="m-0">'. $you . $msg .'</p>
                        </div>
                        <div class="text-nowrap text-start col-2 '. $online .'">
                            <i class="bi bi-chat-left-fill"></i>
                        </div>
                        
                    </a>';
    }
?>