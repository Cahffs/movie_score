<?php
include_once('../db/conexao.php');

header('Content-type: application/json');

$sql = "UPDATE filme SET 
        imagem_url = '" . $_POST['imagem_url'] . "',
        titulo = '" . $_POST['titulo'] . "',
        diretor = '" . $_POST['diretor'] . "',
        ano = '" . $_POST['ano'] . "',
        genero = '" . $_POST['genero'] . "',
        nota = '" . $_POST['nota'] . "',
        avaliacao = '" . $_POST['avaliacao'] . "'
        WHERE id = " . $_POST['id'];

if ($conn->query($sql) === TRUE) {
    header('Location: ../pages/suasavaliacoes/suasavaliacoes.php');
    exit;
} else {
    $msg = "Erro: " . $sql . "<br>" . $conn->error;
}