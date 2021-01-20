<?php

//Crear conexión
    $servername = "localhost";
    $username = "oukqmvok_diw";
    $password = "Trebujena2020";
    $dbname = "oukqmvok_diw";

    $conn = new mysqli($servername, $username,$password,$dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $usuario=$_POST["usernick"];
    $pass1=$_POST["password1"];
    $pass2=$_POST["password2"];
    $correo1=$_POST["email1"];
    $correo2=$_POST["email2"];
    $clave="";
    $correo="";
    $bloqueado=1;
    $token = md5( rand(0,1000) );

    //yo lo he hecho tras declarar las primeras variables

    //Código imagen a subir
    $target_dir = "img/";
        $uploadOk = 1;
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $nombreFoto = $_FILES['fileToUpload']['name'];
        //para comprobar si es una imagen falsa o no
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
        }
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            $uploadOk = 0;
            
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } else {
                
            }
        }

    if($correo1==$correo2){
        $correo=$correo1;
        $destinatario=$correo; 

        if($pass1==$pass2) {
            $clave=$pass1;
            $clavecifrada=md5($clave);

             //Pasamos al envío del email y datos a la base de datos si se cumplen todas las condiciones
                    
                    //Envío de correo
                    $para      = $correo;
                    $titulo    = 'Activación de cuenta Proyecto DIW';
                    $mensaje = '<html>'.
                        '<head><title>Activación de cuenta - Proyecto DIW</title></head>'.
                        '<body><h1>Bienvenido al proyecto de DIW</h1>'.
                        $usuario. ', te damos la bienvenida al proyecto de Desarrollo de Interfaces de 2 DAW. Para poder activar su cuenta, haga clic en el enlace: '.
                        '<hr>'.
                        '<h3>Datos de su cuenta :</h3>'.
                        '<br>'.
                        'Usuario: '. $usuario.
                        '<br>'.
                        'Contraseña: '. $clavecifrada.
                        '<br>'.
                        '<b>Enlace de activación :</b>'.
                        'http://www.ismael2daw.es/Registro/verify.php?email='.$correo.'&token='.$token.
                        
                        '</body>'.
                        '</html>';
                    $cabeceras = 'MIME-Version: 1.0' . "\r\n";
                    $cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                    $cabeceras .= 'De: Ismael RT';
                    mail($para, $titulo, $mensaje, $cabeceras); //Envío de email

                    //Establecer conexión
                    if(isset($_POST["submit"])) {
                        $conexion=mysqli_connect($servername, $username, $password, $dbname) or
                        die("Problemas con la conexión");

                        mysqli_query($conexion,"INSERT INTO tabladiw (usuario,password,correo,bloqueado,token,foto,longitud,altitud) VALUES
                            ('$usuario','$clavecifrada','$correo','$bloqueado','$token','$nombreFoto','null','null')");

            
                    mysqli_close($conexion);
                    echo "Registro realizado con éxito. Compruebe su correo para verificar la cuenta";
                    
                    ?>
                        <a href="formulario.php"> <input type="submit" value="Iniciar sesión"></a>
                    <?php
                    }
        } else {
            $entrar=false;
            $error="Los campos no coinciden. Inténtelo de nuevo";
            echo $error;
            ?>
               <a href="formulario.php"> <input type="submit" value="Regresar al registro"></a>
            <?php
        }
            
    } else {
        $entrar=false;
        $error="Los campos no coinciden. Inténtelo de nuevo";
        echo $error;
        ?>
           <a href="formulario.php"> <input type="submit" value="Regresar al registro"></a>
        <?php
    }
    
?>
