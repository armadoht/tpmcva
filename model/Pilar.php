<?php
    class Pilar extends EntidadBase{
        private $idPilar;
        private $nombre;
        private $estatus;
        
        public function Pilar(){
            $table = "pilar";
            parent ::EntidadBase($table);
        }
        
        /*Insertar Pilar*/
        public function insert() {
            $query = "INSERT INTO `pilar` (`idPilar`, `nombre`, `estatus`) VALUES (NULL, '$this->nombre', '1')";
            $save = $this->db()->query($query);
            return $save;
        }
        
        function getIdPilar() {
            return $this->idPilar;
        }

        function getNombre() {
            return $this->nombre;
        }

        function getEstatus() {
            return $this->estatus;
        }

        function setIdPilar($idPilar) {
            $this->idPilar = $idPilar;
        }

        function setNombre($nombre) {
            $this->nombre = $nombre;
        }

        function setEstatus($estatus) {
            $this->estatus = $estatus;
        }


        
    }
?>