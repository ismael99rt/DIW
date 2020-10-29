<?php

//Crear conexión
    $servername = "fdb28.awardspace.net";
    $username = "3598790_cdpjosecabrera";
    $password = "Trebujena2020";
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
    $bloqueado=1;
    $token = md5( rand(0,1000) );

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
                        //'<a href="http://www.ismael2daw.es/Registro/verify.php?email="'.$correo.'"&token="'.$token.'"><input type="button" name="enviar" value="Activar cuenta"></a>'.
                        //'<a href="'.$correo."&token=".$token.'""><input type="button" name="enviar" value="Activar cuenta"</a>'.
                        
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

                        mysqli_query($conexion,"INSERT INTO tabladiw (usuario,password,correo,bloqueado,token) VALUES
                            ('$usuario','$clavecifrada','$correo','$bloqueado','$token')");

            
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
