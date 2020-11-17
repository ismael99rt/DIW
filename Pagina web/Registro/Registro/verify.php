<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link href="css/style.css" type="text/css" rel="stylesheet" />
</head>
<body>
    <?php
    include("conexion.php");
    $servername = "localhost";
    $username = "oukqmvok_diw";
    $password = "Trebujena2020";
    $dbname = "oukqmvok_diw";

    $token=$_GET['token'];
    echo $token."<br>";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE tabladiw SET bloqueado=0 WHERE token='$token'";

    if (mysqli_query($conn, $sql)) {
        echo "Su cuenta ha sido activada";
    } else {
        echo "No se ha podido activar su cuenta " . mysqli_error($conn);
    }
      
    mysqli_close($conn);
?>
 
         
    </div>
</body>
</html>