<!DOCTYPE html>
<?php
  $admLogin = $_SESSION['admLogin'];
if(!isset($_SESSION['admLogin'])){
    header("Location: /projetoBase/administrativo/login");
}
?>

<head> 
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <title>Loja</title>
    <link rel="stylesheet" href="/projetoBase/administrativo/assets/css/style.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/fafd3dd167.js"></script>
    
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/projetoBase/administrativo/home" id="nav">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown" id="nav">
        <a class="nav-link dropdown-toggle" style="color: #FFF;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categorias
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/projetoBase/administrativo/categorias/add">Cadastrar</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/projetoBase/administrativo/categorias">Listar Categorias</a>
        </div>
      </li>
      <li class="nav-item dropdown" id="nav">
        <a class="nav-link dropdown-toggle" style="color: #FFF;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">   
        Produtos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/projetoBase/administrativo/produtoAdm/add">Cadastrar</a>
          <div class="dropdown-divider"></div> 
          <a class="dropdown-item" href="/projetoBase/administrativo/produtoAdm">Visualizar Produtos</a>
        </div>

      </li>
      <li class="nav-item dropdown" id="nav">
        <a class="nav-link dropdown-toggle" style="color: #FFF;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Vendas
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/projetoBase/administrativo/vendas">Visualizar</a>
        </div>
      </li>
      <li class="nav-item dropdown" id="nav">
        <a class="nav-link dropdown-toggle" style="color: #FFF;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Usuários
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/projetoBase/administrativo/usuarios/Add">Cadastrar</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/projetoBase/administrativo/usuarios">Visualizar</a>
        </div>
      </li>
            
    </ul>
    <div style="align-content: center;">
            <a href="/ProjetoBase/administrativo/login/sair" id="nav" class="btnLogOut"><i class="fas fa-sign-out-alt"></i>&nbsp;Sair</a>
    </div>    
  </div>
</nav>
    <?php $this -> loadViewInTemplate($viewName, $viewData); ?>
</body>
</html>