<!DOCTYPE html>
<html lang="en">
    <?php 
        include "../includes/head.php"
    ?>
<body>
<?php
include "../includes/banco.php"; // conexão com o banco
include "navbar_adm.php";        // navbar admin

// Upload de imagens

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['imagem'])) {
    $nome = $_POST['nome'] ?? '';
    $imagem = $_FILES['imagem']['name'] ?? '';
    $caminho = "../assets/uploads/" . basename($imagem);

    // Move o arquivo
    if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminho)) {
        // Usando instrução preparada para evitar SQL Injection
        $stmt = $conn->prepare("INSERT INTO produtos (nome, imagem) VALUES (?, ?)");
        $stmt->bind_param("ss", $nome, $caminho);
        $stmt->execute();
        $stmt->close();
    } else {
        echo "Erro ao fazer upload da imagem.";
    }
}

// =======================
// Inserir produto
// =======================
if (isset($_POST['adicionar'])) {
    $nome = $_POST['nome'] ?? '';
    $descricao = $_POST['descricao'] ?? '';

    // Usando instrução preparada
    $stmt = $conn->prepare("INSERT INTO produtos (nome, descricao) VALUES (?, ?)");
    $stmt->bind_param("ss", $nome, $descricao);
    $stmt->execute();
    $stmt->close();
}
?>
<main class="containerMain">


    <!-- Formulário para adicionar produto -->
   <form action='' method='post' enctype='multipart/form-data'>
        <h2>cadastrar alimento</h2>
        <div>
            <label for='nome_equipamento'>Nome do alimento:</label><br>
            <input type='text' name='nome' id='nome' required><br>
        </div>
        <div>
            <label for='imagem'>Imagem:</label><br>
            <input type='file' name='imagem' id='imagem' accept='image/*' required><br>
        </div>
        <div>
            <label for='descricao'>Descrição:</label><br>
            <input type='text' name='descricao' id='descricao' required><br>
        </div>
        <input type='submit' name='adicionar' value='Adicionar'>
    </form>
    
<?php 
    include "../includes/scriptBoostrap.php";
    include "../includes/footer.php";

?>

</body>

</html>