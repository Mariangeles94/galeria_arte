<?php
require '../clases/AutoCarga.php';
$mensaje = Request::get("mensaje");
$email = Request::get("email");
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
		    <form action="phprecuperarpass.php">
		        <div class ="forgot">
		            <li>
						<input type="text" class="text" name="email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'User Name';}" ><a href="#" class=" icon user"></a>
					</li><br/><br/>
						<input type="submit" value="Aceptar" > <a href="" class=" icon arrow"></a>                                                                                                                                                                                                                                 </h4>
				</div>
		    </form>
		</div>
    </body>
</html>
