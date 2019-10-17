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
            <table class="table table-striped" style="margin-top: 50px;">
                    <tr>
                        <th style="text-align: center">ID</th>
                        <th style="text-align: center">ID_USUARIO</th>
                        <th style="text-align: center">Endereco</th>
                        <th style="text-align: center">Total</th>
                        <th style="text-align: center">Forma de Pagamento</th>
                        <th style="text-align: center">Status</th>
                        <th style="text-align: center">Data / Hora</th>
                    </tr>
                <?php foreach($datas as $data): ?>
                    <tbody>
                        <tr>
                            <td style="text-align: center"><?php echo $data['id']; ?></td>
                            <td style="text-align: center"><?php echo $data['idUsuario']; ?></td>
                            <td style="text-align: center"><?php echo $data['endereco']; ?></td>
                            <td style="text-align: center"><?php echo $data['total']; ?></td>
                            <td style="text-align: center"><?php echo $data['formaPagamento']; ?></td>
                            <td style="text-align: center"><?php echo $data['status']; ?></td>
                            <td style="text-align: center"><?php echo $data['dataVenda']; ?></td>
                        </tr>
                    </tbody>    
                <?php endforeach; ?>
            </table>
        </div>   
</div>
</body>
</html>