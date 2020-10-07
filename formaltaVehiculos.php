<!DOCTYPE html>
<html>
<head>
      <title>FORMULARIO DEL VEHICULO</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <style>
            .bot {
      padding:1.5% ;

    }
      </style>
</head>
<body>

<div class="w3-container w3-blue">
  <h2 class="w3-center">inserte los datos del vehiculo</h2>
</div>
<?php

$nombre="";
$apellido="";
$modelo="";
$fechaEntrada="";
$fechaSalida="";
$mecanico="";
$matricula="";
$kilometros="";
      if(isset($_GET['nombreTitular'])){
            $nombre=$_GET['nombreTitular'];
      }
      if(isset($_GET['apellidoTItular'])){
            $apellido=$_GET['apellidoTItular'];
      }
      if(isset($_GET['modelo'])){
            $modelo=$_GET['modelo'];
      }
      if(isset($_GET['fechaEntrada'])){
            $fechaEntrada=$_GET['fechaEntrada'];
      }
      if(isset($_GET['fechaSalida'])){
            $fechaSal=$_GET['fechaSalida'];
      }
      if(isset($_GET['mecanico'])){
            $mecanico=$_GET['mecanico'];
      }
      if(isset($_GET['matricula'])){
            $matricula=$_GET['matricula'];
      }
      if(isset($_GET['kilometros'])){
            $kilometros=$_GET['kilometros'];
      }
?>
<form action="altaVehiculos.php" class="w3-container"  method="POST" enctype="multipart/form-data">
  <p>
        <label class="w3-text-teal" >Nombre del titular</label>
        <input class="w3-input " type="text" name="nombreTitular" value=<?=  $nombre ?>></p>

  <p>
        <label class="w3-text-teal">Apellido del titular</label>
        <input class="w3-input" type="text" name="apellidoTitular" value=<?=  $apellido ?>></p>

  <p>
        <label class="w3-text-teal">Modelo del coche</label>
        <input class="w3-input" type="text" name="modelo" value=<?=  $modelo ?>></p>
      
  <p>
        <label class="w3-text-teal">fecha de Entrada</label>
        <input class="w3-input" type="date" name="fechaEntrada" value=<?=  $fechaEntrada ?>></p>

  <p>
        <label class="w3-text-teal">fecha de salida</label>
        <input class="w3-input" type="date" name="fechaSalida" value=<?=  $nombre ?>></p>
  <p>
        <label class="w3-text-teal">Mecanico</label>
        <input class="w3-input" type="text" name="mecanico" value=<?=  $mecanico ?>></p>
  <p>
        <label class="w3-text-teal">Matricula</label>
        <input class="w3-input" type="text" name="matricula" value=<?=  $matricula ?>></p>
  <p>
        <label class="w3-text-teal">foto</label>
        <input class="w3-input" type="file" name="fileToUpload"></p>
  <p>
        <label class="w3-text-teal">kilometros</label>
        <input class="w3-input" type="number" name="kilometros" value=<?=  $kilometros ?>></p>
  <p>
        <label class="w3-text-teal">codigo de provincia</label>
        
        <select name='codprovincia'> 

            <?php

                  include('conexiones.php');

                  // Create connection
                  $conn = mysqli_connect($servername, $username, $password, $dbname); 
                  
                  $consulta = "SELECT * FROM provincias";
                  $resultado = mysqli_query($conn, $consulta) or die(mysqli_error($conn));

                  foreach ($resultado as $opciones) {
                       
                        echo "<option value=" . $opciones['id_provincia'] . ">" .$opciones['provincia'] . "</option>"; 
                  }
            
            ?>
         </select>
   </div>
   <div class="w3-center"><input class="w3-blue w3-border w3-border-yellow w3-display-bottom" type="submit"value="agregar"></div><br>
</form>
<div class='w3-center w3-container '>
            <br>
            <button class='w3-button w3-blue w3-border w3-round-large'>
                <a href='paginaTallerInicio.html'>volver a la pagina principal</a>
            </button>
          </div>
          <br>
      <div class="w3-container w3-blue bot w3-center bot">
            <a href="https://es-es.facebook.com/"><i class="fa fa-facebook-square" style="font-size:36px"></i></a>
            <a href="https://github.com/JJaviAG"><i class="fa fa-github" style="font-size:36px"></i></a>
            <a href="https://twitter.com/home"><i class="fa fa-twitter" style="font-size:36px"></i></a>
            <a href="https://www.youtube.com/?gl=ES&hl=es"><i class="fa fa-youtube" style="font-size:36px"></i></a>
      </div>

</body>
</html> 