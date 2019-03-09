<?php
class MaquinaController extends ControladorBase{
    public function MaquinaController(){
        parent::ControladorBase();
    } 
    public function index() {
        #Cargar vista Maquina...
        $maquina = new Maquina();
        $array = $maquina->getAll();
        $this->view("maquina", array(
        "maquina" => $array, 
        "mensajeError" => "<div class='alert alert-success' role='alert'> Todos los campos son obligatorios!</div>"
        ));
    }
    public function error(){
        #Cargar vista Maquina...
        $maquina = new Maquina();
        $array = $maquina->getAll();
        $this->view("maquina", array(
        "maquina" => $array, 
        "mensajeError" => "<div class='alert alert-warning' role='alert'>El campo de maquina esta vacio</div>"
        ));
    }
    
    public function createMaquina(){
        #Cargar vista Maquina...
        $maquina = new Maquina();
        if($_POST['nombreMaquina'] == ''){
            $this->redirect("maquina","error");
        }else{
            $maquina->setNombre($_POST['nombreMaquina']);
            $maquina->setCodigo($_POST['codigo']);
            $maquina->insert();
            $this->redirect("maquina","index");
        }
    }
    
    public function updateMaquina() {
        $string = "UPDATE `maquina` SET `estatus` = '".$_GET['valor']."' WHERE `maquina`.`idMaquina` = ".$_GET['idMaquina']."";
        $maquina = new Maquina();
        $maquina->updateById($string);
        $this->redirect("maquina", "index");
    }

    public function deletMAquina() {
        $maquina = new Maquina();
        $string = "DELETE  FROM `maquina` WHERE `maquina`.`idMaquina` = ".$_GET['valor']."";
        $maquina->deleteById($string);
        $this->redirect("maquina", "index");
    }
    
}
?>
