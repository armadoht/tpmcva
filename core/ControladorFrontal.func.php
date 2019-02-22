<?php

function cargarControlador($controller) {
    $controlador = ucwords($controller) . 'Controller';
    $strFileController = "controller/" . $controlador . "php";
    if (!is_file($strFileController)) {
        $strFileController = "controller/" . ucwords(CONTROLADOR_DEFECTO) . "Controller.php";
    }
    require_once $strFileController;
    $controllerObj = new $controlador();
    return $controllerObj;
}

/* Cargar controlador login */
function cargarControladorLogin() {
    $controlador = "LoginController.php";
    $strFileController = "controller/" . $controlador;
    require_once $strFileController;
    $controllerObj = new LoginController();
    return $controllerObj;
}

/* Cargar controlador lups */
function cargarControladorLups(){
    $controlador = "LupsController.php";
    $strFileController = "controller/" . $controlador;
    require_once $strFileController;
    $controllerObj = new LupsController();
    return $controllerObj;
}

/* Cargar controlador Pilar */
function cargarControladorPilar(){
    $controlador = "PilarController.php";
    $strFileController = "controller/" . $controlador;
    require_once $strFileController;
    $controllerObj = new PilarController();
    return $controllerObj;
}

/* Cargar controlador Proyecto */
function cargarControladorProyecto(){
    $controlador = "ProyectoController.php";
    $strFileController = "controller/" . $controlador;
    require_once $strFileController;
    $controllerObj = new ProyectoController();
    return $controllerObj;
}

/* Cargar controlador Clasificacion */
function cargarControladorClasificacion(){
    $controlador = "ClasificacionController.php";
    $strFileController = "controller/" . $controlador;
    require_once $strFileController;
    $controllerObj = new ClasificacionController();
    return $controllerObj;
}
/* Cargar controlador Maquina */
function cargarControladorMaquina(){
    $controlador = "MaquinaController.php";
    $strFileController = "controller/" . $controlador;
    require_once $strFileController;
    $controllerObj = new MaquinaController();
    return $controllerObj;
}
/* Cargar controlador Departamento */
function cargarControladorDepartamento(){
    $controlador = "DepartamentoController.php";
    $strFileController = "controller/" . $controlador;
    require_once $strFileController;
    $controllerObj = new DepartamentoController();
    return $controllerObj;
}
/* Cargar controlador Empleado */
function cargarControladorEmpleado(){
    $controlador = "EmpleadoController.php";
    $strFileController = "controller/" . $controlador;
    require_once $strFileController;
    $controllerObj = new EmpleadoController();
    return $controllerObj;
}

/*Cargar controlador de Planta*/
function cargarControladorPlanta(){
    $controlador = "PlantaController.php";
    $strFileController = "controller/" . $controlador;
    require_once $strFileController;
    $controllerObj = new PlantaController();
    return $controllerObj;
}

/*Cargar controlador de Seccion*/
function cargarControladorSeccion(){
    $controlador = "SeccionController.php";
    $strFileController = "controller/" . $controlador;
    require_once $strFileController;
    $controllerObj = new SeccionController();
    return $controllerObj;
}

/*Cargar controlador tipo de lup*/
function cargarControladorTipoLup(){
    $controlador = "TipoLupController.php";
    $strFileController = "controller/" . $controlador;
    require_once $strFileController;
    $controllerObj = new TipoLupController();
    return $controllerObj;
}

function cargarAction($controllerObj, $action) {
    $accion = $action;
    $controllerObj->$accion();
}

function lanzarAccion($controllerObj) {
    if (isset($_GET["action"]) && method_exists($controllerObj, $_GET["action"])) {
        cargarAction($controllerObj, $_GET["action"]);
    } else {
        cargarAction($controllerObj, ACCION_DEFECTO);
    }
}

?>