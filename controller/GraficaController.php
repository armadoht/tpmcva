<?php
class GraficaController extends ControladorBase{
    public function GraficaController(){
        parent::ControladorBase();
    } 
    public function index() {
        #Cargar vista Grafica...
        $Grafica = new Grafica();
        $cout_cva_cor = $Grafica->showCorrugadoCva();
        $cout_tol_cor = $Grafica->showCorrugadoTol();
        $this->view("grafica", array("array_cva_corr" => $cout_cva_cor,"array_tol_corr" => $cout_tol_cor));
    }
    
    
}
?>
