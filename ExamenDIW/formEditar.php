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
  <style>
    .testbox{
      margin:auto;
      text-align:center;
      background:#ebebeb;
    }
    input {
      margin:5px;
      text-align:justify;
    }
  </style>
<body>   
<?php

    include("conexiones.php");

    $idUsuario="";
    $idUsuario=$_GET['Clientes_ID'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * from clientes WHERE Clientes_ID='$idUsuario'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {       
?>

          
    <div class="testbox">
      <h1>Modificar usuario</h1>
      <form action="" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?=$row['Clientes_ID']?>">
      Nombre:<input type="text" name="nombre" id="nombre" placeholder="Nombre" required value=<?= $row["Clientes_Nombre"] ?> disabled><br>
      Apellido 1:<input type="text" name="apellido1" id="apellido1" placeholder=" Apellido 1" required value=<?=  $row["Clientes_Apellido1"] ?> disabled><br>
      Apellido 2:<input type="text" name="apellido2" id="apellido2" placeholder="Name" required  value=<?=  $row["Clientes_Apellido2"] ?> disabled><br>
      Direccion:<input type="text" name="direccion" id="direccion" placeholder="Name" required  value=<?=  $row["Clientes_Direccion"] ?>><br>
      NIF:<input type="text" name="nif" id="nif" placeholder="Name" required  value=<?=  $row["Clientes_NIF"] ?> disabled><br>
      Clave:<input type="password" name="clave" id="clave" placeholder="Contraseña" required><br>
      IBAN:<input type="text" name="iban" id="iban" placeholder="IBAN" required  value=<?=  $row["Clientes_IBAN"] ?> pattern="[ES]{2}\d{20}"><br>
      Telefono:<input type="text" name="telefono" id="telefono" placeholder="Name" required  value=<?=  $row["Clientes_Telefono"] ?> pattern="(([6|9])(\d{8}))"><br>
      URL:<input type="text" name="url" id="url" placeholder="URL" required  value=<?=  $row["Clientes_URL"] ?>><br>
      Longitud:<input type="text" name="longitud" id="longitud" placeholder="Longitud"  value=<?=  $row["Clientes_Longitud"] ?>><br>
      latitud:<input type="text" name="latitud" id="latitud" placeholder="Latitud"  value=<?=  $row["Clientes_Latitud"] ?>><br>
      Email:<input type="text" name="email" id="email" placeholder="Correo" required  value=<?=  $row["Clientes_Email"] ?>><br>
      Foto:<input type="file" name="imagen" required><br>

      <input type="submit" class="reg" value="Registrar">
      </form>
    </div>
<?php
    }
}
?>
</body>
</html>