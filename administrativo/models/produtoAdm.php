<?php
require_once '../vendor/autoload.php';
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
date_default_timezone_set("America/Sao_Paulo");
    class produtoAdm extends model{

        private $id;

        private $nome;

        private $imagem;

        private $preco;

        private $qtde;

        private $descricao;

        private $idCategoria;

        public function __construct(){
            parent::__construct();
        }

        public function getId(){
            return $this -> id;
        }
        public function setId($id){
            $this -> id = $id;
        }
        public function getNome(){
            return $this -> nome;
        }
        public function setNome($nome){
            $this -> nome = $nome;
        }
        public function getImagem(){
            return $this -> imagem;
        }
        public function setImagem($imagem){
            $this -> imagem = $imagem;
        }
        public function getPreco(){
            return $this -> preco;
        }
        public function setPreco($preco){
            $this -> preco = $preco;
        }
        public function getQtde(){
            return $this -> qtde;
        }
        public function setQtde($qtde){
            $this -> qtde = $qtde;
        }
        public function getDescricao(){
            return $this -> descricao;
        }
        public function setDescricao($descricao){
            $this -> descricao = $descricao;
        }
        public function getIdCategoria(){
            return $this -> idCategoria;
        }
        public function setIdCategoria($idCategoria){
            $this -> idCategoria = $idCategoria;
        }

        public function listProdutoById($id){
            $produto = array();

            $id = addslashes($id);
            
            $sql = "SELECT * FROM produtos WHERE id = :id";
            $sql = $this -> db -> prepare($sql);
            $sql -> bindValue(":id", $id);
            $sql -> execute();
            
            if($sql -> rowCount() > 0){
                $produto = $sql -> fetch();
            }

            return $produto;
        }

        public function listAllProdutos($offset, $limit){

            $produtos = array();
    
            $sql = "SELECT * FROM produtos  WHERE flagAtivo = 1 LIMIT $offset, $limit";
            $sql = $this -> db -> prepare($sql);
            $sql -> execute();
            if($sql -> rowCount() > 0){
                $produtos = $sql -> fetchAll();
            }

            return $produtos;
        }

        public function listTotalProdutos(){
            $qtde = 0;

            $sql = "SELECT COUNT(*) AS c FROM produtos WHERE flagAtivo = 1";
            $sql = $this -> db -> prepare($sql);
            $sql -> execute();
            if($sql -> rowCount() > 0){
                $qtde = $sql -> fetch();
                $qtde = $qtde['c'];
            }
            return $qtde;
        }
        public function listAjax($nome){
            $produtos = array();
            $nome = addslashes($nome);
            $sql = " SELECT * FROM produtos WHERE nome LIKE :nome";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":nome", "%$nome%", PDO::PARAM_STR);
            $sql->execute();
            if($sql->rowCount() > 0){
                $produtos = $sql -> fetchAll();
            }
            return $produtos;
        }

        public function adicionar($produto){
            if(!empty($produto)){
                $sql = "INSERT INTO produtos (nome, imagem, preco, qtde, descricao, idCategoria)VALUES(:nome, :imagem, :preco, :qtde, :descricao, :idCategoria)";
                $sql = $this -> db -> prepare($sql);
                $sql -> bindValue(":nome", $produto -> getNome());
                $sql -> bindValue(":imagem", $produto -> getImagem());
                $sql -> bindValue(":preco", $produto -> getPreco());
                $sql -> bindValue(":qtde", $produto -> getQtde());
                $sql -> bindValue(":descricao", $produto -> getDescricao());
                $sql -> bindValue(":idCategoria", $produto -> getIdCategoria());
                $sql -> execute();

                $log = new Logger('Log');
                $log->pushHandler(new StreamHandler('../logs/logInsercao.txt', Logger::INFO));
                $log->info("Cadastro de PRODUTO Realizado pelo usuário de ID: ".$_SESSION['admLogin'].". produto: ".$produto->getNome());
            }else{
                echo "Erro";
            }
        }

        public function editar($produto){

            if(!empty($produto)){        
                try{  
                    $sql = "UPDATE produtos SET nome = :nome, imagem = :imagem, preco = :preco, qtde = :qtde, descricao = :descricao, idCategoria = :idCategoria WHERE id = :id "; 
                    $sql = $this -> db -> prepare($sql);
                    $sql -> bindValue(":id", $produto -> getId());
                    $sql -> bindValue(":nome", $produto -> getNome());
                    $sql -> bindValue(":imagem", $produto -> getImagem());
                    $sql -> bindValue(":preco", $produto -> getPreco());
                    $sql -> bindValue(":qtde", $produto -> getQtde());
                    $sql -> bindValue(":descricao", $produto -> getDescricao());
                    $sql -> bindValue(":idCategoria", $produto -> getIdCategoria()); 
                    $sql -> execute();

                    $log = new Logger('Log');
                    $log->pushHandler(new StreamHandler('../logs/logInsercao.txt', Logger::INFO));
                    $log->info("Edição de PRODUTO Realizado pelo usuário de ID: ".$_SESSION['admLogin'].". produto: ".$produto->getNome());
                    
                }catch(PDOException $e){
                        echo $e -> getMessage();
                        die;
                    }      
            }
        }

        public function remover($id){
            if(!empty($id)){
                $id = addslashes($id);
                $sql = "UPDATE produtos SET flagAtivo = 0 WHERE id = :id";
                $sql = $this -> db -> prepare($sql);
                $sql -> bindValue(":id", $id);
                $sql -> execute();         
            }
        }
    }

   

?>