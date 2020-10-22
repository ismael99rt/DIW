<?php
    if(count($_GET)>0){
    $usuario=$_GET['usuario'];
    $clave=$_GET['password'];
    $claveCifrada=md5($clave);
    $error="";
    $entrar=false;
    $comprobarClave=false;
    include('conexiones.php');

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //Buscar en la base de datos el usuario
    $sql = "SELECT * FROM tabladiw WHERE usuario='$usuario' and password='$claveCifrada'and  bloqueado=0";
    $result = $conn->query($sql);
    $row=$result->fetch_assoc();
    if($result->num_rows>0){
        if($row["password"]==$claveCifrada){
            $comprobarClave=true;
        }
        if($row["perfil"]=="admin" && $row["bloqueado"]==0) {
            if($comprobarClave){
                session_start();
                $_SESSION["usuario"]=$row['usuario'];
                $_SESSION["perfil"]="admin";
                ?>
                <script lang="JavaScript">
                    window.location.href="sesionAdmin.php";
                </script>
                <?php
            } else {
                $entrar=false;
            }
        } else if($row["perfil"] !="admin") {
            if($comprobarClave){
                session_start();
                $_SESSION["usuario"]=$row['usuario'];
                $_SESSION["perfil"]="usuario";
                ?>
                <script lang="JavaScript">
                    window.location.href="sesionUsuario.php";
                </script>
                <?php
            } else {
                $entrar=false;
            }
        } 
    }
    else {
        $entrar=false;
        $error="Las credenciales son incorrectas";
    }

    }
?>
