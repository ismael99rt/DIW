<?php

include('conexiones.php');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$borrado=false;

if (isset($_POST['enviar'])) {
    if (!empty($_POST['tenis'])) {
        // Contando el numero de input seleccionados "checked" checkboxes
        //$checked_contador = count($_POST['tenis']);
        // Bucle para recorrer el array y ejecutar la consulta
        foreach ($_POST['tenis'] as $seleccion) {
            mysqli_query($conn,"DELETE FROM articulos WHERE id='$seleccion'");
            //echo "Registro borrado realizado con éxito";
            //echo ("<br>");

        }
        $borrado=true;
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Eliminar registros</title>
  </head>
  <body>
    <?php
        if($borrado){
            ?> 
                <h1 class="text-success">Registros borrados con éxito</h1>
            <?php
        } else {
            ?> 
                <h3 class="text-danger">Se ha producido un error a la hora de borrar los registros. Inténtelo de nuevo más tarde</h3>
            <?php
        }
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
<meta http-equiv="Refresh" content="3;url=sesionAdmin.php">

