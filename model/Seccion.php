<?php
class Seccion extends EntidadBase {
    private $idMaquinaSeccion;
    private $idMaquina;
    private $nombre;
    private $estatus;
    
    public function Seccion() {
        $table = "maquinaseccion";
        parent ::EntidadBase($table);
    }
    
    /* Insertar Seccion */
    public function insert() {
        $query = "INSERT INTO `maquinaseccion` (`idMaquinaSeccion`, `idMaquina`, `nombre`, `estatus`) "
                . "VALUES (NULL, '$this->idMaquina', '$this->nombre', '1');";
        $save = $this->db()->query($query);
        return $save;
    }
    
    public function getArrayMaquinaSeccion(){
        $query = "SELECT maquinaseccion.idMaquinaSeccion,maquina.nombre,maquinaseccion.nombre,maquinaseccion.estatus FROM maquina INNER JOIN maquinaseccion ON maquinaseccion.idMaquina = maquina.idMaquina";
        $result = $this->db()->query($query);
        if($result->num_rows > 0){
            while($row = $result->fetch_array()){
                $resultSet[] = $row;
            }
            return $resultSet;
        }
        return false;
    }
    
    function getIdMaquinaSeccion() {
        return $this->idMaquinaSeccion;
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

    function setIdMaquinaSeccion($idMaquinaSeccion) {
        $this->idMaquinaSeccion = $idMaquinaSeccion;
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
