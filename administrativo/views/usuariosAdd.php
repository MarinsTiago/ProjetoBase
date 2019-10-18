<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">  
    <script src="../assets/js/script.js"></script>
    <script src="../assets/js/jquery.mask.js"></script>
</head>
<body>
<div class="container" style="margin-top: 10px; width: 500px;">
    <form method="post" id="formAlign">
        <label >Nome:</label>
            <input pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$" class="form-control" type="text" name="nome" required="required" placeholder="Somente letras, com ou sem acento"  />
        <label>CPF:</label>
            <input class="form-control" type="text" name="cpf" id="cpf" required placeholder="Digite o cpf..."/>
        <label>Idade:</label>
            <input placeholder="Digite a idade..." class="form-control" id="idade" type="number" name="idade" required/>
        <label>Telefone:</label>
            <input placeholder="Digite o telefone..." class="form-control" id="telefone" type="text" name="telefone" required/>
        <label>E-mail:</label>
            <input class="form-control" type="email" name="email" required placeholder="Digite o email para o usuário..." />
        <label>Senha:</label>
            <input pattern=".{5,15}" class="form-control" type="password" name="senha" required placeholder="Mínimo 5 e máximo de 15 caracteres..."/><br>
        <select required class="form-control" name="sexo">
            <option>Selecione o sexo...</option>
            <option value="masculino">Masculino</option>
            <option value="feminino">Feminino</option>
            <option value="outro">Outro</option>
        </select>
        <br>
        <input class="form-control btn btn-success" type="submit" value="Cadastrar" />
    </form>
</div>
</body>
</html>