<div class="container" style="width: 500px; margin-top: 50px;" >
<meta charset="utf-8" /> 
    <form accept-charset="utf-8" method="POST" enctype="multipart/form-data" id="formAlign">  
        <label>Nome:</label>
        <input class="form-control" type="text" name="nome" placeholder="Insira o nome do produto..." required />
        <label>Descrição:</label>
        <textarea class="form-control" name="descricao" placeholder="Digite a descrição do produto..." required></textarea>
        <label>Quantidade:</label>
        <input class="form-control" type="number" name="qtde" placeholder="Digite a quantidade do produto..." required/>
        <label>Preço:</label>
        <input class="form-control" type="number" name="preco" placeholder="Digite o preço do produto..." required/>
        <label>Categoria:</label>
        <select class="form-control" name="idCategoria">
            <?php foreach($categorias as $cat):?>
                <option value="<?php echo $cat['id'] ?>"><?php echo $cat['titulo'];  ?></option>
            <?php endforeach; ?>
        </select>
        <label>Imagem:</label>
        <input class="form-control" type="file" name="imagem" required /><br>
        <input class="form-control btn btn-success" type="submit" value="Cadastrar" />
    </form> 
</div>