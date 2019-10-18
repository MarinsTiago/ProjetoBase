<div class="container">     
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
<meta charset="utf-8" />    
    <div id="table" class="table-responsive">
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
    </div>         
</div>
<script>
    $(
        function(){
            $(document).tooltip();
        });
</script>