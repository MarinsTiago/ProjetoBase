<?php
    include "fpdf181/fpdf.php";

    $pdf = new FPDF("P","pt", "A4"); //P - paisagem, L - retrato; // liguagem pt; // A4 formato de pagina
    $teste = "<ul>
            <li>teste</li>
        </ul>";
    $texto = $teste;

    $pdf->AddPage();
    $pdf->SetFont("arial", "B", 12); // parametros 'fonte', 'B'(negrito), tamanho do texto
    $pdf->Cell(0,5, $texto, 0,1,'L'); // célula do documento
    $pdf->Ln(8); // quebra de linha na altura de 8 unidades
    $pdf->Output("teste.pdf", "I");

 ?>