<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageUser($bd);
$usuario = new User();
$usuario->read();

$nombre = Request::post("nombre");
$usuario->setNombre($nombre);
$apellidos = Request::post("apellidos");
$usuario->setApellidos($apellidos);
$fechaNacimiento = Request::post("fechaNacimiento");
$usuario->setFechaNacimiento($fechaNacimiento);
$email = Request::post("email");
$usuario->setEmail($email);
$clave = Request::post("clave1");
$usuario->setClave(sha1($clave));
$fechaAlta = date("Y-m-d");
$usuario->setFechaAlta($fechaAlta);
$activo = 0;
$usuario->setActivo($activo);
$usuario->setPlantilla("");
$usuario->setAdministrador(0);

if($email != "" && $clave != ""){
    $gestor->insert($usuario);
    var_dump($bd->getError());
    header("Location:../correo/oauth/enviar.php?op=0&usuario=$email");
}else{
    $mensaje = "Email y/o contraseña estan vacio/s";
    header("Location:index.php?mensaje=$mensaje");
}
$bd->close();

   



