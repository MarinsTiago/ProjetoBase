<?php

    class produtoAdmController extends controller{

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

            $prod = new produtoAdm();
            
            $dados['totalProdutos'] = $prod -> listTotalProdutos();
            $dados['produtos'] = $prod -> listAllProdutos($offset, $limit);
            $dados['limit'] = $limit;

            $this -> loadTemplate("produtoAdm", $dados);
        }
        public function viewAjax(){
            $dados = array();
            $offset = 0;
            $limit = 4;
 
            if(isset($_GET['p']) && !empty($_GET['p'])){
                $p = addslashes($_GET['p']);           //verificação para direcionar a paginação dos produtos
                $offset = ($limit * $p) - $limit;
            }
            $prod = new produtoAdm(); 
            $dados['totalProdutos'] = $prod -> listTotalProdutos();
            $dados['produtos'] = $prod -> listAllProdutos($offset, $limit);
            $dados['limit'] = $limit;
    
            $this -> loadView("produtoAdmSemAjax", $dados);
        }

        
        public function add(){
            $dados = array(
                'categorias' => array()
            );
            $cat = new categorias();
            $dados['categorias'] = $cat -> listAllCategorias();

            if(isset($_POST['nome']) && !empty($_POST['nome']) && isset($_FILES['imagem']) && !empty($_FILES['imagem']['tmp_name'])){
                $produto = new produtoAdm();
                $produto -> setNome(addslashes($_POST['nome']));
                $produto -> setPreco(addslashes($_POST['preco']));
                $produto -> setQtde(addslashes($_POST['qtde']));
                $produto -> setDescricao(addslashes($_POST['descricao']));
                $produto -> setIdCategoria(addslashes($_POST['idCategoria']));
                $imagem = $_FILES['imagem'];
                if(in_array($imagem['type'], array('image/jpeg', 'imagem/jpg', 'image/png'))){//verificação para permitir somente o envio de  imagens nos três formatos setados
                    $ext = "jpg";
                    if($imagem['type'] == 'image/png'){
                        $ext = "png";
                    }
                    $md5Image = md5(time().rand(0,9999)).'.'.$ext;
                    move_uploaded_file($imagem['tmp_name'], "../assets/images/prod/".$md5Image);
                }
                $produto -> setImagem($md5Image);
                $produto -> adicionar($produto);
                header("Location: /projetoBase/administrativo/produtoAdm");
            }
             $this -> loadTemplate('produtoAdmAdd', $dados);
        }

        public function edit($id){
            $dados = array(
                'categorias' => array(),
                'produto' => array()
            );
            $id = addslashes($id);

            $cat = new categorias();
            $dados['categorias'] = $cat -> listAllCategorias();
            $produto = new produtoAdm();
            $dados['produto'] = $produto -> listProdutoById($id);
            
            if(isset($_POST['nome']) && !empty($_POST['nome']) && isset($_FILES['imagem']) && !empty($_FILES['imagem']['tmp_name'])){
                $produto -> setId($id);
                $produto -> setNome(addslashes($_POST['nome']));
                $imagem = $_FILES['imagem'];
                if(in_array($imagem['type'], array('image/jpeg', 'imagem/jpg', 'image/png'))){//verificação para permitir somente o envio de  imagens nos três formatos setados
                    $ext = "jpg";
                    if($imagem['type'] == 'image/png'){
                        $ext = "png";
                    }
                    $md5Image = md5(time().rand(0,9999)).'.'.$ext;
                    move_uploaded_file($imagem['tmp_name'], "../assets/images/prod/".$md5Image);
                }
                $produto -> setImagem($md5Image);
                $produto -> setPreco(addslashes($_POST['preco']));
                $produto -> setQtde(addslashes($_POST['qtde']));
                $produto -> setDescricao(addslashes($_POST['descricao']));
                $produto -> setIdCategoria(addslashes($_POST['idCategoria']));
                $produto -> editar($produto);
                header("Location: /projetoBase/administrativo/produtoAdm");
            }
             $this -> loadTemplate('produtoAdmEdit', $dados);
        }
        

        public function del($id){
            $id = addslashes($id);
            if(!empty($id)){
                $prod = new produtoAdm();
                $prod -> remover($id);

                header("Location: /projetoBase/administrativo/produtoAdm");
            }
        }
        public function findProdsAjax(){
            $dados = array(
                'produtos' => array()
            );
            $produto = new produtoAdm();
            $nome = addslashes($_POST['nomeProd']);
            $dados['produtos'] = $produto->listAjax($nome);
            $this -> loadView('produtoAdmFind', $dados);
        }
    }

?>