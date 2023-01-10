<?php
session_start();

$empresa = $_SESSION['id_empresa'];

switch ($_REQUEST["acao"]) {
  case 'cadastrar':
    $ano_fiscal = $_POST['ano_fiscal'];
    $periodo_meta = $_POST['periodo_meta'] . "-01";
    $previsao_meta = $_POST['previsao_meta'];
    $realizado_ano_anterior = $_POST['realizado_ano_anterior'];
    $num_pedidos_ano_anterior = $_POST['num_pedidos_ano_anterior'];
    $ticket_medio_ano_anterior = $realizado_ano_anterior / $num_pedidos_ano_anterior;

    $sql = "INSERT INTO metas (
        ano_fiscal, 
        periodo_meta, 
        previsao_meta, 
        realizado_ano_anterior, 
        num_pedidos_ano_anterior,
        ticket_medio_ano_anterior,
        id_empresa
        ) VALUES (
          '{$ano_fiscal}', 
          '{$periodo_meta}',
          '{$previsao_meta}', 
          '{$realizado_ano_anterior}',
          '{$num_pedidos_ano_anterior}', 
          '{$ticket_medio_ano_anterior}', 
          '{$empresa}') ";

    $sql_conferencia = "SELECT * FROM metas WHERE periodo_meta = '{$periodo_meta}' AND ano_fiscal = '{$ano_fiscal}' AND id_empresa = '{$empresa}'";
    $confere = $conn->query($sql_conferencia);
    $conferencia = mysqli_num_rows($confere);
    if ($conferencia > 0) {
      print "<script>alert('META JÁ CADASTRADA NESSE MESMO PERÍODO, VERIFIQUE E TENTE NOVAMENTE!')</script>";
      print "<script>location.href='?page=metas'</script>";
    } else {
      $res = $conn->query($sql);

      if ($res == true) {
        print "<script>alert('Meta cadastrada com sucesso!')</script>";
        print "<script>location.href='?page=metas'</script>";
      } else {
        print "<script>alert('Não foi possível cadastrar a meta!')</script>";
        print "<script>location.href='?page=metas'</script>";
      }
    }
    break;

    //editar venda
  case 'editar':
    $num_pedido = $_POST['num_pedido'];
    $num_nota_fiscal = $_POST['num_nota_fiscal'];
    $data_faturamento = $_POST['data_faturamento'];
    $data_emissao = $_POST['data_emissao'];
    $nome_cliente = $_POST['nome_cliente'];
    $vlr_pedido = str_replace(',', '.', $_POST['vlr_pedido']);
    $id_forma_pagamento = $_POST['id_forma_pagamento'];
    $dia_vencimento = $_POST['dia_vencimento'];
    $id_vendedor = $_POST['id_vendedor'];
    $id_parceiro = $_POST['id_parceiro'];
    $forma_entrega = $_POST['forma_entrega'];

    $id_pedido = $_POST['id_pedido'];

    //sql - edita a venda
    $sql =
      "UPDATE pedido SET
          num_pedido='{$num_pedido}',
          num_nota_fiscal='{$num_nota_fiscal}',
          data_faturamento='{$data_faturamento}',
          data_emissao='{$data_emissao}',
          nome_cliente='{$nome_cliente}',
          vlr_pedido='{$vlr_pedido}',
          id_forma_pagamento='{$id_forma_pagamento}',
          dia_vencimento='{$dia_vencimento}',
          id_parceiro='{$id_parceiro}',
          forma_entrega='{$forma_entrega}',
          id_vendedor='{$id_vendedor}'
      WHERE 
          id_pedido= $id_pedido";
    $res = $conn->query($sql);

    if ($res == true) {
      print "<script>alert('Pedido editado com sucesso!')</script>";
      print "<script>location.href='?page=pedidos'</script>";
    } else {
      print "<script>alert('Não foi possível editar o pedido!')</script>";
      print "<script>location.href='?page=pedidos'</script>";
    }
    break;

  case 'excluir':

    $sql = "DELETE FROM pedido WHERE id_pedido = " . $_REQUEST["id_pedido"];
    $res = $conn->query($sql);

    if ($res == true) {
      print "<script>alert('Pedido excluído com sucesso!')</script>";
      print "<script>location.href='?page=pedidos'</script>";
    } else {
      print "<script>alert('Não foi possível excluir o pedido!')</script>";
      print "<script>location.href='?page=pedidos'</script>";
    }
    break;
}
