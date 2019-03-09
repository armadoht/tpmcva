<?php
class TipoLupController extends ControladorBase {

    public function TipoLupController() {
        parent::ControladorBase();
    }
    
    public function index() {
        $tipoLup = new TipoLup();
        $tipolup = $tipoLup->getAll();
        $this->view("tipoLup", 
        array("tipolup" => $tipolup,
            "mensajeError" => "<div class='alert alert-success' role='alert'> Todos los cambios son obligatorios!</div>"
        ));
    }
    
    public function createTipoLup(){
        $tipoLup = new TipoLup();
        if($_POST['tipoLup'] == ''){
            $this->redirect('tipoLup','error');
        }else{
           $tipoLup->setNombre($_POST['tipoLup']);
           $tipoLup->setCodigo($_POST['codigo']);
           $tipoLup->insert();
           $this->redirect('tipoLup','index'); 
        }
    }
    
    public function updateTipoLup() {
        $tipoLup = new TipoLup();
        $tipoLup->setIdTipoLup($_GET['idTipoLup']);
        $tipoLup->setEstatus($_GET['valor']);
        $tipoLup->update();
        $this->redirect("tipoLup", "index");
    }

    public function deletTipoLup() {
        $tipoLup = new TipoLup();
        $tipoLup->setIdTipoLup($_GET['valor']);
        $tipoLup->delete();
        $this->redirect("tipoLup", "index");
    }
    
    public function error(){
        $tipoLup = new TipoLup();
        $tipolup = $tipoLup->getAll();
        $this->view("tipoLup", 
        array("tipolup" => $tipolup,
            "mensajeError" => "<div class='alert alert-warning' role='alert'>Los campos vacios no son validos!</div>"
        ));  
    }
      
}
?>