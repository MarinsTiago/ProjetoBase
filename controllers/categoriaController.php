<?php

    class categoriaController extends controller{
        
        public function __construct(){
            parent::__construct();
        }

        public function ver($id){
                if(!empty($id)){
                $dados = array(
                    'categoria' => '',
                    'produtos' => array()
                );
                $produtos = new produtos();
                $dados['produtos'] = $produtos->listarCategoria($id);

                $cat = new categorias();
                $dados['categorias'] = $cat -> getNome($id);

                $this -> loadTemplate("categoria", $dados);
            }else{
                header("Location: /projetoBase/erro");
            }
        }
        
    }


?>