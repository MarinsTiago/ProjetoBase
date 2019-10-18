<?php

    class usuariosController extends controller{

        public function __construct(){
            parent::__construct();
        }

        public function index(){
            $dados = array(
                'totalUsuarios' => array(),
                'usuarios' => array(),
            );
            $offset = 0;
            $limit = 4;
 
            if(isset($_GET['p']) && !empty($_GET['p'])){
                $p = addslashes($_GET['p']);           //verificação para direcionar a paginação dos produtos
                $offset = ($limit * $p) - $limit;
            }

            $user = new usuarios(); 
            
            $dados['totalUsuarios'] = $user -> ListTotalUsuarios();
            $dados['usuarios'] = $user -> listAllUsuarios($offset, $limit);
            $dados['limit'] = $limit;

            $this -> loadTemplate("usuarios", $dados);
        }

        public function viewAjax(){
            $dados = array();
            $offset = 0;
            $limit = 4;
 
            if(isset($_GET['p']) && !empty($_GET['p'])){
                $p = addslashes($_GET['p']);           //verificação para direcionar a paginação dos produtos
                $offset = ($limit * $p) - $limit;
            }
            $user = new usuarios(); 
            $dados['totalUsuarios'] = $user -> ListTotalUsuarios();
            $dados['usuarios'] = $user -> listAllUsuarios($offset, $limit);
            $dados['limit'] = $limit;

            $this -> loadView("usuariosSemAjax", $dados);
        }

        public function add(){
            $dados = array();

            if(isset($_POST['nome']) && !empty($_POST['nome'])){

                $u= new usuarios();
                echo $u->setNome(addslashes($_POST['nome']));
                echo $u->setCpf(addslashes($_POST['cpf']));
                echo $u->setIdade(addslashes($_POST['idade']));
                echo $u->setTelefone(addslashes($_POST['telefone']));
                echo $u->setEmail(addslashes($_POST['email']));
                echo $u->setSenha(addslashes($_POST['senha']));
                echo $u->setSexo(addslashes($_POST['sexo']));

                $u -> adicionar($u);

                header("Location: /projetoBase/administrativo/usuarios");
            }
            $this -> loadTemplate('usuariosAdd', $dados);
        }

        public function edit($id){
            $dados = array(
                'usuarios' => array()
            );

            $id = addslashes($id);
            $user = new usuarios();
            $dados['usuarios'] = $user -> listUsuarioById($id);

            if(isset($_POST['nome']) && !empty($_POST['nome'])){
                $user -> setId($id);
                $user -> setNome(addslashes($_POST['nome']));
                $user -> setCpf(addslashes($_POST['cpf']));
                $user -> setIdade(addslashes($_POST['idade']));
                $user -> setTelefone(addslashes($_POST['telefone']));
                $user -> setEmail(addslashes($_POST['email']));
                $user -> setSenha(addslashes($_POST['senha']));
                $user -> setSexo(addslashes($_POST['sexo']));

                $user -> editar($user);
                header("Location: /projetoBase/administrativo/usuarios");
            }
            $this -> loadTemplate('usuariosEdit', $dados);
        }

        public function del($id){
            if(!empty($id)){
               
                $u = new usuarios();
                $u -> remover($id);

                 header("Location: /projetoBase/administrativo/usuarios");
            }
        }

        public function findUserAjax(){
            $dados = array(
                'usuarios' => array()
            );
            $usuario = new usuarios();
            $nome = addslashes($_POST['nome']);
            $dados['usuarios'] = $usuario->listAjax($nome);
            $this -> loadView('usuarioFind', $dados);
        }
    }

?>