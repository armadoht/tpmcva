<?php
class GraficaController extends ControladorBase{
    public function GraficaController(){
        parent::ControladorBase();
    } 
    public function index() {
        #Cargar vista Grafica...
        $Grafica = new Grafica();
        $pilar = $Grafica->datosPilar();
        $proyecto = $Grafica->datosProyecto();
        $maquina = $Grafica->arrayMaquina();
        $tipolup = $Grafica->datosTipo();
        $clasificacion = $Grafica->arrayClasificacion();
        $planta = $Grafica->datosPlanta();
        $this->view("grafica",array("title" =>"Filtro de Grafica","pilar"=>$pilar,"proyecto"=>$proyecto,"maquina"=>$maquina,"tipolup"=>$tipolup,
            "clasificacion"=>$clasificacion,"planta" => $planta));
    }
    
    public function tipo() {
        #Cargar vista Grafica...
        $Grafica = new Grafica();
        $datos = $Grafica->tipo();//Datos de las lups...
        $array_baseTipo = $Grafica->arrayTipo();//Datos base de tipos de lups
        $planta = $Grafica->datosPlanta();
        $this->view("graficaMain", array("title" => "Grafica por Tipo de Lup",
            "datos" => $datos,"planta"=>$planta,"array_baseTipo" =>$array_baseTipo));
    }
    
    public function pilar() {
        #Cargar vista Grafica...
        $Grafica = new Grafica();
        $datos = $Grafica->pilar();//Datos de las lups
        $array_basePilar = $Grafica->arrayPilar();//Datos del Pilar
        $planta = $Grafica->datosPlanta();
        $this->view("graficaPilar", array("title" => "Grafica por Pilar",
            "datos" => $datos,"planta"=>$planta,"array_basePilar" => $array_basePilar ));
    }
    
    public function proyecto(){
        $Grafica = new Grafica();
        $datos = $Grafica->proyecto();//Datos de las lups
        $array_baseProyecto = $Grafica->arrayProyecto();//Datos del Pilar
        $planta = $Grafica->datosPlanta();
        $this->view("graficaProyecto", array("title" => "Grafica por Proyecto",
            "datos" => $datos,"planta"=>$planta,"array_baseProyecto" => $array_baseProyecto ));
    }
    
    public function persona(){
        #Cargar vista Grafica...
        $Grafica = new Grafica();
        $datos = $Grafica->empleado();//Datos de las lups
        $this->view("graficaEmpleado", array("title" => "Grafica por Empleado","datos" => $datos));
    }
    
    public function crearGrafica(){
        //Valores del formulario para generar las graficas...
        $idPilar = $_POST['idPilar'];
        $idProyecto = $_POST['idProyecto'];
        $idMaquina = $_POST['idMaquina'];
        $idTipoLup = $_POST['idTipoLup'];
        $idClasificacion = $_POST['idClasificacion'];
        
        //Donde los valores de retorno...
        $idPlanta = $_POST['idPlanta'];
        $fecha_inicio = $_POST['fecha_inicio'];
        $fecha_fin = $_POST['fecha_final'];
        
        //si los valores sero no adjuntarlos
        
        $campos = '';
        if($idPilar != 0){
            $campos = $campos.'idPilar';
        }
        if($idProyecto != 0){
            $campos = $campos.',idProyecto';
        }
        if($idMaquina != 0){
            $campos = $campos.',idMaquina';
        }
        if($idTipoLup != 0){
            $campos = $campos.',idTipoLup';
        }
        if($idClasificacion != 0){
            $campos = $campos.',idClasificacion';
        }
        
        $Grafica = new Grafica();
        $query = "SELECT ".$campos." FROM `lup` WHERE ((idPlanta = ".$idPlanta.") AND (fechaElaboracion BETWEEN '".$fecha_inicio."' AND '".$fecha_fin."')) AND (idPilar = ".$idPilar." and idProyecto=".$idProyecto." AND idMaquina = ".$idMaquina." AND idTipoLup = ".$idTipoLup." and idClasificacion = ".$idClasificacion.")";
        $query2 = "SELECT pilar.nombre, proyecto.nombre, maquina.nombre, tipolup.nombre, clasificacion.nombre "
                . "FROM `lup` INNER JOIN pilar ON pilar.idPilar = lup.idPilar "
                . "INNER JOIN proyecto ON proyecto.idProyecto = lup.idProyecto "
                . "INNER JOIN maquina ON maquina.idMaquina = lup.idMaquina "
                . "INNER JOIN tipolup ON tipolup.idTipoLup = lup.idTipoLup "
                . "INNER JOIN clasificacion ON clasificacion.idClasificacion = lup.idClasificacion "
                . "WHERE pilar.idPilar = ".$idPilar." AND proyecto.idProyecto = ".$idProyecto." AND maquina.idMaquina = ".$idMaquina." AND tipolup.idTipoLup = ".$idTipoLup." AND clasificacion.idClasificacion = ".$idClasificacion;
        
        $datos = $Grafica->crearGraficaQuery($query);
        $array = $Grafica->crearGraficaQuery($query2);
        
        $this->view("graficaFiltro", array("title" => "Grafica por Filtro", "datos" => $datos, "array" => $array));
        
    }
}
?>
