<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">

</head>

<body>
    <?php

    //Crear conexión
    $servername = "fdb28.awardspace.net";
    $username = "3598790_cdpjosecabrera";
    $password = "Trebujena2020";
    $dbname = "3598790_cdpjosecabrera";
    
    $usuario; $clave; $clavecifrada;
    
    if(count($_GET)>0){
        $usuario=$_GET['nombre'];
        $clave=$_GET['password'];
        $clavecifrada= md5($clave);

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT usuario FROM tabladiw WHERE usuario='$usuario' and password='$clavecifrada'and  bloqueado=0";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            ?>
                <script lang="JavaScript">
                    window.location.href="sesioniniciada.php";
                </script>
            <?php

        } else {
            echo "Credenciales incorrectas";
            echo "<br>";
            //echo $usuario;
            echo $clavecifrada;
            echo "<form action=formulario.html>
            <input type=submit></form>";
    
            exit;
        }

    }
    
?>
</body>
</html>