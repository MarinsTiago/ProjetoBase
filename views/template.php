<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Loja</title>
    <link rel="stylesheet" href="/projetoBase/assets/css/template.css" />
</head>
<body>

    <div class="topo">
        <div style="text-align: center;">
            <img src="/projetoBase/assets/images/logo.png" width="100px" height="96px" border=0 />
        </div>
    </div>
    <div class="menu"> 
        <div class="menuint">
            <ul>
              <a href="/projetoBase"><li>home</li></a>
                <?php foreach($menu as $menuItem):?>
                <a href="categoria/ver/<?php echo $menuItem['id'];?>   "><li><?php echo utf8_encode( $menuItem['titulo']);?></li></a>
                <?php endforeach; ?>
                <a href="/projetoBase/contato"><li>contato</li></a>
                <a href="/projetoBase/pedidos"><li>pedidos</li></a>
            </ul>
                <a href="/projetoBase/carrinho">
                    <div class="carrinho">
                        Carrinho: <br>
                        <?php echo (isset($_SESSION['carrinho']))?count($_SESSION['carrinho']):'0';?> itens
                    </div>
                </a>
        </div>
    </div>
    <div class="container">
    <?php $this -> loadViewInTemplate($viewName, $viewData); ?>
    </div>
    <div class="rodape"></div>

    
</body>
</html>