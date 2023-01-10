<a class="btn btn-primary" href="?page=form_meta">Cadastrar Meta</a>
<h1>Metas</h1>

<?php
$empresa = $_SESSION['id_empresa'];
$sql = "SELECT * FROM metas WHERE id_empresa = $empresa ORDER BY ano_fiscal DESC, periodo_meta ASC LIMIT 24";
$res = $conn->query($sql);

$qtd = $res->num_rows;



if ($qtd > 0) { ?>

  <table class="text-center table table-bordered table-hover">
    <thead>
      <tr class="table-secondary">
        <th>Ano Fiscal</th>
        <th>Período</th>
        <th>Meta Prevista</th>
        <th>Realizado</th>
        <th>% de Cobertura</th>
        <th>Participação</th>
        <th>Ação</th>
      </tr>
    </thead>
    <tbody>

      <?php while ($row = $res->fetch_object()) {
        //realizado por período
        $sqlPedidos = "SELECT desc_periodo, SUM(vlr_pedido) as total_vendas FROM pedido WHERE desc_periodo = '{$row->desc_periodo}' AND id_empresa = $empresa";
        $queryPedidos = $conn->query($sqlPedidos);
        $pedido = $queryPedidos->fetch_object();
        //calculo de participação da meta
        $participacao = $pedido->total_vendas - $row->previsao_meta;
        //calculo de % de cobertura
        $percent_cobertura = ($pedido->total_vendas / $row->previsao_meta) * 100;
      ?>
        <tr>
          <td><?php print $row->ano_fiscal ?></td>
          <td><?php print date('M/Y', strtotime($row->periodo_meta)) ?></td>
          <td>R$<?php print number_format($row->previsao_meta, 2, ',', '.')  ?></td>
          <td>R$<?php print number_format($pedido->total_vendas, 2, ',', '.')  ?></td>
          <td><?php print number_format($percent_cobertura, 2)  ?>%</td>
          <td class="<?php $participacao <= 0 ? print 'table-danger' : print 'table-info'; ?>">R$<?php print number_format($participacao, 2, ',', '.')  ?></td>
          <td><a href="?page=detalhe_meta&id=<?php echo $row->id_meta ?>" class="btn-sm btn btn-primary">Detalhe</a></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
<?php } else { ?>
  <p clas="alert alert-danger">Não encontrou resultador!</p>
<?php } ?>