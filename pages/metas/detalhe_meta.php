<?php
$meta = $_REQUEST['id'];
$sql = "SELECT * FROM metas WHERE id_meta = $meta;";
$result = $conn->query($sql);
$item = mysqli_fetch_assoc($result);



?>

<div class="row">
  <div class="col">
    <h1>
      Detalhe da meta
      <span class="fs-5">
        <?php print date('M/Y', strtotime($item['periodo_meta'])) ?>
      </span>
    </h1>
    <p>
      <?php echo $item['ano_fiscal'] ?>
    </p>
  </div>
  <div class="col text-end">
    <a class="btn btn-primary" href="">Editar Meta</a>
  </div>
</div>

<table class="text-center table table-striped table-bordered">
  <thead>
    <tr>
      <th colspan="9">
        <h2>Meta Atual</h2>
      </th>
    </tr>
    <tr>
      <th colspan="2">Meta Prevista</th>
      <th>Meta Corrigida</th>
      <th colspan="2">Realizado</th>
      <th>% de Cobertura</th>
      <th>Participação</th>
      <th colspan="2">Meta Acumulada</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td colspan="2">R$<?php print number_format($item['previsao_meta'], 2, ',', '.')  ?></td>
      <td></td>
      <td colspan="2"></td>
      <td></td>
      <td></td>
      <td colspan="2"></td>
    </tr>
  </tbody>
  <thead>
    <tr>
      <th colspan="9">
        <h2>Ano Anterior</h2>
      </th>
    </tr>
    <tr>
      <th colspan="3">Realizado</th>
      <th colspan="3">Nº pedidos</th>
      <th colspan="3">Ticke Médio</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td colspan="3">R$<?php print number_format($item['realizado_ano_anterior'], 2, ',', '.')  ?></td>
      <td colspan="3"><?php echo $item['num_pedidos_ano_anterior'] ?></td>
      <td colspan="3">R$<?php print number_format($item['ticket_medio_ano_anterior'], 2, ',', '.')  ?></td>
    </tr>
  </tbody>
  <thead>
    <tr>
      <th colspan="9">
        <h2>Meta Semanal</h2>
      </th>
    </tr>
    <tr>
      <th>Período</th>
      <th>% Período</th>
      <th>Meta de Pedidos</th>
      <th>Meta Prevista</th>
      <th>Meta Corrigida</th>
      <th>Realizado</th>
      <th>% de Cobetura</th>
      <th>participação</th>
      <th>Meta Acumulada</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>Semana 1</th>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <th>Semana 2</th>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <th>Semana 3</th>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <th>Semana 4</th>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
  </tbody>
</table>