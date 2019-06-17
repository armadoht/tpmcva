<?php
if(isset($_POST['idActividad']) && $_POST['idActividad'] == "acti"){
   $con = new mysqli('localhost','root','','grupak_hgo');
   if($con){
       $query = "SELECT numeroEmpleado FROM `empleado` ORDER BY `idEmpleado` ASC";
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
}else if(isset($_POST['idActividad']) && $_POST['idActividad'] == "buscarNum"){
    $numempleado = $_POST['numero'];    
    $con = new mysqli('localhost','root','','grupak_hgo');
     if($con){
       $query = "SELECT nombreCompleto FROM `empleado` WHERE numeroEmpleado = '$numempleado'";
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