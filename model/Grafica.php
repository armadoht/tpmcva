<?php
class Grafica extends EntidadBase{

    public function Grafica(){
        $table = "Grafica";
        parent ::EntidadBase($table);
    }

    public function tipo(){
	$query = "SELECT idTipoLup FROM `lup`";
	$result = $this->db()->query($query);
        if($result->num_rows > 0){
            while($row = $result->fetch_array()){
                $resultSet[] = $row;
            }
            return $resultSet;
        }
        return false;
    }//showTipo

    public function tipo_fecha_planta($finicio, $ffinal, $idplanta,$concepto){
        $query = "SELECT ".$concepto." FROM `lup` WHERE (idPlanta = $idplanta) AND (fechaElaboracion BETWEEN '".$finicio."' AND '".$ffinal."')";
        $result = $this->db()->query($query);
            if($result->num_rows > 0){
                while($row = $result->fetch_array()){
                    $resultSet[] = $row;
                }
                return $resultSet;
            }
         return false;
    }

    //Solo aplica para el empleado
    public function tipo_fecha_empleado($finicio, $ffinal, $idplanta){
        $query = "SELECT elaboro FROM `lup` WHERE (idPlanta = $idplanta) AND (fechaElaboracion BETWEEN '".$finicio."' AND '".$ffinal."')";
        $result = $this->db()->query($query);
          if($result->num_rows > 0){
              while($row = $result->fetch_array()){
                  $resultSet[] = strtoupper($row[0]);
              }
              return $resultSet;
          }
          return false;
    }

    public function pilar(){
    	$query = "SELECT idPilar FROM `lup`";
    	$result = $this->db()->query($query);
      if($result->num_rows > 0){
          while($row = $result->fetch_array()){
              $resultSet[] = $row;
          }
          return $resultSet;
      }
      return false;
    }//showPilar

    public function proyecto(){
    	$query = "SELECT idProyecto FROM `lup`";
    	$result = $this->db()->query($query);
        if($result->num_rows > 0){
              while($row = $result->fetch_array()){
                  $resultSet[] = $row;
              }
              return $resultSet;
          }
          return false;
    }//showPilar

    public function empleado(){
        $cont=0;
        $query = "SELECT elaboro FROM `lup`";
        $result = $this->db()->query($query);
        if($result->num_rows > 0){
            while($row = $result->fetch_array()){
                $resultSet[] = strtoupper($row[0]);
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

    public function crearGraficaQuery($query){
        $result = $this->db()->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array()) {
                $resultSet[] = $row;
            }
            return $resultSet;
        }
        return false;
    }


}
?>
