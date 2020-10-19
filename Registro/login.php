<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">

</head>

<body>
    <?php

    //Crear conexión
    /*$servername = "fdb28.awardspace.net";
    $username = "3598790_cdpjosecabrera";
    $password = "Trebujena2020";
    $dbname = "3598790_cdpjosecabrera";*/
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "diw";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $usuario=$_POST["nombre"];
    $clave=$_POST["password"];
    $clavecifrada= md5($clave);
    $sql = "SELECT usuario FROM tabladiw WHERE usuario LIKE'$usuario' and password LIKE'$contraseñaCifrada'and bloqueado=0";
    //$sql = "SELECT nombre FROM usuarios WHERE nombre='$nombre' and password='$contraseñaCifrada'and  bloqueado=0";

    $result = $conn->query($sql);

    $row = $result->fetch_assoc();

    if ($result->num_rows > 0) {
        echo "Bienvenido, $usuario";
    } else {
        echo "Credenciales incorrectas";
        echo "<br>";
        echo $usuario;
        echo $clavecifrada;
        echo "<form action=formulario.html>
        <input type=submit></form>";

        exit;
    }
    
?>
</body>
</html>