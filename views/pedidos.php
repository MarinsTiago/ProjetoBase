<?php
    global $config;
?>
<h1>Seus Pedidos</h1>

<a href="/projetoBase/login/logout">Sair</a>
<table border="0" width="100%">
    <tr>
        <th align="left">N° do Pedido</th>
        <th align="left">Valor Pago</th>
        <th align="left">Forma de Pagamento</th>
        <th align="left">Status do pagamento</th>
        <th align="left">Ações</th>
    </tr>
    <?php foreach($pedidos as $p):?>
        <tr>
            <td><?php echo $p['id']; ?></td>
            <td>R$ <?php echo $p['total']; ?></td>
            <td><?php echo $p['tipoPgto']; ?></td>
            <td><?php echo $config['statusPagamento'][$p['status']]; ?></td>
            <td><a href="/projetoBase/pedidos/ver/<?php echo $p['id']; ?>">Detalhes</a></td>
        </tr>
    <?php endforeach; ?>
</table>