<?php

if(isset($_POST['idMaquina'])){
   $con = new mysqli('localhost','root','','');
   if($con){
       $query = "SELECT maquinaseccion.idMaquinaSeccion,maquinaseccion.nombre "
               . "FROM `maquinaseccion` INNER JOIN maquina ON maquina.idMaquina = maquinaseccion.idMaquina "
               . "WHERE maquina.idMaquina =".$_POST['idMaquina'];
       $result=$con->query($query);
       if ($result->num_rows > 0) {
           while ($row = $result->fetch_array()) {
                $resultSet[] = $row;
            }
           echo json_encode($resultSet);
       }else{
           echo 0;
       }
   }
}




    

?>
