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
$sql = "INSERT INTO pedido (valor_total_pedido, data_pedido, forma_pagamento, Usuario_id_usuario) VALUES (?, ?, ?, ?)";

// Prepare the SQL query template
if ($stmt = $conn->prepare($sql)) {
    // Bind parameters
    $stmt->bind_param("dssi", $valor_total_pedido, $data_pedido, $forma_pagamento, $Usuario_id_usuario);

    $valor_total_pedido = $_REQUEST["valor_total_pedido"];
    $data_pedido = $_REQUEST["data_pedido"];
    $forma_pagamento = $_REQUEST["forma_pagamento"];
    $Usuario_id_usuario = $_REQUEST["Usuario_id_usuario"];
    $stmt->execute();
    echo "Novo insert de pedido criado com sucesso";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$stmt->close();
$conn->close();
/* Set parameters and execute
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
$stmt->execute();*/
