<?php
class Lup extends EntidadBase{
    private $idLup;
    private $noControl;
    private $idPilar;
    private $idProyecto;
    private $idTipoLup;
    private $idClasificacion;
    private $titulo;
    private $idDepartamento;
    private $idMaquina;
    private $idMaquinaSeccion;
    private $idPlanta;
    private $elaboro;
    private $fechaElaboracion;
    private $revision;
    private $fechaRevision;
    private $aprobo;
    private $fechaAprobo;  
    private $estatus;
    
    public function Lup() {
        $table = "lup";
        parent ::EntidadBase($table);
    }
    
    //DELETE -> 1,0
    function update($valor){
        $query = "UPDATE `lup` SET `estatus` = '0' WHERE `lup`.`idLup` = $valor;";
        return $save = $this->db()->query($query);
         
    }
    
    /*Crear Lup*/
    function insert(){
        $fechaHora = date();
        $query = "INSERT INTO `lup` (`idLup`, `noControl`, `idPilar`, `idProyecto`, `idTipoLup`, `idClasificacion`, `titulo`, `idDepartamento`, `idMaquina`, `idMaquinaSeccion`, `idPlanta`, `elaboro`, `fechaElaboracion`, `revision`, `fechaRevision`, `aprobo`, `fechaAprobo`, `estatus`) "
                . "VALUES (NULL, '$this->noControl', '$this->idPilar', '$this->idProyecto', '$this->idTipoLup', '$this->idClasificacion', '$this->titulo', '$this->idDepartamento', '$this->idMaquina', '$this->idMaquinaSeccion', '$this->idPlanta', '$this->elaboro', '$this->fechaElaboracion', '$this->revision', '$this->fechaRevision', '$this->aprobo', '$this->fechaAprobo', '1');";
        $save = $this->db()->query($query);
        return $save;
    }
    
    function contLup(){
        $query = "SELECT count(*) as total FROM lup";
        $result = $this->db()->query($query);
        $data = $result->fetch_assoc();
        return  $data['total'] + 1;
    }
        
    
    function getAllInerJoin($planta,$permiso){
        
        if($permiso == 0){
           $condicion = "lup.estatus = 1 ORDER BY `lup`.`idLup` ASC";
        }else{
           $condicion = "lup.estatus = 1 and planta.idPlanta = ".$planta." ORDER BY `lup`.`idLup` ASC"; 
        }
        
        $query = "SELECT lup.idLup,lup.noControl,pilar.nombre,proyecto.nombre,tipolup.nombre,clasificacion.nombre,lup.titulo,departamento.nombre,maquina.nombre,maquinaseccion.nombre,lup.estatus
            FROM lup 
            INNER JOIN pilar on lup.idPilar = pilar.idPilar 
            INNER JOIN proyecto on lup.idProyecto = proyecto.idProyecto 
            INNER JOIN tipolup on lup.idTipoLup = tipolup.idTipoLup 
            INNER JOIN clasificacion on lup.idClasificacion = clasificacion.idClasificacion 
            INNER JOIN departamento on lup.idDepartamento = departamento.idDepartamento 
            INNER JOIN maquina on lup.idMaquina = maquina.idMaquina 
            INNER JOIN maquinaseccion on lup.idMaquinaSeccion = maquinaseccion.idMaquinaSeccion
            INNER JOIN planta on lup.idPlanta = planta.idPlanta
            WHERE ".$condicion;
        
        $result = $this->db()->query($query);
        if($result->num_rows > 0){
            while($row = $result->fetch_array()){
                $resultSet[] = $row;
            }
            return $resultSet;
        }
        return false;
    }
    
    //Valores para tratar lup
    function getArrayTratarLup(){
        $query = "SELECT * FROM `lup` WHERE `estatus` = 1";
        $result = $this->db()->query($query);
        if($result->num_rows > 0){
            while($row = $result->fetch_array()){
                $resultSet[] = $row;
            }
            return $resultSet;
        }
        return false;
    }
    
    
    /*Numero de Control*/        
    function ejecutarSQL($query){
        $result = $this->db()->query($query);
        if($result->num_rows == 1){
            $resultSet = $query->fetch_array();
            return $resultSet;
        }
    }
    
    /*Opcion de Pilar*/
    function getPilarArray(){
        $query = "SELECT * FROM `pilar`";
        $result = $this->db()->query($query);
        if($result->num_rows > 0){
            while($row = $result->fetch_array()){
                $resultSet[] = $row;
            }
            return $resultSet;
        }
        return false;
    }
    
    /*Opcion de Proyecto*/
    function getProyectoArray(){
        $query = "SELECT * FROM `proyecto`";
        $result = $this->db()->query($query);
        if($result->num_rows > 0){
            while($row = $result->fetch_array()){
                $resultSet[] = $row;
            }
            return $resultSet;
        }
        return false;
    }
    
