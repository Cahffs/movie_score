<?php
include_once '../classes/usuario/usuario.php';

session_start();

if (!isset($_SESSION['user']) || !$_SESSION['user'] instanceof Usuario) {
    echo json_encode(['msg' => 'Sessão não encontrada ou usuário não válido']);
    exit;
}

$usuario_id = $_SESSION['user']->cod;

if (!$usuario_id) {
    echo json_encode(['msg' => 'ID do usuário não encontrado']);
    exit;
}

include_once '../db/conexao.php';

$imagem = $_POST["imagem_url"];
$titulo = $_POST["titulo"];
$diretor = $_POST["diretor"];
$ano = $_POST["ano"];
$genero = $_POST["genero"];
$nota = $_POST["nota"];
$avaliacao = $_POST["avaliacao"];

$sql = "INSERT INTO filme (imagem_url, titulo, diretor, ano, genero, nota, avaliacao, usuario_id) 
        VALUES ('$imagem', '$titulo', '$diretor', '$ano', '$genero', $nota, '$avaliacao', $usuario_id)";

if (mysqli_query($conn, $sql)) {
    header('Location: ../pages/menu/menu.php');
    exit;
} else {
    echo "Erro: " . mysqli_error($conn);
}

$conn->close();
?>