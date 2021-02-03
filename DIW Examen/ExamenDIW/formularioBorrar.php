<?php
header("Content-Type: text/html; charset=UTF-8");
session_start();

if(isset($_SESSION["usuario"])){
    if($_SESSION["perfil"]=="admin"){
        ?>
        <?php 
include ("conexiones.php");
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


  <div class="login">
  <div class="login-triangle"></div>
  
  <h2 class="login-header">Dar de Baja</h2>

  <form method="POST" action="borrar.php">
            
    <?php 

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
    }

    $sql="SELECT * from tabladiw";
    $result=$conn->query($sql);

    if($result->num_rows>0){
        while($row=$result->fetch_assoc()) {
        ?>
        <p>
            <strong>ID Usuario:</strong><?=$row['iduser']?><br>
            <strong>Usuario:</strong><?=$row['usuario']?><br>
            <strong>Email:</strong><?=$row['correo']?><br>
            <strong>Clave:</strong><?=$row['password']?><br>
            <strong>Bloqueado:</strong><?=$row['bloqueado']?><br>
            <strong>Token:</strong><?=$row['token']?><br>
            <strong>Tipo perfil:</strong><?=$row['perfil']?><br>
            <strong>Ultima conexion:</strong><?=$row['ultimaConexion']?><br>
            <img alt=<?php echo $row['foto']?> src="img/<?= $row['foto']?>"><br>

            <a href="formEditar.php?id=<?=$row['iduser']?>">Modificar</a>
        </p>
    <?php
        }
    } else {
        echo "No hay resultados";
    }
?>
</body>
</html>