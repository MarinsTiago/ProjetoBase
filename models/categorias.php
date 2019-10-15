<?php

    class categorias extends model{

        public function __construct(){
            parent::__construct();
        }

       public function getNome($id){
            $sql = "SELECT titulo FROM categorias WHERE id = '$id' AND flagAtivo = 1";
            $sql = $this -> db -> query($sql);
            $nome = '';
            if($sql -> rowCount() > 0){
                $sql = $sql ->fetch();
                $nome = $sql['titulo'];
            }
       }
    }
?>