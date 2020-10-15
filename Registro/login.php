<?php

    //Crear conexión
    include("conexion.php");
    $servername = "fdb28.awardspace.net";
    $username = "3598790_cdpjosecabrera";
    $password = "Trebujena2020";
    $dbname = "3598790_cdpjosecabrera";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $usuario=$_POST["usernick"];
    $clave=md5($_POST["password"]);
    /*
    $sql="SELECT * FROM tabladiw WHERE usuario = '$usuario' AND password = '$clave'";

    if (mysqli_query($conn, $sql)) {
        echo "Adelante";
    } else {
        echo "Las credenciales son incorrectas. Por favor, inténtelo de nuevo.";
    }
    mysqli_close($conn);*/
    $sql = mysqli_query("SELECT * FROM tabladiw WHERE usuario = '$usuario' and password = '$clave'");
    $row = mysqli_num_rows($sql);

    if($row!=null){
        echo "Adelante";
    } else {
        echo "Credenciales incorrectas. Inténtelo de nuevo";
    }





?>