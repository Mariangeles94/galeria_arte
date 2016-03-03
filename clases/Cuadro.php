<?php
class Cuadro {
    private $id, $autor, $titulo, $descripcion, $fechaCreacion, $imagen;
    
     //1º Constructor -> null
    function __construct($id = null, $autor = null, $titulo = null,$descripcion = null, $fechaCreacion = null, $imagen = null) {
        $this->id = $id;
        $this->autor = $autor;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->fechaCreacion = $fechaCreacion;
        $this->imagen = $imagen;
    }
    function getId() {
        return $this->id;
    }

    function getAutor() {
        return $this->autor;
    }

    function getTitulo() {
        return $this->titulo;
    }
    
    function getDescripcion() {
        return $this->descripcion;
    }

    function getFechaCreacion() {
        return $this->fechaCreacion;
    }

    function getImagen() {
        return $this->imagen;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setAutor($autor) {
        $this->autor = $autor;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }
    
    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }


    function setFechaCreacion($fechaCreacion) {
        $this->fechaCreacion = $fechaCreacion;
    }

    function setImagen($imagen) {
        $this->imagen = $imagen;
    }
    //3º getJson
    public function getJson(){
        $r = '{';
        foreach ($this as $indice => $valor) {
            $r .= '"' .$indice . '":"' .$valor. '",';
        }
        $r = substr($r, 0,-1);
        $r .='}';
        return $r;
    }
    
    //4º set genérico  
    function set($valores, $inicio=0){
        $i = 0;
        foreach ($this as $indice => $valor) {
           $this->$indice = $valores[$i+$inicio];
           $i++;
        }
    }
    public function getArray($valores = true){
        $array = array();
        foreach ($this as $key => $valor) {
            if($valores === true){
                $array[$key] = $valor;
            }else{
                $array[$key]=null;
            }
        }
        return $array;
    }
    function read(){
        foreach ($this as $key => $valor) {//leer de la interfaz de usuario q coincida con los valores de mi base de datos 
            $this->$key = Request::req($key);
        }
    }
    public function __toString() {
        $r ='';
        foreach ($this as $key => $valor) { 
            $r .= "$valor ";
        }
        return $r;
    }

}
