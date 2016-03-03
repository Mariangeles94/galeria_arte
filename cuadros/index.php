<?php
/*ORIENTADO A BASE DE DATOS*/
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestorUsuarios = new ManageUser($bd);
$gestorCuadros = new ManageCuadro($bd);
$email = Request::get("email");
$cuadros = $gestorCuadros->getPorCuadros($email);
$usuario = $gestorUsuarios->get($email);
$contenido = file_get_contents("../plantillas/_index1.html");


$articulo = file_get_contents("../plantillas/_cuadro.html");
$articulos = "";

foreach ($cuadros as $key => $value) {
    $articuloi = str_replace("{titulo}", $value->getTitulo(), $articulo);
    $articuloi = str_replace("{autor}", $usuario->getNombre(), $articuloi);
    $articuloi = str_replace("{descripcion}", $value->getDescripcion(), $articuloi);
    $articuloi = str_replace("{imagen}", $value->getImagen(), $articuloi);
    $articulos .= $articuloi;
}

$descripcion = file_get_contents("../plantillas/_descripcion.html");
$descripciones = "";

foreach ($cuadros as $key => $value) {
    $descripcioni = str_replace("{titulo}", $value->getTitulo(), $descripcion);
    $descripcioni = str_replace("{autor}", $usuario->getNombre(), $descripcioni);
    $descripcioni = str_replace("{descripcion}", $value->getDescripcion(), $descripcioni);
    $descripcioni = str_replace("{imagen}", $value->getImagen(), $descripcioni);
    $descripciones .= $descripcioni;
}



$datos= array(
    "title" => "Galeria de arte",
    "autor" => $usuario->getNombre(),
    "email" => $email,
    "pie" => "Footer",
    "articulosObras" => $articulos,
    "descripcionObras" => $descripciones
    
);

foreach ($datos as $key => $value) {
    $contenido = str_replace("{".$key."}", $value, $contenido);
}

$contenido = str_replace("{pie}", "Mi pie", $contenido);

echo $contenido;