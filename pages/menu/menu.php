<?php
include_once '../../db/conexao.php';
include_once '../../classes/usuario/usuario.php';
session_start();

if (isset($_POST['usuario'])) {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $consulta = mysqli_query($conn, "select cod, nome, login, senha from usuario where login = '" . $usuario . "'");
    $dados = mysqli_fetch_assoc($consulta);
    $user = null;
    if ($dados != null) {
        $user = new Usuario($dados["cod"], $dados["nome"], $dados["login"], $dados["senha"]);
    }

    if ($user != null && $user->validaUsuarioSenha($usuario, $senha)) {
        $_SESSION['user'] = $user;
    } else {
        $_SESSION['login_error'] = true;
        header("Location: ../../index.php");
        exit;
    }
} else if (!isset($_SESSION['user'])) {
    header("Location: ../../index.php");
    exit;
}
?>

<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="login.css" />
</head>
<?php
include_once "../../components/navbar/navbar.php"
    ?>
<div class="container mt-4">
    <h2 class="text-center mb-3">Bem-vindo de volta, <?php echo $_SESSION['user']->nome ?>!</h2>
    <p class="text-center">
        Agora que você está logado, pode explorar os filmes que você já avaliou, adicionar novos filmes e compartilhar
        suas opiniões com a comunidade.
        Não esqueça de conferir as avaliações dos outros usuários para descobrir os melhores filmes!
    </p>
    <p class="text-center">
        O Movie Score é o seu espaço para registrar e acessar avaliações, ajudar outros a escolherem filmes e manter um
        histórico do que já assistiu.
        Pronto para explorar o conteúdo e adicionar mais filmes à sua lista?
    </p>
</div>


<?php
include_once "../../components/footer/footer.php"
    ?>
</body>

</html>