<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageUser($bd);
$sesion = new Session();
$email = Request::post("email");
$clave = sha1(Request::post("clave"));
$misusuarios = $gestor->getList3();

foreach ($misusuarios as $key => $value) {
   
    if($email == $value->getEmail() && $clave == $value->getClave()){
        if($value->getActivo() == 1 && $value->getAdministrador() == 0 ){
          $sesion->setUser($value);
          header("Location:../registro/index.php?email=$email");
        }
        if($value->getActivo() == 0 && $value->getAdministrador() == 0 ){
          header("Location:../administrador/phpdelete.php?email=$email");
        }
    }else{
        $mensaje = "Email y/o contraseña incorrecta";
        header("Location:../usuario/index.php?mensaje=$mensaje");
    }
}