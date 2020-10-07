<!DOCTYPE html>
<html>
<head>
    <title>alta de vehiculos</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    .bot {
      padding:1.5%;
      margin-top:17%;

    }
    .botbien{
        padding:1.5%;
      margin-top:34.9%;
    }
  </style>
</head>
<body class="w3-pale-blue w3-container ">
<?php
include('conexiones.php');



$nombreTitular=$_POST["nombreTitular"];
$apellidoTitular=$_POST["apellidoTitular"];
$modelo=$_POST["modelo"];
$fechaEntrada=$_POST["fechaEntrada"];
$fechaSalida=$_POST["fechaSalida"];
$matricula=$_POST["matricula"];
$mecanico=$_POST["mecanico"];
$kilometros=$_POST["kilometros"];
$codprovincia=$_POST["codprovincia"];
$uploadOk = 1;
$camposValidar=array();

$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$nombreFoto=$_FILES['fileToUpload']['name'];


//validar campos
    //VALIDAR IMAGEN
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
        array_push($camposValidar, "esto es un fake comprueba la imagen que has seleccionado");
      $uploadOk = 0;
    }
  }
  
  /* Check if file already exists
  if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }*/
  
  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 500000) {
    array_push($campos, "tu imagen es demasiado grande");
    $uploadOk = 0;
  }
  
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    array_push($camposValidar, "Solo puede introducir imagenes .jpg, .jpeg, .png");
    $uploadOk = 0;
  }
  
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    array_push($camposValidar, "no has elegido imagen");
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        array_push($camposValidar, "ha habido un error a la hora de subir el archivo");
    }
  }
  //FIN VALIDAR IMAGEN

  //VALIDAR NOMRBES
    if ($nombreTitular == "") {
    array_push($camposValidar, "Debe introducir un nombre del titular del coche");
    
    }else{
        if (strlen($nombreTitular) > 45) {

            array_push($camposValidar, "nombre demasiado largo maximo 45 caracteres");
        
        }	

    } 
    
    if ($apellidoTitular == "") {
        array_push($camposValidar, "Debe introducir un apellido del titular del coche");
        
        }else{
            if (strlen($apellidoTitular) > 45) {
    
                array_push($camposValidar, "apellido demasiado largo maximo 45 caracteres");
            
            }	
    
        }
    
    if ($modelo == "") {
        array_push($camposValidar, "Debe introducir el modelo del coche");
            
        }else{
            if (strlen($apellidoTitular) > 55) {
        
                array_push($camposValidar, "modelo demasiado largo maximo 55 caracteres");
                
            }	
        
        }
        
    if ($mecanico == "") {
        array_push($camposValidar, "Debe introducir el mecanico del coche");
                
        }else{
            if (strlen($apellidoTitular) > 55) {
            
                array_push($camposValidar, "el nombre del mecanico demasiado largo maximo 55 caracteres");
                    
            }	
            
        }
    //FIN VALIDAR NOMBRE

    //validar matricula
            $numeros = substr($matricula, 3);

            $letras =substr($matricula,-3);
        if (strlen($matricula) > 7) {
            array_push($camposValidar, "matricula demasiada larga");
        }elseif (!intval($numeros)){
            array_push($camposValidar, "la matricula debe contener 4 numeros");
        }elseif (!ctype_alpha($letras)){
            array_push($camposValidar, "la matricula debe contener 3 letras");
        }
    //fin validar matricula

    
    
//fin validar campos
        if (count($camposValidar) > 0) {
            
            echo"<h1 class='w3-container w3-teal w3-center'>completa bien los campos </h1>";
            echo "<div class='w3-container w3-pale-blue w3-center'>";
            
            for ($i=0; $i < count($camposValidar); $i++) {
               
                echo "<p>".($i+1).". ".$camposValidar[$i]."</p>";
            }
            echo "</div>";
            ?>
            <div class='w3-center w3-display-bottom'><button class='w3-button w3-teal w3-border w3-round-large'><a href='formaltaVehiculos.php?nombreTitular=<?=$nombreTitular?>&apellidoTitular=<?=$apellidoTitular?>&modelo=<?=$modelo?>&fechaEntrada=<?=$fechaEntrada?>&fechaSalida=<?=$fechaSalida?>&mecanico=<?=$mecanico?>&matricula=<?=$matricula?>&kilometros=<?=$kilometros?>'>volver al formulario</a></button></div>";
            <div class=' w3-teal bot w3-center'>
            <a href='https://es-es.facebook.com/'><i class='fa fa-facebook-square' style='font-size:36px'></i></a>
            <a href='https://github.com/JJaviAG'><i class='fa fa-github' style='font-size:36px'></i></a>
            <a href='https://twitter.com/home'><i class='fa fa-twitter' style='font-size:36px'></i></a>
            <a href='https://www.youtube.com/?gl=ES&hl=es'><i class='fa fa-youtube' style='font-size:36px'></i></a>
        </div>
        <?php

            }else{

                // Create connection

                $conn = new mysqli($servername, $username,$password,$dbname);

                // Check connection

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }



                $sql = "INSERT INTO taller (nombreTitular,apellidoTitular,modelo,fechaEntrada,fechaSalida,mecanico,matricula,foto,kilometros,codprovincia)
                VALUES ('$nombreTitular','$apellidoTitular','$modelo','$fechaEntrada','$fechaSalida','$mecanico','$matricula','$nombreFoto','$kilometros','$codprovincia')";

                if ($conn->query($sql) === TRUE) {    
                    echo"<h1 class='w3-container w3-teal w3-center'>has agregado el coche correctamente</h1><br>";
                    echo "<form action='paginaTallerInicio.html'>
                    <div class='w3-center'><input class='w3-teal w3-border w3-border-blue w3-display-bottom ' type='submit'value='Pagina Principal'></div>
                    </form>";
                ?>
                <footer class=" w3-teal botbien w3-center ">
                    <a href="https://es-es.facebook.com/"><i class="fa fa-facebook-square" style="font-size:36px"></i></a>
                    <a href="https://github.com/JJaviAG"><i class="fa fa-github" style="font-size:36px"></i></a>
                    <a href="https://twitter.com/home"><i class="fa fa-twitter" style="font-size:36px"></i></a>
                    <a href="https://www.youtube.com/?gl=ES&hl=es"><i class="fa fa-youtube" style="font-size:36px"></i></a>
                </footer>
                <?php
                }else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                        $conn->close();
            }
                ?>

</body>
</html>