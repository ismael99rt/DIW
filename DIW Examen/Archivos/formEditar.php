<!DOCTYPE html>
<html>
  <head>
    <link href='formularioRegistro.css' rel='stylesheet' type='text/css'>
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
    <?php
    $errores="";
    $creado="";
    include("editarUsuarios.php"); 
    ?>
  </head>
<body>   
<?php

    
        include("conexiones.php");

        $idUsuario=$_GET['id'];
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * from usuarios where id='$idUsuario'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {       
?>

  
    <div class="testbox">
      <h1>REGISTRO</h1>
      <form action="" method="POST" enctype="multipart/form-data">
      
      <input type="hidden" name="id" value="<?= $row["id"] ?>">
      <label id="icon" for="name"><i class="icon-envelope"></i></label>
      <input type="text" name="email" id="name" placeholder="Email" required value=<?= $row["email"] ?> >
      <label id="icon" for="name"><i class="icon-envelope "></i></label>
      <input type="text" name="email2" id="name" placeholder=" confirmarEmail" required value=<?=  $row["email"] ?> >
      <label id="icon" for="name"><i class="icon-user"></i></label>
      <input type="text" name="nombre" id="name" placeholder="Name" required  value=<?=  $row["nombre"] ?>>
      <label id="icon" for="name"><i class="icon-shield"></i></label>
      <input type="password" name="contraseña" id="name" placeholder="Password"  required>
      <label id="icon" for="name"><i class="icon-shield"></i></label>
      <input type="password" name="contraseña2" id="name" placeholder="Password"  required><br>
      <input type="file" name="fileToUpload"  required><br>
      <span style="color:red;"><?php echo $errores.$creado?></span>
        
       
      <input type="submit" class="reg" value="registrar">
      </form>
    </div>
<?php
    }
}
?>
</body>
</html>