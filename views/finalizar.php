<h1>Finalizar compra </h1>
<form method="POST">
   <?php if(!empty($erro)): ?>
        <div class="erro"><?php echo $erro; ?></div>
    <?php endif; ?>
    <fieldset>
        <legend>Informações do Usuário</legend>
        Nome:<br>
        <input type="text" name="nome"><br><br>
        E-mail:<br>
        <input type="email" name="email"><br><br>
        Senha:<br>
        <input type="password" name="senha">
    </fieldset>
    <br><br>
    <fieldset>
        <legend>Informações do Endereço</legend>
        <textarea name="endereco"></textarea>
    </fieldset>
    <br><br>
    <fieldset>
        <legend>Resumo da Compra</legend>
        Total a pagar: <?php echo $total; ?>
    </fieldset>
    <br><br>
    <fieldset>
        <legend>Informações do Pagamento</legend>
        <?php foreach($pagamentos as $pg): ?>
            <input type="radio" name="pg" value="<?php echo $pg['id']; ?>" /><?php echo $pg['nome']; ?><br><br>
        <?php endforeach; ?>
    </fieldset>
    <br><br>
    <input type="submit" value="Efetuar pagamento" />
</form>