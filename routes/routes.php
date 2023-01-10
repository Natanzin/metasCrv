<?php
//Inicializado primeira a sessão para posteriormente recuperar valores das variáveis globais. 
session_start();
?>
<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Metas CRV</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body>
  <div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <div class="col-md-3 text-start">
        <p>Bem-vindo, <?php echo $_SESSION['nome_usuario']; ?></p>
      </div>
      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="?page=home" class="nav-link px-2 link-dark">Início</a></li>
        <?php
        //botão Pedidos aparecerá somente para consultores
        $_SESSION['tipo_acesso'] == '3' ?
          print '<li><a href="?page=pedidos&pagina=0" class="nav-link px-2 link-dark">Pedidos</a></li>' : 0
        ?>
        <li><a href="?page=metas" class="nav-link px-2 link-dark">Metas</a></li>
      </ul>

      <div class="col-md-3 text-end">
        <a href="?page=config" class="btn btn-primary"><i class="bi bi-gear"></i></a>
        <a href="../auth/logout.php" class="btn btn-danger">Sair</a>
      </div>
    </header>
    <div class="row">
      <div class="col mt-4">
        <?php
        include("../config/db.php");
        switch (@$_REQUEST["page"]) {
          case "home":
            include("../pages/home/home.php");
            break;
          case "config":
            include("../config/user.php");
            break;
          case "pedidos":
            include("../pages/pedidos/index.php");
            break;
          case "salvar_pedido":
            include("../pages/pedidos/salvar_pedido.php");
            break;
          case "form_pedido":
            include("../pages/pedidos/form_pedido.php");
            break;
          case "editar_pedido":
            include("../pages/pedidos/editar_pedido.php");
            break;
          case "metas":
            include("../pages/metas/index.php");
            break;
          case "form_meta":
            include("../pages/metas/form_meta.php");
            break;
          case "detalhe_meta":
            include("../pages/metas/detalhe_meta.php");
            break;
          case "salvar_meta":
            include("../pages/metas/salvar_meta.php");
            break;
          default:
            include('../pages/home/home.php');
            break;
        }
        ?>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>