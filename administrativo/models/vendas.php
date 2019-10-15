<?php

    class vendas extends model{

        private $id;

        private $idUsuario;
        
        private $endereco;
        
        private $total;
        
        private $formaPagamento;
        
        private $status;
        
        private $pgLink;
        
        private $dataVenda;

        public function __construct(){

            parent::__construct();
        }

        public function getId(){
            return $this -> id;
        }
        public function setId($id){
            $this -> id = $id;
        }
        public function getIdUsuario(){
            return $this -> idUsuario;
        }
        public function setIdUsuario($idUsuario){
            $this -> idUsuario = $idUsuario;
        }
        public function getEndereco(){
            return $this -> endereco;
        }
        public function setEndereco($endereco){
            $this -> endereco = $endereco;
        }
        public function getTotal(){
            return $this -> total;
        }
        public function setTotal($total){
            $this -> total = $total;
        }
        public function getFormaPagamento(){
            return $this -> formaPagamento;
        }
        public function setFormaPagamento($formaPagamento){
            $this -> formaPagamento = $formaPagamento;
        }
        public function getStatus(){
            return $this -> status;
        }
        public function setStatus($status){
            $this -> status = $status;
        }
        public function getPgLink(){
            return $this -> pgLink;
        }
        public function setPgLink($pgLink){
            $this -> pgLink = $pgLink;
        }
        public function getDataVenda(){
            return $this -> dataVenda;
        }
        public function setDataVenda($dataVenda){
            $this -> dataVenda = $dataVenda;
        }
        
        public function listAllVendas($offset, $limit){

            $vendas = array();
            $sql = "SELECT * FROM vendas WHERE flagAtivo = 1 LIMIT $offset, $limit";
            $sql = $this -> db -> prepare($sql);
            $sql -> execute();
            if($sql -> rowCount() > 0){
                $vendas = $sql -> fetchAll();
            }
            return $vendas;
        }

        public function listAllVendasPdf(){

            $vendas = array();
            $sql = "SELECT * FROM vendas WHERE flagAtivo = 1";
            $sql = $this -> db -> prepare($sql);
            $sql -> execute();
            if($sql -> rowCount() > 0){
                $vendas = $sql -> fetchAll();
            }
            return $vendas;
        }

        public function ListTotalVendas(){
            $total = 0;
            $sql = "SELECT COUNT(*) AS v FROM vendas WHERE flagAtivo = 1";
            $sql = $this -> db -> prepare($sql);
            $sql -> execute();
            if($sql -> rowCount() > 0){
                $total = $sql -> fetch();
                $total = $total['v'];
            }

            return $total;
        }
        public function findData($dataDe, $dataAte){
            $venda = array();
            $dataDe = addslashes($dataDe);
            $dataAte = addslashes($dataAte);
            if(isset($dataDe) && !empty($dataDe) && isset($dataAte) && !empty($dataAte)){
                $sql = "SELECT * FROM vendas WHERE dataVenda BETWEEN :dataDe AND :dataAte";
                $sql = $this -> db -> prepare($sql);
                $sql -> bindValue(":dataDe", $dataDe);
                $sql -> bindValue(":dataAte", $dataAte);
                $sql -> execute();

                if($sql -> rowCount() > 0){
                    $venda = $sql -> fetchAll();
                }
                return $venda;
            }
            else{
                echo "Data inválida, clique <button onclick='history.go(-1)'>AQUI</button> para voltar";
                die;
            }
        }

        public function vendasPt(){
            $vendas = 0;
            $sql = "SELECT count(*) AS v FROM `vendas` WHERE dataVenda BETWEEN '2019-01-01' AND '2019-03-31'";
            $sql = $this -> db ->prepare($sql);
            $sql -> execute();
            if($sql -> rowCount() > 0){
                $vendas = $sql -> fetch();
                $vendas = $vendas['v'];
            }
            return $vendas;
        }
        public function vendasSt(){
            $vendas = 0;
            $sql = "SELECT count(*) AS v FROM `vendas` WHERE dataVenda BETWEEN '2019-04-01' AND '2019-06-30'";
            $sql = $this -> db ->prepare($sql);
            $sql -> execute();
            if($sql -> rowCount() > 0){
                $vendas = $sql -> fetch();
                $vendas = $vendas['v'];
            }
            return $vendas;
        }
        public function vendasTt(){
            $vendas = 0;
            $sql = "SELECT count(*) AS v FROM `vendas` WHERE dataVenda BETWEEN '2019-07-01' AND '2019-09-30'";
            $sql = $this -> db ->prepare($sql);
            $sql -> execute();
            if($sql -> rowCount() > 0){
                $vendas = $sql -> fetch();
                $vendas = $vendas['v'];
            }
            return $vendas;
        }
        public function vendasQt(){
            $vendas = 0;
            $sql = "SELECT count(*) AS v FROM `vendas` WHERE dataVenda BETWEEN '2019-10-01' AND '2019-12-31'";
            $sql = $this -> db ->prepare($sql);
            $sql -> execute();
            if($sql -> rowCount() > 0){
                $vendas = $sql ->fetch();
                $vendas = $vendas['v'];
            }
            return $vendas;
        }
    }

?>