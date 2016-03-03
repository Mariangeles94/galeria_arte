<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$sesion = new Session();
$gestor = new ManageUser($bd);
$gestorCuadros = new ManageCuadro($bd);
$email = Request::get("email");
$usuario = $gestor->get($email);
$cuadros = $gestorCuadros->getPorCuadros($email);

$op = Request::get("op");
$r = Request::get("r");

if($sesion->isLogged()){
?> 
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
       <link rel="stylesheet" type="text/css" media="all" href="../css/styles.css">
       <link rel="stylesheet" type="text/css" media="all" href="../css/styleTabla.css">
        <link rel="stylesheet" type="text/css" media="all" href="../css/styleForm.css">
        <script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
    </head>
    <body>
       
        <div id="topbar">
         
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
            
            <div class="box">
                <h1>Sube tus imagenes</h1>
                <?php if($r == 1 && $op == 'cargar'){?>
                    <div class="success">Archivo subido correctamente</div>
                <?php } if($r == 0 && $op == 'cargar'){ ?>
                    <div class="error">Error al subir archivo</div>
               <?php } if($op == 'delete' && $r == 1){ ?>
                    <div class="success">El archivo ha sido eliminado</div>
                <?php } ?>
                
                <form  action="../clases/SubirImagen.php?email=<?= $email ?>" method="post" class="contact" enctype="multipart/form-data" >
                    <fieldset class="contact-inner">
                    <p class="contact-input">
                        <input type="file" name="file" /><br/>
                    </p>
                    <p class="contact-input">
                        <input type="text" name="titulo" placeholder="Título" autofocus/>
                    </p>
                    <p class="contact-input">
                       <textarea name="descripcion" maxlength="80" placeholder="Descripción..."autofocus></textarea>
                    </p>
                    <p class="contact-submit">
                        <input type="submit" value="Subir" name="subir" class="button" />
                    </p>
                </form>
            </div>
        <div> 
            <?php if($cuadros != null){?>
           <table border='0' cellpadding='0' cellspacing='0' class='tabla'>
            <thead>
                <tr>
                    <th>Autor</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cuadros as $key => $cuadro) { ?>
                    <tr class='modo1'>
                        <td><?= $usuario->getNombre(); ?></td>
                        <td><?= $cuadro->getTitulo(); ?></td>
                        <td><img src="<?= $cuadro->getImagen()?>" width="250" height="150"> </td>
                        <td>
                            <a class='borrar' href='phpdelete.php?email=<?= $email?>&id=<?= $cuadro->getId() ?>'><img src="../images/eliminar.png"/></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php } ?>
            </div>
        </div>
        </div>
         <script type="text/javascript" src="../js/scripts.js"></script>
    </body>
</html>
<?php
}else{
  header("Location:../usuario/index.php");
}
$bd->close();
?>