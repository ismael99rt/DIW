<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background:#222426;
            margin:auto;
            color:white;
        }
        p{
            border:5px solid #bec0c2;
            color:white
            width:30%;
            text-align:center;
            margin-left:2%;
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

        $sql="SELECT * from clientes where Clientes_ID=3";
        $result=$conn->query($sql);

        if($result->num_rows>0){
            while($row=$result->fetch_assoc()) {
            ?>
            <h1 style="text-align:center">Consulta del usuario</h1>
            <div id="caja">
            <p>
                <strong>ID Usuario:</strong><?=$row['Clientes_ID']?><br>
                <strong>Usuario:</strong><?=$row['Clientes_Nombre']?><br>
                <strong>Apellido1:</strong><?=$row['Clientes_Apellido1']?><br>
                <strong>Direccion:</strong><?=$row['Clientes_Direccion']?><br>
                <strong>NIF:</strong><?=$row['Clientes_NIF']?><br>
                <strong>IBAN:</strong><?=$row['Clientes_IBAN']?><br>
                <strong>Telefono:</strong><?=$row['Clientes_Telefono']?><br>
                <strong>URL:</strong><?=$row['Clientes_URL']?><br>
                <strong>Longitud:</strong><?=$row['Clientes_Longitud']?><br>
                <strong>Latitud:</strong><?=$row['Clientes_Latitud']?><br>
                <strong>Email: </strong><?=$row['Clientes_Email']?><br>
                <img alt=<?php echo $row['Clientes_Foto'] ?> src="img/<?= $row['Clientes_Foto'] ?>"><br>
                <a href="formEditar.php?Clientes_ID=<?=$row['Clientes_ID']?>">Modificar</a>
            </p>
            </div>
        <?php
            }
        } else {
            echo "No hay resultados";
        }
    ?>
</body>
</html>