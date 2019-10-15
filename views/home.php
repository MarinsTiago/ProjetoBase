<?php foreach($produtos as $produto):?>
<a href="/projetoBase/produto/ver/<?php echo $produto['id']; ?>">
<div class="produto">
    <img src="/projetoBase/assets/images/prod/<?php echo $produto['imagem'] ?>" width="180" height="180" border="0"

    <strong><br><?php echo $produto['nome']; ?></strong><br>
    <?php echo 'R$ '.$produto['preco']; ?>
</div>
</a>
<?php endforeach; ?>
<div style="clear: both"></div>