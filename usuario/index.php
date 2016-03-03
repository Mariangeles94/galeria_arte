<?php
require '../clases/AutoCarga.php';
$mensaje = Request::get("mensaje");
$sesion = new Session();

?>
<!DOCTYPE html>
<html>
<head>
		<title></title>
		<meta charset="utf-8">
        <link href="../css/style.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<link href='//fonts.googleapis.com/css?family=Open+Sans:600italic,400,300,600,700' rel='stylesheet' type='text/css'>
		
</head>
<body>
				<div class="login-form">
					<h1>Login in</h1>
				
					<h2><a href="phpaltausuario.php">Crear cuenta</a></h2>
					
               	    <form method="POST" action="../registro/phpregistro.php">
               	    	<h3 class="mensaje"> <?php echo $mensaje; ?> </h3>
						<li>
							<input type="text" class="text" name="email" value="User Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'User Name';}" ><a href="#" class=" icon user"></a>
						</li>
						<li>
							<input type="password" name="clave" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}"><a href="#" class=" icon lock"></a>
						</li>
						<div class ="forgot">
							<h3><a href="recuperarclave.php">¿Olvidaste tu contraseña?</a></h3>
							<input type="submit" name="enviar" onclick="myFunction()" value="Login in" > <a href="#" class=" icon arrow"></a>                                                                                                                                                                                                                                 </h4>
						</div>
				</form>
				
			</div>
</body>
</html>