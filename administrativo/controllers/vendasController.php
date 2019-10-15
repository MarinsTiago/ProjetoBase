<?php

    class vendasController extends controller{

        public function __construct(){
            parent::__construct();
        }
        
        public function index(){
            $dados = array(
                'vendas' => array(),
                'totalVendas' => array(),
            );
            $limit = 5;
            $offset = 0;

            if(isset($_GET['p']) && !empty($_GET['p'])){
                $p = addslashes($_GET['p']);           //verificação para direcionar a paginação dos produtos
                $offset = ($limit * $p) - $limit;
            } 
            
            $vendas = new vendas();

            $dados['vendas'] = $vendas -> listAllVendas($offset, $limit);
            $dados['totalVendas'] = $vendas -> ListTotalVendas();
            $dados['limit'] = $limit;

            $this -> loadTemplate('vendas', $dados);
        }

        public function find(){
            $dados = array(
                'datas' => array()
            );
            $venda = new vendas();
            $dataDe = $_POST['dataDe'];
            $dataAte = $_POST['dataAte'];
            $dados['datas'] = $venda -> findData($dataDe, $dataAte);
            $this -> loadTemplate('vendasFind', $dados);
        }
        public function pdf(){
            $dados = array();
            $venda = new vendas();
            $dados['vendas'] = $venda->listAllVendasPdf();
            $this->loadObject('gerarPdf', $dados);

        }
        public function excel(){
            $dados = array();
            $venda = new vendas();
            $dados['vendas'] = $venda->listAllVendasPdf();
            $this->loadObject('gerarExcel', $dados);
        }
    }

?>