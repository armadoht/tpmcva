<?php

class Planta extends EntidadBase {

    private $idPlanta;
    private $nombre;
    private $iniciales;
    private $direccion;
    private $colonia;
    private $telefono;
    private $cp;
    private $razonSocial;
    private $rfc;
    private $estatus;

    public function Planta() {
        $table = "planta";
        parent::EntidadBase($table);
    }

    //Add Planta!
    public function insert() {
        $query = "INSERT INTO `planta` (`idPlanta`, `nombre`, `iniciales`, `direccion`, `colonia`, `telefono`, `cp`, `razonSocial`, `rfc`, `estatus`)"
                . " VALUES (NULL, '$this->nombre', '$this->iniciales', '$this->direccion', '$this->colonia', '$this->telefono', '$this->cp', 'ERROR', 'ERROR', '1');";
        $save = $this->db()->query($query);
        return $save;
    }

    function getIdPlanta() {
        return $this->idPlanta;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getIniciales() {
        return $this->iniciales;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getColonia() {
        return $this->colonia;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getCp() {
        return $this->cp;
    }

    function getRazonSocial() {
        return $this->razonSocial;
    }

    function getRfc() {
        return $this->rfc;
    }

    function getEstatus() {
        return $this->estatus;
    }

    function setIdPlanta($idPlanta) {
        $this->idPlanta = $idPlanta;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setIniciales($iniciales) {
        $this->iniciales = $iniciales;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setColonia($colonia) {
        $this->colonia = $colonia;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setCp($cp) {
        $this->cp = $cp;
    }

    function setRazonSocial($razonSocial) {
        $this->razonSocial = $razonSocial;
    }

    function setRfc($rfc) {
        $this->rfc = $rfc;
    }

    function setEstatus($estatus) {
        $this->estatus = $estatus;
    }

}
?>

