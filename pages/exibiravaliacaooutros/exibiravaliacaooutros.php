<?php
include_once("../../classes/usuario/usuario.php");
include_once("../../db/conexao.php");
session_start();

if (!isset($_SESSION['user'])) {
    echo "<p>Você precisa estar logado para visualizar esta página.</p>";
    exit;
}

$idFilme = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if ($idFilme > 0) {
    $sql = "
        SELECT filme.*, usuario.nome AS nome_usuario 
        FROM filme
        LEFT JOIN usuario ON filme.usuario_id = usuario.cod
        WHERE filme.id = $idFilme
    ";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        $filme = $resultado->fetch_assoc();
    } else {
        echo "<p>Filme não encontrado.</p>";
        exit;
    }
} else {
    echo "<p>ID de filme inválido.</p>";
    exit;
}

$conn->close();
include_once("../../components/navbar/navbar.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $filme['titulo']; ?> - Avaliação</title>
    <link rel="stylesheet" href="exibiravaliacaooutros.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>

    <div class="pagina-filme">

        <div class="imagem-container" style="background-image: url('<?php echo $filme['imagem_url']; ?>');">
            <img src="<?php echo $filme['imagem_url']; ?>" alt="<?php echo $filme['titulo']; ?>" class="imagem-filme">
        </div>

        <div class="conteudo-principal">
            <div class="cabecalho-filme">
                <h1><?php echo $filme['titulo']; ?></h1>
                <div class="meta-dados">
                    <span><?php echo $filme['ano']; ?></span>
                    <span>•</span>
                    <span><?php echo $filme['diretor']; ?></span>
                </div>
            </div>

            <div class="avaliacao-geral">
                <div class="nota-container">
                    <span class="nota-numero"><?php echo number_format($filme['nota'], 1); ?></span>
                    <div class="estrelas-avaliacao">
                        <?php
                        $estrelas = round($filme['nota']);
                        for ($i = 1; $i <= 5; $i++) {
                            echo $i <= $estrelas
                                ? '<i class="fas fa-star"></i>'
                                : '<i class="far fa-star"></i>';
                        }
                        ?>
                    </div>
                    <span class="genero-filme"><?php echo $filme['genero']; ?></span>
                </div>
            </div>

            <div class="avaliacao-usuario">
                <h3>Avaliação de <?php echo $filme['nome_usuario'] ? $filme['nome_usuario'] : 'Usuário desconhecido'; ?>
                </h3>
                <div class="texto-avaliacao">
                    <p><?php echo $filme['avaliacao']; ?></p>
                </div>
            </div>
        </div>
    </div>

    <?php include_once("../../components/footer/footer.php") ?>
</body>

</html>