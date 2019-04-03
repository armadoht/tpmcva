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

// validarLogin
}

?>