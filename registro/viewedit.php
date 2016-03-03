<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$sesion = new Session();
$gestor = new ManageUser($bd);
$email = Request::get("email");
$usuario = $gestor->get($email);
$editar = Request::get("editar");
if($sesion->isLogged()){
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
       <link rel="stylesheet" type="text/css" media="all" href="../css/styles.css">
        <script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
    </head>
    <body>
        <div id="topbar">
          <a href="../usuario/index.php">Back</a>
        </div>
  
  <div id="w">
    <div id="content" class="clearfix">
       <div id="userphoto">
        <?php if($usuario->getFotoPerfil()==null){ ?>
           <img src="../images/avatar.png" alt="default avatar">
        <?php }else{ ?>
        <img src="<?= $usuario->getFotoPerfil()?>" alt="default avatar">
       <?php } ?>
        </div>
      <h1>User Profile</h1>

      <nav id="profiletabs">
        <ul class="clearfix">
         <a href="index.php?email=<?= $email?>">Inicio</a>
         <li><a href="index.php?email=<?= $email?>">Ajustes</a></li>
         <a href="subirFile.php?email=<?= $email?>">Subir imagen</a>
         <a href="<?= $usuario->getPlantilla()?>">Ver web</a>
         <a href="phplogout.php"> Salir </a>
        </ul>
      </nav>
            <div id="form_sample">
                <form action="phpedit.php?email=<?= $email?>&editar=<?= $editar?>" method="POST">
                    <?php if($editar == 1){?>
                    <label>Nombre</label>
                    <input type="text" name="nombre" value="<?php echo $usuario->getNombre(); ?>"/>
                    <?php }?>
                    <?php if($editar == 2){?>
                    <label>Apellidos</label>
                    <input type="text" name="apellidos" value="<?php echo $usuario->getApellidos(); ?>" />
                    <?php }?>
                    <?php if($editar == 3){?>
                    <label>Fecha Nacimiento</label>
                    <input type="date" name="fechaNacimientto" value="<?php echo $usuario->getFechaNacimiento(); ?>" />
                    <?php }?>
                    <?php if($editar == 4){?>
                    <label>Foto perfil</label>
                    <input type="file" name="archivo"/>
                    <?php }?>
                    
                    <input type="submit" value="Modificar"/>
                </form>
            </div>
        </div>
        </div>
        </div>
    </body>
</html>
<?php
}else{
  header("Location:../usuario/index.php");
}
$bd->close();
?>