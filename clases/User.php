<?php
class User {
    private $nombre, $apellidos, $fechaNacimiento, $email, $clave, $fechaAlta, $activo, $administrador, $plantilla, $fotoPerfil;
    
     //1º Constructor -> null
    function __construct($nombre = null,$apellidos = null, $fechaNacimiento = null, $email = null, $clave = null, $fechaAlta = null, $activo = null, $administrador = null, $plantilla = null, $fotoPerfil = null) {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->email = $email;
        $this->clave = $clave;
        $this->fechaAlta = $fechaAlta;
        $this->activo = $activo;
        $this->administrador = $administrador;
        $this->plantilla = $plantilla;
        $this->fotoPerfil = $fotoPerfil;
    }
    function getNombre() {
        return $this->nombre;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function getFechaNacimiento() {
        return $this->fechaNacimiento;
    }

    function getEmail() {
        return $this->email;
    }

    function getClave() {
        return $this->clave;
    }

    function getFechaAlta() {
        return $this->fechaAlta;
    }

    function getActivo() {
        return $this->activo;
    }

    function getAdministrador() {
        return $this->administrador;
    }

    function getPlantilla() {
        return $this->plantilla;
    }
    
    function getFotoPerfil() {
        return $this->fotoPerfil;
    }
    
    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    function setFechaNacimiento($fechaNacimiento) {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setClave($clave) {
        $this->clave = $clave;
    }

    function setFechaAlta($fechaAlta) {
        $this->fechaAlta = $fechaAlta;
    }

    function setActivo($activo) {
        $this->activo = $activo;
    }

    function setAdministrador($administrador) {
        $this->administrador = $administrador;
    }
    
    function setPlantilla($plantilla) {
        $this->plantilla = $plantilla;
    }
    
    function setFotoPerfil($fotoPerfil) {
        $this->fotoPerfil = $fotoPerfil;
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
        foreach ($this as $key => $valor) {
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
