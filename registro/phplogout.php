<?php
require '../clases/AutoCarga.php';
$sesion = new Session();
$sesion->destroy();
header('Location:../usuario/index.php');