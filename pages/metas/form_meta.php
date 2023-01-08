<h1>Cadastrar Meta</h1>

<form method="POST" action="?page=salvar_meta" class="border p-3">
  <input type="hidden" name="acao" value="cadastrar">
  <div class="row">
    <div class="col border-end">
      <div class="mb-3">
        <label class="form-label" for="">Ano Fiscal</label>
        <select required name="ano_fiscal" class="form-select" id="">
          <?php
          for ($i = 2020; $i <= 2030; $i++) {
          ?>
            <option <?= ($i == date('Y')) ? 'selected' : '' ?> value="<?php echo $i - 1 . '/' . $i; ?>"><?php echo $i - 1 . '/' . $i; ?></option>
          <?php
          }
          ?>
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label" for="">Período</label>
        <input required name="periodo_meta" value="<?php echo date('Y-m') ?>" type="month" class="form-control">
      </div>
      <div class="mb-3">
        <label class="form-label" for="">Meta Prevista</label>
        <input required name="previsao_meta" type="text" class="form-control">
      </div>
    </div>
    <div class="col">
      <div class="mb-3">
        <label class="form-label" for="">Realizado Ano Anterior</label>
        <input required name="realizado_ano_anterior" type="text" class="form-control">
      </div>
      <div class="mb-3">
        <label class="form-label" for="">Qtd. de Pedidos Ano Anterior</label>
        <input required name="num_pedidos_ano_anterior" type="number" class="form-control">
      </div>
    </div>
  </div>
  <button class="btn btn-primary" type="submit">Cadastrar</button>
</form>