<?php
include_once "../../components/navbar/navbar.php";
include_once('../../classes/usuario/usuario.php');
?>

<div class="container">
    <h2>Cadastrar filme</h2>
    <form action="../../api/insertFilme.php" method="POST">
        <div class="form-group">
            <label for="imagem_url">URL da Imagem</label>
            <input class="form-control" type="text" name="imagem_url" id="imagem_url" required>
        </div>
        <div class="form-group">
            <label for="titulo">Título do Filme</label>
            <input class="form-control" type="text" name="titulo" id="titulo" required>
        </div>
        <div class="form-group">
            <label for="diretor">Diretor</label>
            <input class="form-control" type="text" name="diretor" id="diretor" required>
        </div>
        <div class="form-group">
            <label for="ano">Ano de Lançamento</label>
            <input class="form-control" type="number" name="ano" id="ano" placeholder="Exemplo: 1994" min="1888"
                max="2030" required>
        </div>
        <div class="form-group">
            <label for="genero">Gênero</label>
            <input class="form-control" type="text" name="genero" id="genero" required>
        </div>
        <div class="form-group">
            <label for="nota">Nota</label>
            <input class="form-control" type="number" name="nota" id="nota" min="1" max="5" placeholder="De 1 a 5"
                required>
        </div>
        <div class="form-group">
            <label for="avaliacao">Sua Avaliação</label>
            <textarea class="form-control" name="avaliacao" id="avaliacao" rows="4" cols="50" required></textarea>
        </div>
        <button class="btn btn-primary" type="submit">Cadastrar</button>
    </form>
</div>
<?php include_once "../../components/footer/footer.php" ?>