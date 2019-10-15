<?php

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
                $safe = md5($u->getSenha());
                $sql = "INSERT INTO usuarios SET nome = :nome, email = :email, senha = :senha";
                $sql = $this->db->prepare($sql);
                $sql->bindValue(":nome", $u -> getNome());
                $sql->bindValue(":email", $u -> getEmail());
                $sql->bindValue(":senha", $safe);
                $sql->execute();
            }else{
                echo "Preencha todas as informações";
            }
        }

        public function editar($u){
           
            if(!empty($u) ){
                $safe = md5($u -> getSenha());
                $sql = "UPDATE usuarios SET nome = :nome, email = :email, senha = :senha WHERE id = :id";
                $sql = $this->db->prepare($sql);
                $sql -> bindValue(":id", $u -> getId());
                $sql -> bindValue(":nome", $u -> getNome());
                $sql -> bindValue(":email", $u -> getEmail());
                $sql -> bindValue(":senha", $u -> $safe);
                $sql -> execute();
            }

        }
        
        public function remover($id){
            if(!empty($id)){
                $id = addslashes($id);
                $sql = "UPDATE usuarios SET flagAtivo = 0 WHERE id = :id";
                $sql = $this -> db -> prepare($sql);
                $sql -> bindValue(":id", $id);
                $sql -> execute();
            }
        }
    }

?>