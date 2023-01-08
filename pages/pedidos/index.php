<a class="btn btn-primary" href="?page=form_pedido">Novo Pedido</a>
<h1>Pedidos</h1>
<table id="listar-pedido" class='display'>
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
</table>
<script type="text/javascript" language="javascript">
  $(document).ready(function() {
    $('#listar-pedido').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
        url: '../pages/pedidos/pesq_pedidos.php',
        type: 'POST',
      },
    });
  });
</script>