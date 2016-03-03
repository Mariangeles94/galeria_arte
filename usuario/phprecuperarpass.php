<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageUser($bd);

$email = Request::get("email");
$op = Request::get("op");

$misusuarios = $gestor->getList3();

foreach ($misusuarios as $key => $value) {
    if($email === $value->getEmail()){
        header("Location:../correo/oauth/enviar.php?op=1&usuario=$email");
    }else{
         $mensaje = "Email incorrecto";
         header("Location:index.php?mensaje=$mensaje");
    }
}
