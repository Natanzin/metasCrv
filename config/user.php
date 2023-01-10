<h1>Configurações</h1>

<h2>Usuário</h2>
<form action="../auth/alteraSenha.php" method="POST">
  <div class="mb-3">
    <label for="">Área</label>
    <input disabled type="text" value="<?php echo $_SESSION['cod_area']; ?>" class="form-control">
  </div>
  <div class="mb-3">
    <label for="">Empresa</label>
    <input disabled type="text" value="<?php echo $_SESSION['cod_empresa'] . " - " . $_SESSION['nome_empresa']; ?>" class="form-control">
  </div>
  <div class="mb-3">
    <label for="">Nome</label>
    <input disabled type="text" value="<?php echo $_SESSION['nome_usuario']; ?>" class="form-control">
  </div>
  <div class="mb-3">
    <label for="">Usuário</label>
    <input disabled type="text" value="<?php echo $_SESSION['acesso_usuario']; ?>" class="form-control">
  </div>
  <div class="mb-3">
    <label for="">Nova Senha</label>
    <input name="nova_senha" type="password" class="form-control">
  </div>
  <div class="mb-3">
    <label for="">Confirmar Senha</label>
    <input name="confirm_senha" type="password" class="form-control">
  </div>
  <div class="mb-3">
    <button class="btn btn-primary" type="submit">Redefinir senha</button>
  </div>
  <p>
    <?php
    //Recuperando o valor da variável global
    if (isset($_SESSION['updateSenha'])) {
      echo $_SESSION['updateSenha'];
      unset($_SESSION['updateSenha']);
    }
    ?>
  </p>
</form>