<?php

class EmpleadoController extends ControladorBase {

    public function EmpleadoController() {
        parent::ControladorBase();
    }

    public function index() {
        #Cargar vista Empleado...
        $empleado = new Empleado();
        $array = $empleado->innerJoinDepNom();
        $departamento = $empleado->datosDepartamento();
        $nomina = $empleado->datosNomina();
        $planta = $empleado->datosPlanta();
        $this->view("empleado", array(
            "empleado" => $array,
            "departamento" => $departamento,
            "nomina" => $nomina,
            "planta" => $planta,
            "mensajeError" => "<div class='alert alert-success' role='alert'> Registro de personal para el sistema de lups!</div>"
        ));
    }

    public function createEmpleado() {
        #Cargar vista Maquina...
        $empleado = new Empleado();
        $empleado->setNumeroEmpleado($_POST['numeroEmpleado']);
        if($empleado->buscarEmpleado()){
            $this->redirect("empleado", "errorNumeroEmpleado");
        } else {
            $empleado->setNombreCompleto($_POST['nombreCompleto']);
            $empleado->setIdDepartamento($_POST['idDepartamento']);
            $empleado->setIdNomina($_POST['idNomina']);
            $empleado->setIdPlanta($_POST['idPlanta']);
            $empleado->insert();
            $this->redirect("empleado", "index");
        }   
    }

    

    public function errorNumeroEmpleado() {
        #Cargar vista Empleado...
        $empleado = new Empleado();
        $array = $empleado->innerJoinDepNom();
        $departamento = $empleado->datosDepartamento();
        $nomina = $empleado->datosNomina();
        $planta = $empleado->datosPlanta();
        $this->view("empleado", array(
            "empleado" => $array,
            "departamento" => $departamento,
            "nomina" => $nomina,
            "planta" => $planta,
            "mensajeError" => "<div class='alert alert-danger' role='alert'>EL empleado ya existe!</div>"
        ));
    }

    public function errorVacio() {
        #Cargar vista Empleado...
        $empleado = new Empleado();
        $array = $empleado->innerJoinDepNom();
        $departamento = $empleado->datosDepartamento();
        $nomina = $empleado->datosNomina();
        $planta = $empleado->datosPlanta();
        $this->view("empleado", array(
            "empleado" => $array,
            "departamento" => $departamento,
            "nomina" => $nomina,
            "planta" => $planta,
            "mensajeError" => "<div class='alert alert-warning' role='alert'>Todos los campos son obligatorios!</div>"
        ));
    }

    

}

?>