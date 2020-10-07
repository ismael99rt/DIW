<DOCTYPE html>
<html lang="es">
	<head>
		<title></title>
		<meta charset="UTF-8">
		<style>
		body{
			background: #f0451a;
			background: -moz-linear-gradient(45deg, #f0451a 0%, #b02727 100%);
			background: -webkit-gradient(left bottom, right top, color-stop(0%, #f0451a), color-stop(100%, #b02727));
			background: -webkit-linear-gradient(45deg, #f0451a 0%, #b02727 100%);
			background: -o-linear-gradient(45deg, #f0451a 0%, #b02727 100%);
			background: -ms-linear-gradient(45deg, #f0451a 0%, #b02727 100%);
			background: linear-gradient(45deg, #f0451a 0%, #b02727 100%);
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f0451a', endColorstr='#b02727', GradientType=1 );
			font-family: arial;	
		}
		

		h2 {
			background-color: #e8e8e8;
			border-radius: 7px;
			color: #e6532e;
			font-size: 50px;
			margin-left: 30px;
			margin-top: 25px;

		}

		input[type=text], select {
			width: 100%;
			padding:12px 20px;
			margin:8px 0;
			box-sizing: border-box;
			border:5px solid #e6532e;
			border-radius: 5px;
			display: inline-block;
			background-color: white;
			color:#262626;
			font-family: arial;
		}

		input[type=password]{
			width: 100%;
			padding:12px 20px;
			margin:8px 0;
			box-sizing: border-box;
			border:5px solid #e6532e;
			border-radius: 5px;
			display: inline-block;
			background-color: white;
			color:#262626;
			font-family: arial;
		}

		input[type=submit] {
			align-content: center;
			text-align: center;
			background-color: #e8e8e8;
			border:5px solid white;
			border-radius: 5px;
			height: 50px;
			width: 100%;
			color:#ed3704;
			font-family: arial;

		}

		input[type=submit]:hover {
			background-color: #cc4c2c;
			color:white;
			border:5px solid white;
			font-family: arial;
			transition: background-color 1s linear 1s, color 1s linear;
		}

		input[type=reset] {
			background-color: #e8e8e8;
			border:5px solid white;
			margin-left: 83%;
			margin-top: 40.05%;
			border-radius: 5px;
			height: 50px;
			width: 10%;
			color:#ed3704;
			font-family: arial;
			position: absolute;

		}
		input[type=reset]:hover {
			background-color: #cc4c2c;
			color:white;
			border:5px solid white;
			font-family: arial;
			transition: background-color 1s linear 1s, color 1s linear;
		}

		div.centro {
			text-align: center;
			border-radius: 30px;
			background-color: #e8e8e8;
			padding:30px;
			font-family: arial;
			width: 25%;
			margin-left:35%;
			margin-top: 0%;
			position: absolute;
		}

		</style>
	</head>
		
	<body>
		<?php
		//Definir variables
		$username = $email = $password ="";

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
  		$username = test_input($_POST["username"]);
  		$email = test_input($_POST["email"]);
  		$password = test_input($_POST["password"]);
		?>

		<!-- Registro: Correo electrónico, contraseña -->
		
		<h2> Formulario de registro 2</h2>
			<div class="centro">
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
				<h1>Datos personales registro</h1>
				<hr>
				<label for="mail">Correo electrónico</label>
				<br>
				<input type="text" id="mail" name="correo" required placeholder="Escribe de nuevo su correo"><br> 
				<label for="password">Contraseña</label>
				<input type="password" id="password" name="contraseña" required pattern=".{8,"}">
				<br>
				<label for="confirmarpassword">Confirmar Contraseña</label>
				<input type="password" id="password" name="confirmarcontraseña" required pattern=".{8,"}">
				<br>
				<input type="submit" value="Enviar">
			</div>
			
				<input type="reset" value="Borrar datos">
		</form>

		<?php
		echo "<h2> Tus datos:</h2>";
		echo $username;
		echo "<br>";
		echo $email;
		echo "<br>";
		echo $password;
		echo "<br>";
		?>

	</body>
</html>