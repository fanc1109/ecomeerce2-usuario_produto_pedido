<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommerce2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Conexão falhou: " . $conn->connect_error);
}

// SQL query template
$sql = "INSERT INTO usuario (nome_usuario, senha_usuario, email_usuario) VALUES (?, ?, ?)";

// Prepare the SQL query template
if($stmt = $conn->prepare($sql)) {
  // Bind parameters
  $stmt->bind_param("sss", $nome_usuario, $senha_usuario, $email_usuario);

  // Set parameters and execute
  $nome_usuario = "John";
  $senha_usuario = "123";
  $email_usuario = "john@example.com";
  $stmt->execute();

  $nome_usuario = "Mary";
  $senha_usuario = "456";
  $email_usuario = "mary@example.com";
  $stmt->execute();

  $nome_usuario = "Julie";
  $senha_usuario = "789";
  $email_usuario = "julie@example.com";
  $stmt->execute();
  echo "Novos inserts criados com sucesso";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$sql = "INSERT INTO produto (nome_produto, foto_produto, preco_produto) VALUES (?, ?, ?)";

// Prepare the SQL query template
if($stmt = $conn->prepare($sql)) {
  // Bind parameters
  $stmt->bind_param("ssd", $nome_produto, $foto_produto, $preco_produto);

  // Set parameters and execute
  $nome_produto = "calça";
  $foto_produto = "";
  $preco_produto = "120.00";
  $stmt->execute();

  $nome_produto = "mouse pad";
  $foto_produto = "";
  $preco_produto = "12.90";
  $stmt->execute();

  $nome_produto = "kit panelas";
  $foto_produto = "789.png";
  $preco_produto= "400.60";
  $stmt->execute();
  echo "Novos inserts criados com sucesso";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$sql = "INSERT INTO pedido (valor_total_pedido, data_pedido, forma_pagamento, Usuario_id_usuario) VALUES (?, ?, ?, ?)";

// Prepare the SQL query template
if($stmt = $conn->prepare($sql)) {
  // Bind parameters
  $stmt->bind_param("dssi", $valor_total_pedido, $data_pedido, $forma_pagamento , $Usuario_id_usuario);

  // Set parameters and execute
  $valor_total_pedido = "213.75";
  $data_pedido = "2026-09-12 00:00:00";
  $forma_pagamento = "pix";
  $Usuario_id_usuario = 1;
  $stmt->execute();

  $valor_total_pedido = "34.90";
  $data_pedido = "2026-08-14 00:00:00";
  $forma_pagamento = "cartao";
  $Usuario_id_usuario = 1;
  $stmt->execute();

  $valor_total_pedido = "220.00";
  $data_pedido = "2026-07-17 00:00:00";
  $forma_pagamento = "pix";
  $Usuario_id_usuario = 1;
  $stmt->execute();
  echo "Novos inserts criados com sucesso";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$sql = "INSERT INTO Contem (Pedido_id_pedido, Produto_id_produto, quantidade_contem) VALUES (?, ?, ?)";

// Prepare the SQL query template
if($stmt = $conn->prepare($sql)) {
  // Bind parameters
  $stmt->bind_param("iii", $Pedido_id_pedido, $Produto_id_produto, $quantidade_contem);

  // Set parameters and execute
  $Pedido_id_pedido = 1;
  $Produto_id_produto = 1;
  $quantidade_contem = 1;
  $stmt->execute();

  $Pedido_id_pedido = 2;
  $Produto_id_produto = 2;
  $quantidade_contem = 2;
  $stmt->execute();

  $Pedido_id_pedido = 3;
  $Produto_id_produto = 3;
  $quantidade_contem = 3;
  $stmt->execute();
  echo "Novos inserts criados com sucesso";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>