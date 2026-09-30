<?php
require_once 'conexao.php';
// Busca os usuários cadastrados
$sql_usuarios = "SELECT id_usuario, nome_usuario FROM Usuario";
$sql_pedido = "SELECT id_pedido, valor_total_pedido FROM Pedido";
$sql_produto = "SELECT id_produto, nome_produto FROM Produto";
$result_usuarios = $conn->query($sql_usuarios);
$result_pedido = $conn->query($sql_pedido);
$result_produto = $conn->query($sql_produto);
?>

<html>

<head>
    <link rel="stylesheet" href="css_index.css">
</head>

<body>
    <div class="container">
        <form>
            <div class="card">
                <h1>Usuário</h1>
                <form action="create_usuario.php" method="post">
                    Name: <input type="text" name="nome_usuario"><br>
                    Senha: <input type="text" name="senha_usuario"><br>
                    E-mail: <input type="email" name="email_usuario"><br>
                    <input type="submit">
                </form>
            </div>
            <div class="card">
                <h1>Produto</h1>
                <form action="create_produto.php" method="post" enctype="multipart/form-data">
                    Nome do produto: <input type="text" name="nome_produto"><br>
                    Preço do produto: <input type="number" name="preco_produto" step="0.01" min="0"><br>
                    Selecione imagem do produto para upload:
                    <input type="file" name="foto_produto" id="foto_produto">
                    <input type="submit" value="Upload de imagem" name="submit">
                </form>
            </div>

            <div class="card">
                <h1>Pedido</h1>
                <form action="create_pedido.php" method="post">
                    Data do pedido: <input type="datetime-local" name="data_pedido"><br>
                    Preço total do pedido: <input type="number" name="valor_total_pedido" step="0.01" min="0"><br>
                    Forma de pagamento: <input type="text" name="forma_pagamento"><br>

                    Usuário do pedido:
                    <select name="Usuario_id_usuario" required>
                        <option value="">Selecione um utilizador</option>
                        <?php
                        if ($result_usuarios && $result_usuarios->num_rows > 0) {
                            while ($user = $result_usuarios->fetch_assoc()) {
                                echo "<option value='" . $user['id_usuario'] . "'>" . $user['nome_usuario'] . "</option>";
                            }
                        } ?>
                    </select><br>
                    <input type="submit" value="Criar Pedido">
                </form>
            </div>
            <div class="card">

                <h1>Quantidade de produto por pedido</h1>
                <form action="create_quantidade_produto.php" method="post">
                    <select name="Pedido_id_pedido" required>
                        <option value="">Selecione um pedido</option>
                        <?php
                        if ($result_pedido && $result_pedido->num_rows > 0) {
                            while ($user = $result_pedido->fetch_assoc()) {
                                echo "<option value='" . $user['id_pedido'] . "'>" . $user['valor_total_pedido'] . "</option>";
                            }
                        }
                        ?>
                    </select>
                    <select name="Produto_id_produto" required>
                        <option value="">Selecione um utilizador</option>
                        <?php
                        if ($result_produto && $result_produto->num_rows > 0) {
                            while ($user = $result_produto->fetch_assoc()) {
                                echo "<option value='" . $user['id_produto'] . "'>" . $user['nome_produto'] . "</option>";
                            }
                        }
                        ?>
                    </select><br>
                    Quantidade de produto: <input type="number" name="quantidade_contem" step="0.01" min="0"><br>
                    <input type="submit">

                </form>
            </div>
</body>

</html>