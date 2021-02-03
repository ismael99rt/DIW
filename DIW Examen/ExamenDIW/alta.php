<?php
     include('conexiones.php');
     // Create connection
     $conn = new mysqli($servername, $username, $password, $dbname);
     // Check connection
     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
     }

    $nombre=$_POST["nombre"];
    $apellido1=$_POST["apellido1"];
    $apellido2=$_POST["apellido2"];
    $nif=$_POST["nif"];
    $telefono=$_POST["telefono"];
    $pass1=$_POST["clave"];
    $correo=$_POST["correo"];
    $clave="";
    $token = md5( rand(0,1000) );
    $bloqueado=0;
    $entrar=true;

    echo $pass1;
    if(validar_clave(($pass1))){
        $clave=$pass1;
        $clavecifrada=md5($clave);
    } else {
        $entrar=false;
    }
    
    if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
        $entrar=false;
    }
    
    if (!preg_match('/^[6|9]\d{8}$/',$telefono)){
        $entrar=false;
    }
    if (!preg_match('/^[0-9]{8}[A-Za-z]{1}$/',$nif)){
        $entrar=false;
    }
    

    if($entrar==true){
        if(isset($_POST["submit"])) {
            $conexion=mysqli_connect($servername, $username, $password, $dbname) or
            die("Problemas con la conexión");
            echo("Adelante");
            mysqli_query($conexion,"INSERT INTO clientes (Clientes_Nombre,Clientes_Apellido1,Clientes_Apellido2,Clientes_Clave,Clientes_Direccion,Clientes_NIF,Clientes_IBAN,Clientes_Telefono,Clientes_URL,Clientes_Longitud,Clientes_Latitud,Clientes_Email,Clientes_Foto,Clientes_Melodia) VALUES
                ('$nombre','$apellido1','$apellido2','$clavecifrada',null,'$nif',null,'$telefono',null,null,null,'$correo',null,null)");


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
        <?php
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