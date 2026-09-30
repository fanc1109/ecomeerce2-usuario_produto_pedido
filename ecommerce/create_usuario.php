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
$sql = "INSERT INTO usuario (nome_usuario, senha_usuario, email_usuario) VALUES (? , ?, ?)";

// Prepare the SQL query template
if($stmt = $conn->prepare($sql)) {
  // Bind parameters
  $stmt->bind_param("sss", $nome_usuario, $senha_usuario, $email_usuario);

  $nome_usuario =  $_REQUEST["nome_usuario"];
  $senha_usuario = $_REQUEST["senha_usuario"];
  $email_usuario = $_REQUEST["email_usuario"];
  $stmt->execute();

  /* Set parameters and execute
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
  $stmt->execute();*/
  echo "Novo insert de usuário criado com sucesso";

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


$stmt->close();
$conn->close();
?>