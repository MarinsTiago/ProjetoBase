<?php
    global $config;
?>
<h1>Seu Pedido</h1>
<table border="0" width="100%">
    <tr>
        <th align="left">N° do Pedido</th>
        <th align="left">Valor Pago</th>
        <th align="left">Forma de Pagamento</th>
        <th align="left">Status do pagamento</th>
    </tr>
        <tr>
            <td><?php echo $pedido['id']; ?></td>
            <td>R$ <?php echo $pedido['total']; ?></td>
            <td><?php echo $pedido['tipoPgto']; ?></td>
            <td><?php echo $config['statusPagamento'][$pedido['status']]; ?></td>
            <td><input type="button" role="button" onclick="history.go(-1)" value="voltar"></td>
        </tr>
</table>
<hr>
<?php foreach ($pedido['produtos'] as $prods): ?>
    <div class="pedidoProduto">
        <img src="/projetoBase/assets/images/prod/<?php echo $prods['imagem'] ?>" border="0" width="100" /><br>
        Produto: <?php echo $prods['nome']; ?><br/>
        R$ <?php echo $prods['preco']; ?><br/>
        Quantidade: <?php echo $prods['qtde']; ?><br/>

    </div>
<?php endforeach; ?>

<div style="clear: both;"></div>