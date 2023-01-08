<?php
session_start();
include_once("../config/db.php");

if ((isset($_POST['usuario'])) && (isset($_POST['senha']))) {
  $usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
  $senha = mysqli_real_escape_string($conn, $_POST['senha']);
  $senha = md5($senha);

  $sql = "SELECT * FROM usuarios WHERE acesso_usuario = '$usuario' AND senha_usuario = '$senha' LIMIT 1";
  $result = $conn->query($sql);
  $resultado = mysqli_fetch_assoc($result);

  if (empty($resultado)) {
    $_SESSION['loginErro'] = "Usuário ou senha inválido!";
    header("Location: ../index.php");
  } else if (isset($resultado)) {
    $empresa_user = $resultado['id_empresa'];
    $queryEmpresa = $conn->query("SELECT * FROM empresa WHERE id_empresa = $empresa_user LIMIT 1");
    $empresa = mysqli_fetch_assoc($queryEmpresa);
    $_SESSION['nome_usuario'] = $resultado['nome_usuario'];
    $_SESSION['acesso_usuario'] = $resultado['acesso_usuario'];
    $_SESSION['nome_empresa'] = $empresa['nome_empresa'];
    $_SESSION['id_empresa'] = $empresa['id_empresa'];
    $_SESSION['cod_empresa'] = $empresa['cod_empresa'];
    header("Location: ../routes/routes.php");
  } else {
    $_SESSION['loginErro'] = "Usuário ou senha inválido!";
    header("Location: ../index.php");
  }
} else {
  $_SESSION['loginErro'] = "Usuário ou senha inválido!";
  header("Location: ../index.php");
}
