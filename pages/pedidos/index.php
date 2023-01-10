<?php
//define o numero de itens por página
$itens_por_pagina = 50;

//pegar a página atual
$pagina = intval($_GET['pagina']);

//recupera os pedidos do DB
$sql = "SELECT * FROM desc_pedido ORDER BY data_emissao DESC LIMIT $pagina, $itens_por_pagina";
$result = $conn->query($sql);
$pedido = $result->fetch_object();
$num = $result->num_rows;

//recupera a quantidade totao de pedidos do DB
$num_total = $conn->query("SELECT * FROM desc_pedido;")->num_rows;

//definir número de páginas
$num_paginas = ceil($num_total / $itens_por_pagina);
?>

<a class="btn btn-primary" href="?page=form_pedido">Novo Pedido</a>
<h1>Pedidos</h1>
<?php if ($num > 0) { ?>
  <table class='text-center table table-bordered table-hover'>
    <thead>
      <tr class="table-secondary">
        <th class="text-nowrap">Data emissão</th>
        <th class="text-nowrap">Nº Pedido</th>
        <th class="text-nowrap">Data Faturamento</th>
        <th class="text-nowrap">NFe</th>
        <th class="text-nowrap">Nome Cliente</th>
        <th class="text-nowrap">vlr. Pedido</th>
        <th class="text-nowrap">Vendedor</th>
        <th class="text-nowrap">Parceiro</th>
        <th class="text-nowrap">Forma Entrega</th>
        <th colspan="2" class="text-nowrap">Ações</th>
      </tr>
    </thead>
    <tbody>
      <?php do { ?>
        <tr>
          <td><?php print date('d/m/Y', strtotime($pedido->data_emissao)) ?></td>
          <td><?php print $pedido->num_pedido ?></td>
          <td><?php $pedido->data_faturamento != '0000-00-00' ? print date('d/m/Y', strtotime($pedido->data_faturamento)) : print "-" ?></td>
          <td><?php print $pedido->num_nota_fiscal ?></td>
          <td><?php print $pedido->nome_cliente ?></td>
          <td>R$<?php print number_format($pedido->vlr_pedido, 2, ',', '.')  ?></td>
          <td><?php print $pedido->nome_vendedor ?></td>
          <td><?php print $pedido->nome_parceiro ?></td>
          <td><?php print $pedido->forma_entrega ?></td>
          <td>
            <button onclick=<?php print "\"location.href='?page=editar_pedido&id=" . $pedido->id_pedido . "'\" " ?> class='btn btn-warning btn-sm'>Editar</button>
          </td>
          <td>
            <button onclick=<?php print "\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar_pedido&acao=excluir&id_pedido=" . $pedido->id_pedido . "';}else{false;}\" " ?> class='btn btn-danger btn-sm'>Excluir</button>
          </td>
        </tr>
      <?php } while ($pedido = $result->fetch_object()); ?>
    </tbody>
  </table>
  <nav aria-label=" Page navigation example">
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