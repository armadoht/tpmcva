<?php

class DepartamentoController extends ControladorBase {

    public function DepartamentoController() {
        parent::ControladorBase();
    }

    public function index() {
        #Cargar vista Departamento
        $departamento = new Departamento();
        $array = $departamento->getAll();
        $this->view("departamento", array(
            "departamento" => $array,
            "mensajeError" => "<div class='alert alert-success' role='alert'> Todos los campos son obligatorios!</div>"
        ));
    }

    public function error() {
        #Cargar vista Departamento
        $departamento = new Departamento();
        $array = $departamento->getAll();
        $this->view("departamento", array(
            "departamento" => $array,
            "mensajeError" => "<div class='alert alert-warning' role='alert'>El campo de maquina esta vacio</div>"
        ));
    }

    public function createDepartamento() {
        #Crear Departamento
        $departamento = new Departamento();
        if ($_POST['nombreDepartamento'] == '') {
            $this->redirect("departamento", "error");
        } else {
            $departamento->setNombre($_POST['nombreDepartamento']);
            $departamento->insert();
            $this->redirect("departamento", "index");
        }
    }

    public function updateDepartamento() {
        $string = "UPDATE `departamento` SET `estatus` = '" . $_GET['valor'] . "' WHERE `departamento`.`idDepartamento` = " . $_GET['idDepartamento'] . "";
        $departamento = new Departamento();
        $departamento->updateById($string);
        $this->redirect("departamento", "index");
    }

    public function deletDepartamento() {
        $departamento = new Departamento();
        $string = "DELETE  FROM `departamento` WHERE `departamento`.`idDepartamento` = " . $_GET['valor'] . "";
        $departamento->deleteById($string);
        $this->redirect("departamento", "index");
    }

}

?>
