<?php

    $vendasPt;
    $vendasSt;
    $vendasTt;
    $vendasQt;

?>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">

        //carregando modulo visualization
        google.load("visualization", "1", {packages:["corechart"]});
        google.load("visualization", "2", {packages:["corechart"]});
        //função de monta e desenha o gráfico
        function drawChart() {
        //variavel com armazenamos os dados, um array de array's
        //no qual a primeira posição são os nomes das colunas
        
        var data = google.visualization.arrayToDataTable([
        ['Trimestres', 'vendas'],
        ['Primeiro Trimestre', <?php echo $vendasPt?>],
        ['Segundo Trimestre', <?php echo $vendasSt?>],
        ['Terceiro Trimestre', <?php echo $vendasTt?>],
        ['Quarto Trimestre', <?php echo $vendasQt ?>]
        ]);
        //opções para exibição do gráfico
        var options = {
        title: 'Vendas por Trimestre',//titulo do gráfico
        is3D: true // false para 2d e true para 3d o padrão é false
        };
        //cria novo objeto PeiChart que recebe
        //como parâmetro uma div onde o gráfico será desenhado
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        //desenha passando os dados e as opções
        chart.draw(data, options);
        }
        //metodo chamado após o carregamento
google.setOnLoadCallback(drawChart);
</script>
    <div class="container">  
        <div style="text-align: center; margin-top: 50px;">
          <h2>Seja bem vindo!</h2>
              <div  id="chart_div" style="width: 900px; height: 500px;"></div>
              
        </div>    
    </div>  