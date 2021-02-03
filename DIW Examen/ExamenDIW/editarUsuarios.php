<?php
    if(count($_POST)>0){
        include('conexiones.php');
        $id="";
        $pass1="";
        $direccion="";
        $nif="";
        $iban="";
        $telefono="";
        $url="";
        $longitud="";
        $latitud="";
        $email="";
        
        $entrar=true;

        if(isset($_POST['id'])){
            $id = $_POST['id'];
        }
        if (isset($_POST['clave'])) {
            $pass1 = $_POST['clave'];
        }
        if (isset($_POST['direccion'])) {
            $direccion = $_POST['direccion'];
        }
        if (isset($_POST['nif'])) {
            $nif = $_POST['nif'];
        }
        if (isset($_POST['iban'])) {
            $iban = $_POST['iban'];
        }
        if (isset($_POST['telefono'])) {
            $telefono= $_POST['telefono'];
        }
        if (isset($_POST['url'])) {
            $url = $_POST['url'];
        }
        if (isset($_POST['longitud'])) {
            $longitud = $_POST['longitud'];
        }
        if (isset($_POST['latitud'])) {
            $latitud = $_POST['latitud'];
        }
        if (isset($_POST['email'])) {
            $email = $_POST['email'];
        }

        echo ("ID :".$id);
        

        if(validar_clave(($pass1))){
            $clave=$pass1;
            $clavecifrada=md5($clave);
        } else {
            $entrar=false;
        }
        
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $entrar=false;
        }
        
        if (!preg_match('/^[ES]{2}\d{20}$/',$iban)){
            $entrar=false;
        }
        if (!preg_match('/^[6|9]\d{8}$/',$telefono)){
            $entrar=false;
        }
        
        
         
            
    //Foto
    $target_dir = "img/";
    $target_file = $target_dir . basename($_FILES["imagen"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $nombreFoto=$_FILES["imagen"]["name"];
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["imagen"]["tmp_name"]);
      if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["imagen"]["name"])). " has been uploaded.";
        } else {
        echo "Sorry, there was an error uploading your file.";
        }
    }

            if($entrar==true){
                    $conexion=mysqli_connect($servername, $username, $password, $dbname) or
                    die("Problemas con la conexión");
                
                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $sql = "UPDATE clientes
                                  SET Clientes_Clave='$clavecifrada',
                                    Clientes_Direccion='$direccion',
                                    Clientes_IBAN='$iban',
                                    Clientes_Telefono='$telefono',
                                    Clientes_URL='$url',
                                    Clientes_Longitud='$longitud',
                                    Clientes_Latitud='$latitud',
                                    Clientes_Email='$email',
                                    Clientes_Foto='$nombreFoto'
                                    where Clientes_ID='$id'";
    
                    if ($conn->query($sql) === TRUE) {
                        ?>
                        <script lang="javaScript">
                            alert("Se actualizado el registro");
                            window.location.href="consultaUsuarios.php";
                            </script>
                        <?php 
                    } else {
                        echo ("El usuario ya existe");
                    }
                $conn->close();
                
            } else {
                echo ("Se ha producido un error a la hora de actualizar el registro");
                ?>
                    <br>
                    <a href="consultaUsuarios.php"><input type="button" value="Volver a intentar"></a>
                <?php
            }

    } else {
        //echo("Se ha producido un error");
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