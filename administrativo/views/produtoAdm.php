<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/fafd3dd167.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">  
    <script src="../administrativo/assets/js/script.js"></script>
</head>
<body>
<div class="container">     
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
<meta charset="utf-8" />    
        <form method="post">
            <input class="form-control" type="text" name="nomeProd" id="nomeProd" placeholder="Buscar por..." style="margin-top:100px; width: 30%;">
        </form>
    <div id="tableProd" class="table-responsive">
        <table class="table" style="margin-top: 10px;">
            <thead>
                <tr>
                    <th class="t-small" style="text-align: center;">ID</th>
                    <th class="t-medium" style="text-align: center;">Nome</th>
                    <th class="t-medium" style="text-align: center;">Imagem</th>
                    <th class="t-small" style="text-align: center;">Preco</th>
                    <th class="t-small" style="text-align: center;">Quantidade</th>
                    <th class="t-medium" style="text-align: center;">Descrição</th>
                    <th class="t-small" style="text-align: center;">ID_Categoria</th>
                    <th class="t-medium" style="text-align: center;" colspan="2">Ações</th>
                </tr>
            </thead>
            <?php foreach($produtos as $prod): ?>
                <tbody>
                    <tr>
                        <td style="text-align: center;" class="ac"><?php echo $prod['id']; ?></td>
                        <td style="text-align: center;" class="ac"><?php echo $prod['nome']; ?></td>
                        <td style="text-align: center;" class="ac"><img style="width: 50px; height: 50px;" src="/projetoBase/assets/images/prod/<?php echo $prod['imagem']; ?>"/></td>
                        <td style="text-align: center;" class="ac"><?php echo "R$ " . $prod['preco']; ?></td>
                        <td style="text-align: center;" class="ac"><?php echo $prod['qtde']; ?></td>
                        <td style="text-align: center;" title="<?= $prod['descricao']?>" class="desc"><?php echo substr($prod['descricao'], 0,20)."..." ?></td>
                        <td style="text-align: center;" ><?php echo $prod['idCategoria']; ?></td>
                        <td>
                            <a href="/projetoBase/administrativo/produtoAdm/edit/<?php echo $prod['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                        </td>
                        <td>
                        <a href="/projetoBase/administrativo/produtoAdm/del/<?php echo $prod['id'] ?>" class="btn btn-danger btn-sm">Excluir</a>
                        </td>
                    </tr>
                </tbody>
            <?php endforeach; ?>
        </table>
        <?php $conta = ceil($totalProdutos / $limit);?>
              
              <ul class="pagination justify-content-center">
                  <li class="page-item active"><a class="page-link" href="/projetoBase/administrativo/produtoAdm?p=<?php echo 1; ?>"><<</a></li>
                  <?php
                      $pagina = (isset($_GET['p']))? $_GET['p'] : 1; 
                      if ($pagina > 1) {
                  ?>
                      <a  class="page-link" href="/projetoBase/administrativo/produtoAdm?p=<?php echo ($pagina - 1) ?>">Anterior</a>
                  <?php  }  ?>
                  <?php
                      if ($pagina < $conta) {
                  ?>    
                      <a  class="page-link" href="/projetoBase/administrativo/produtoAdm?p=<?php echo ($pagina + 1) ?>">Proximo</a>  
                  <?php  }  ?>
                  <li class="page-item active"><a class="page-link" href="/projetoBase/administrativo/produtoAdm?p=<?php echo $conta; ?>">>></a></li>
                  </ul>
    </div>         
</div>
</body>
</html>
<script>
    $(
        function(){
            $(document).tooltip();
        });

</script>