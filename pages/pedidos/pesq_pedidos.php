<?php

session_start();
include('../../config/db.php');

//receber a requisição da pesquisa
$requestData = $_REQUEST;

$columns = array(
  0 => 'data_emissao',
  1 => 'num_pedido',
  2 => 'data_faturamento',
  3 => 'num_nota_fiscal',
  4 => 'nome_cliente',
  5 => 'vlr_pedido',
  6 => 'desc_forma_pagamento',
  7 => 'dia_vencimento',
  8 => 'nome_vendedor',
  9 => 'nome_parceiro',
  10 => 'forma_entrega'
);

$empresa = $_SESSION['id_empresa'];

$sql_pedidos = "SELECT * FROM desc_pedido WHERE pedido.id_empresa = $empresa";

$result_pedidos = $conn->query($sql_pedidos);
$qtd_linhas = $result_pedidos->num_rows;

$sql_filtered = "SELECT * FROM desc_pedido WHERE pedido.id_empresa = $empresa AND 1=1";

if (!empty($requestData['search']['value'])) {
  $sql_filtered .= "AND ( data_emissao LIKE '" . $requestData['search']['value'] . "%'";
  $sql_filtered .= "OR num_pedido LIKE '" . $requestData['search']['value'] . "%'";
  $sql_filtered .= "OR data_faturamento LIKE '" . $requestData['search']['value'] . "%'";
  $sql_filtered .= "OR num_nota_fiscal LIKE '" . $requestData['search']['value'] . "%'";
  $sql_filtered .= "OR nome_cliente LIKE '" . $requestData['search']['value'] . "%'";
  $sql_filtered .= "OR vlr_pedido LIKE '" . $requestData['search']['value'] . "%'";
  $sql_filtered .= "OR desc_forma_pagamento LIKE '" . $requestData['search']['value'] . "%'";
  $sql_filtered .= "OR dia_vencimento LIKE '" . $requestData['search']['value'] . "%'";
  $sql_filtered .= "OR nome_vendedor LIKE '" . $requestData['search']['value'] . "%'";
  $sql_filtered .= "OR nome_parceiro LIKE '" . $requestData['search']['value'] . "%'";
  $sql_filtered .= "OR forma_entrega LIKE '" . $requestData['search']['value'] . "%')";
}

$filtered_pedidos = $conn->query($sql_filtered);
$total_filtered = $filtered_pedidos->num_rows;

$sql_filtered .= " ORDER BY " . $columns[$requestData['order'][0]['column']] . "   " . $requestData['order'][0]['dir'] . "  LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "   ";;
$resultado_pedidos = $conn->query($sql_filtered);


//ler e criar o array de dados
$dados = array();
while ($row_usuarios = mysqli_fetch_array($resultado_usuarios)) {
  $dado = array();
  $dado[] = $row_usuarios['data_emissao'];
  $dado[] = $row_usuarios['num_pedido'];
  $dado[] = $row_usuarios['data_faturamento'];
  $dado[] = $row_usuarios['num_nota_fiscal'];
  $dado[] = $row_usuarios['nome_cliente'];
  $dado[] = $row_usuarios['vlr_pedido'];
  $dado[] = $row_usuarios['desc_forma_pagamento'];
  $dado[] = $row_usuarios['dia_vencimento'];
  $dado[] = $row_usuarios['nome_vendedor'];
  $dado[] = $row_usuarios['nome_parceiro'];
  $dado[] = $row_usuarios['forma_entrega'];

  $dados[] = $dado;
};

$json_data = array(
  "draw" => intval($requestData['draw']),
  "recordsTotal" => intval($qtd_linhas),
  "recordsFiltered" => intval($total_filtered),
  "data" => $dados
);

echo $json_data;
