<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$sesion = new Session();
$gestor = new ManageUser($bd);
$email = Request::get("email");
$usuario = $gestor->get($email);
$plantilla = Request::get("plantilla");
 if($plantilla==1){
      $r = "../cuadros/index.php?email=$email";
      $gestor->setPlantilla($email, $r);
  }else{
      if($plantilla==2){
          $r = "../cuadros/index2.php?email=$email";
          $gestor->setPlantilla($email, $r);
      }
  }
if($sesion->isLogged()){
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="../css/normalize.css" />
    		<link rel="stylesheet" type="text/css" href="../css/demo.css" />
    		<link rel="stylesheet" type="text/css" href="../css/component.css" />
    		<link rel="shortcut icon" href="http://designshack.net/favicon.ico">
        <link rel="icon" href="http://designshack.net/favicon.ico">
        <link rel="stylesheet" type="text/css" media="all" href="../css/styles.css">
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
      <h1>Perfil Usuario</h1>

      <nav id="profiletabs">
        <ul class="clearfix">
          <a href="index.php?email=<?= $email?>">Inicio</a>
          <li><a href="#settings">Ajustes</a></li>
          <a href="subirFile.php?email=<?= $email?>">Subir imagen</a>
          <a href="<?= $usuario->getPlantilla()?>">Ver web</a>
          <a href="phplogout.php"> Salir </a>
        </ul>
      </nav>

        
      
    
      <section id="bio">
        <p>Bienvenido a nuestra plataforma</p>
        
        <p>Seleccione un tema para su web: </p>
        
        <a href="index.php?email=<?= $email?>&plantilla=1"><img src="../images/modelo1.jpg"/></a>
        <a href="index.php?email=<?= $email?>&plantilla=2"><img src="../images/modelo2.jpg"/></a> 
      </section>
      
      <section id="settings" class="hidden">
        <p>Edit your user settings:</p>
        <p class="setting"><span>Nombre <a href="viewedit.php?email=<?= $email?>&editar=1"><img src="../images/edit.png" alt="*Edit*"></a></span><?= $usuario->getNombre()?></p>
        
        <p class="setting"><span>Apellidos <a href="viewedit.php?email=<?= $email?>&editar=2"><img src="../images/edit.png" alt="*Edit*"></a></span><?= $usuario->getApellidos()?></p>
        
        <p class="setting"><span>Fecha Nacimiento <a href="viewedit.php?email=<?= $email?>&editar=3"><img src="../images/edit.png" alt="*Edit*"></a></span><?= $usuario->getFechaNacimiento()?></p>
        
        <p class="setting"><span>E-mail</span><?= $usuario->getEmail()?></p>
        
        <p class="setting"><span>Foto perfil <a href="viewedit.php?email=<?= $email?>&editar=4"><img src="../images/edit.png" alt="*Edit*"></a></span></p>
      </section>
    </div><!-- @end #content -->
  </div><!-- @end #w -->
<script type="text/javascript">
$(function(){
  $('#profiletabs ul li a').on('click', function(e){
    e.preventDefault();
    var newcontent = $(this).attr('href');
    
    $('#profiletabs ul li a').removeClass('sel');
    $(this).addClass('sel');
    
    $('#content section').each(function(){
      if(!$(this).hasClass('hidden')) { $(this).addClass('hidden'); }
    });
    
    $(newcontent).removeClass('hidden');
  });
});
</script>
</body>
</html>

<?php
}else{
  header("Location:../usuario/index.php");
}?>