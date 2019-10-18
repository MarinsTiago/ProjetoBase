<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/css/style.css" />
    <script src="https://kit.fontawesome.com/fafd3dd167.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">  
    <script src="../administrativo/assets/js/script.js"></script>
    <script src="../administrativo/assets/js/jquery.mask.js"></script>
</head>
<body>
<div class="container">  
            <center><h4 style="margin-top: 20px;">Buscar vendas realizadas</h4></center>
            <form>
            <div style="text-align: center; margin-top: 30px;">
                <label>De:</label>
                <input class="data" type="text" name="dataDe" id="dataDe"/>
                <label>Até:</label>
                <input class="data" type="text" name="dataAte" id="dataAte"/>
                <input type="button" id="filter" class="btn btn-success" value="Procurar"/>
                <div id="gear" class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><i class="fas fa-cog"></i>
                    <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li id="pdfAtual">
                            <div id="pdf">
                            <?php
                                $pagina = (isset($_GET['p']))? $_GET['p'] : 1; 
                            ?>
                                <i class="fas fa-file-pdf"></i> <a id="p" href="/projetoBase/administrativo/vendas/pdfAtualPg?p=<?php echo $pagina ?>">Pdf Pagina Atual</a>
                            </div>
                        </li>
                        <div id="c1"  class="dropdown-divider"></div>
                        <li id="pdfAll">
                            <div id="pdf">
                                <i class="fas fa-file-pdf"></i> <a id="p" href="/projetoBase/administrativo/vendas/pdf">Pdf todas as paginas</a>
                            </div>
                        </li>
                        <div id="c2" class="dropdown-divider"></div>
                        <li id="excelAtual">
                            <div id="excel">
                            <?php
                                $pagina = (isset($_GET['p']))? $_GET['p'] : 1; 
                            ?>
                                <i class="fas fa-file-excel"></i>  <a id="e" href="/projetoBase/administrativo/vendas/excelAtualPg?p=<?php echo $pagina ?>">Planílha Pagina Atual</a>
                            </div>
                        </li>
                        <div id="c3" class="dropdown-divider"></div>
                        <li id="excelAll">
                            <div id="excel">
                                <i class="fas fa-file-excel"></i>  <a id="e" href="/projetoBase/administrativo/vendas/excel">Planílha todas as paginas</a>
                            </div>
                        </li>
                            <li style="display: none;" id="pdFind">
                            <div id="pdf">
                                <i class="fas fa-file-pdf"></i> <a id="p" href="/projetoBase/administrativo/vendas/pdFind">Gerar Pdf</a>
                            </div>
                            </li>
                            <div id="df" class="dropdown-divider"></div>
                            <li style="display: none;" id="exFind">
                                <div id="excel">
                                    <i class="fas fa-file-excel"></i>  <a id="e" href="/projetoBase/administrativo/vendas/exFind">Gerar Planílha</a>
                                </div>
                            </li>
                    </ul>
                </div>
            </div>
            </form>
        <div class="table-responsive">    
            <table id="table" class="table" style="margin-top: 50px;">     
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
                    </tr>
                </tbody>    
                <?php endforeach; ?>
            </table>
            <?php $conta = ceil($totalVendas / $limit);?>
              
            <ul id="pag" class="pagination justify-content-center">
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
                <li class="page-item active"><a class="page-link" href="/projetoBase/administrativo/vendas?p=<?php echo ($conta); ?>">>></a></li>
                </ul>
        </div> 
</div>
</body>
</html>
