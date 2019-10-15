<?php

    class Admin  extends model{
        
        public function isLogged(){
            if(isset($_SESSION['admLogin']) && !empty($_SESSION['admLogin'])){
                return true;
            }else{
                return false;
            }
        } 
    }

?>