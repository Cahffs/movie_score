<?php

include_once("../classes/usuario/usuario.php");
session_start();
include_once('../db/conexao.php');

if (!isset($_SESSION['user']) || !$_SESSION['user'] instanceof Usuario) {
    echo json_encode(['data' => [], 'total' => 0, 'msg' => 'Usuário não autenticado']);
    exit;
}

$userId = $_SESSION['user']->cod;

$ini = isset($_GET['page']) ? ($_GET['page'] - 1) * 10 : 0;

$totalResult = $conn->query("SELECT COUNT(*) FROM filme WHERE usuario_id != $userId");
$total = mysqli_fetch_array($totalResult);


$sql = "
    SELECT filme.*, usuario.nome AS nome_usuario 
    FROM filme 
    LEFT JOIN usuario ON filme.usuario_id = usuario.cod 
    WHERE filme.usuario_id != $userId 
    LIMIT $ini, 10
";
$result = $conn->query($sql);

$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

$conn->close();


header('Content-type: application/json');
echo json_encode(['data' => $rows, "total" => $total[0]]);
?>