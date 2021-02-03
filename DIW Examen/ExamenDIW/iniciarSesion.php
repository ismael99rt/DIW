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
            $sql = "UPDATE tabladiw SET numeroIntentos=0 WHERE usuario='$usuario'";
        }
        if($row["perfil"]=="admin") {
            if($comprobarClave){

                session_start();
                $_SESSION["iduser"]=$row['iduser'];
                $_SESSION["usuario"]=$row['usuario'];
                $_SESSION["perfil"]="admin";
                $_SESSION["foto"]="img/". $row["foto"];
                ini_set("date.timezone","Europe/madrid");
                $fechaHoy=date('Y-m-d h:i:s',time());
                $sql="UPDATE tabladiw SET ultimaConexion='$fechaHoy' WHERE usuario='$usuario'";
                $result=$conn->query($sql);
                $_SESSION["ultimaConexion"]=$fechaHoy;
                $cookie_name="usuario";
                $cookie_name_value=$row['usuario'];
                setcookie($cookie_name, $cookie_name_value, time() + (86400 * 30), "/"); // 86400 = 1 day
                ?>
                <script lang="JavaScript">
                    window.location.href="sesionAdmin.php";
                </script>
                <?php
            } else {
                $entrar=false;
            }
        } else if($row["perfil"] =="usuario") {
            if($comprobarClave){
                session_start();
                $_SESSION["usuario"]=$row['usuario'];
                $_SESSION["perfil"]="usuario";
                $_SESSION["foto"]="img/". $row["foto"];
                ini_set("date.timezone","Europe/madrid");
                $fechaHoy=date('Y-m-d h:i:s',time());
                $sql="UPDATE tabladiw SET ultimaConexion='$fechaHoy' WHERE usuario='$usuario'";
                $result=$conn->query($sql);
                $_SESSION["ultimaConexion"]=$fechaHoy;
                $cookie_name="usuario";
                $cookie_name_value=$row['usuario'];
                setcookie($cookie_name, $cookie_name_value, time() + (86400 * 30), "/"); // 86400 = 1 day
                ?>
                <script lang="JavaScript">
                    window.location.href="sesionUsuario.php";
                </script>
                <?php
            } else {
                $entrar=false;
            }
        } 
    } else {
        $entrar=false;
        $error="Las credenciales son incorrectas";
        echo $error;
        ?>
           <a href="index.php"> <input type="submit" value="Regresar al login"></a>
        <?php
    }
    } 