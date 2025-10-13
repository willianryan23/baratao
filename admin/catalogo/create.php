<?php
include "../../includes/banco.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $imagem = $_FILES['imagem']['name'];
    $caminho = "../../assets/uploads/" . $imagem;
    $descricao = mysqli_real_escape_string($conn, $_POST['descricao']);

    // Move o arquivo e insere no banco
    if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminho)) {

        $stmt = $conn->prepare("INSERT INTO produtos (nome, imagem, descricao) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nome, $caminho, $descricao);
        $stmt->execute();
        $stmt->close();
        
        echo "<script>alert('Produto cadastrado com sucesso!'); window.location.href='index.php';</script>";
        exit();
    } else {
        echo "Erro ao fazer upload da imagem.";
    }
}
?>