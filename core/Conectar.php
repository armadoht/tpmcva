<?php

class Conectar {

    private $driver;
    private $host, $user, $pass, $database, $charset;

    //Constructor Conectar
    public function Conectar() {

        $db_cfg = require_once('config/database.php');

        $this->driver = $db_cfg["driver"];
        $this->host = $db_cfg["host"];
        $this->user = $db_cfg["user"];
        $this->pass = $db_cfg["password"];
        $this->database = $db_cfg["database"];
        $this->charset = $db_cfg["charset"];
    }
    

    public function conexion() {
        if ($this->driver == 'mysql' || $this->driver == null) {
            $con = new mysqli($this->host, $this->user, $this->pass, $this->database);
        }
        return $con;
    }

}

?>