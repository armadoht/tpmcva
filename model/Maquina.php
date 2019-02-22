<?php

class Maquina extends EntidadBase {

    private $idMaquina;
    private $nombre;
    private $estatus;

    public function Maquina() {
        $table = "maquina";
        parent ::EntidadBase($table);
    }

    /* Insertar Maquina */
    public function insert() {
        $query = "INSERT INTO `maquina` (`idMaquina`, `nombre`, `estatus`) VALUES (NULL, '$this->nombre', '1')";
        $save = $this->db()->query($query);
        return $save;
    }

    function getIdMaquina() {
        return $this->idMaquina;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getEstatus() {
        return $this->estatus;
    }

    function setIdMaquina($idMaquina) {
        $this->idMaquina = $idMaquina;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setEstatus($estatus) {
        $this->estatus = $estatus;
    }

    

}

?>
