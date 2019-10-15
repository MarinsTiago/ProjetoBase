<?php

    class model{

        protected $db;

        public function __construct(){
            # Informa qual o conjunto de caracteres será usado.
            header('Content-Type: text/html; charset=utf-8');
            global $config;
            $this -> db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass'], array(
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC));
        }
    }

?>