<?php

class ControladorCuadro {

    static function handle() {
        $bd = new DataBase();
        $gestor = new ManageCuadro($bd);
        $email = Request::get("email");
        $misCuadros = $gestor->get2($email);
        $action = Request::req("action");
        $do = Request::req("do");
        $metodo = $action . ucfirst($do);
        if (method_exists(get_class(), $metodo)) { //ucfirst pone la primera en mayuscula
            echo 'El método existe';
            self::$metodo($gestor);
        } else {
            echo 'la función no existe';
            self::readView($gestor);
        }
        $bd->close();
    }
    
    private static function deleteSet($gestor){
        $gestor->delete(Request::get("ID"));
        //ControladorCity::readView($gestor);
        header("Location:?r=$r&op=delete");
    }

    private static function readView($gestor) {
        $listaCuadros = $gestor->getList();
        
        $plantillaCuadros = file_get_contents("../plantillas/_cuadro.html");
        $cuadros = "";

        foreach ($listaCuadros as $key => $value) {
            //$cuadroi = str_replace("{imagen}", $value->getImagen(), $plantillaCuadros);
            $cuadroi = str_replace("{titulo}", $value->getTitulo(), $plantillaCuadros);
            $cuadroi = str_replace("{autor}", $value->getAutor(), $cuadroi);
            $cuadros .= $cuadroi;
            $c=$value[0]->getImagen();
        }
        $contenido = file_get_contents("../plantillas/_index1.html");

        $datos = array(
             "title" => "ArtistWeb",
             "imagen" => $c,
             "articulosObras" => $cuadros,
             "pie" => "FooterEspecial"
        );
        foreach ($datos as $key => $value) {
            $contenido = str_replace("{" . $key . "}", $value, $contenido);
        }
        echo $contenido;
    }

}