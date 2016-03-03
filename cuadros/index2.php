<?php

require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestorUsuarios = new ManageUser($bd);
$gestorCuadros = new ManageCuadro($bd);
$email = Request::get("email");
$cuadros = $gestorCuadros->getPorCuadros($email);
$usuario = $gestorUsuarios->get($email);
$contenido = file_get_contents("../plantillas/plantilla2/_index2.html");

$articulo = file_get_contents("../plantillas/plantilla2/_cuadro.html");
$articulos = "";

foreach ($cuadros as $key => $value) {
    $articuloi = str_replace("{titulo}", $value->getTitulo(), $articulo);
    $articuloi = str_replace("{autor}", $usuario->getNombre(), $articuloi);
    $articuloi = str_replace("{descripcion}", $value->getDescripcion(), $articuloi);
    $articuloi = str_replace("{imagen}", $value->getImagen(), $articuloi);
    $articulos .= $articuloi;
}




$datos= array(
    "titulo" => "Galeria de arte",
    "titulo2" => "Galeria de arte",
    "email" => $email,
    "titulo3" => $usuario->getNombre(),
    "titulo3.1" => $usuario->getApellidos(),
    "pie" => "Footer",
    "articulosObras2" => $articulos
);

foreach ($datos as $key => $value) {
    $contenido = str_replace("{".$key."}", $value, $contenido);
}

$contenido = str_replace("{pie}", "Mi pie", $contenido);

echo $contenido;