    /*Opcion de Clasificación*/
    function getClasificacionArray(){
        $query = "SELECT * FROM `clasificacion`";
        $result = $this->db()->query($query);
        if($result->num_rows > 0){
            while($row = $result->fetch_array()){
                $resultSet[] = $row;
            }
            return $resultSet;
        }
        return false;
    }
    
       
    /*Opcion de Departamento*/
    function getDepartamentoArray(){
        $query = "SELECT * FROM `departamento`";
        $result = $this->db()->query($query);
        if($result->num_rows > 0){
            while($row = $result->fetch_array()){
                $resultSet[] = $row;
            }
            return $resultSet;
        }
        return false;
    }
    
    /*Opcion de Maquina*/
    function getMaquinaArray(){
        $query = "SELECT * FROM `maquina`";
        $result = $this->db()->query($query);
        if($result->num_rows > 0){
            while($row = $result->fetch_array()){
                $resultSet[] = $row;
            }
            return $resultSet;
        }
        return false;
    }
    
    /*Opcion de Tipo de Lup*/
    function getTipoLup(){
        $query = "SELECT * FROM `tipolup`";
        $result = $this->db()->query($query);
        if($result->num_rows > 0){
            while($row = $result->fetch_array()){
                $resultSet[] = $row;
            }
            return $resultSet;
        }
        return false;
    }
    
    
    /*Opcion de Planta*/
    function getPlanta(){
        $query = "SELECT * FROM `planta`";
        $result = $this->db()->query($query);
        if($result->num_rows > 0){
            while($row = $result->fetch_array()){
                $resultSet[] = $row;
            }
            return $resultSet;
        }
        return false;
    }
    
    function getIdPlanta() {
        return $this->idPlanta;
    }
    
    function getIdLup() {
        return $this->idLup;
    }

    function getIdPilar() {
        return $this->idPilar;
    }

    function getIdProyecto() {
        return $this->idProyecto;
    }

    function getIdTipoLup() {
        return $this->idTipoLup;
    }

    function getIdClasificacion() {
        return $this->idClasificacion;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getIdDepartamento() {
        return $this->idDepartamento;
    }

    function getIdMaquina() {
        return $this->idMaquina;
    }

    function getArchivoLup() {
        return $this->archivoLup;
    }

    function getEstatus() {
        return $this->estatus;
    }

    function setIdLup($idLup) {
        $this->idLup = $idLup;
    }

    function setIdPilar($idPilar) {
        $this->idPilar = $idPilar;
    }

    function setIdProyecto($idProyecto) {
        $this->idProyecto = $idProyecto;
    }

    function setIdTipoLup($idTipoLup) {
        $this->idTipoLup = $idTipoLup;
    }

    function setIdClasificacion($idClasificacion) {
        $this->idClasificacion = $idClasificacion;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setIdDepartamento($idDepartamento) {
        $this->idDepartamento = $idDepartamento;
    }

    function setIdMaquina($idMaquina) {
        $this->idMaquina = $idMaquina;
    }
    function setIdPlanta($idPlanta) {
        $this->idPlanta = $idPlanta;
    }

    function setArchivoLup($archivoLup) {
        $this->archivoLup = $archivoLup;
    }

    function setEstatus($estatus) {
        $this->estatus = $estatus;
    }
    function getNoControl() {
        return $this->noControl;
    }

    function setNoControl($noControl) {
        $this->noControl = $noControl;
    }
    
    function getIdMaquinaSeccion() {
        return $this->idMaquinaSeccion;
    }

    function setIdMaquinaSeccion($idMaquinaSeccion) {
        $this->idMaquinaSeccion = $idMaquinaSeccion;
    }
    
    function getElaboro() {
        return $this->elaboro;
    }

    function getFechaElaboracion() {
        return $this->fechaElaboracion;
    }

    function getRevision() {
        return $this->revision;
    }

    function getFechaRevision() {
        return $this->fechaRevision;
    }

    function getAprobo() {
        return $this->aprobo;
    }

    function getFechaAprobo() {
        return $this->fechaAprobo;
    }

    function setElaboro($elaboro) {
        $this->elaboro = $elaboro;
    }

    function setFechaElaboracion($fechaElaboracion) {
        $this->fechaElaboracion = $fechaElaboracion;
    }

    function setRevision($revision) {
        $this->revision = $revision;
    }

    function setFechaRevision($fechaRevision) {
        $this->fechaRevision = $fechaRevision;
    }

    function setAprobo($aprobo) {
        $this->aprobo = $aprobo;
    }

    function setFechaAprobo($fechaAprobo) {
        $this->fechaAprobo = $fechaAprobo;
    }

}
?>

