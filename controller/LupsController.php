
<?php

class LupsController extends ControladorBase {

    public function LupsController() {
        parent::ControladorBase();
    }
    /**
     *Este metodo es el principal carga el pilar, la seccion, maquina proyecto
     *clasificacion, maquina,departamento,tipo de lup.
    */
    public function index() {
        #Cargar el formulario
        $lup = new Lup();
        $pilarArr = $lup->getPilarArray();
        $proyectoArr = $lup->getProyectoArray();
        $clasificaArr = $lup->getClasificacionArray();
        $maquinaArr = $lup->getMaquinaArray();
        $departamentoArr = $lup->getDepartamentoArray();
        $tipoLup = $lup->getTipoLup();
        $planta = $lup->getPlanta();

        $this->view("lups",
        array("maquina" => $maquinaArr,
            "pilar" => $pilarArr,
            "proyecto" => $proyectoArr,
            "clasificacion" => $clasificaArr,
            "departamento" => $departamentoArr,
            "tipolup" => $tipoLup,
            "planta" => $planta,
            "mensajeError" => "<div class='alert alert-success text-center' role='alert'> Llenar los campos!</div>"
        ));
    }

    public function formUpdate(){
      $lup = new Lup();

      $pilarArr = $lup->getPilarArray();
      $proyectoArr = $lup->getProyectoArray();
      $clasificaArr = $lup->getClasificacionArray();
      $maquinaArr = $lup->getMaquinaArray();
      $departamentoArr = $lup->getDepartamentoArray();
      $tipoLup = $lup->getTipoLup();
      $planta = $lup->getPlanta();

      $arrayDatos = $lup->updateLups($_GET['valor']);

      $this->view("updateLup",
      array("maquina" => $maquinaArr,
          "pilar" => $pilarArr,
          "proyecto" => $proyectoArr,
          "clasificacion" => $clasificaArr,
          "departamento" => $departamentoArr,
          "tipolup" => $tipoLup,
          "planta" => $planta,
          "arrayDatos" => $arrayDatos,
          "mensajeError" => "<div class='alert alert-success text-center' role='alert'> Llenar los campos!</div>"
      ));
    }

    public function deletedLup(){
        $lups = new Lup();
        $lups->update($_GET['valor']);
        $this->redirect("leerLup","leerLup");
    }

    public function canceLups(){
        $lups = new Lup();
        $lups->cancelLup($_GET['valor']);
        $this->redirect("leerLup","leerLup");
    }

    public function updateLups(){
      $lups = new Lup();
      $idPlanta = $_POST['idPlanta'];
      $idTipoLup = $_POST['idTipoLup'];
      $idMaquina = $_POST['idMaquina'];
      $idClasificacion = $_POST['idClasificacion'];

      $noClave =$_POST['clave'];

      $lups->setNoControl($noClave);
      $lups->setIdPilar($_POST['idpilar']);
      $lups->setIdProyecto($_POST['idProyecto']);
      $lups->setIdTipoLup($idTipoLup);
      $lups->setIdClasificacion($idClasificacion);
      $lups->setTitulo($_POST['titulo']);
      $lups->setIdDepartamento($_POST['idDepartamento']);
      $lups->setIdMaquina($idMaquina);
      $lups->setIdMaquinaSeccion($_POST['idSeccion']);
      $lups->setIdPlanta($idPlanta);
      $lups->setElaboro($_POST['elaboro']);
      $lups->setFechaElaboracion($_POST['fecha_elaboracion']);
      $lups->setRevision($_POST['revision']);
      $lups->setFechaRevision($_POST['fecha_revision']);
      $lups->setAprobo($_POST['aprobo']);
      $lups->setFechaAprobo($_POST['fecha_aprobacion']);

      $lups->updateLupsFecha($noClave);
      $this->redirect('lups','leerLup');

    }

