<?php

    class carrinhoController extends controller{

        public function __construct(){
            parent::__construct();
        }

        public function index(){
            $dados = array();
            $prods = array();
            if(isset($_SESSION['carrinho'])){
                $prods = $_SESSION['carrinho'];
            }
            
            
            if(count($prods)){

            $produtos = new produtos();
            $dados['produtos'] = $produtos -> getProdutosById($prods);

                $this -> loadTemplate("carrinho", $dados);
            }else{
                header("Location: /projetoBase");
            }
        }


        public function add($id=''){
            if(!empty($id)){
                if(!isset($_SESSION['carrinho'])){ //verifica se o array da sessão do carrinho foi criada
                    $_SESSION['carrinho'] = array();
                }

                $_SESSION['carrinho'][] = $id;

                header("Location: /projetoBase/carrinho");
            }
        }
        public function del($id){
            if(!empty($id)){
                foreach($_SESSION['carrinho'] as $cchave => $cvalor){
                    if($id == $cvalor){
                        unset($_SESSION['carrinho'][$cchave]);
                    }
                }
                header("Location: /projetoBase/carrinho");
            }
        }
        public function finalizar(){
            $dados = array(
                'pagamentos' => array(),
                'total' => 0,
                'erro' => ''
            );
            $p = new pagamento();
            $dados['pagamentos'] = $p->getPagamentos();

            $prods = array();
            if(isset($_SESSION['carrinho'])){
                $prods = $_SESSION['carrinho'];
            }
            if(count($prods)){

            $produtos = new produtos();
            $dados['produtos'] = $produtos -> getProdutosById($prods);

                foreach($dados['produtos'] as $prod){   //loop para calcular o preço total dos produtos selecionados
                    $dados['total'] += $prod['preco'];
                }
            }

            if(isset($_POST['nome']) && !empty($_POST['nome'])){
                $nome = addslashes($_POST['nome']);
                $email = addslashes($_POST['email']);
                $senha = addslashes($_POST['senha']);
                $endereco = addslashes($_POST['endereco']);

                $pg = '';
                if(isset($_POST['pg'])){
                    $pg = $_POST['pg'];
                }

                if(!empty($email) && !empty($senha) && !empty($endereco) && !empty($pg)){
                    $uid = 0;
                    $u = new usuario();
                    if($u->isExiste($email)){
                        if($u->isExiste($email, $senha)){
                            $uid = $u ->getId($email);
                        }else{
                            $dados['erro'] = "Usuário e/ou senha Errados!";
                        }
                    }else{
                        $uid = $u->criar($nome, $email, $senha); 
                    }

                    if($uid > 0){
                        $subtotal = 0;

                        $prods = array();
                        if(isset($_SESSION['carrinho'])){
                            $prods = $_SESSION['carrinho'];
                        }
                        if(count($prods)){

                        $produtos = new produtos();
                        $prods = $produtos -> getProdutosById($prods);

                            foreach($dados['produtos'] as $prod){   //loop para calcular o preço total dos produtos selecionados
                                $subtotal += $prod['preco'];
                            }
                        }

                         $v = new venda();
                         $link =  $v -> setVenda($uid, $endereco, $subtotal, $pg, $prods);
                         
                         header("Location: ".$link);
                    }

                }else{
                    $dados['erro'] = "Preencha todos os campos";
                }
            }

            $this -> loadTemplate("finalizar", $dados);
        }

        public function compraRealizada(){
            $dados = array();
            $this -> loadTemplate("compraRealizada", $dados);
        }
        public function notificacao(){
            $vendas = new venda();
            $vendas -> verificarVendas();
        }
    }
?>