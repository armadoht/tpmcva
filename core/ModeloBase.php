<?php

class ModeloBase extends EntidadBase {

    private $table;

    public function ModeloBase($table) {
        $this->table = (string) $table;
        parent::EntidadBase($table);
    }

    public function ejecutarSql($str) {
        if ($this->db()) {
            $query = $this->db()->query($str);
            if ($query->num_rows > 1) {
                while ($row = $query->fetch_object()) {
                    $resultSet[] = $row;
                }
            } elseif ($query->num_rows == 1) {
                $resultSet = $query->fetch_object();
            }
        } else {
            $resultSet = null;
        }
        return $resultSet;
    }

//ejecutarSql
}

//Aqui podemos montarnos métodos para los modelos de consulta
?>