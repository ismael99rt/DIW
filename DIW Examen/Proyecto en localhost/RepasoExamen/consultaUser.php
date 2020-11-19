<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        p{
            border:5px solid black;
            color:white
            background-color: black;
            width:17%;
            text-align:center;
            margin-left:2%;
            float:left;
            position:relative;
        }
        img {
            width:100px;
            height:60px;
        }
    </style>
</head>
<body>
    <?php
        include("conexiones.php");

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
        }

        $sql="SELECT * from tabladiw";
        $result=$conn->query($sql);

        if($result->num_rows>0){
            while($row=$result->fetch_assoc()) {
            ?>
            <p>
                <strong>ID Usuario:</strong><?=$row['iduser']?><br>
                <strong>Usuario:</strong><?=$row['usuario']?><br>
                <strong>Email:</strong><?=$row['correo']?><br>
                <strong>Clave:</strong><?=$row['password']?><br>
                <strong>Bloqueado:</strong><?=$row['bloqueado']?><br>
                <strong>Token:</strong><?=$row['token']?><br>
                <strong>Tipo perfil:</strong><?=$row['perfil']?><br>
                <strong>Ultima conexion:</strong><?=$row['ultimaConexion']?><br>
                <img alt=<?php echo $row['foto']?> src="img/<?= $row['foto']?>"><br>

            </p>
        <?php
            }
        } else {
            echo "No hay resultados";
        }
    ?>
</body>
</html>