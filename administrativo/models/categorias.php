<?php
require_once '../vendor/autoload.php';
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
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
                $sql = "INSERT INTO categorias SET titulo = :titulo";
                $sql = $this -> db -> prepare($sql); 
                $sql -> bindValue(":titulo", $categoria -> getTitulo());
                
                $sql -> execute();
                $log = new Logger('Log');
                $log->pushHandler(new StreamHandler('../logs/logInsercao.txt', Logger::INFO));
                
                $log->info("Cadastro Realizado. nome categoria: ".$categoria->getTitulo());
            }
        }

        public function editar($cat){
            if(!empty($cat)){
              
                $sql = "UPDATE categorias SET titulo = :titulo WHERE id = :id"; 
                $sql = $this -> db -> prepare($sql);
                $sql -> bindValue(":id", $cat -> getId());
                $sql -> bindValue(":titulo", $cat -> getTitulo());
                
                $sql -> execute();
            }
        }

        public function remover($id){
            if (!empty($id)){

                $sql = "UPDATE categorias set flagAtivo = 0 WHERE id = :id";
                $sql = $this -> db -> prepare($sql);
                $sql -> bindValue(":id", $id);
                $sql -> execute();
                //remoção de produtos que ficam sem a categoria que acabou de ser excluída
                $sql = "DELETE FROM produtos WHERE idCategoria = :id";
                $sql = $this -> db -> prepare($sql);
                $sql -> bindValue(":id", $id);
                $sql -> execute();
            }
        }
    
    }

?>