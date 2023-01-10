<?php
session_start();

$empresa = $_SESSION['id_empresa'];

switch ($_REQUEST["acao"]) {
  case 'cadastrar':
    $num_pedido = $_POST['num_pedido'];
    $data_emissao = $_POST['data_emissao'];
    $nome_cliente = $_POST['nome_cliente'];
    $vlr_pedido = str_replace(',', '.', $_POST['vlr_pedido']);
    $id_forma_pagamento = $_POST['id_forma_pagamento'];
    $dia_vencimento = $_POST['dia_vencimento'];
    $id_vendedor = $_POST['id_vendedor'];
    $id_parceiro = $_POST['id_parceiro'];
    $forma_entrega = $_POST['forma_entrega'];

    $sql = "INSERT INTO pedido (
        num_pedido, 
        data_emissao, 
        nome_cliente, 
        vlr_pedido, 
        id_forma_pagamento, 
        dia_vencimento, 
        id_vendedor, 
        id_parceiro, 
        forma_entrega,
        id_empresa
        ) VALUES (
          '{$num_pedido}',
          '{$data_emissao}', 
          '{$nome_cliente}',
          '{$vlr_pedido}', 
          '{$id_forma_pagamento}', 
          '{$dia_vencimento}', 
          '{$id_vendedor}', 
          '{$id_parceiro}', 
          '{$forma_entrega}',
          '{$empresa}') ";
    $res = $conn->query($sql);

    if ($res == true) {
      print "<script>alert('Pedido cadastrado com sucesso!')</script>";
      print "<script>location.href='?page=pedidos&pagina=0'</script>";
    } else {
      print "<script>alert('Não foi possível cadastrar o pedido!')</script>";
      print "<script>location.href='?page=pedidos&pagina=0'</script>";
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
      print "<script>location.href='?page=pedidos&pagina=0'</script>";
    } else {
      print "<script>alert('Não foi possível editar o pedido!')</script>";
      print "<script>location.href='?page=pedidos&pagina=0'</script>";
    }
    break;

  case 'excluir':

    $sql = "DELETE FROM pedido WHERE id_pedido = " . $_REQUEST["id_pedido"];
    $res = $conn->query($sql);

    if ($res == true) {
      print "<script>alert('Pedido excluído com sucesso!')</script>";
      print "<script>location.href='?page=pedidos&pagina=0'</script>";
    } else {
      print "<script>alert('Não foi possível excluir o pedido!')</script>";
      print "<script>location.href='?page=pedidos&pagina=0'</script>";
    }
    break;
}
