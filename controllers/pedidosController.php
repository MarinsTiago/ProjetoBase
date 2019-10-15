 <?php

    class pedidosController extends controller{

        public function __construct(){
            parent::__construct();
        }

        public function index(){
            $dados = array();

            if(isset($_SESSION['cliente']) && !empty($_SESSION['cliente'])){

                $vendas = new venda();
                $dados['pedidos'] = $vendas -> getPedidosUsuario($_SESSION['cliente']);

                $this -> loadTemplate("pedidos", $dados);
            }else{
                header("Location: /projetoBase/login");
            }
        }

        public function ver($id){
            if(!empty($id)){
                $dados = array();
                $id = addslashes($id);

                $vendas = new venda();
                $dados['pedido'] = $vendas -> getPedidos($id, $_SESSION['cliente']);

                if(count($dados['pedido']) == 0){
                    header("Location: /projetoBase/pedidos");    
                }
               $this -> loadTemplate("pedidosVer", $dados);
            }else{
                header("Location: /projetoBase/pedidos");    
            }
        }
    }

?>