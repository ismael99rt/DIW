<DOCTYPE html>
<html lang="es">
	<head>
		<title></title>
		<meta charset="UTF-8">
		<title>Formulario II. Hecho por Ismael</title>
		<script src="jquery-1.4.1.min.js" type="text/javascript"></script>
		<script>
    	jQuery.fn.fortalezaClave = function(){
        $(this).each(function(){
            elem = $(this);
            //creo el elemento HTML para el mensaje
            msg = $('<span>No segura</span>');
            //inserto el mensaje en la página, justo después del campo input password
            elem.after(msg)
            //almaceno la referencia del elemento del mensaje dentro del campo input
            elem.data("mensaje", msg);

            elem.keyup(function(e){
                elem = $(this);
                //recupero la referencia al elemento del mensaje
                msg = elem.data("mensaje")
                //miro la fortaleza
                //extraigo el atributo value del campo input password
                claveActual = elem.attr("value");
                var fortalezaActual = "";
                //saco la fortaleza en función de los caracteres que tenga la clave
                if (claveActual.length < 5){
                    fortalezaActual = "No segura";
                }else{
                    if(claveActual.length < 8){
                        fortalezaActual = "Medianamente segura";
                    }else{
                        fortalezaActual = "Segura";
                    }
                }
                //cambio el texto del elemento mensaje para mostrar la fortaleza actual
                msg.html(fortalezaActual);
            });
        });
        return this;
    }

    //cuando la página esté lista, cargo la funcionalidad del plugin sobre el elemento password
    $(document).ready(function(){
        $("#password").fortalezaClave();
    });
