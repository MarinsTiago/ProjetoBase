$(document).ready(function(){
    $.datepicker.setDefaults({
        dateFormat:'yy-mm-dd'
    });
    $(function(){
        $("#dataDe").datepicker();
        $("#dataAte").datepicker();
    });
    $("#filter").click(function(){
        var dataDe = $('#dataDe').val();
        var dataAte = $('#dataAte').val();
        if(dataDe != '' && dataAte != ''){
            $.ajax({
                url:"/projetoBase/administrativo/vendas/find",
                method:"POST",
                data:{dataDe:dataDe, dataAte:dataAte},
                success:function(data){
                    $('#table').html(data)
                    $('#pag').hide();
                    $('#navH').hide();
                    $('#pdFind').show();
                    $('#exFind').show();
                    $('#pdfAtual').hide();
                    $('#pdfAll').hide();
                    $('#excelAtual').hide();
                    $('#excelAll').hide();
                    $('#c1').hide();
                    $('#c2').hide();
                    $('#c3').hide();
                    $('#df').show();
                }
            });
        }else{
            alert("Selecione as datas");
        }
    });
});