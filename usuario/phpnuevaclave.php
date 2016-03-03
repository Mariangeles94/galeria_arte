<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageUser($bd);
$usuario = new User();
$usuario->read();
$email = Request::post("email");
$clave1 = Request::post("clave1");
$clave2 = Request::post("clave2");



    if($clave1 == $clave2 && $clave1 !==" "){
        $clave = (sha1($clave1));
        $gestor->setClave($email, $clave);
        $mensaje = "Constraseña restablecida con exito";
        header("Location:index.php?mensaje=$mensaje");
    }else{
        $mensaje = "Error al introducir la contraseña";
         header("Location:index.php?mensaje=$mensaje");
    }