<?php
    use Mpdf\Mpdf;
    require_once __DIR__ . '/vendor/autoload.php';
        $html.="<div style='background-color: #fffff0; width: 100%;'>";
            $html.= "
            <h3 style='text-align: center;'>Registro de Vendas</h3>
                <table style='width:100%;' align='center'>
                    <tr style='background-color: #D3D3D3;'>
                        <th>ID</th>
                        <th>ID_USUARIO</th>
                        <th>Endereço</th>
                        <th>Forma de Pagamento</th>
                        <th>Total</th>
                        <th>Data da Venda</th>
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
    $arquivo = "vendas.pdf"; // nome do arivo para salvar

    $mpdf = new Mpdf();
    $mpdf->SetDisplayMode('fullpage');
    $data = new DateTime();
    $fuso = new DateTimeZone('America/Sao_Paulo');
    $data->setTimezone($fuso);
    $df = $data->format('d-m-Y H:i:s'); 
    $mpdf->setFooter("Data de criação: {DATE $df} ||Página {PAGENO} de {nbpg}");
    // $css = file_get_contents("/assets/css/style.css");
    // $mpdf->WriteHTML($css,1);
    $mpdf->WriteHTML($html); // faz a leitura do arquivo a ser exibido no pdf
    $mpdf->Output($arquivo, 'I'); // 'I'exibi no navegador somente - 'F' salva no navegador - 'D' faz o download do arquivo
?>
