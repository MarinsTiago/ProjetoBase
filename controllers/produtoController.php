<?php

    class produtoController extends controller{

        public function __construct(){
            parent::__construct();
        }

        public function ver($id=''){
            if(!empty($id)){

                $dados = array();
                $id = addslashes($id);
                $produtos = new produtos();
                $dados['produto'] = $produtos -> getProdutos($id);
                if(is_array($dados['produto']) && count($dados['produto']) > 0){
                    $this->loadTemplate("produto", $dados); 
                }else{
                    header("Location: /projetoBase/erro");
                }
        }
        
    }
}
?>