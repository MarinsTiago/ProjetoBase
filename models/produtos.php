<?php

    class produtos extends model{

        public function __construct(){
            parent::__construct();
        }

        public function listar($qt = 0){
            $sql = "SELECT * FROM produtos WHERE flagAtivo = 1 ORDER BY RAND()";
            if($qt > 0){
                $sql .= "LIMIT ".$qt;
            }
            $sql = $this -> db -> query($sql);
            $produtos = array();

            if($sql -> rowCount() > 0){
                $produtos = $sql -> fetchAll();
            }
            return $produtos;
        }

        public function listarCategoria($cat){
            $sql = "SELECT * FROM produtos WHERE idCategoria = '$cat' AND flagAtivo = 1";
            $sql = $this -> db -> query($sql);
            $produtos = array();
            if($sql -> rowCount() > 0){
                $produtos = $sql -> fetchAll(); 
            }
            return $produtos;
        }

        public function getProdutosById($prods = array()){
            $array = array();
            if(is_array($prods) && count($prods) > 0){
                $sql = "SELECT * FROM produtos WHERE id IN (".implode(',', $prods).") AND flagAtivo = 1";
                $sql = $this -> db -> query($sql);
                if($sql -> rowCount() > 0){
                    $array = $sql -> fetchAll();
                }   
            }
            return $array;
        }
        public function getProdutos($id){
            $array = array();

            $sql = "SELECT * FROM produtos WHERE id = '$id' AND flagAtivo = 1";
            $sql = $this -> db -> query($sql);
            if($sql -> rowCount() > 0){
                $array = $sql -> fetch();
            }
            return $array; 
        }
    }
?>