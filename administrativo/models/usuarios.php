<?php
require_once '../vendor/autoload.php';
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
date_default_timezone_set("America/Sao_Paulo");
    class usuarios extends model{
        
        private $id;

        private $nome;

        private $email;

        private $senha;

        public function __construct(){
            parent::__construct();
        }
        public function getId(){
            return $this->id;
        }
        public function setId($id){
            $this->id = $id;
        }
        public function getNome(){
            return $this->nome;
        }
        public function setNome($nome){
            $this->nome = $nome;
        }
        public function getEmail(){
            return $this->email;
        }
        public function setEmail($email){
            $this->email = $email;
        }
        public function getSenha(){
            return $this->senha;
        }
        public function setSenha($senha){
            $this->senha = $senha;
        }
        public function listAllUsuarios($offset, $limit){

            $usuarios = array();

            $sql="SELECT * FROM usuarios WHERE flagAtivo=1 LIMIT $offset, $limit";
            $sql = $this->db->prepare($sql);
            $sql->execute();
            if($sql->rowCount() > 0){
                $usuarios = $sql->fetchAll();
            }
            return $usuarios;
        }
        public function listUsuarioById($id){

            $usuario = array();
            $id=addslashes($id);
            $sql="SELECT * FROM usuarios WHERE id = :id";
            $sql=$this->db->prepare($sql);
            $sql->bindValue(":id", $id);
            $sql->execute();
            if($sql->rowCount() > 0){
                $usuario = $sql->fetch();
            }
            return $usuario;
        }
        public function ListTotalUsuarios(){

            $total = 0;
            $sql="SELECT COUNT(*) AS u FROM usuarios WHERE flagAtivo = 1";
            $sql=$this->db->prepare($sql);
            $sql->execute();
            if($sql->rowCount() > 0){
                $total=$sql->fetch();
                $total=$total['u'];
            }
            return $total;
        }
        public function adicionar($u){   
            if(!empty($u)){
                try{
                    $safe = md5($u->getSenha());
                    $sql = "INSERT INTO usuarios SET nome = :nome, email = :email, senha = :senha";
                    $sql = $this->db->prepare($sql);
                    $sql->bindValue(":nome", $u -> getNome());
                    $sql->bindValue(":email", $u -> getEmail());
                    $sql->bindValue(":senha", $safe);
                    $sql->execute();

                    $log = new Logger('Log');
                    $log->pushHandler(new StreamHandler('../logs/logInsercao.txt', Logger::INFO));
                    $log->info("Cadastro de Usuário realizado pelo usuario de id: ".$_SESSION['admLogin']);
                }catch(Exception $e){
                    $log->pushHandler(new StreamHandler('../logs/logErro.txt', Logger::WARNING));
                    $log->info("Erro na inserção de usuário: ".$e);
                }
            }else{
                echo "Preencha todas as informações";
            }
        }
        public function editar($u){ 
            if(!empty($u) ){
                try{
                    $safe = md5($u -> getSenha());
                $sql = "UPDATE usuarios SET nome = :nome, email = :email, senha = :senha WHERE id = :id";
                $sql = $this->db->prepare($sql);
                $sql -> bindValue(":id", $u -> getId());
                $sql -> bindValue(":nome", $u -> getNome());
                $sql -> bindValue(":email", $u -> getEmail());
                $sql -> bindValue(":senha", $u -> $safe);
                $sql -> execute();

                $log = new Logger('Log');
                $log->pushHandler(new StreamHandler('../logs/logEdicao.txt', Logger::INFO));
                $log->info("Edição de Usuário realizado pelo usuario de ID: ".$_SESSION['admLogin']." No cadastro do usuario de ID: ".$u->getId());
                }catch(Exception $e){
                    $log->pushHandler(new StreamHandler('../logs/logErro.txt', Logger::WARNING));
                    $log->info("Erro na edição de usuário: ".$e);
                }
                
            }

        }
        public function remover($id){
            if(!empty($id)){
                try{
                    $id = addslashes($id);
                    $sql = "UPDATE usuarios SET flagAtivo = 0 WHERE id = :id";
                    $sql = $this -> db -> prepare($sql);
                    $sql -> bindValue(":id", $id);
                    $sql -> execute();

                    $log = new Logger('Log');
                    $log->pushHandler(new StreamHandler('../logs/logExclusao.txt', Logger::INFO));
                    $log->info("Exclusão de Usuário realizado pelo usuario de ID: ".$_SESSION['admLogin']." No cadastro do usuario de ID: ".$id);
                }catch(Exception $e){
                    $log->pushHandler(new StreamHandler('../logs/logErro.txt', Logger::WARNING));
                    $log->info("Erro na exclusão de usuário: ".$e);
                }
            }
        }
    }
?>