<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageCuadro($bd);
$id = Request::get("id");
$email = Request::get("email");

$r = $gestor->delete($id);

$bd->close();
header("Location:subirFile.php?email=$email&op=delete&r=$r");


