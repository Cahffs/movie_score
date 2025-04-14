<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MovieScore</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="navbar.css">
    <link rel="icon" href="../../assets/favicon.png" type="image/x-icon">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="../../pages/menu/menu.php">
            <i class="fas fa-film mr-2"></i>MovieScore
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent"
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="../../pages/suasavaliacoes/suasavaliacoes.php">
                        <i class="fas fa-star mr-2"></i>Suas Avaliações
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="../../pages/outrasavaliacoes/outrasavaliacoes.php">
                        <i class="fas fa-users mr-2"></i>Outras Avaliações
                    </a>
                </li>
            </ul>
            <div class="ml-auto">
                <form action="../../pages/menu/logout.php" method="POST" class="form-inline my-2 my-lg-0">
                    <button type="submit" class="btn btn-outline-light rounded-pill px-4">
                        <i class="fas fa-sign-out-alt mr-2"></i> Sair
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>

</html>