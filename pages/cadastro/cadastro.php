<?php
include_once '../../db/conexao.php';
include_once '../../classes/usuario/usuario.php';

if (isset($_POST['nome'])) {
  $consulta = mysqli_query(
    $conn,
    "insert into usuario(nome, login, senha) values ('" . $_POST['nome'] . "','" . $_POST['login'] . "','" . $_POST['senha'] . "')"
  );
}
?>

<html>

<head>
  <meta charset="UTF-8">
  <title>MovieScore - Cadastro</title>
  <link rel="stylesheet" type="text/css" href="cadastro.css" />
  <link rel="shortcut icon" href="../../assets/favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>

<body>
  <div class="container-fluid d-flex justify-content-center align-items-center min-vh-100">
    <div class="w-80">
      <section class="text-center text-lg-start">
        <div class="card mb-3">
          <div class="row g-0 d-flex align-items-center">
            <div class="col-lg-4 d-none d-lg-flex">
              <img src="../../assets/popcorn.jpg" alt="Pipoca"
                class="w-100 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" />
            </div>
            <div class="col-lg-8">
              <div class="card-body py-5 px-md-5">
                <form action="cadastro.php" method="POST">
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example1" style="text-align: left; display: block;">Nome</label>
                    <input type="text" name="nome" id="form2Example1" class="form-control" required />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example2"
                      style="text-align: left; display: block;">Login</label>
                    <input type="text" name="login" id="form2Example2" class="form-control" required />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example3"
                      style="text-align: left; display: block;">Senha</label>
                    <input type="password" name="senha" id="form2Example3" class="form-control" required />
                  </div>

                  <div class="botao">
                    <button type="submit" class="btn btn-primary btn-block mb-3">Cadastrar</button>
                    <p>Já possui uma conta? <a href="../../index.php">Fazer Login</a></p>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</body>

</html>