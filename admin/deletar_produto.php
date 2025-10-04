<?php
include("../includes/banco.php");

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // garante que é um número

    $sql = "DELETE FROM produtos WHERE id = $id";
    if ($conn->query($sql)) {
        echo '<script>
        alert("Produto excluído com sucesso");
        location.href = "catalogo_adm.php";
        </script>';
    } else {
        echo "Erro ao excluir produto: " . $conn->error;
    }
} else {
    echo "ID do produto não informado!";
    exit;
}
?>