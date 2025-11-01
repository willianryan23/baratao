<?php
include '../admin/navbar_adm.php';
include '../includes/banco.php';

// Verifica se o id foi passado
$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: painel_promocoes.php');
    exit;
}

// Busca o registro para pegar o caminho da imagem
$query = "SELECT cartaz FROM promocoes WHERE id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$promo = mysqli_fetch_assoc($result);

if (!$promo) {
    echo "<div class='alert alert-danger'>Promoção não encontrada.</div>";
    exit;
}

$caminho_img = $promo['cartaz'];

// Deleta o registro do banco
$query_delete = "DELETE FROM promocoes WHERE id = ?";
$stmt_delete = mysqli_prepare($conn, $query_delete);
mysqli_stmt_bind_param($stmt_delete, "i", $id);

if (mysqli_stmt_execute($stmt_delete)) {
    // Remove o arquivo da imagem se existir
    if (file_exists($caminho_img)) {
        unlink($caminho_img);
    }
    // Redireciona para o painel com sucesso
    header('Location: promocoes_adm.php?msg=deletado');
    exit;
} else {
    echo "<div class='alert alert-danger'>Erro ao deletar a promoção.</div>";
}
?>
