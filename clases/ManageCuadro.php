<?php

class ManageCuadro {
    private $bd = null;
    private $tabla = "cuadro";

    function __construct(DataBase $bd) {
        $this->bd = $bd;
    }

    function get($id) {
        //devuelve un objeto de la clase 
        $parametros = array();
        $parametros['id'] = $id;
        $this->bd->select($this->tabla, "*", "id=:id", $parametros);
        $fila = $this->bd->getRow();
        $user = new Cuadro();
        $user->set($fila);
        return $user;
    }
     function get2($email) {
        //devuelve un objeto de la clase 
        $parametros = array();
        $parametros['autor'] = $email;
        $this->bd->select($this->tabla, "*", "autor=:autor", $parametros);
        $fila = $this->bd->getRow();
        $cuadro = new Cuadro();
        $cuadro->set($fila);
        return $cuadro;
    }

    function count($condicion = "1 = 1", $parametros = array()) {
        return $this->bd->count($this->tabla, $condicion, $parametros);
    }

    function delete($id) {
        $parametros = array();
        $parametros['id'] = $id;
        return $this->bd->delete($this->tabla, $parametros);
    }

   

    function erase(Cuadro $cuadro) {
        return $this->delete($cuadro->getId());
    }

   function set(Cuadro $cuadro, $pkid){
        //Update de todos los campos menos el id, el id se usara como el where para el update numero de filas modificadas
        $parametros =$cuadro->getArray();
        $parametrosWhere = array();
        $parametrosWhere["id"]=$pkid;
        return $this->bd->update($this->tabla, $parametros, $parametrosWhere);
    }
 
    function insert(Cuadro $cuadro) {
        $parametrosSet = array();
        $parametrosSet['id'] = $cuadro->getId();
        $parametrosSet['autor'] = $cuadro->getAutor();
        $parametrosSet['titulo'] = $cuadro->getTitulo();
        $parametrosSet['descripcion'] = $cuadro->getDescripcion();
        $parametrosSet['fechaCreacion'] = $cuadro->getFechaCreacion();
        $parametrosSet['imagen'] = $cuadro->getImagen();
        return $this->bd->insert($this->tabla, $parametrosSet);
    }
     function getPorCuadros($email) {
        $parametros = array();
        $parametros['autor'] = $email;
        $this->bd->select($this->tabla, "*", "autor=:autor", $parametros);
        $r = array();
        while ($fila = $this->bd->getRow()) {
            $cuadro = new Cuadro();
            $cuadro->set($fila);
            $r[] = $cuadro;
        }
        return $r;
    }
    function getList($pagina = 1, $order = "", $nrpp = Constant::NRPP, $condicion = "1=1", $parametros = array()) {
       
        $resgistroInicial = ($pagina - 1) * $nrpp;
        $this->bd->select($this->tabla, "*", $condicion, $parametros, $ordenPredeterminado, "$resgistroInicial, $nrpp"); 
        $r = array();
        while ($fila = $this->bd->getRow()) {
            $cuadro = new Cuadro();
            $cuadro->set($fila);
            $r[] = $cuadro;
        }
        return $r;
    }
     function getList2($pagina = 1, $nrpp = Constant::NRPP) {
        $resgistroInicial = ($pagina - 1) * $nrpp;
        $this->bd->select($this->tabla, "*", "1=1", array(), "id", "$resgistroInicial, $nrpp"); /* limite va desde 1 y saca 10 registros */
        $r = array();
        while ($fila = $this->bd->getRow()) {
            $cuadro = new Cuadro();
            $cuadro->set($fila);
            $r[] = $cuadro;
        }
        return $r;
    }

    function getValuesSelectTodos() {
        $this->bd->query($this->tabla, "*", array());
        $array = array();
        while ($fila = $this->bd->getRow()) {
            $user = new User();
            $user->set($fila);
            $array = $user;
           // $array[$fila[0]] = $fila[1];
        }
        return $array;
    }
    function getValuesSelectUsario() {
        $this->bd->query($this->tabla, "email, clave, alias", array(), "email");
        $array = array();
        while ($fila = $this->bd->getRow()) {
            $array[$fila[0]] = $fila[1];
        }
        return $array;
    }
    function getValuesSelectPersonal() {
        $this->bd->query($this->tabla, "clave, alias, fechaAlta", array(), "fechaAlta");
        $array = array();
        while ($fila = $this->bd->getRow()) {
            $array[$fila[0]] = $fila[1];
        }
        return $array;
    }
}
