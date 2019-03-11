<?php
if(isset($_POST['idActividad']) && $_POST['idActividad'] == "acti"){
   
    $con = new mysqli('','','','');
    if($con){
       $query = "SELECT count(*) as total FROM lup";
       $result=$con->query($query);
       if ($result->num_rows > 0) {
           $data = $result->fetch_assoc();
           $var = $data['total'] + 1;
           echo $var;
       }else{
           echo 0;
       }
   }
    
}
?>