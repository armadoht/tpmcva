<?php

require_once('config/global.php');
require_once('core/ControladorBase.php');
require_once('core/ControladorFrontal.func.php');

//CONTROLADOR PRINCIPAL...
if (isset($_GET["controller"]) && $_GET['controller'] == 'login') {
    $controllerObj = cargarControladorLogin();
} else if(isset($_GET["controller"]) && $_GET['controller'] == 'lups') {
    $controllerObj = cargarControladorLups();
}else if(isset($_GET["controller"]) && $_GET['controller'] == 'pilar') {
    $controllerObj = cargarControladorPilar();
}else if(isset($_GET["controller"]) && $_GET['controller'] == 'proyecto') {
    $controllerObj = cargarControladorProyecto();
}else if(isset($_GET["controller"]) && $_GET['controller'] == 'clasificacion') {
    $controllerObj = cargarControladorClasificacion();
}else if(isset($_GET["controller"]) && $_GET['controller'] == 'maquina') {
    $controllerObj = cargarControladorMaquina();
}else if(isset($_GET["controller"]) && $_GET['controller'] == 'departamento') {
    $controllerObj = cargarControladorDepartamento();
}else if(isset($_GET["controller"]) && $_GET['controller'] == 'empleado') {
    $controllerObj = cargarControladorEmpleado();
}else if(isset($_GET["controller"]) && $_GET['controller'] == 'planta') {
    $controllerObj = cargarControladorPlanta();
}else if(isset($_GET["controller"]) && $_GET['controller'] == 'seccion') {
    $controllerObj = cargarControladorSeccion();
}else if(isset($_GET["controller"]) && $_GET['controller'] == 'tipoLup') {
    $controllerObj = cargarControladorTipoLup();
}else if(isset($_GET["controller"]) && $_GET['controller'] == 'grafica'){
    $controllerObj = cargarControladorGrafica();
}else {
    $controllerObj = cargarControlador(CONTROLADOR_DEFECTO);
}
    lanzarAccion($controllerObj);
?>