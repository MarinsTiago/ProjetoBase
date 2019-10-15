<div class="container">      
            <center><h4 style="margin-top: 20px;">Filtrar Venda</h4></center> 
            <form method="post" action="/projetoBase/administrativo/vendas/find">
            <div style="text-align: center; margin-top: 30px;">
                <label>De:</label>
                <input type="date" name="dataDe"/>
                <label>Até:</label>
                <input type="date" name="dataAte"/>
                <input type="submit" class="btn btn-success" value="Procurar"/>
            </div>
            </form>
        <div class="table-responsive">
            <table class="table table-striped" style="margin-top: 50px;">
                <thead>
                    <tr>
                        <th style="text-align: center">ID</th>
                        <th style="text-align: center">ID_USUARIO</th>
                        <th style="text-align: center">Endereco</th>
                        <th style="text-align: center">Total</th>
                        <th style="text-align: center">Forma de Pagamento</th>
                        <th style="text-align: center">Status</th>
                        <th style="text-align: center">Data / Hora</th>
                    </tr>
                </thead>
                <?php foreach($datas as $data): ?>
                    <tbody>
                        <tr>
                            <td style="text-align: center"><?php echo $data['id']; ?></td>
                            <td style="text-align: center"><?php echo $data['idUsuario']; ?></td>
                            <td style="text-align: center"><?php echo $data['endereco']; ?></td>
                            <td style="text-align: center"><?php echo $data['total']; ?></td>
                            <td style="text-align: center"><?php echo $data['formaPagamento']; ?></td>
                            <td style="text-align: center"><?php echo $data['status']; ?></td>
                            <td style="text-align: center"><?php echo $data['dataVenda']; ?></td>
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
            <div style="text-align: center">
                <input class="btn btn-success" onclick="history.go(-1)" type="submit" value="voltar" />
            </div>
        </div>    
    
</div>