<?php

    class loginController extends controller{
        public function __construct(){
            parent::__construct();
        }

        public function index(){
            $dados = array(
                'aviso' => ''
            );

            if(isset($_POST['usuario']) && !empty($_POST['usuario']) && isset($_POST['senha']) && !empty($_POST['senha'])){
                $u = addslashes($_POST['usuario']);
                $s = md5($_POST['senha']);

                $sql = "SELECT * FROM adm WHERE usuario = '$u' AND senha = '$s'";
                $sql = $this -> db -> query($sql);

                if($sql -> rowCount() > 0){
                    $sql = $sql -> fetch();
                    $_SESSION['admLogin'] = $sql['id'];

                    header("Location: /projetoBase/administrativo");
                }else{
                    echo 
                    "<script>   
                    alert('Usuário inexistente no sistema ou login e senha inválidos, tente novamente');
                    window.location.href='/projetoBase/administrativo/login';
                    </script>";
                }
            }
            $this -> loadView('login', $dados);
        }
        public function sair(){
            unset($_SESSION['admLogin']);
            header("Location: /projetoBase/administrativo/login");
        }
    }

?>