<?php

//Esta clase heredarán los modelos que representen entidades, en 
//los constructores.
class EntidadBase {

    private $table;
    private $db;
    private $conectar;

    //Constructor EntidadBase
    public function EntidadBase($table) {
        $this->table = (string) $table;
        require_once('Conectar.php');
        $this->conectar = new Conectar();
        $this->db = $this->conectar->conexion();
    }

//Constructor
    public function getConectar() {
        return $this->conectar;
    }

//getConectar
    public function db() {
        return $this->db;
    }

//db
    public function getAll() {
        $srt = "SELECT * FROM $this->table";
        if ($this->db) { //Validamos la conexion
            $query = $this->db->query($srt);
            if ($query->num_rows > 0) {
                while ($row = $query->fetch_array()) {
                    $resultSet[] = $row;
                }
            } else {
                $resultSet = null;
            }
        } else {
            $resultSet = null;
        }
        return $resultSet;
    }

//getAll...

    public function getById($id) {
        $srt = "";
        if ($this->db) { //Validamos la conexion
            $query = $this->db->query($srt);
            if ($query->num_rows > 0) {
                $resultSet = $query->fetch_object();
            } else {
                $resultSet = null;
            }
        } else {
            $resultSet = null;
        }
        return $resultSet;
    }

//getById...

    public function getBy($column, $value) {
        $srt = "SELECT * FROM $this->table WHERE $column='$value'";
        if ($this->db) { //Validamos la conexion
            $query = $this->db->query($srt);
            if ($query->num_rows > 0) {
                while ($row = $query->fetch_object()) {
                    $resultSet[] = $row;
                }
            } else {
                $resultSet = null;
            }
        } else {
            $resultSet = null;
        }
        return $resultSet;
    }

//getBy...

    public function deleteById($string) {
        if ($this->db) { //Validamos la conexion
            $resultSet = $query = $this->db->query($string);
            return $resultSet;
        } else {
            $resultSet = null;
        }
        return $resultSet;
    }
    
    public function  updateById($string){
        if ($this->db) { //Validamos la conexion
            $resultSet = $query = $this->db->query($string);
            return $resultSet;
        } else {
            $resultSet = null;
        }
        return $resultSet;
    }

//deleteById...
    public function deleteBy($column, $value) {
        $srt = "DELETE FROM $this->table WHERE $column='$value'";
        if ($this->db) { //Validamos la conexion
            $resultSet = $query = $this->db->query($srt);
            return $resultSet;
        } else {
            $resultSet = null;
        }
        return $resultSet;
    }

    public function datosDepartamento() {
        $query = "SELECT * FROM `departamento`";
        $result = $this->db()->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array()) {
                $resultSet[] = $row;
            }
            return $resultSet;
        }
        return false;
    }

    public function datosNomina() {
        $query = "SELECT * FROM `nomina`";
        $result = $this->db()->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array()) {
                $resultSet[] = $row;
            }
            return $resultSet;
        }
        return false;
    }
    
    public function datosPlanta() {
        $query = "SELECT * FROM `planta`";
        $result = $this->db()->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array()) {
                $resultSet[] = $row;
            }
            return $resultSet;
        }
        return false;
    }
    
    public function arrayMaquina() {
        $query = "SELECT * FROM `maquina`";
        $result = $this->db()->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array()) {
                $resultSet[] = $row;
            }
            return $resultSet;
        }
        return false;
    }
    
//    //JSON
//    public function jsonMaquinaSeccion($query){
//        $result = $this->db()->query($query);
//        if ($result->num_rows > 0) {
//            while ($row = $result->fetch_array()) {
//                $resultSet[] = $row;
//            }
//            return $resultSet;
//        }
//        return false;
//    }

}

?>