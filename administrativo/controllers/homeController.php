<?php

    class homeController extends controller{

        public function __construct(){
            parent::__construct();
            $adm = new Admin();
            if(!($adm -> isLogged())){
                header("Location: /projetoBase/administrativo/login");
            }
        }

        public function index(){
            $dados = array(
                'vendasPt' => array(),
                'vendasSt' => array(),
                'vendasTt' => array(),
                'vendasQt' => array()
            );
            $v = new vendas();
            $dados['vendasPt'] = $v -> vendasPt();
            $dados['vendasSt'] = $v -> vendasSt();
            $dados['vendasTt'] = $v -> vendasTt();
            $dados['vendasQt'] = $v -> vendasQt();

            $this -> loadTemplate("home", $dados);
        }
    }

?>