<?php
//Inicializado primeira a sessão para posteriormente recuperar valores das variáveis globais. 
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="author" content="NatanSilva">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <title>Metas CRV</title>
</head>

<body>
  <!-- Criado o formulário para o usuário colocar os dados de acesso.  -->
  <div class="container">
    <div class="vh-100 row justify-content-center align-items-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
        <form method="POST" action="./auth/auth.php" class="border rounded py-4 px-3">
          <h2 class="text-center">Metas CRV</h2>
          <div class="row">
            <div class="col">
              <label class="form-label">Usuário</label>
              <input class="form-control" type="text" name="usuario" placeholder="Usuário" required autofocus>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <label class="form-label">Senha</label>
              <input class="form-control" type="password" name="senha" placeholder="Senha" required>
            </div>
          </div>
          <p class="text-danger">
            <?php
            //Recuperando o valor da variável global, os erro de login.
            if (isset($_SESSION['loginErro'])) {
              echo $_SESSION['loginErro'];
              unset($_SESSION['loginErro']);
            } else if (isset($_SESSION['logindeslogado'])) {
              echo $_SESSION['logindeslogado'];
              unset($_SESSION['logindeslogado']);
            } else if (isset($_SESSION['situacaoErro'])) {
              echo $_SESSION['situacaoErro'];
              unset($_SESSION['situacaoErro']);
            }
            ?>
          </p>
          <div class="row ">
            <div class="col-12 col-sm-6 mb-2">
              <button class="btn btn-primary w-100" type="submit">Acessar</button>
            </div>
            <div class="col-12 col-sm-6">
              <button class="btn btn-warning w-100" type="button">Registrar-se</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>