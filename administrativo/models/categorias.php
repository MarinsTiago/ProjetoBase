<?php
require_once '../vendor/autoload.php';
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
date_default_timezone_set("America/Sao_Paulo");
    class categorias extends model{

        private $id;

        private $titulo;

        public function __construct(){
            parent::__construct();
        }

        public function getId(){
            return $this -> id;
        }
        public function setId($id){
            $this -> id = $id;
        }
        public function getTitulo(){
            return $this -> titulo;
        }
        public function setTitulo($titulo){
            $this -> titulo = $titulo;
        }     
        public function listAllCategorias(){
            
            $categorias = array();

            $sql = "SELECT * FROM categorias WHERE flagAtivo = 1 ";
            $sql = $this -> db ->  prepare($sql);
            $sql -> execute();
            if($sql -> rowCount() > 0){
                $categorias = $sql -> fetchAll();
            }
            return $categorias;
        }
        public function listAllCategoriasPagination($offset, $limit){
            
            $categorias = array();

            $sql = "SELECT * FROM categorias WHERE flagAtivo = 1 LIMIT $offset, $limit";
            $sql = $this -> db ->  prepare($sql);
            $sql -> execute();
            if($sql -> rowCount() > 0){
                $categorias = $sql -> fetchAll();
            }
            return $categorias;
        }
        public function listTotalCategorias(){
            $qtde = 0;

            $sql = "SELECT COUNT(*) AS c FROM categorias WHERE flagAtivo = 1";
            $sql = $this -> db -> prepare($sql);
            $sql -> execute();
            if($sql -> rowCount() > 0){
                $qtde = $sql -> fetch();
                $qtde = $qtde['c'];
            }
            return $qtde;
        }
        public function listCategoriaPorId($id){
            $categoria = array();
            $id = addslashes($id);

            $sql = "SELECT * FROM categorias WHERE id = '$id'";
            $sql = $this -> db -> prepare($sql);
            $sql -> execute();
            if($sql -> rowCount() > 0){
                $categoria = $sql -> fetch();
            }
            return $categoria;
        }
        public function adicionar($categoria){
            if(!empty($categoria)){
                try{
                    $sql = "INSERT INTO categorias SET titulo = :titulo";
                    $sql = $this -> db -> prepare($sql); 
                    $sql -> bindValue(":titulo", $categoria -> getTitulo());
                    $sql -> execute();
                    
                    $log = new Logger('Log');
                    $log->pushHandler(new StreamHandler('../logs/logInsercao.txt', Logger::INFO));
                    $log->info("Cadastro de CATEGORIA realizado pelo usuário de ID: ".$_SESSION['admLogin']."Categoria: ".$categoria->getTitulo());
                }catch(Exception $e){
                    $log->pushHandler(new StreamHandler('../logs/logErro.txt', Logger::WARNING));
                    $log->info("Erro na inserção de Categoria: ".$e);
                }
            }
        }
        public function editar($cat){
            if(!empty($cat)){
                try{
                    $sql = "UPDATE categorias SET titulo = :titulo WHERE id = :id"; 
                    $sql = $this -> db -> prepare($sql);
                    $sql -> bindValue(":id", $cat -> getId());
                    $sql -> bindValue(":titulo", $cat -> getTitulo());
                    $sql -> execute();

                    $log = new Logger('Log');
                    $log->pushHandler(new StreamHandler('../logs/logEdicao.txt', Logger::INFO));
                    $log->info("Edição de CATEGORIA realizado pelo usuário de ID: ".$_SESSION['admLogin']."Categoria: ".$cat->getTitulo());
                }catch(Exception $e){
                    $log->pushHandler(new StreamHandler('../logs/logErro.txt', Logger::WARNING));
                    $log->info("Erro na edição de Categoria: ".$e);
                }
                
            }
        }
        public function remover($id){
            if (!empty($id)){
                try{
                    $sql = "UPDATE categorias set flagAtivo = 0 WHERE id = :id";
                    $sql = $this -> db -> prepare($sql);
                    $sql -> bindValue(":id", $id);
                    $sql -> execute();

                    $log = new Logger('Log');
                    $log->pushHandler(new StreamHandler('../logs/logExclusao.txt', Logger::INFO));
                    $log->info("Exclusão de CATEGORIA realizado pelo usuário de ID: ".$_SESSION['admLogin']."ID Categoria: ".$id);

                    //remoção de produtos que ficam sem a categoria que acabou de ser excluída
                    $sql = "UPDATE FROM produtos WHERE idCategoria = :id";
                    $sql = $this -> db -> prepare($sql);
                    $sql -> bindValue(":id", $id);
                    $sql -> execute();

                    $log = new Logger('Log');
                    $log->pushHandler(new StreamHandler('../logs/logExclusão.txt', Logger::INFO));
                    $log->info("Exclusão de Produto realizado pelo usuário de ID: ".$_SESSION['admLogin']);
                }catch(Exception $e){
                    $log->pushHandler(new StreamHandler('../logs/logErro.txt', Logger::WARNING));
                    $log->info("Erro na exclusão de Categoria: ".$e);
                }
                
            }
        }
    
    }
?>