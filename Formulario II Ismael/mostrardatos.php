<DOCTYPE html>
<html lang="es">
	<head>
		<title></title>
		<meta charset="UTF-8">
		<style>
		* {
			background: #f0451a;
			background: -moz-linear-gradient(45deg, #f0451a 0%, #b02727 100%);
			background: -webkit-gradient(left bottom, right top, color-stop(0%, #f0451a), color-stop(100%, #b02727));
			background: -webkit-linear-gradient(45deg, #f0451a 0%, #b02727 100%);
			background: -o-linear-gradient(45deg, #f0451a 0%, #b02727 100%);
			background: -ms-linear-gradient(45deg, #f0451a 0%, #b02727 100%);
			background: linear-gradient(45deg, #f0451a 0%, #b02727 100%);
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f0451a', endColorstr='#b02727', GradientType=1 );
			font-family: arial;
			color:white;

		}
		h1 {
			background-color: white;
			border-radius: 7px;
			color: white;
			font-size: 40px;
			margin-left: 30px;
			margin-top: 25px;
		}


		</style>
	</head>
	
	<body>
		
		<?php
		$nombre= $_POST['nombre'];
		$primerapellido= $_POST['apellidos'];
		$segundoapellido= $_POST['apellidos2'];
		$genero= isset($_POST['taskOption']) ? $_POST['taskOption'] : false;
		$dni= $_POST['dni'];
		$correo= $_POST['correoelectronico'];
		$pais=$_POST['paisresidencia'];
		$fechanacimiento= $_POST['fechanacimiento'];
		$codigopostal=$_POST['codigopostal'];
		$direccion=$_POST['direccion'];
		$ciudad=$_POST['ciudad'];
		$domiciliofiscal= isset($_POST['taskOption']) ? $_POST['taskOption'] : false;
		$telefono=$_POST['telefono'];
		$usuario=$_POST['usuario'];
		$password=$_POST['contraseña'];
		$respuesta=$_POST['respuesta'];
		$codigoregistro=$_POST['codigoregistro'];

		//////////////////////////////////////////////
		echo "<h1>Tus datos personales</h1><br>";
		echo "Nombre : ";
		echo $nombre. "<br>";
		echo "Primer apellido : ";
		echo $primerapellido. "<br>";
		echo "Segundo apellido : ";
		echo $segundoapellido. "<br>";

		if ($genero) {
			echo htmlentities($_POST['taskOption'], ENT_QUOTES, "UTF-8");
			echo "<br>";
		} else {
			echo "task option is required";
			exit;
		}
		echo "Fecha de nacimiento :";
		echo $fechanacimiento. "<br>";
		echo "Nacionalidad :";
		echo $pais. "<br>";
		echo "DNI : ";
		echo $dni. "<br>";
		////////////////////////////////////////////////////
		echo "<h1>Tus datos de contacto</h1><br>";
		echo "Correo electronico : ";
		echo $correo. "<br>";
		echo "País de residencia : ";
		echo $pais. "<br>";
		echo "Código postal : ";
		echo $codigopostal. "<br>";
		echo "Direccion : ";
		echo $direccion. "<br>";
		echo "Pueblo/Ciudad : ";
		echo $ciudad. "<br>";
		echo "Domicilio fiscal : ";
		
		if ($domiciliofiscal==1) {
			echo "Calle <br>";
		}
		if ($domiciliofiscal=2) {
			echo "Piso <br>";
		}
		if ($domiciliofiscal==3) {
			echo "Manzana <br>";
		}
		echo "Teléfono : ";
		echo $telefono. "<br>";
		///////////////////////////////////////////////////////
		echo "<h1>Informacion de tu cuenta</h1><br>";
		echo "Usuario : ";
		echo $usuario. "<br>";
		echo "Contraseña : ";
		echo $password. "<br>";
		echo "Respuesta de la pregunta secreta : ";
		echo $respuesta. "<br>";
		echo "Código de registro : ";
		echo $codigoregistro. "<br>";
		?>
		

	</body>
</html>