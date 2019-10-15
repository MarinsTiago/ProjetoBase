<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Planilha</title>
</head>
<body>
    <?php

$arquivo = "planilhaVendas.xls"; // nome do arivo para salvar e extensão que será salvo

$html="<div>";
    $html.= "
    <h3 style='text-align: center;'>Registro de Vendas</h3>
        <table border='1'>
            <tr>
                <th>ID</th>
                <th>ID_USUARIO</th>
                <th>Endereço</th>
                <th>Forma de Pagamento</th>
                <th>Total</th>
                <th>Data da venda</th>
            </tr>";
            foreach($vendas as $venda):
                $html.="<tr>";
                $html.= "<td style='text-align: center;'>{$venda['id']}</td> ";
                $html.= "<td style='text-align: center;'>{$venda['idUsuario']}</td>";
                $html.= "<td style='text-align: center;'>{$venda['endereco']}</td>";
                $html.= "<td style='text-align: center;'>{$venda['formaPagamento']}</td>";
                $html.= "<td style='text-align: center;'>{$venda['total']}</td>";
                $html.= "<td style='text-align: center;'>{$venda['dataVenda']}</td>";
                $html.="</tr>";
            endforeach;
    $html.="</table>";
$html.="</div>";

header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D,d M YH:i:s")."GMT");
header("Cache-Control: no-cache, must revalidate");
header("Pragma: no-cache");
header("Content-type: application/x-msexcel");
header("Content-Disposition: attachment; filename=\"{$arquivo}\"");
header("Content-Description: PHP Generated Data");

echo $html;
exit;
    
?>
</body>
</html>