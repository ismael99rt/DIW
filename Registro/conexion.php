<?php

//Crear conexión
    $servername = "fdb28.awardspace.net";
    $username = "3598790_cdpjosecabrera";
    $password = "trebujena2020";
    $dbname = "3598790_cdpjosecabrera";

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
    $token="0";

    if($correo1==$correo2){
        $correo=$correo1;
        $destinatario=$correo;

        if($pass1==$pass2) {
            $clave=$pass1;
            $clavecifrada=md5($clave);

            //Envío de correo
            $asunto="Activacion de cuenta | DIW ";
            $cuerpo="¡Hola! Te damos la bienvenida a la web de DIW. Para poder activar su cuenta, haga clic en el siguiente enlace: ";
            $headers = "MIME-Version: 1.0\r\n"; 
            $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
            $headers = 'De: (soporte@ismael2daw)' . "\r\n";
            $headers = 'Datos de su cuenta :' . "\r\n";
            $headers = '--------------------------' . "\r\n";
            $headers = 'Usuario : '.$usuario.' ' ."\r\n";
            $headers = 'Clave : '.$clavecifrada.' ' ."\r\n";
            mail($destinatario,$asunto,$cuerpo,$headers);
            //Establecer conexión
            if(isset($_POST["submit"])) {
                $conexion=mysqli_connect($servername, $username, $password, $dbname) or
                die("Problemas con la conexión");

                mysqli_query($conexion,"INSERT INTO tabladiw (usuario,password,correo,token) VALUES
                       ('$usuario','$clavecifrada','$correo',$token)");

            
            mysqli_close($conexion);
            echo "Registro realizado con éxito.";
    }
        }
    } else{
        echo "Las claves son distintas, pruebe de nuevo";
    }
    
    



?>
