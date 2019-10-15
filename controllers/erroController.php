<?php

    class erroController extends controller{

        public function __construct(){
            parent::__construct();
        }
        
        public function index(){
            $this -> loadTemplate("erro", array());
        }
    }
?>