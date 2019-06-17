<?php
class Grafica extends EntidadBase{

    public function Grafica(){
        $table = "Grafica";
        parent ::EntidadBase($table);
    }
    
    public function showCorrugadoCva(){
	$query = "SELECT COUNT(*) FROM lup WHERE `idPlanta`= 1";
	$result = $this->db()->query($query);
	if($result->num_rows > 0){
            $cont = $result->fetch_row();
            return  $cont[0];
        }else{
            return 0;
        }
    }//showCorrugadoCva
    
    public function showCorrugadoTol(){
	$query = "SELECT COUNT(*) FROM lup WHERE `idPlanta`= 3";
	$result = $this->db()->query($query);
	if($result->num_rows > 0){
            $cont = $result->fetch_row();
            return  $cont[0];
        }else{
            return 0;
        }
    }//showCorrugadoCva
 
   
}
?>