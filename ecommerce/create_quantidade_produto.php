<?php
require_once 'conexao.php';

// Captura os dados enviados pelo formulário
$Pedido_id_pedido   = $_POST['Pedido_id_pedido'];
$Produto_id_produto = $_POST['Produto_id_produto'];
$quantidade_contem  = $_POST['quantidade_contem'];

// 1. Procura o Usuario_id_usuario associado a este id_pedido
$sql_user = "SELECT Usuario_id_usuario FROM pedido WHERE id_pedido = ?";
$stmt_user = $conn->prepare($sql_user);
$stmt_user->bind_param("i", $Pedido_id_pedido);
$stmt_user->execute();
$result = $stmt_user->get_result();

if ($row = $result->fetch_assoc()) {
    $id_contem = $row['Usuario_id_usuario'];

    // 2. Insere na tabela contem com as chaves estrangeiras corretas
    $sql = "INSERT INTO contem (Pedido_id_pedido, id_contem, Produto_id_produto, quantidade_contem) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiii", $Pedido_id_pedido, $id_contem, $Produto_id_produto, $quantidade_contem);

    if ($stmt->execute()) {
        echo "Quantidade do produto associada ao pedido com sucesso!";
    } else {
        echo "Erro ao inserir: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Erro: O pedido selecionado não existe na base de dados.";
}

$stmt_user->close();
$conn->close();

  /* {
    Set parameters and execute
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
  echo "Novo insert de quantidade criado com sucesso";
 else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}*/

?>