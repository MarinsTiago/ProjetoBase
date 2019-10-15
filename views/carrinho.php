<h1>Carrinho de compras</h1>
<table border="0" width="100%">
    <tr>
        <th align="left">Imagem</th>
        <th align="left">Nome do Produto</th>
        <th align="left">Valor</th>
        <th align="left">Ações</th>
    </tr>
    <?php $subtotal = 0;?>
    <?php foreach($produtos as $produto): ?>
         <tr>
            <td><img src="/projetoBase/assets/images/prod/<?php echo $produto['imagem']; ?>" border="0" width="60" /> </td>
            <td><?php echo $produto['nome']; ?></td>
            <td><?php echo "R$ ".$produto['preco']?></td>
            <td>
                <a href="/projetoBase/carrinho/del/<?php echo $produto['id']; ?>">Remover</a>
            </td>
         </tr>
    <?php $subtotal += $produto['preco']; ?>
    <?php endforeach; ?>
    <tr>
        <td colspan="2" align="right">Sub-Total:</td> 
        <td align="left"> R$<?php echo $subtotal ?> </td>
        <td>
            <a href="/projetoBase/carrinho/finalizar">Finalizar Compra</a>
        </td>
    </tr>   
</table>