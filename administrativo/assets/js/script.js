// Função para listar as vendas com o filtro de busca entre duas datas escolhidas pelo usuário
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
// Função para listar as vendas com o filtro de busca entre duas datas escolhidas pelo usuário em ajax


//Função para buscar os usuários ao digitar o nome no campo em ajax
$(function(){
    $('#nome').keyup(function(){
        var nome = $('#nome').val();
        if(nome != ''){
            $.ajax({
                url:"/projetoBase/administrativo/usuarios/findUserAjax",
                method:"POST",
                data:{nome:nome},
                success:function(data){
                    $('#table').html(data)
                }
            });
        }else{
            $.ajax({
                url:"/projetoBase/administrativo/usuarios/viewAjax",
                method:"POST",
                data:{},
                success:function(data){
                    $('#table').html(data)
                }
            });
        }
       
    });
});
//Função para buscar os usuários ao digitar o nome no campo em ajax


//Função para buscar os produtos ao digitar o nome no campo em ajax
$(function(){
    $('#nomeProd').keyup(function(){
        var nomeProd = $('#nomeProd').val();
        if(nomeProd != ''){
            $.ajax({
                url:"/projetoBase/administrativo/produtoAdm/findProdsAjax",
                method:"POST",
                data:{nomeProd:nomeProd},
                success:function(data){
                    $('#tableProd').html(data)
                }
            });
        }else{
            $.ajax({
                url:"/projetoBase/administrativo/produtoAdm/viewAjax",
                method:"POST",
                data:{},
                success:function(data){
                    $('#tableProd').html(data)
                }
            });
        }
       
    });
});
//Função para buscar os produtos ao digitar o nome no campo em ajax


//Função para buscar as categorias ao digitar  o nome no campo em ajax
$(function(){
    $('#nomeCat').keyup(function(){
        var nomeCat = $('#nomeCat').val();
        if(nomeCat != ''){
            $.ajax({
                url:"/projetoBase/administrativo/categorias/findCatAjax",
                method:"POST",
                data:{nomeCat:nomeCat},
                success:function(data){
                    $('#tableCat').html(data)
                }
            });
        }else{
            $.ajax({
                url:"/projetoBase/administrativo/categorias/viewAjax",
                method:"POST",
                data:{},
                success:function(data){
                    $('#tableCat').html(data)
                }
            });
        }
       
    });
});
//Função para buscar as categorias ao digitar  o nome no campo em ajax


//Mascaras para inputs
$(document).ready(function(){
    $('#cpf').mask('000.000.000-00', {reverse: false});
});
$(document).ready(function(){
    $('#telefone').mask('(00) 0 0000-0000');
});
$(document).ready(function(){
    $('.data').mask('00/00/0000');
});
$(document).ready(function(){
    $('#idade').mask('00');
});
//Mascaras para inputs