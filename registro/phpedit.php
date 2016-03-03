<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageUser($bd);

$editar= Request::get("editar");
$email = Request::get("email");
$usuario = $gestor->get($email);

if($editar == 1){
    $nombre = Request::post("nombre");
}else{
    $nombre = $usuario->getNombre();
}
if($editar == 2){
    $apellidos = Request::post("apellidos");
}else{
    $apellidos = $usuario->getApellidos();
}
if($editar == 3){
    $fechaNacimiento = Request::post("fechaNacimientto");
}else{
    $fechaNacimiento = $usuario->getFechaNacimiento();
}
if($editar == 4){
    $subir= new FileUpload("archivo");
    echo $subir->getNombre();
    $subir->setDestino("../imagenesPerfil/");
    $subir->setNombre($subir->getNombre());
   
    if($subir->upload()){
          echo 'Archivo subido con éxito';
          $ruta = "../imagenesPerfil/".$subir->getNombre();
    } else{
          echo 'Archivo no subido';
    }
}else{
    $ruta = $usuario->getFotoPerfil();
}

$clave = $usuario->getClave();
$fechaAlta = $usuario->getFechaAlta();
$activo = $usuario->getActivo();
$administrador = $usuario->getAdministrador();
$plantilla = $usuario->getPlantilla();

$user = new User($nombre, $apellidos, $fechaNacimiento, $email, $clave, $fechaAlta, $activo, $administrador,$plantilla , $ruta);



$r = $gestor->set($user, $email);
$bd->close();
var_dump($bd->getError());
header("Location:index.php?email=$email&op=edit&r=$r");