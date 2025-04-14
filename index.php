<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>MovieScore - Login</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="login.css">
  <link rel="shortcut icon" href="assets/favicon.png" type="image/x-icon">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
</head>

<body>
  <?php
  session_start();
  $showError = isset($_SESSION['login_error']) && $_SESSION['login_error'];
  ?>

  <?php if ($showError): ?>
    <div class="login-alert">
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Erro!</strong> Usuário ou senha incorretos.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
    <?php unset($_SESSION['login_error']); ?>
  <?php endif; ?>

  <div class="container-fluid d-flex justify-content-center align-items-center min-vh-100">
    <div class="w-80">
      <section class="text-center text-lg-start">
        <div class="card mb-3">
          <div class="row g-0 d-flex align-items-center">
            <div class="col-lg-4 d-none d-lg-flex">
              <img src="assets/popcorn.jpg" alt="Pipoca" class="w-100 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" />
            </div>
            <div class="col-lg-8">
              <div class="card-body py-5 px-md-5">
                <form action="pages/menu/menu.php" method="POST">
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example1"
                      style="text-align: left; display: block;">Login</label>
                    <input type="text" name="usuario" id="form2Example1" class="form-control" required />
                  </div>
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example2"
                      style="text-align: left; display: block;">Senha</label>
                    <input type="password" name="senha" id="form2Example2" class="form-control" required />
                  </div>
                  <div class="button">
                    <button type="submit" class="btn btn-primary btn-block mb-3">Entrar</button>
                    <p>Não tem uma conta? <a href="pages/cadastro/cadastro.php">Cadastre-se</a></p>
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