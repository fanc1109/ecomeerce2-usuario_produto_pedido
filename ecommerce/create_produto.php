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
$sql = "INSERT INTO produto (nome_produto, foto_produto, preco_produto) VALUES (?, ?, ?)";

// Prepare the SQL query template
if ($stmt = $conn->prepare($sql)) {
    // Bind parameters
    $stmt->bind_param("ssd", $nome_produto, $foto_produto, $preco_produto);

    $nome_produto = $_REQUEST["nome_produto"];
    $foto_produto = $_FILES['foto_produto']['name'] ?? '';
    $preco_produto = $_REQUEST["preco_produto"];
    $stmt->execute();

    /*Set parameters and execute
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
  $stmt->execute();*/
    echo "Novo insert de produto criado com sucesso";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$stmt->close();
$conn->close();
