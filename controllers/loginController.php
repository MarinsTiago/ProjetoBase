<?php

    class loginController extends controller{

        public function __construct(){
            parent::__construct();
        }

        public function index(){
            $dados = array(
                'aviso' => ''

            );

            if(isset($_POST['email']) && !empty($_POST['email'])){

                $email = addslashes($_POST['email']);
                $senha = addslashes($_POST['senha']);

                $usuario = new usuario();
                if($usuario -> isExiste($email, $senha)){
                    $uid = $usuario->getId($email);

                    $_SESSION['cliente'] = $uid;

                    header("Location: /projetoBase/pedidos");
                }else{
                    $dados['aviso'] = "Email e/ou senha não estão corretos";
                }
            }

            $this -> loadTemplate("login", $dados);
        }
        public function logout(){
            unset($_SESSION['cliente']);

            header("Location: /projetoBase/login");
        }
    }

?>