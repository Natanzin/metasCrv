<?php
//define o numero de itens por página
$itens_por_pagina = 10;

//pegar a página atual
$pagina = intval($_GET['pagina']);

//recupera os pedidos do DB
$sql = "SELECT * FROM desc_pedido LIMIT $pagina, $itens_por_pagina";
$result = $conn->query($sql);
$pedido = $result->fetch_assoc();
$num = $result->num_rows;

//recupera a quantidade totao de pedidos do DB
$num_total = $conn->query("SELECT * FROM desc_pedido;")->num_rows;

//definir número de páginas
$num_paginas = ceil($num_total / $itens_por_pagina);
?>

<a class="btn btn-primary" href="?page=form_pedido">Novo Pedido</a>
<h1>Pedidos</h1>
<?php if ($num > 0) { ?>
  <table class='table table-bordered'>
    <thead>
      <tr>
        <th>Data emissão</th>
        <th>Nº Pedido</th>
        <th>Data Faturamento</th>
        <th>NFe</th>
        <th>Nome Cliente</th>
        <th>vlr. Pedido</th>
        <th>Forma Pagamento</th>
        <th>Dia Vencimento</th>
        <th>Vendedor</th>
        <th>Parceiro</th>
        <th>Forma Entrega</th>
      </tr>
    </thead>
    <tbody>
      <?php do { ?>
        <tr>
          <td><?php echo $pedido['data_emissao']; ?></td>
          <td>Nº Pedido</td>
          <td>Data Faturamento</td>
          <td>NFe</td>
          <td>Nome Cliente</td>
          <td>vlr. Pedido</td>
          <td>Forma Pagamento</td>
          <td>Dia Vencimento</td>
          <td>Vendedor</td>
          <td>Parceiro</td>
          <td>Forma Entrega</td>
        </tr>
      <?php } while ($pedido = $result->fetch_assoc()); ?>
    </tbody>
  </table>
  <nav aria-label="Page navigation example">
    <ul class="pagination">
      <li class="page-item">
        <a class="page-link" href="?page=pedidos&pagina=0" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
        </a>
      </li>
      <?php for ($i = 0; $i < $num_paginas; $i++) {
        $estilo = "";
        if ($pagina == $i) {
          $estilo = " active ";
        }
      ?>
        <li class=" <?php echo $estilo; ?> page-item"><a class="page-link" href="?page=pedidos&pagina=<?php echo $i; ?>"><?php echo $i + 1 ?></a></li>
      <?php } ?>
      <li class="page-item">
        <a class="page-link" href="?page=pedidos&pagina=<?php echo $num_paginas - 1 ?>" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
        </a>
      </li>
    </ul>
  </nav>
<?php } ?>