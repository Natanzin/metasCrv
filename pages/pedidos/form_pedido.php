<h1>Novo Pedido</h1>

<form method="POST" action="?page=salvar_pedido" class="border p-3 rounded">
  <!--CONTROLA O TIPO DE AÇÃO NO ARQUIVO SALVAR_PEDIDO.PHP-->
  <input type="hidden" name="acao" value="cadastrar">
  <div class="row">
    <div class="col-md border-end">
      <!--NUMERO DO PEDIDO-->
      <div class="mb-3">
        <label class="form-label" for="num_pedido">Nº pedido*</label>
        <input required class="form-control" name="num_pedido" id="num_pedido" type="text" autofocus>
      </div>
      <!--DATA EMISSÃO-->
      <div class="mb-3">
        <label class="form-label" for="data_emissao">Data de Emissão*</label>
        <input required class="form-control" name="data_emissao" id="data_emissao" type="date">
      </div>
      <!--NOME DO CLIENTE-->
      <div class="mb-3">
        <label class="form-label" for="nome_cliente">Nome do Cliente*</label>
        <input required class="form-control" name="nome_cliente" id="nome_cliente" style="text-transform: uppercase;" type="text">
      </div>
      <!--VALOR DO PEDIDO-->
      <div class="mb-3">
        <label class="form-label" for="vlr_pedido">Valor do pedido*</label>
        <div class="input-group">
          <span class="input-group-text" id="basic-addon1">R$</span>
          <input required class="form-control" name="vlr_pedido" id="vlr_pedido" type="text">
        </div>
      </div>
    </div>
    <div class="col-md">
      <!--FORMA DE PAGAMENTO-->
      <div class="mb-3 row">
        <div class="col-xl-8">
          <label class="form-label" for="forma_pagamento">Forma de Pagamento*</label>
          <select class="form-select" name="id_forma_pagamento" id="forma_pagamento">
            <?php
            $query = $conn->query("SELECT * FROM forma_pagamento;");
            $registros = $query->fetch_all(MYSQLI_ASSOC);

            foreach ($registros as $item) {
            ?>
              <option value="<?php echo $item['id_forma_pagamento'] ?>"><?php echo $item['desc_forma_pagamento']; ?></option>
            <?php
            }
            ?>
          </select>
        </div>
        <!--DIA DO VENCIMENTO-->
        <div class="col-xl-4">
          <label class="form-label" for="dia_vencimento">Dia Vencimento*</label>
          <select name="dia_vencimento" id="dia_vencimento" class="form-select">
            <option value="padrao">Padrão</option>
            <?php
            for ($i = 1; $i <= 28; $i++) {
            ?>
              <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php
            }
            ?>
          </select>
        </div>
      </div>
      <!--VENDEDOR-->
      <div class="mb-3">
        <label class="form-label" for="vendedor">Vendedor*</label>
        <select required class="form-select" name="id_vendedor" id="vendedor">
          <?php
          $empresa = $_SESSION['id_empresa'];
          $query = $conn->query("SELECT * FROM vendedor WHERE id_empresa = $empresa;");
          $registros = $query->fetch_all(MYSQLI_ASSOC);

          foreach ($registros as $item) {
          ?>
            <option value="<?php echo $item['id_vendedor'] ?>"><?php echo $item['nome_vendedor']; ?></option>
          <?php
          }
          ?>
        </select>
      </div>
      <!--PARCEIRO-->
      <div class="mb-3">
        <label class="form-label" for="parceiro">Parceiro</label>
        <select class="form-select" name="id_parceiro" id="parceiro">
          <option value="3">Nenhum</option>
          <?php
          $query = $conn->query("SELECT * FROM parceiro WHERE id_empresa = $empresa;");
          $registros = $query->fetch_all(MYSQLI_ASSOC);

          foreach ($registros as $item) {
          ?>
            <option value="<?php echo $item['id_parceiro'] ?>"><?php echo $item['nome_parceiro']; ?></option>
          <?php
          }
          ?>
        </select>
      </div>
      <!--FORMA DE ENTREGA-->
      <div class="mb-3">
        <label class="form-label" for="forma_entrega">Forma de Entrega*</label>
        <input required class="form-control" name="forma_entrega" id="forma_entrega" type="text" maxlength="255">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <div class="mb-3">
        <button class="btn btn-primary" type="submit">Cadastrar</button>
      </div>
    </div>
  </div>
</form>