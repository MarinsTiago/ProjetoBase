<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<div class="container"> 
        <div id="table" class="table-responsive">
                
            <table class="table table-striped" style="margin-top: 10px;">
            <thead>
                <tr>
                    <th style="text-align: center;">ID</th>
                    <th style="text-align: center;">Nome</th>
                    <th style="text-align: center;">E-mail</th>
                    <th class="t-medium" colspan="2" style="text-align: center;">Ações</th>
                </tr>
            </thead>
            <?php foreach($usuarios as $user): ?>
                <tr>
                    <td style="text-align: center;"><?php echo $user['id']; ?></td>
                    <td style="text-align: center;"><?php echo $user['nome']; ?></td>
                    <td style="text-align: center;"><?php echo $user['email']; ?></td>
                    <td>
                        <a href="/projetoBase/administrativo/usuarios/edit/<?php echo $user['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                    </td>
                    <td>
                    <a href="/projetoBase/administrativo/usuarios/del/<?php echo $user['id'] ?>" class="btn btn-danger btn-sm">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </table>
            <?php $conta = ceil($totalUsuarios / $limit);?>
                
                <ul class="pagination justify-content-center">
                    <li class="page-item active"><a class="page-link" href="/projetoBase/administrativo/usuarios?p=<?php echo 1; ?>"><<</a></li>
                    <?php
                        $pagina = (isset($_GET['p']))? $_GET['p'] : 1; 
                        if ($pagina > 1) {
                    ?>
                        <a  class="page-link" href="/projetoBase/administrativo/usuarios?p=<?php echo ($pagina - 1) ?>">Anterior</a>
                    <?php  }  ?>
                    <?php
                        if ($pagina < $conta) {
                    ?>    
                        <a  class="page-link" href="/projetoBase/administrativo/usuarios?p=<?php echo ($pagina + 1) ?>">Proximo</a>  
                    <?php  }  ?>
                    <li class="page-item active"><a class="page-link" href="/projetoBase/administrativo/usuarios?p=<?php echo $conta; ?>">>></a></li>
                    </ul>
        </div>  
</div>
</body>
</html>