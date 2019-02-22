<?php

class Empleado extends EntidadBase {

    private $idEmpleado;
    private $numeroEmpleado;
    private $nombreCompleto;
    private $idDepartamento;
    private $idNomina;
    private $idPlanta;
    private $estatus;

    public function Empleado() {
        $table = "empleado";
        parent ::EntidadBase($table);
    }
    

    /* Insertar Empleado */
    public function insert() {
        $query = "INSERT INTO `empleado` (`idEmpleado`, `numeroEmpleado`, `nombreCompleto`, `idDepartamento`, `idNomina`,`idNomina`,`estatus`) "
                . "VALUES (NULL, '$this->numeroEmpleado', '$this->nombreCompleto',"
                . " '$this->idDepartamento', '$this->idNomina', '$this->idPlanta', '1')";
        $save = $this->db()->query($query);
        return $save;
    }
    
    public function buscarEmpleado(){
        $query = "SELECT * FROM `empleado` WHERE `numeroEmpleado` = '$this->numeroEmpleado'";
        $result = $this->db()->query($query);
        if($result->num_rows > 0){
            return  true;
        }else {
            return false;
        }
    }

    public function innerJoinDepNom() {
        $query = "SELECT empleado.idEmpleado,empleado.numeroEmpleado,empleado.nombreCompleto,departamento.nombre, nomina.iniciales,planta.nombre,empleado.estatus FROM empleado INNER JOIN departamento ON empleado.idDepartamento = departamento.idDepartamento INNER JOIN nomina ON empleado.idNomina = nomina.idNomina INNER JOIN planta ON empleado.idPlanta = planta.idPlanta ORDER BY `empleado`.`idEmpleado` ASC";
        $result = $this->db()->query($query);
        if($result->num_rows > 0){
            while($row = $result->fetch_array()){
                $resultSet[] = $row;
            }
            return  $resultSet;
        }
        return false;
    }

    function getIdEmpleado() {
        return $this->idEmpleado;
    }

    function getNumeroEmpleado() {
        return $this->numeroEmpleado;
    }

    function getNombreCompleto() {
        return $this->nombreCompleto;
    }

    function getIdDepartamento() {
        return $this->idDepartamento;
    }

    function getIdNomina() {
        return $this->idNomina;
    }

    function getEstatus() {
        return $this->estatus;
    }

    function setIdEmpleado($idEmpleado) {
        $this->idEmpleado = $idEmpleado;
    }

    function setNumeroEmpleado($numeroEmpleado) {
        $this->numeroEmpleado = $numeroEmpleado;
    }

    function setNombreCompleto($nombreCompleto) {
        $this->nombreCompleto = $nombreCompleto;
    }

    function setIdDepartamento($idDepartamento) {
        $this->idDepartamento = $idDepartamento;
    }

    function setIdNomina($idNomina) {
        $this->idNomina = $idNomina;
    }

    function setEstatus($estatus) {
        $this->estatus = $estatus;
    }
    
    function getIdPlanta() {
        return $this->idPlanta;
    }

    function setIdPlanta($idPlanta) {
        $this->idPlanta = $idPlanta;
    }

}
?>

