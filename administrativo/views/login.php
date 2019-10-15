<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login Adm</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <div class="container" style="width: 350px; margin-top: 100px;">
        <div style="text-align: center;">
            <img src="/projetoBase/assets/images/logo.png" width="100px" height="100px">
        </div>
        <form action="/projetoBase/administrativo/login" method="post">
            <div class="form-group">
                <label>Usuario</label><br>
                <input class="form-control" type="text" name="usuario" placeholder="Digite o usuário..." autocomplete="off"/>
            </div>
            <div class="form-group">
                <label>Senha</label><br>
                <input class="form-control" type="password" name="senha" placeholder="Digite a senha..." autocomplete="off" /><br>
            </div>
            <input type="submit" class="form-control btn btn-success" value="Logar" />

        </form>
    </div>
</body>
</html>