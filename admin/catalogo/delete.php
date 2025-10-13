<?php
session_start();
include "../../includes/banco.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id'] ?? 0);

    // --- busca o produto ---
    $stmtBusca = $conn->prepare("SELECT imagem FROM produtos WHERE id = ?");
    $stmtBusca->bind_param("i", $id);
    $stmtBusca->execute();
    $resultado = $stmtBusca->get_result();

    if ($resultado->num_rows === 0) {
        $stmtBusca->close();
        die("<script>alert('Produto não encontrado!'); window.location.href='index.php';</script>");
    }

    $produto = $resultado->fetch_assoc();
    $imagem = $produto['imagem'];
    $stmtBusca->close();

    // --- deleta o produto ---
    $stmtDel = $conn->prepare("DELETE FROM produtos WHERE id = ?");
    $stmtDel->bind_param("i", $id);

    if ($stmtDel->execute()) {
        // apaga imagem se existir
        if (!empty($imagem) && file_exists($imagem)) {
            unlink($imagem);
        }
        echo "<script>
            alert('Produto excluído com sucesso!');
            window.location.href = 'index.php';
            </script>";
    } else {
        echo "<script>
            alert('Erro ao excluir produto: " . $stmtDel->error . "');
            window.location.href = 'index.php';
            </script>";
    }

    $stmtDel->close();
} else {
    echo "<h3>Método de requisição inválido.</h3>";
}

$conn->close();
?>
