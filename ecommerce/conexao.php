<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommerce2";

// A variável deve chamar-se $conn
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>