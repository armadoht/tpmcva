<?php
class SeccionController extends ControladorBase{
    public function SeccionController(){
        parent::ControladorBase();
    } 
    public function index() {
        $seccion = new Seccion();
        $datosSeccion = $seccion->getArrayMaquinaSeccion();
        $maquina = $seccion->arrayMaquina();
        $this->view("seccion", array(
        "datosSeccion" => $datosSeccion,
        "maquina" => $maquina, 
        "mensajeError" => "<div class='alert alert-success' role='alert'> Todos los campos son obligatorios!</div>"
        ));
    }
    
    public function createSeccion(){
        $seccion = new Seccion();
        if($_POST['idMaquina'] == '' && $_POST['nombreSeccion'] == ''){
             $this->redirect("seccion","error");
        }else{
            $seccion->setIdMaquina($_POST['idMaquina']);
            $seccion->setNombre($_POST['nombreSeccion']);
            $seccion->insert();
            $this->redirect("seccion","index");
        }
    }
    
    public function error(){
        $seccion = new Seccion();
        $datosSeccion = $seccion->getArrayMaquinaSeccion();
        $maquina = $seccion->arrayMaquina();
        $this->view("seccion", array(
        "datosSeccion" => $datosSeccion,
        "maquina" => $maquina, 
        "mensajeError" => "<div class='alert alert-warning' role='alert'> Llenar todos los campos</div>"
        ));
    }
    
    public function updateSeccion() {
        $string = "UPDATE `maquinaseccion` SET `estatus` = '".$_GET['valor']."' WHERE `maquinaseccion`.`idMaquinaSeccion` = ".$_GET['idSeccion']."";
        $seccion = new Seccion();
        $seccion->updateById($string);
        $this->redirect("seccion", "index");
    }

    public function deletSeccion() {
        $seccion = new Seccion();
        $string = "DELETE  FROM `maquinaseccion` WHERE `maquinaseccion`.`idMaquinaSeccion` = ".$_GET['valor']."";
        $seccion->deleteById($string);
        $this->redirect("seccion", "index");
    }
  
}
?>

