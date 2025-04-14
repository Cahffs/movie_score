<?php
include_once("../../classes/usuario/usuario.php");
include_once("../../components/navbar/navbar.php");
include_once("../../db/conexao.php");

$idFilme = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if ($idFilme > 0) {
    $sql = "SELECT * FROM filme WHERE id = $idFilme";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        $filme = $resultado->fetch_assoc();
    } else {
        echo "ERRO";
        exit;
    }
}

$conn->close();

if (!isset($_SESSION['user'])) {
    echo "<p>Você precisa estar logado para visualizar esta página.</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $filme['titulo']; ?> - Alteração</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <?php include_once("../../components/navbar/navbar.php") ?>

    <div class="container">
        <h2>Atualizar Avaliação</h2>
        <form action="../../api/updateFilme.php" method="POST">
            <div class="form-group">
                <label for="id">ID</label>
                <input class="form-control" type="text" name="id" id="id" value="<?php echo $filme['id'] ?>" required
                    readonly>
            </div>
            <div class="form-group">
                <label for="imagem_url">URL da Imagem</label>
                <input class="form-control" type="text" name="imagem_url" id="imagem_url"
                    value="<?php echo $filme['imagem_url'] ?>" required>
            </div>
            <div class="form-group">
                <label for="titulo">Título do Filme</label>
                <input class="form-control" type="text" name="titulo" id="titulo" value="<?php echo $filme['titulo'] ?>"
                    required>
            </div>
            <div class="form-group">
                <label for="diretor">Diretor</label>
                <input class="form-control" type="text" name="diretor" id="diretor"
                    value="<?php echo $filme['diretor'] ?>" required>
            </div>
            <div class="form-group">
                <label for="ano">Ano de Lançamento</label>
                <input class="form-control" type="number" name="ano" id="ano" value="<?php echo $filme['ano'] ?>"
                    required>
            </div>
            <div class="form-group">
                <label for="genero">Gênero</label>
                <input class="form-control" type="text" name="genero" id="genero" value="<?php echo $filme['genero'] ?>"
                    required>
            </div>
            <div class="form-group">
                <label for="nota">Nota</label>
                <input class="form-control" type="number" name="nota" id="nota" min="1" max="5" placeholder="De 1 a 5"
                    value="<?php echo $filme['nota'] ?>" required>
            </div>
            <div class="form-group">
                <label for="avaliacao">Sua Avaliação</label>
                <textarea class="form-control" name="avaliacao" id="avaliacao" rows="4" cols="50"
                    required><?php echo htmlspecialchars($filme['avaliacao']); ?></textarea>
            </div>
            <button class="btn btn-primary" type="submit">Alterar</button>
        </form>
    </div>

    <?php include_once("../../components/footer/footer.php") ?>
</body>

</html>