</script>
		<style>
		body {
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
		input[type=number]{
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
		select.nacionalidad {
			width: 100%;
		}
		input[type=date] {
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
		input[type=email]{
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
			background-color: #e8e8e8;
			border:5px solid white;
			margin-left: 72%;
			margin-top: 40%;
			border-radius: 5px;
			height: 50px;
			width: 10%;
			color:#ed3704;
			font-family: arial;
			position: absolute;

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
		input[type=submit], [type=reset] {

			
		}
		div.izquierda {
			border-radius: 30px;
			background-color: #e8e8e8;
			padding:30px;
			font-family: arial;
			width: 25%;
			margin-left:3%;
			margin-top: 3%;
			position: absolute;
		}
		div.derecha {
			border-radius: 30px;
			background-color: #e8e8e8;
			padding:30px;
			font-family: arial;
			width: 25%;
			margin-left:68%;
			margin-top: 3%;
			position: absolute;
		}
		div.centro {
			border-radius: 30px;
			background-color: #e8e8e8;
			padding:30px;
			font-family: arial;
			width: 25%;
			margin-left:35%;
			margin-top: 0%;
			position: absolute;
		}

		h2 {
			background-color: #e8e8e8;
			border-radius: 7px;
			color: #e6532e;
			font-size: 50px;
			margin-left: 30px;
			margin-top: 25px;

		}
		label {
			color:#262626;
			font-family: arial;
			font-weight: bold;
			margin-top: 5px;
			margin-bottom: 70px;
		}
		label.fechanacimiento {
			width: 30px;
		}

		</style>
	</head>
	
	<body>
		
		<h2> Formulario de registro 2</h2>
		<div class="izquierda">
			<h1 class="h1izquierda">Tus datos personales</h1>
				<hr>
			<form action="mostrardatos.php" method="post" enctype="multipart/form-data" autocomplete="on">
				<label for="fname">Nombre Completo *</label>
				<br>
				<input type="text" id="fname" name="nombre" required pattern="[A-Za-z]+" placeholder="Ej: Antonio, Luís, Laura">
				<br>
				<label for="lname">Apellido *</label>
				<br>
				<input type="text" id="lname" name="apellidos" required pattern="[A-Za-z-]+">
				<br>
				<label for="lname">Segundo apellido</label>
				<br>
				<input type="text" id="lname" name="apellidos2">
				<br>
				<label for="sexo">Sexo: *</label>
				<br>
					<select name="taskOption">
						<option value="hombre">Hombre</option>
						<option value="mujer">Mujer</option>
					</select>
				<br>
				<label for="fechanacimiento">Fecha de Nacimiento: *</label>
				<br>
					<input type="date" name="fechanacimiento" required>
				<br>
				<label for="nacionalidad">Nacionalidad: *</label>
				<br>
					<select class="nacionalidad" name="nacionalidad" required>
						<option value="1">España</option>
						<option value="2">Andorra</option>
						<option value="3">Portugal</option>
						<option value="4">Italia</option>
						<option value="5">Reino Unido</option>
						<option value="6">Francia</option>
						<option value="7">Alemania</option>
						<option value="8">EEUU</option>
					</select>
				<br>
				<label for="dni">DNI/NIE *</label>
				<br>
				<input type="text" id="dni" name="dni" required placeholder="Ej:13532076A" size="10" maxlength="9" pattern="(([X-Z]{1})([-]?)(\d{7})([-]?)([A-Z]{1}))|((\d{8})([-]?)([A-Z]{1}))">
				<br>
			
		</div>
		<div class="centro">
			
			<h1 class="h1izquierda">Tus datos de contacto</h1>
				<hr>
				<label for="correoelectronico">Correo electrónico: *</label>
				<br>
					<input type="email" name="correoelectronico" required placeholder="Ej: ejemplo@dominio.com">
					<br>
				<label for="confirmarcorreo">Confirmar E-mail: *</label>
				<br>
					<input type="email" name="confirmarcorreo" required placeholder="Escriba de nuevo su correo">
					<br>
				<label for="paisresidencia">País de Residencia: *</label>
				<br>
					<select class="paisresidencia" name="paisresidencia" required>
						<option>España</option>
						<option>Andorra</option>
						<option>Portugal</option>
						<option>Italia</option>
						<option>Reino Unido</option>
						<option>Francia</option>
						<option>Alemania</option>
						<option>EEUU</option>
					</select>
				<br>
				<label for="codigopostal">Código postal: *</label>
				<br>
					<input type="text" minlength="5" maxlength="5" name="codigopostal" required/>
					<br>
				<label for="direccion">Dirección: *</label>
					<input type="text" name="direccion" required placeholder="Ej: Calle Ejemplo Nº 10">
					<br>
				<label for="ciudad">Pueblo / Ciudad: *</label>
					<input type="text" name="ciudad" required>
					<br>
				<label for="domiciliofiscal">Domicilio Fiscal: *</label>
					<select name="domiciliofiscal" required>
						<option value="0">Calle</option>
						<option value="1">Piso</option>
						<option value="2">Manzana</option>
					</select>
					<br>
				<label for="telefono"> Teléfono: *</label>
					<input type="number" size="9" maxlength="9" minlength="9" name="telefono" required>

		</div>
		<div class="derecha">
			<form>
			<h1 class="h1izquierda">Información de tu cuenta</h1>
				<hr>
				<label for="usuario">Usuario : *</label>
				<br>
					<input type="text" name="usuario" required placeholder="Escribe tu nombre de usuario">
					<br>
				<label for="password">Contraseña : *</label>
					<br>
					<input type="password" id="password" name="contraseña" required pattern=".{8,"}">
				<br>
				<label for="confirmarpassword">Verificar contraseña : *</label>
					<br>
					<input type="password" id="password" name="confirmarcontraseña" required pattern=".{8,"}">
				<br>
				<label for="preguntasecreta">Pregunta secreta: *</label>
					<br>
					<select class="preguntasecreta" required>
						<option>¿Nombre del mejor amigo de la infancia?</option>
						<option>¿Nombre de tu primera mascota?</option>
						<option>¿Número favorito?</option>
						<option>¿Cómo se llamaba el colegio donde estuviste?</option>
						<option>¿Nombre de tu equipo favorito?</option>
					</select>
					<br>
				<label for="respuesta">Respuesta: *</label>
					<br>
					<input type="text" name="respuesta" required placeholder="Escriba aquí la respuesta de la pregunta anterior">
					
				<label for="codigoregistro">Código de registro (opcional)</label>
					<br>
					<input type="number" name="codigoregistro">
					<br>

			
		</div>
		<input type="submit" value="Enviar">
				<input type="reset" value="Borrar los datos introducidos">
			</form>








		<?php

		?>

	</body>
</html>