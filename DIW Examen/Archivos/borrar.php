<?php
session_start();
if(isset($_SESSION["Usuario_email"])){
    if($_SESSION["Usuario_perfil"]=="admin"){
        ?>
        <?php 
include 'conexion\conexion.php';
?>
<!DOCTYPE html>
<html>
<head>
<title></title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="index.css" media="all">
<style>
</style>
</head>
<body>

 <HEADER class="cabeza">
        
        <div id="menu">
            
            <nav class="navigation logo-nav">
                <ul>
                    <li><a href="index.php">Cerrar sesion</a></li>
                    <li><a href="formularioRegistrar.php">Dar de alta</a></li>
                    <li><a href="sesionAdmin.php">Inicio</a></li>
                    <li><a href=""></a></li>
                </ul>
            </nav>

        </div>

    </HEADER>

  <?php
    $id=$nombre = $_POST['selectBorrarId'];
    $error = true;
    $errores = "";
    echo $id;

    if ($id=="0") {
       $errores = "selecciona una opcion para borrar el usuario"; 
       $error = false;
    }

    if ($error) {
       
        $delete = "DELETE FROM `usuarios` WHERE `Usuario_id` like ".$id;

        if (!mysqli_query($conexion,$delete)) {
            echo "Datos incorrectos<br>";
        }else{
            echo "Registro Borrado<br>";
        }

    }else{
        echo $errores;
    }

   ?>

</body>
</html>
        <?php
    } else {
        ?>
        
        <?php
    }
    
}
?>