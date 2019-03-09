<?php

class Maquina extends EntidadBase {

    private $idMaquina;
    private $nombre;
    private $codigo;
    private $estatus;
    
    public function Maquina() {
        $table = "maquina";
        parent ::EntidadBase($table);
    }

    /* Insertar Maquina */
    public function insert() {
        $query = "INSERT INTO `maquina` (`idMaquina`, `nombre`,`codigoMaquina`, `estatus`) VALUES (NULL, '$this->nombre','$this->codigo','1')";
        $save = $this->db()->query($query);
        return $save;
    }
    
    function getCodigo() {
        return $this->codigo;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
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
