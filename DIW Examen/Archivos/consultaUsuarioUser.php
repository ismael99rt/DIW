<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		p{
			background-color: lightblue;
			width: 17%;
			border-radius: 20% 10%;
			text-align: center;
			margin-left: 2%;
			float: left;
			position: relative;
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
$sql = "SELECT * from usuarios";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	?>
    	<p>
            <strong> id usuario: </strong><?=$row['id']?><br>
            <strong>usuario: </strong><?=$row['nombre']?><br>
            <strong>email : </strong><?=$row['email']?><br>
            <strong>contraseña : </strong><?=$row['password']?><br>
            <strong>token : </strong><?=$row['token']?><br>
            <strong>bloqueado : </strong><?=$row['bloqueado']?><br>
            <strong>usuarioPerfil : </strong><?=$row['usuarioPerfil']?><br>
            <strong>ultimaConexion : </strong><?=$row['ultimaConexion']?><br>
            <img alt=<?php echo $row['foto'] ?> src="img/<?= $row['foto'] ?>"><br>
        
        <!--<a href="formEditar.php?id=<//?=$row['id']?>">Modificar</a>-->
        </p>


        
	<?php
    }
} else {
    echo "0 results";
}
$conn->close();
	?>
</body>
</html>