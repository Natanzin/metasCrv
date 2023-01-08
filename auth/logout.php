<?php
session_start();

unset(
  $_SESSION['nome_usuario'],
  $_SESSION['acesso_usuario'],
  $_SESSION['nome_empresa'],
  $_SESSION['id_empresa'],
  $_SESSION['cod_empresa']
);

header("Location: ../index.php");
