<?php

class PlantaController extends ControladorBase {

    public function PlantaController() {
        parent::ControladorBase();
    }

    public function index() {
        $planta = new Planta();
        $array = $planta->getAll();
        $this->view("planta", array(
            "planta" => $array,
            "mensajeError" => "<div class='alert alert-success' role='alert'>Formulario de Registro de Planta</div>"
        ));
    }
    
    public function error() {
        $planta = new Planta();
        $array = $planta->getAll();
        $this->view("planta", array(
            "planta" => $array,
            "mensajeError" => "<div class='alert alert-danger' role='alert'>Todos los campos son obligatorios</div>"
        ));
    }
    
    public function createPlanta(){
        $planta = new Planta();
        if($_POST['nombrePlanta'] == '' && $_POST['iniciales'] == '' && $_POST['direccion'] == ''&& $_POST['colonia'] == ''&& $_POST['tel'] == ''&& $_POST['cp'] == ''&& $_POST['razonS'] == ''&& $_POST['rfc'] == ''){
            $this->redirect("planta","error");
        }else {
            
            $planta->setNombre($_POST['nombrePlanta']);
            $planta->setIniciales($_POST['iniciales']);
            $planta->setDireccion($_POST['direccion']);
            $planta->setColonia($_POST['colonia']);
            $planta->setTelefono($_POST['tel']);
            $planta->setCp($_POST['cp']);
            $planta->setRazonSocial($_POST['razonS']);
            $planta->setRfc($_POST['rfc']);
            $planta->setCodigo($_POST['codigoPlanta']);            
            $planta->insert();
            $this->redirect("planta","index");
            
        }
    }
    
    public function updatePlanta() {
        $string = "UPDATE `planta` SET `estatus` = '".$_GET['valor']."' WHERE `planta`.`idPlanta` = ".$_GET['idPlanta']."";
        $maquina = new Maquina();
        $maquina->updateById($string);
        $this->redirect("planta", "index");
    }

    public function deletPlanta() {
        $maquina = new Maquina();
        $string = "DELETE  FROM `planta` WHERE `planta`.`idPlanta` = ".$_GET['valor']."";
        $maquina->deleteById($string);
        $this->redirect("planta", "index");
    }

}
?>
