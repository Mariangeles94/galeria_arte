<?php
require 'clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageUser($bd);
$usuarios = $gestor->getList2();
$r = Request::get("r");
$op = Request::get("op");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
        <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">

		<style type="text/css">
		    h1{
	            width:80%;
	            margin:auto;
		        text-align:center;
		        color:#000;
		        font-size:3.5em;
		        font-family:"http://www.fontspace.com/hypefonts/above-demo?text=Galeria%20&fontsize=80&foreground=000000&background=FFFFFF";
		    }
		    ul li{
		        display:inline-block;
		        margin:2%;
		        padding:5%;
		        border:5px solid black;
		        background-color:#fff;
		        width:20%;
		        text-align:center;
		    }
		    ul li:hover{
		        border:5px solid #CC9933;
		    }
		    #background{
		        margin-top:-10%;
		        background-image:url(images/background.jpg);
		        width:100%;
		        background-repeat:no-repeat;
		        background-size:cover;
		        padding:5%;
		        padding-top:2%;
		        padding-bottom:20%;
		        
		    }
		</style>
    </head>
    <body>
      <header>
            <nav>
               <a href="usuario/index.php">Login</a>
            </nav>
        </header>
        <div id="background">
            <h1>GALERIA DE ARTE</h1>
            <?php if($r == 1 && $op == 'plantilla'){?>
                      <div class="error">La web del usuario no está disponible</div>
                    <?php } ?>
            <ul>
                <?php foreach ($usuarios as $key => $usuario) { ?>
                       <li>
                         <?php if($usuario->getPlantilla()!=""){ ?>
                           <a href="<?= $usuario->getPlantilla()?>">
                         <?php }else{ ?>
                            <a href="index1.php?r=1&op=plantilla">
                        <?php } ?>      
                        <?php if($usuario->getFotoPerfil()==null){ ?>
                               <img src="../images/avatar.png" alt="default avatar">
                        <?php }else{ ?>
                               <img src="<?= $usuario->getFotoPerfil()?>" alt="default avatar">
                        <?php } ?>
                          <p><?= $usuario->getNombre() ?></p></a></li>
                <?php } ?>
            </ul>
        </div>
    </body>
    <script src="js/scripts.js"></script>
</html>
<?php
$bd->close();
