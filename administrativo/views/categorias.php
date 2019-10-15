<div class="container">    
    <div class="table-responsive">        
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
        <?php $conta = ceil($totalCategorias / $limit);?>
              
              <ul class="pagination justify-content-center">
                  <li class="page-item active"><a class="page-link" href="/projetoBase/administrativo/categorias?p=<?php echo 1; ?>"><<</a></li>
                  <?php
                      $pagina = (isset($_GET['p']))? $_GET['p'] : 1; 
                      if ($pagina > 1) {
                  ?>
                      <a  class="page-link" href="/projetoBase/administrativo/categorias?p=<?php echo ($pagina - 1) ?>">Anterior</a>
                  <?php  }  ?>
                  <?php
                      if ($pagina < $conta) {
                  ?>    
                      <a  class="page-link" href="/projetoBase/administrativo/categorias?p=<?php echo ($pagina + 1) ?>">Proximo</a>  
                  <?php  }  ?>
                  <li class="page-item active"><a class="page-link" href="/projetoBase/administrativo/categorias?p=<?php echo $conta; ?>">>></a></li>
                  </ul>
    </div>
</div>