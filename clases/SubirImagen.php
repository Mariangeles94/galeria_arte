<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageCuadro($bd);
$mensaje = "";

$email = Request::get("email");
$ruta = "../imagenesObras";
$archivo = $_FILES['file']['tmp_name'];
$nombreArchivo = $_FILES['file']['name'];
move_uploaded_file($archivo, $ruta."/".$nombreArchivo);

$ruta = $ruta."/".$nombreArchivo;
$titulo = Request::post("titulo");
$descripcion = Request::post("descripcion");


$fechaActual = date("Y-m-d");

if($titulo != "" && $descripcion != ""){
    $cuadro = new Cuadro(null,$email, $titulo, $descripcion, $fechaActual, $ruta);
    $correcto = $gestor->insert($cuadro);
}

if($correcto){
    $r = 1;
    header("Location:../registro/subirFile.php?email=$email&r=$r&op=cargar");
}else{
    $r = 0;
   header("Location:../registro/subirFile.php?email=$email&r=$r&op=cargar");
}