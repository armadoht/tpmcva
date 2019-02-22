<?php

class ProyectoController extends ControladorBase {
    
    public function ProyectoController() {
        parent::ControladorBase();
    }
    
    //Index de Login
    public function index() {
        #Cargar vista Pilar...
        $Proyecto = new Proyecto();
        $array = $Proyecto->getAll();
        $this->view("proyecto", array(
        "proyecto" => $array, 
        "mensajeError" => "<div class='alert alert-success' role='alert'> Todos los cambios son obligatorios!</div>"
        ));
    }
    
    public function error(){
        #Cargar vista Pilar...
        $Proyecto = new Proyecto();
        $array = $Proyecto->getAll();
        $this->view("proyecto", array(
        "proyecto" => $array, 
        "mensajeError" => "<div class='alert alert-warning' role='alert'>El compo de nombre de pilar esta vacio</div>"
        ));
    }
    
    public function createProyecto(){
        $proyecto = new Proyecto();
        if($_POST['nombreProyecto'] == ''){
            $this->redirect("proyecto","error");
        }else{
            $proyecto->setNombre($_POST['nombreProyecto']);
            $proyecto->insert();
            $this->redirect("proyecto","index");
        }
    }
    
    public function updateProyecto() {
        $string = "UPDATE `proyecto` SET `estatus` = '".$_GET['valor']."' WHERE `proyecto`.`idProyecto` = ".$_GET['idProyecto']."";
        $proyecto = new Proyecto();
        $proyecto->updateById($string);
        $this->redirect("proyecto", "index");
    }

    public function deletProyecto() {
        $string = "DELETE  FROM `proyecto` WHERE `proyecto`.`idProyecto` = ".$_GET['valor']."";
        $proyecto = new Proyecto();
        $proyecto->deleteById($string);
        $this->redirect("proyecto", "index");
    }
    
}

?>
