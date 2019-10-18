<?php

    class categoriasController extends controller{
        public function __construct(){
            parent::__construct();
        }
        
        public function index(){
            $dados = array();
            $offset = 0;
            $limit = 4;

            if(isset($_GET['p']) && !empty($_GET['p'])){
                $p = addslashes($_GET['p']);           //verificação para direcionar a paginação dos produtos
                $offset = ($limit * $p) - $limit;
            } 
            
            $cat = new categorias();

            $dados['categorias'] = $cat -> listAllCategoriasPagination($offset, $limit);
            $dados['totalCategorias'] = $cat -> listTotalCategorias();
            $dados['limit'] = $limit;

            $this -> loadTemplate('categorias', $dados);
        }
        public function viewAjax(){
            $dados = array();
            $offset = 0;
            $limit = 4;
 
            if(isset($_GET['p']) && !empty($_GET['p'])){
                $p = addslashes($_GET['p']);           //verificação para direcionar a paginação dos produtos
                $offset = ($limit * $p) - $limit;
            }
            $cat = new categorias();

            $dados['categorias'] = $cat -> listAllCategoriasPagination($offset, $limit);
            $dados['totalCategorias'] = $cat -> listTotalCategorias();
            $dados['limit'] = $limit;

            $this -> loadView("categoriasSemAjax", $dados);
        }

        public function add(){
            $dados = array();

            if( isset($_POST['categoria']) && !empty($_POST['categoria'])){

                $categoria = addslashes($_POST['categoria']);
                $cat = new categorias();
                $cat ->setTitulo($categoria);
                $cat -> adicionar($cat);

                header("Location: /projetoBase/administrativo/categorias");
            }

            $this -> loadTemplate('categoriasAdd', $dados);
        }
        
        public function editar($id){
            $dados = array();
            $cat = new categorias();

            if(isset($_POST['categoria']) && !empty($_POST['categoria'])){
                $id = addslashes($id);
                $categoria = addslashes($_POST['categoria']);
                $cat -> setId($id);
                $cat -> setTitulo($categoria);

                $cat -> editar($cat);

                header("Location: /projetoBase/administrativo/categorias");
            }
            $dados['categorias'] = $cat -> listCategoriaPorId($id);

            $this -> loadTemplate('categoriasUpdate', $dados);
        }

        public function del($id){
            if (!empty($id)){
                $id = addslashes($id);
                $cat = new categorias();

                $cat -> remover($id);

                header("Location: /projetoBase/administrativo/categorias");
            }
        }
        public function findCatAjax(){
            $dados = array(
                'categorias' => array()
            );
            $categoria = new categorias();
            $nome = addslashes($_POST['nomeCat']);
            $dados['categorias'] = $categoria->listAjax($nome);
            $this -> loadView('categoriasFind', $dados);
        }
    }
?>