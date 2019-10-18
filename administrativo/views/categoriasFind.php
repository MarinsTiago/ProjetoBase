<div class="container">    
    <div id="tableCad" class="table-responsive">        
        <table class="table table-striped" style="margin-top: 100px;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th colspan="2" style="width: 50px; text-align: center;">Ações</th>
                </tr>
            </thead>
            <?php foreach($categorias as $cat): ?>
                <tr>
                <td><?php echo $cat['id']; ?></td>
                    <td><?php echo($cat['titulo']); ?></td>
                    <td style="width: 50px;">
                        <a href="/projetoBase/administrativo/categorias/editar/<?php echo $cat['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                    </td>
                    <td style="width: 50px;">
                    <a href="/projetoBase/administrativo/categorias/del/<?php echo $cat['id'] ?>" class="btn btn-danger btn-sm">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>