<?php
require_once '../vendor/autoload.php';
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
date_default_timezone_set("America/Sao_Paulo");
    class Admin  extends model{
        
        public function isLogged(){
            if(isset($_SESSION['admLogin']) && !empty($_SESSION['admLogin'])){
                
                
                $log = new Logger('Log');
                $log->pushHandler(new StreamHandler('../logs/logLogin.txt', Logger::INFO));
                
                $log->info("Login realizado pelo usuário de login: ".$_SESSION['admLogin']);
                return true;
            }else{
                return false;
            }
        } 
    }

?>