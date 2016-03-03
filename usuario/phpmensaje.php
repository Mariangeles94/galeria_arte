<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageUser($bd);
$usuario = new User();
$usuario->read();

$email = Request::get("email");
$gestor->setActivo($email, 1);
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
            <h1>Has sido registrado con éxito</h1>
		    <form action="index.php">
		        <div class ="forgot">
						<input type="submit" value="Volver" > <a href="index.php" class=" icon arrow"></a>                                                                                                                                                                                                                                 </h4>
				</div>
		    </form>
		</div>
    </body>
</html>