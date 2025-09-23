<?php
include("banco.php");
include("banco.php"); // Importa o arquivo que faz a conexão com o banco de dados

// Adiciona produto se o formulário for enviado
if (isset($_POST['adicionar'])) { // Verifica se o formulário de adicionar foi enviado
    $descricao = $_POST['descricao']; // Pega a descrição do produto do formulário
    $preco = $_POST['preco']; // Pega o preço do produto do formulário
    $estoque = $_POST['estoque']; // Pega o estoque do produto do formulário
    $informacoes = $_POST['informacoes']; // Pega informações adicionais do produto do formulário

    $sql_insert = "INSERT INTO produtos (descricao, preco, estoque, informacoes) VALUES ('$descricao', '$preco', '$estoque', '$informacoes')"; // Monta o comando SQL para inserir o produto
    $conexao->query($sql_insert); // Executa o comando SQL no banco de dados
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
      <!-- Formulário para adicionar produto -->
    <form method="POST" action="">
        <h3>Adicionar Produto</h3>
        <label>Descrição:</label>
        <select type="text" name="descricao" required>
            <option value="areia">areia</option>
            <option value="brita">brita</option>
            <option value="cimento">cimento</option>
        </select><br>
        <label>Preço:</label>
        <input type="number" step="0.01" name="preco" required><br>
        <label>Estoque:</label>
        <input type="number" name="estoque" required><br>
        <label>Informações:</label>
        <input type="text" name="informacoes"><br>
        <button type="submit" name="adicionar">Adicionar</button>
        <select name="" id=""></select>
    </form>
</body>
</html>