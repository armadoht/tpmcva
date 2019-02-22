<?php

class ClasificacionController extends ControladorBase {

    public function ClasificacionController() {
        parent::ControladorBase();
    }
    
    //Index de Login
    public function index() {
        #Clasificación...
        $Clasificacion = new Clasificacion();
        $array = $Clasificacion->getAll();
        $this->view("clasificacion", array(
        "clasificacion" => $array, 
        "mensajeError" => "<div class='alert alert-success' role='alert'> Todos los cambios son obligatorios!</div>"
        ));
    }
    
    public function error(){
        #Clasificación
        $Clasificacion = new Clasificacion();
        $array = $Clasificacion->getAll();
        $this->view("clasificacion", array(
        "clasificacion" => $array,
        "mensajeError" => "<div class='alert alert-warning' role='alert'>El Campo de Clasificación esta Vacio</div>"
        ));
    }
    
    public function createClasificacion(){
        $Clasificacion = new Clasificacion();
        if($_POST['nombreClasificacion'] == ''){
            $this->redirect("clasificacion","error");
        }else{
            $Clasificacion->setNombre($_POST['nombreClasificacion']);
            $Clasificacion->insert();
            $this->redirect("clasificacion","index");
        }
    }
    
    public function updateClasificacion() {
        $string = "UPDATE `clasificacion` SET `estatus` = '".$_GET['valor']."' WHERE `idClasificacion` = ".$_GET['idClasificacion']."";
        $Clasificacion = new Clasificacion();
        $Clasificacion->updateById($string);
        $this->redirect("clasificacion", "index");
    }

    public function deletClasificacion() {
        $Clasificacion = new Clasificacion();
        $string = "DELETE FROM `clasificacion` WHERE `idClasificacion` = ".$_GET['valor']."";
        $Clasificacion->deleteById($string);
        $this->redirect("clasificacion", "index");
    }
    
}

?>

