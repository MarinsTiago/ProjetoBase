<div class="container">  
<script src="https://kit.fontawesome.com/fafd3dd167.js"></script>
<link rel="stylesheet" href="../assets/css/style.css" />
            
            <center><h4 style="margin-top: 20px;">Buscar vendas realizadas</h4></center>
            <form method="post" action="/projetoBase/administrativo/vendas/find">
            <div style="text-align: center; margin-top: 30px;">
                <label>De:</label>
                <input type="date" name="dataDe"/>
                <label>Até:</label>
                <input type="date" name="dataAte"/>
                <input type="submit" class="btn btn-success" value="Procurar"/>
                <div id="gear" class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><i class="fas fa-cog"></i>
                    <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li>
                            <div id="pdf">
                                <i class="fas fa-file-pdf"></i> <a id="p" href="/projetoBase/administrativo/vendas/pdf">Gerar Pdf</a>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div id="excel">
                                <i class="fas fa-file-excel"></i>  <a id="e" href="/projetoBase/administrativo/vendas/excel">Gerar Planílha</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            </form>
        <div class="table-responsive">    
            <table class="table" style="margin-top: 50px;">     
                <thead>
                    <tr class="success">
                        <th class="t-small" style="text-align: center">ID</th>
                        <th class="t-small" style="text-align: center">ID_USUARIO</th>
                        <th class="t-medium" style="text-align: center">Endereco</th>
                        <th class="t-small" style="text-align: center">Total</th>
                        <th class="t-small" style="text-align: center">Forma de Pagamento</th>
                        <th class="t-small" style="text-align: center">Status</th>
                        <th class="t-small" style="text-align: center">Data da compra</th>
                    </tr>
                </thead>
                <?php foreach($vendas as $venda): ?>
                <tbody>
                    <tr>
                        <td style="text-align: center"><?php echo $venda['id']; ?></td>
                        <td style="text-align: center"><?php echo $venda['idUsuario']; ?></td>
                        <td style="text-align: center"><?php echo $venda['endereco']; ?></td>
                        <td style="text-align: center"><?php echo $venda['total']; ?></td>
                        <td style="text-align: center"><?php echo $venda['formaPagamento']; ?></td>
                        <td style="text-align: center"><?php echo $venda['status']; ?></td>
                        <td style="text-align: center"><?php echo $venda['dataVenda']; ?></td>
                        <!-- <td>
                            <a href="/projetoBase/administrativo/vendas/edit/<?php echo $venda['id'] ?>" class="btn btn-warning">Editar</a>
                        </td>
                        <td>
                        <a href="/projetoBase/administrativo/vendas/del/<?php echo $user['id'] ?>" class="btn btn-danger">Excluir</a>
                        </td> -->
                    </tr>
                </tbody>    
                <?php endforeach; ?>
            </table>
            <?php $conta = ceil($totalVendas / $limit);?>
              
            <ul class="pagination justify-content-center">
                <li class="page-item active"><a class="page-link" href="/projetoBase/administrativo/vendas?p=<?php echo 1; ?>"><<</a></li>
                <?php
                    $pagina = (isset($_GET['p']))? $_GET['p'] : 1; 
                    if ($pagina > 1) {
                ?>
                    <a  class="page-link" href="/projetoBase/administrativo/vendas?p=<?php echo ($pagina - 1) ?>">Anterior</a>
                <?php  }  ?>
                <?php
                    if ($pagina < $conta) {
                ?>    
                    <a  class="page-link" href="/projetoBase/administrativo/vendas?p=<?php echo ($pagina + 1) ?>">Proximo</a>  
                <?php  }  ?>
                <li class="page-item active"><a class="page-link" href="/projetoBase/administrativo/vendas?p=<?php echo ($conta -1); ?>">>></a></li>
                </ul>
        </div> 
</div>