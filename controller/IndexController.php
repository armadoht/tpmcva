<?php

class IndexController extends ControladorBase {

    public function IndexController() {
        parent::ControladorBase();
    }

    public function index() {
        #Cargar mainView.php
        $this->view("index", array("Title" => "Inicio del Sistema"));
    }

}

?>