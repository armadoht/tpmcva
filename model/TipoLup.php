<?php
class TipoLup extends EntidadBase {
    private $idTipoLup;
    private $nombre;
    private $estatus;
    
    public function TipoLup(){
        $table = "tipolup";
        parent ::EntidadBase($table);
    }
    
    public function insert(){
        $query = "INSERT INTO `tipolup` (`idTipoLup`, `nombre`, `estatus`) VALUES (NULL, '$this->nombre', '1')";
        $save = $this->db()->query($query);
        return $save;
    }
    
    public function update(){
        $query = "UPDATE `tipolup` SET `estatus` = '$this->estatus' WHERE `tipolup`.`idTipoLup` = $this->idTipoLup;";
        $save = $this->db()->query($query);
        return $save;
    }
    
    public function delete(){
        $query = "DELETE  FROM `tipolup` WHERE `tipolup`.`idTipoLup` = $this->idTipoLup";
        $save = $this->db()->query($query);
        return $save;
    }
    
    function getIdTipoLup() {
        return $this->idTipoLup;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getEstatus() {
        return $this->estatus;
    }

    function setIdTipoLup($idTipoLup) {
        $this->idTipoLup = $idTipoLup;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setEstatus($estatus) {
        $this->estatus = $estatus;
    }


}
?>