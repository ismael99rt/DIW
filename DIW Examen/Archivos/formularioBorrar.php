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

  <div class="login">
  <div class="login-triangle"></div>
  
  <h2 class="login-header">Dar de Baja</h2>

  <form method="POST" action="borrar.php">
            
    <?php 

    $sql = "SELECT * FROM `usuarios`";

    $result = mysqli_query($conexion,$sql)or die('Consulta fallida: ' );

     ?>                 
      
     <select name="selectBorrarId">
         <option value="0">Seleccione un ususario</option>
          <?php while ($row = mysqli_fetch_array($result)) { ?>
         <option value="<?php echo $row['Usuario_id']?>"><?php echo $row['Usuario_email']?></option>
     <?php } ?>
     </select>

     <input type="submit">
 </form>
</div>
</body>
</html>
        <?php
    } else {
        ?>
        
        <?php
    }
    
}
?>