<div class="container" style="width: 500px; margin-top: 50px;" >
    <form method="POST" enctype="multipart/form-data" id="formAlign">  
        
        <label>Nome:</label>
        <input class="form-control" type="text" name="nome" required value="<?php echo $produto['nome']; ?>"/>
        <label>Descrição:</label>
        <textarea class="form-control" name="descricao" required><?php echo $produto['descricao']; ?></textarea>
        <label>Quantidade:</label>
        <input class="form-control" type="number" name="qtde" value="<?php echo $produto['qtde'] ?>" required/>
        <label>Preço:</label>
        <input class="form-control" type="number" name="preco" value="<?php echo $produto['preco'] ?>" required/>
        <label>Categoria:</label>
        <select class="form-control" name="idCategoria">
            <?php foreach($categorias as $cat):?>
                <option value="<?php echo $cat['id'] ?>"><?php echo $cat['titulo'];?></option>
            <?php endforeach; ?>
        </select>
        <label>Imagem:</label>
        <input class="form-control" type="file" name="imagem" required /><br>
        <input class="form-control btn btn-success" type="submit" value="Editar informações" />
    </form> 
</div>