<?php
    require '../clases/AutoCarga.php';
    $bd = new DataBase();
    $gestor = new ManageUser($bd);
    function asignarPlantilla($plantilla){
        $r="";
        if($plantilla==1){
            $r = "../cuadros/index.php";
            $gestor->setPlantilla($email, $r);
            $mensajePlantilla = 1;
        }
        if($plantilla==2){
            $r = "../cuadros/index2.php";
            $gestor->setPlantilla($email, $r);
            $mensajePlantilla = 1;
        }
        if($plantilla == null){
           $mensajePlantilla = 0;
        }
        return $mensajePlantilla;
                    
    }

