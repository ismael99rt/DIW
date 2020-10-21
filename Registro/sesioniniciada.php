<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login</title>
</head>

<body>
    <?php
        include 'login.php';
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

        $sql = "SELECT usuario,clave,bloqueado FROM tabladiw WHERE usuario='$usuario' and password='$clavecifrada'and bloqueado=0";
        $result = $conn->query($sql);

        $row=$result->fetch_assoc();
        
        if ($result->num_rows > 0) {
           if($row["password"]==$clavecifrada) {
               $comprobarclave=true;
           }
           if($row["usuario"]=="admin" && $row["password"]==$clavecifrada && $row["bloqueado"]==0){
               if($comprobarclave){
                   session_start();
                   $_SESSION["usuario"]=$row['usuario'];
                   header("Location: sesionAdmin.html");
               } else {
                   $claveError="La clave es incorrecta";
               }
           } elseif ($row["usuario"]!="admin") {
                if($comprobarclave){
                    session_start();
                    $_SESSION["usuario"]=$row['usuario'];
                    header("Location: sesionUsuario.html");
                }else {
                    $claveError="La contraseña es incorrecta";
                }
           }

        } else {
            
        }

    }

    ?>
</body>
</html>