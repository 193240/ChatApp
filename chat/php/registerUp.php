<?php
   include_once "config.php";
   //name de index register
   $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
   $apellido = mysqli_real_escape_string($conn, $_POST['apellido']);
   $register_mail = mysqli_real_escape_string($conn, $_POST['register_mail']);
   $register_password = mysqli_real_escape_string($conn, $_POST['register_password']);
   // $foto_portada = mysqli_real_escape_string($conn, $_POST['fotoPortada']);
   $uploads_dir = '/images';//ruta de las imagenes

   if(!empty($nombre) && !empty($apellido) && !empty($register_mail) && !empty($register_password)){
      //revisar si el correo es valido
      if(filter_var($register_mail, FILTER_VALIDATE_EMAIL)){
         //revisar si ya esta registrado
         $sql = mysqli_query($conn,"SELECT email FROM users WHERE email ='{$register_mail}'");
         if(mysqli_num_rows($sql)>0){
            echo "$register_mail - Ya esta registrado";
         }else{
            //si se sube foto o no
            
            if($_FILES['fotoPerfil']['name']>0){//si hay imagen cargada
               $img_name = $_FILES['fotoPerfil']['name'];//obtener el nombre de la img cargada por el usuario
               $tmp_name = $_FILES['fotoPerfil']['tmp_name'];//nombre temporal para mover/subir en el folder
               
               //echo $img_name;
               //explode y obtener extension jpg o png en el
               $img_explode = explode('.', $img_name);
               $img_ext = end($img_explode);// se obtiene la extension de la imagen subida por el us¿suario

               $extensions = ['png', 'jpg', 'jpeg'];
               if(in_array($img_ext, $extensions)===true){//si el usuario sube extension que pertenece al array
                  $time = time();//mucho texto

                  $new_img_name = $time.$img_name;
                  
                  if(move_uploaded_file($tmp_name, "..$uploads_dir/$new_img_name")){//si se mueve correctamente al ala carpeta imagenes
                     $status = "Active now";//si el usuario esta logeado el estatus debe se activo
                     $random_id = rand(time(), 10000000);//para crear random id de usuario
                     //insertamos todo la data en la bd
                     $sql2 = mysqli_query($conn, "INSERT INTO users(unique_id,fname,lastname,email,password,img_perfil,status)
                              VALUES({$random_id}, '{$nombre}', '{$apellido}', '{$register_mail}', '{$register_password}', '{$new_img_name}', '{$status}')");
                     if($sql2){//si tenemos data insertada
                        echo "success";
                        // $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$register_mail}'");
                        // if(mysqli_num_rows($sql3) >0){
                        //    $row = mysqli_fetch_assoc($sql3);
                        //    $_SESSION['unique_id'] = $row['unique_id'];// usando esta sesion en otro php
                        //    echo "success";
                        // }   
                     }else{
                        echo "Ups! Ocurrio un error";
                      }
                  }else{
                     echo "Ups! Ocurrio un error interno con la imagen";
                   }   
               }else{
                  echo "Por favor suba una imagen con extension png, jpg, jpeg";
               } 
            }else{
               echo "Por favor suba una imagen de perfil";
            }
         }
      }else{
         echo "$register_mail - Este correo no es valido";
      }
   }else{
      echo "Tienes que llenar todos los campos";
   }
?>