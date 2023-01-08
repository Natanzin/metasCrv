<?php
session_start();
include("../config/db.php");

$nova_senha = md5($_POST['nova_senha']);
$confirm_senha = md5($_POST['confirm_senha']);
$acesso_usuario = $_SESSION['acesso_usuario'];

if ($nova_senha == $confirm_senha) {
  $sql = "UPDATE usuarios SET senha_usuario = '$nova_senha' WHERE acesso_usuario = '$acesso_usuario';";
  $conn->query($sql);
  $_SESSION['updateSenha'] = "Senha alterada com sucesso!";
  header("Location: ../routes/routes.php?page=config");
} else {
  $_SESSION['updateSenha'] = "Não foi possível alterar a senha! confira as informações e tente novamente!";
  header("Location: ../routes/routes.php?page=config");
}
