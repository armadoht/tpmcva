<?php

class PilarController extends ControladorBase {

    public function PilarController() {
        parent::ControladorBase();
    }

    //Index de Login
    public function index() {
        #Cargar vista Pilar...
        $Pilar = new Pilar();
        $array = $Pilar->getAll();
        $this->view("pilar", array(
            "pilar" => $array,
            "mensajeError" => "<div class='alert alert-success' role='alert'> Todos los cambios son obligatorios!</div>"
        ));
    }

    public function error() {
        #Cargar vista Pilar...
        $Pilar = new Pilar();
        $array = $Pilar->getAll();
        $this->view("pilar", array(
            "pilar" => $array,
            "mensajeError" => "<div class='alert alert-warning' role='alert'>El compo de nombre de pilar esta vacio</div>"
        ));
    }

    public function createPilar() {
        $pilar = new Pilar();
        if ($_POST['nombrePilar'] == '') {
            $this->redirect("pilar", "error");
        } else {
            $pilar->setNombre($_POST['nombrePilar']);
            $pilar->insert();
            $this->redirect("pilar", "index");
        }
    }

    public function updatePilar() {
        $string = "UPDATE `pilar` SET `estatus` = '".$_GET['valor']."' WHERE `pilar`.`idPilar` = ".$_GET['idPilar']."";
        $pilar = new Pilar();
        $pilar->updateById($string);
        $this->redirect("pilar", "index");
    }

    public function deletPilar() {
        $pilar = new Pilar();
        $string = "DELETE  FROM `pilar` WHERE `pilar`.`idPilar` = ".$_GET['valor']."";
        $pilar->deleteById($string);
        $this->redirect("pilar", "index");
    }
}

?>