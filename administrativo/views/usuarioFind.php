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
        <div class="table-responsive">
                
            <table class="table table-striped" style="margin-top: 100px;">
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
        </div>  
</div>
</body>
</html>