    public function createLups(){
        /*Validacion de los campos*/
         $lups = new Lup();

            //Crear el noDeControl...
            $idPlanta = $this->getIdvalor($_POST['idPlanta']);
            $idTipoLup = $this->getIdvalor($_POST['idTipoLup']);
            $idMaquina = $this->getIdvalor($_POST['idMaquina']);
            $idClasificacion = $this->getIdvalor($_POST['idClasificacion']);

            //$num = $lups->contLup();
            $noClave =$_POST['clave'];

            //Paso de Parametros...
            $lups->setNoControl($noClave);
            $lups->setIdPilar($_POST['idpilar']);
            $lups->setIdProyecto($_POST['idProyecto']);
            $lups->setIdTipoLup($idTipoLup);
            $lups->setIdClasificacion($idClasificacion);
            $lups->setTitulo($_POST['titulo']);
            $lups->setIdDepartamento($_POST['idDepartamento']);
            $lups->setIdMaquina($idMaquina);
            $lups->setIdMaquinaSeccion($_POST['idSeccion']);
            $lups->setIdPlanta($idPlanta);
            $lups->setElaboro($_POST['elaboro']);
            $lups->setFechaElaboracion($_POST['fecha_elaboracion']);
            $lups->setRevision($_POST['revision']);
            $lups->setFechaRevision($_POST['fecha_revision']);
            $lups->setAprobo($_POST['aprobo']);
            $lups->setFechaAprobo($_POST['fecha_aprobacion']);

            //Subir archivo
            $_FILES["file"]["name"] = $noClave.".pdf";
            if(move_uploaded_file($_FILES["file"]["tmp_name"],"view/docs/lups/".$_FILES["file"]["name"])){
               //Insertar los campos de la lups...
                $lups->insert();
                //Redirigue al inex...
                $this->redirect('lups','index');
            }else{
                $this->redirect('lups','index');
            }

    }


    //Extraer la planta
    function generaPlanta($cadena){
        $cad = explode("-",$cadena);
        $substra = substr($cad[1],0,3);
        return $substra;
    }

    //Extraer la cadena
    function generaClave($cadena){
        $cad = explode("-",$cadena);
        $substra = substr($cad[1],0,2);
        return $substra;
    }

    //Extraer el id
    function getIdvalor($cadena){
        $cad = explode("-",$cadena);
        return $cad[0];
    }


    //Read Lups
    public function read() {
         $lup = new Lup();
         $datos = $lup->getAllInerJoin();
        $this->view("readLup", array("datos" =>$datos));
    }

    //Mostrar las Lups Activas
    public function leerLupActiva(){
        session_start();
        $lup = new Lup();
        $datos = $lup->getAllInerJoin($_SESSION['planta'],$_SESSION['permisos'],1);
        $this->view("leerLup",array("datos" =>$datos));
    }

    //Mostrar las Lups Eliminadas
    public function leerLupEliminada(){
        session_start();
        $lup = new Lup();
        $datos = $lup->getAllInerJoin($_SESSION['planta'],$_SESSION['permisos'],0);
        $this->view("leerLup",array("datos" =>$datos));
    }

    //Mostrar lups inactivas
    public function leerLupInactivas(){
        session_start();
        $lup = new Lup();
        $datos = $lup->getAllInerJoin($_SESSION['planta'],$_SESSION['permisos'],2);
        $this->view("leerLup",array("datos" =>$datos));
    }

    //Agregar las lups....
    public function tratarLup() {
        $lup = new Lup();
        $datos = $lup->getArrayTratarLup();
        $this->view("tratarLup",array("datos" =>$datos));
    }

    //Revisar la lups...
    public function revisarLup() {
        $lup = new Lup();
        $datos = $lup->getAllInerJoin();
        $this->view("revisarLup",array("datos" =>$datos));
    }

    //Aprovar las lups....
    public function aprovarLup(){
        $lup = new Lup();
        $datos = $lup->getAllInerJoin();
        $this->view("aprovarLup",array("datos" =>$datos));
    }

}

?>
