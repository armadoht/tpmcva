<?php
class Departamento extends EntidadBase{
    private $departamento;
    private $nombre;
    private $estatus;
    
    public function Departamento(){
        $table = "departamento";
        parent ::EntidadBase($table);
    }
    
    /*Insertar Pilar*/
    function insert() {
        $query = "INSERT INTO `departamento` (`idDepartamento`, `nombre`, `estatus`) VALUES (NULL, '$this->nombre', '1')";
        $save = $this->db()->query($query);
        return $save;
    }
    
    
            
    function getDepartamento() {
        return $this->departamento;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getEstatus() {
        return $this->estatus;
    }

    function setDepartamento($departamento) {
        $this->departamento = $departamento;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setEstatus($estatus) {
        $this->estatus = $estatus;
    }

   
}
?>
