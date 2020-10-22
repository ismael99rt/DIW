<DOCTYPE html>
<html lang="es">
	<head>
		<title>Formulario de Registro - Ismael</title>
		<meta charset="UTF-8">
		<style>

			body{
				margin:100px;
				color:#6a6f8c;
				background:url(https://www.hdwallpaperslife.com/wp-content/uploads/2018/06/neon_bubbles-1920x1080.jpg);
				font:600 16px/18px 'Open Sans',sans-serif;
			}
			*,:after,:before{box-sizing:border-box}
			.clearfix:after,.clearfix:before{content:'';display:table}
			.clearfix:after{clear:both;display:block}
			a{color:inherit;text-decoration:none}

			.login-wrap{
				width:100%;
				margin:auto;
				max-width:525px;
				min-height:670px;
				position:relative;
				background:url(https://images.hdqwalls.com/download/green-blue-violet-gradient-8k-xv-5120x2880.jpg) no-repeat center;
				box-shadow:0 12px 15px 0 rgba(0,0,0,.24),0 17px 50px 0 rgba(0,0,0,.19);
			}
			.login-html{
				width:100%;
				height:100%;
				position:absolute;
				padding:90px 70px 50px 70px;
				background:rgba(40,57,101,.9);
			}
			.login-html .sign-in-htm,
			.login-html .sign-up-htm{
				top:0;
				left:0;
				right:0;
				bottom:0;
				position:absolute;
				transform:rotateY(180deg);
				backface-visibility:hidden;
				transition:all .4s linear;
			}
			.login-html .sign-in,
			.login-html .sign-up,
			.login-form .group .check{
				display:none;
			}
			.login-html .tab,
			.login-form .group .label,
			.login-form .group .button{
				text-transform:uppercase;
			}
			.login-html .tab{
				font-size:22px;
				margin-right:15px;
				padding-bottom:5px;
				margin:0 15px 10px 0;
				display:inline-block;
				border-bottom:2px solid transparent;
			}
			.login-html .sign-in:checked + .tab,
			.login-html .sign-up:checked + .tab{
				color:#fff;
				border-color:#1161ee;
			}
			.login-form{
				min-height:345px;
				position:relative;
				perspective:1000px;
				transform-style:preserve-3d;
			}
			.login-form .group{
				margin-bottom:15px;
			}
			.login-form .group .label,
			.login-form .group .input,
			.login-form .group .button{
				width:100%;
				color:#fff;
				display:block;
			}
			.login-form .group .input,
			.login-form .group .button{
				border:none;
				padding:15px 20px;
				border-radius:25px;
				background:rgba(255,255,255,.1);
			}
			.login-form .group .button:hover{
				border:none;
				padding:15px 20px;
				border-radius:25px;
				background:#00bbff;
			}
			.login-form .group input[data-type="password"]{
				text-security:circle;
				-webkit-text-security:circle;
			}
			.login-form .group .label{
				color:#aaa;
				font-size:12px;
			}
			.login-form .group .button{
				background:#1161ee;
			}
			.login-form .group label .icon{
				width:15px;
				height:15px;
				border-radius:2px;
				position:relative;
				display:inline-block;
				background:rgba(255,255,255,.1);
			}
			.login-form .group label .icon:before,
			.login-form .group label .icon:after{
				content:'';
				width:10px;
				height:2px;
				background:#fff;
				position:absolute;
				transition:all .2s ease-in-out 0s;
			}
			.login-form .group label .icon:before{
				left:3px;
				width:5px;
				bottom:6px;
				transform:scale(0) rotate(0);
			}
			.login-form .group label .icon:after{
				top:6px;
				right:0;
				transform:scale(0) rotate(0);
			}
			.login-form .group .check:checked + label{
				color:#fff;
			}
			.login-form .group .check:checked + label .icon{
				background:#1161ee;
			}
			.login-form .group .check:checked + label .icon:before{
				transform:scale(1) rotate(45deg);
			}
			.login-form .group .check:checked + label .icon:after{
				transform:scale(1) rotate(-45deg);
			}
			.login-html .sign-in:checked + .tab + .sign-up + .tab + .login-form .sign-in-htm{
				transform:rotate(0);
			}
			.login-html .sign-up:checked + .tab + .login-form .sign-up-htm{
				transform:rotate(0);
			}

			.hr{
				height:2px;
				margin:60px 0 50px 0;
				background:rgba(255,255,255,.2);
			}
			.foot-lnk{
				text-align:center;
			}

		</style>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-180625711-1"></script>
	<script>
  		window.dataLayer = window.dataLayer || [];
  		function gtag(){dataLayer.push(arguments);}
  		gtag('js', new Date());

  		gtag('config', 'UA-180625711-1');

		//Conexión con iniciar sesión
	</script>
	<?php
		$mensajeError="";
		include("iniciarSesion.php");
		
	?>
	</head>
		<body>
			
		<div class="login-wrap">
			<div class="login-html">
			<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Inicio de sesión</label>
			<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Registro</label>
			
			<div class="login-form">
				<form action="iniciarSesion.php" method="GET"> 
				<div class="sign-in-htm">
					<div class="group">
						<label for="user" class="label">Usuario</label>
						<input id="usernick" type="text" class="input" name="usuario">
					</div>
					<div class="group">
						<label for="pass" class="label">Contraseña</label>
						<input id="pass" type="password" class="input" data-type="password" name="password">
					</div>
					<div class="group">
						<input id="check" type="checkbox" class="check" checked>
						<label for="check"><span class="icon"></span> Matener sesión abierta</label>
					</div>
					<div class="group">
						<input type="submit" class="button" value="Sign In">
					</div>
					<div class="hr"></div>
					<div class="foot-lnk">
						<a href="#forgot">He olvidado mi contraseña</a>
					</div>
				</div>
				</form>
				
				
				<form method="post" action="conexion.php"> 
				<div class="sign-up-htm">
					<div class="group">
						<label for="user" class="label">Usuario</label>
						<input id="user" type="text" class="input" name="usernick">
					</div>
					<div class="group">
						<label for="pass" class="label">Contraseña</label>
						<input id="pass" type="password" class="input" data-type="password" name="password1" required pattern=".{8,}">
					</div>
					<div class="group">
						<label for="pass" class="label">Contraseña</label>
						<input id="pass" type="password" class="input" data-type="password" name="password2" required pattern=".{8,}">
					</div>
					<div class="group">
						<label for="pass" class="label">Correo electrónico</label>
						<input id="pass" type="text" class="input" name="email1">
					</div>
					<div class="group">
						<label for="pass" class="label">Correo electrónico confirmación</label>
						<input id="pass" type="text" class="input" name="email2">
					</div>
					<div class="group">
						<input type="submit" class="button" value="submit" name="submit">
					</div>
					<div class="hr"></div>
					<div class="foot-lnk">
						<label for="tab-1">¿Eres miembro?</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
		</body>
</html>