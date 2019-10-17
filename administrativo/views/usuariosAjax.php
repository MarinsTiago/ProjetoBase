<?php
   class usuarioAjax extends model{
        public function __construct(){
            parent::__construct();
        }
   }
   $nome = $_POST['n'];
   $sql = "SELECT * FROM usuarios WHERE nome = $nome";

?>