<div class="container" style="margin-top: 100px; width: 500px;">
    <form method="post" id="formAlign">
        <label>Nome:</label>
        <input class="form-control" type="text" name="nome" required value="<?php echo $usuarios['nome'] ?>"  />
        <label>E-mail:</label>
        <input class="form-control" type="email" name="email" required value="<?php echo $usuarios['email'] ?>"/>
        <label>Senha:</label>
        <input class="form-control" type="password" name="senha" required /><br>
        <input class="form-control btn btn-success" type="submit" value="Editar" />
    </form>
</div>