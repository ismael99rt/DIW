<?php
     include('conexiones.php');
     // Create connection
     $conn = new mysqli($servername, $username, $password, $dbname);
     // Check connection
     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
     }

    $nombre=$_POST["nombre"];
    $apellidos=$_POST["apellidos"];
    $nif=$_POST["nif"];
    $telefono=$_POST["telefono"];
    $pass1=$_POST["password1"];
    $correo1=$_POST["email1"];
    $correo2=$_POST["email2"];
    $clave="";
    $correo="";
    $token = md5( rand(0,1000) );
    $bloqueado=0;
    $entrar=true;


    if(validar_clave(($pass1))){
        $clave=$pass1;
        $clavecifrada=md5($clave);
    } else {
        $entrar=false;
    }
    
    if(!filter_var($correo1, FILTER_VALIDATE_EMAIL)){
        $entrar=false;
    }
    if(!filter_var($correo2, FILTER_VALIDATE_EMAIL)){
        $entrar=false;
    }

    if($correo1==$correo2){
        $correo=$correo1;
    } else {
        $entrar=false;
    }

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
            $entrar=false;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $uploadOk = 0;
            $entrar=false;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } else {
                $entrar=false;
            }
        }

    if($entrar==true){
        if(isset($_POST["submit"])) {
            $conexion=mysqli_connect($servername, $username, $password, $dbname) or
            die("Problemas con la conexión");

            mysqli_query($conexion,"INSERT INTO tabladiw (usuario,password,correo,bloqueado,token,foto) VALUES
                ('$usuario','$clavecifrada','$correo','$bloqueado','$token','$nombreFoto')");


        mysqli_close($conexion);
        ?>
        <script lang="JavaScript">
                    window.location.href="sesionAdmin.php";
                </script>
        <?php
    } 
    }else {
        echo ("Se ha producido un error a la hora de registrar el usuario");
        ?>
            <br>
            <a href="registro.php"><input type="button" value="Volver a intentar"></a>
        <<?php
    }



    function validar_clave($pass1){
        if(strlen($pass1) < 8){
           return false;
        }
        if(strlen($pass1) > 24){
           return false;
        }
        if (!preg_match('`[a-z]`',$pass1)){
           return false;
        }
        if (!preg_match('`[A-Z]`',$pass1)){
           return false;
        }
        if (!preg_match('`[0-9]`',$pass1)){
           return false;
        }
        $error_clave = "";
        return true;
     }





?>