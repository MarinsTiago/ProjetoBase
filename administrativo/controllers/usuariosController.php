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

        public function add(){
            $dados = array();

            if(isset($_POST['nome']) && !empty($_POST['nome'])){

                $u= new usuarios();
                $u -> setNome(addslashes($_POST['nome']));
                $u -> setEmail(addslashes($_POST['email']));
                $u -> setSenha(addslashes($_POST['senha']));

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
                $user -> setEmail(addslashes($_POST['email']));
                $user -> setSenha(addslashes($_POST['senha']));

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
    }

?>