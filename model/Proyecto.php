<?php
class Proyecto extends EntidadBase{
    private $idProyecto;
    private $nombre;
    private $estatus;
    
    public function Proyecto(){
        $table = "proyecto";
        parent ::EntidadBase($table);
    }
    
    /*Insertar Pilar*/
    public function insert() {
        $query = "INSERT INTO `proyecto` (`idProyecto`, `nombre`, `estatus`) VALUES (NULL, '$this->nombre', '1')";
        $save = $this->db()->query($query);
        return $save;
    }    
    
    function getIdProyecto() {
        return $this->idProyecto;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getEstatus() {
        return $this->estatus;
    }

    function setIdProyecto($idProyecto) {
        $this->idProyecto = $idProyecto;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setEstatus($estatus) {
        $this->estatus = $estatus;
    }


}
?>
