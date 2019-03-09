<?php
class Clasificacion extends EntidadBase{
    private $idClasificacion;
    private $nombre;
    private $codigo;
    private $estatus;

    public function Clasificacion(){
        $table = "clasificacion";
        parent ::EntidadBase($table);
    }
    
    /*Insertar Clasificacion*/
    public function insert() {
        $query = "INSERT INTO `clasificacion` (`idClasificacion`,`nombre`,`codigoClasificacion`,`estatus`) VALUES (NULL,'$this->nombre','$this->codigo',1')";
        $save = $this->db()->query($query);
        return $save;
    }
    
    function getCodigo() {
        return $this->codigo;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }
    
    function getIdClasificacion() {
        return $this->idClasificacion;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getEstatus() {
        return $this->estatus;
    }

    function setIdClasificacion($idClasificacion) {
        $this->idClasificacion = $idClasificacion;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setEstatus($estatus) {
        $this->estatus = $estatus;
    }

}
?>