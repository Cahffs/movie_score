<?php
include_once '../../classes/usuario/usuario.php';
session_start();
include_once("../../components/navbar/navbar.php");
if (!isset($_SESSION['user']) || !$_SESSION['user'] instanceof Usuario) {
    echo json_encode(['msg' => 'Sessão não encontrada ou usuário não válido']);
    exit;
}
?>
<link rel="stylesheet" href="outrasavaliacoes.css">

<div class="container py-4">
    <h2 class="mb-4">Outras Avaliações</h2>
    <table class="table table-striped">
        <thead></thead>
        <tbody></tbody>
    </table>

    <div id="pagination"></div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.4.2/jquery.twbsPagination.min.js"></script>
<script src="outrasavaliacoes.jsx"></script>

<?php include_once "../../components/footer/footer.php" ?>
</body>