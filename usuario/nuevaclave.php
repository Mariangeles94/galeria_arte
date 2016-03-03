<?php
	require '../clases/AutoCarga.php';
	
	$bd = new DataBase();
    $gestor = new ManageUser($bd);
	$email = Request::get("email");
    $usuario = $gestor->get($email);
?>

<!DOCTYPE html>
<html>
	
<head>
		<title></title>
		<meta charset="utf-8">
		<link href="../css/style.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!--webfonts-->
		<link href='//fonts.googleapis.com/css?family=Open+Sans:600italic,400,300,600,700' rel='stylesheet' type='text/css'>
		<!--//webfonts-->
</head>
    <body>
        <div class="login-form">
            <h1>Recuperar contraseña</h1>
		    <form action="phpnuevaclave.php" method="post">
		        <div class ="forgot">
		            <li>
		            	<input type="hidden" name="email" value="<?php echo $email?>"/>
						<input type="password" class="text" name="clave1" value="" placeholder="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'User Name';}" ><a href="#" class=" icon lock"></a>
					</li>
					<li>
						<input type="password" class="text" name="clave2" value="" placeholder="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'User Name';}" ><a href="#" class=" icon lock"></a>
					</li>
						<input type="submit" value="Aceptar" > <a href="" class=" icon arrow"></a>                                                                                                                                                                                                                                 </h4>
				</div>
		    </form>
		</div>
    </body>
</html>