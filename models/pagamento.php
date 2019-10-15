<?php

    class pagamento extends model{
        public function __construct(){
            parent::__construct();
        }

        public function getPagamentos(){
            $array = array();

            $sql = "SELECT * FROM pagamentos WHERE flagAtivo = 1";
            $sql = $this -> db -> query($sql);
            if($sql -> rowCount() >0){
                $array = $sql -> fetchAll();
            }
            return $array;
        }
    }

?>