<?php
include "../../includes/banco.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = intval($_POST["id"]);
    $nome = trim($_POST["nome"]);
    $descricao = trim($_POST["descricao"]);

    // Verifica se um novo arquivo foi enviado
    if (!empty($_FILES["imagem"]["name"])) {
        $nomeArquivo = $_FILES["imagem"]["name"];
        $caminhoDestino = "../../uploads/" . $nomeArquivo;

        // Move o arquivo enviado
        if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $caminhoDestino)) {
            $sql = "UPDATE produtos SET nome=?, descricao=?, imagem=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssi", $nome, $descricao, $caminhoDestino, $id);
        } else {
            die("Erro ao enviar imagem.");
        }
        
    } else {
        $sql = "UPDATE produtos SET nome=?, descricao=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $nome, $descricao, $id);
    }

    if ($stmt->execute()) {
        header("Location: index.php");
        exit;
    } else {
        echo "Erro ao atualizar produto: " . $conn->error;
    }
}
?>
