<?php
    if (count($_POST) > 0) {
        include('conexiones.php');
        $id="";
        $nombre = "";
        $email = "";
        $email2 = "";
        $contraseña = "";
        $contraseña2 = "";
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
        }
        if (isset($_POST['email'])) {
            $email = $_POST['email'];
        }
        if (isset($_POST['email2'])) {
            $email2 = $_POST['email2'];
        }
        if (isset($_POST['nombre'])) {
            $nombre = $_POST['nombre'];
        }
        if (isset($_POST['contraseña'])) {
            $contraseña = $_POST['contraseña'];
        }
        if (isset($_POST['contraseña2'])) {
            $contraseña2 = $_POST['contraseña2'];
        }
        $validoEmail = false;
        $validoPass = false;
        $bloqueado = true;
        $token;
        $fechaToken = date("m.d.y") . $nombre;
        $token = md5($fechaToken);
        $errores = "";
        $creado = "";
        $comprobarEmail = true;

        //para la foto
        $target_dir = "img/";
        $uploadOk = 1;
        $errorImagen = "";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $nombreFoto = $_FILES['fileToUpload']['name'];
        //para comprobar si es una imagen falsa o no
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                $errorImagen = $errorImagen . "no es una imagen";
                $uploadOk = 0;
            }
        }
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            $errorImagen = $errorImagen . "la imagen pesa demasiado";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $errorImagen = $errorImagen . "Solo puede introducir imagenes .jpg, .jpeg, .png";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $errorImagen = $errorImagen . "no has elegido imagen";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } else {
                $errorImagen = $errorImagen . "error al subir la imagen";
            }
        }
        //
        if ($email == $email2) {
            $validoEmail = true;
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $comprobarEmail = false;
            $errores = " email no es valido";
        }
        if (!filter_var($email2, FILTER_VALIDATE_EMAIL)) {
            $comprobarEmail = false;
            $errores = " email no es valido";
        }
        if ($contraseña == $contraseña2) {
            $validoPass = true;
        }

        $contraseñaCifrada = md5($contraseña);
        if ($validoEmail && $validoPass && $comprobarEmail && $uploadOk == 1) {

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            $sql = "UPDATE usuarios
                          SET email='$email',
                            nombre='$nombre',
                            password='$contraseñaCifrada',
                            foto='$nombreFoto'
                            where id='$id'";

            if ($conn->query($sql) === TRUE) {
    ?>
                <script lang="javaScript">
                    alert("se actualizado el registro");
                </script>
    <?php

                
            } else {
                $errores = $errores . " usuario ya existente ";
            }

            $conn->close();
        } else {


            if (!$validoEmail || !$validoPass || $uploadOk == 0) {
                $errores = $errores . "," . $errorImagen . ", la contraseña no coinciden";
            }
        }
        if ($errores == "") {
            $creado = "usuario actualizado";
        }
    }
?>