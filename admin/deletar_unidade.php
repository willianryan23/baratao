<?php
include "../includes/banco.php";

if (!isset($_GET['id'])) {
    die("ID da unidade não informado.");
}

$id = intval($_GET['id']);

$sql = "DELETE FROM unidades WHERE id = $id";

if ($conn->query($sql)) {
    echo "<script>alert('Unidade excluída com sucesso!'); location.href='unidades_adm.php';</script>";
} else {
    echo "Erro ao excluir: " . $conn->error;
}
?>
