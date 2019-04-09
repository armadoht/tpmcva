<?php

class LoginController extends ControladorBase {

    public function LoginController() {
        parent::ControladorBase();
    }

    //Index de Login
    public function index() {
        #Cargar vista login...
        $this->view("login", array(
            "Login" => "TAG:Controlador de login",
            "error" => "<div class='alert alert-success' role='alert'>Todos los campos son Obligatorios!</div>"));
    }

    public function error() {
        $this->view("login", array(
            "Login" => "TAG:Controlador de login",
            "error" => "<div class='alert alert-warning' role='alert'>Todos los campos son Obligatorios!</div>"));
    }
    
    public function usuarioActivo(){
        session_start();
        if($_SESSION['permisos']== 0){
            $this->view("admin", array("Administrador" => "Bienvenido al administrador del sistema"));
        }else if($_SESSION['permisos']== 1){
            $this->view("user", array("Usuario Clave" => "Bienvenido usuario clave"));
        }
    }

    public function errorRegistro(){
        $this->view("login", array(
            "Login" => "TAG:Controlador de login",
            "error" => "<div class='alert alert-danger' role='alert'>Usuario y Contraseña no son validos!</div>"));
    }
    
    public function salir(){
        session_start();
        session_destroy();
        $this->view("index", array("Pagina Principal" => "Pagina Principal"));
    }

    //Metodo de Validar Login
    public function validarLogin() {
        #validar campos vacios
        if ($_POST["user"] == '' || $_POST["pass"] == '') {
            $this->error();
        } else {
            session_start();
            $Login = new Login();
            $Login->setUsuairo($_POST['user']);
            $Login->setPassword($_POST['pass']);

            if ($Login->validaUsuario()) {
                $_SESSION['usuario'] = $_POST["user"];
                 $datos = $Login->permisos_usuario();
                 foreach($datos as $valor){
                     $_SESSION['permisos'] = $valor[6];
                 }
                 //Permisos para los usuarios....
                 if($_SESSION['permisos']== 0){
                    $this->view("admin", array("Administrador" => "Bienvenido al administrador del sistema"));
                 }else if($_SESSION['permisos']== 1){
                    $this->view("user", array("Usuario Clave" => "Bienvenido usuario clave"));
                 }
                 
            } else {
                $this->errorRegistro();
            }
        }
    }
    
    //Vista de permisos
    public function viewPermiso(){
        $Login = new Login();
        $datosRegistro = $Login->accessos();
        $array = $Login->datosPlanta();
        $this->view("permiso", array("datosRegistro" => $datosRegistro,"planta"=>$array,"mensajeError"=>"<div class='alert alert-success' role='alert'> Todos los campos son obligatorios!</div>"));
    }
    
    public function viewPermisoError(){
        $Login = new Login();
        $datosRegistro = $Login->accessos();
        $array = $Login->datosPlanta();
        $this->view("permiso", array("datosRegistro" => $datosRegistro,"planta"=>$array,"mensajeError"=>"<div class='alert alert-danger' role='alert'>Error el usuario ya existe!</div>",));
    }
    
    public function update_Login(){
        $string = "UPDATE `login` SET `estatus` = '".$_GET['valor']."' WHERE `login`.`idLogin` = ".$_GET['idLogin']."";
        $Login = new Login();
        $Login->updateById($string);
        $this->redirect('login','viewPermiso');
    }
    
    //
    public function insert_usuario(){
        //confirmamos contraseña
        $Login = new Login();
        $Login->setIdEmpleado($_POST['numeroEmpleado']);
        if($Login->valida_numeroEmpleado()== false){
            
            $Login->setIdEmpleado($_POST['numeroEmpleado']);
            $Login->setEmail($_POST['email']);
            $Login->setUsuairo($_POST['usuario']);
            $Login->setPassword($_POST['pass']);
            $Login->setFechaRegistro($_POST['fechainicio']);
            $Login->setPermisos($_POST['permisos']);
            $Login->setIdPlanta($_POST['idPlanta']);
            
            $Login->insert_acceso();
            $this->redirect('login','viewPermiso');
            
        }else{
           $this->redirect('login','viewPermisoError'); 
        }
    }
// validarLogin
}

?>