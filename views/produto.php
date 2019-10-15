<div class="produtoFoto">
    <img src="/projetoBase/assets/images/prod/<?php echo $produto['imagem']; ?>" border="0" width="300" height="300" />
</div>

<div class="produtoInfo">
    <h2><?php echo $produto['nome']; ?> </h2>
    <p><?php echo  $produto['descricao']; ?></p>
    <h3><?php echo "Preço: R$ ".$produto['preco']; ?></h3>
    <a href="/projetoBase/carrinho/add/<?php echo $produto['id']; ?>" type="button">Adicionar ao carrinho</a>
</div>
<div style="clear: both"></div>