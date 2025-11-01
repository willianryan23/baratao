<?php
include '../includes/header_adm.php';
include '../includes/banco.php';
include '../admin/navbar_adm.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: painel_promocoes.php'); // redireciona se não tiver id
    exit;
}

$mensagem = "";

// Busca dados atuais da promoção
$query = "SELECT * FROM promocoes WHERE id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$promo = mysqli_fetch_assoc($result);

if (!$promo) {
    echo "<div class='alert alert-danger'>Promoção não encontrada.</div>";
    exit;
}

$pasta_destino = "../uploads/promocoes/";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data_inicio = $_POST['data_inicio'];
    $data_fim = $_POST['data_fim'];

    $novo_caminho = $promo['cartaz']; // mantém a imagem antiga se não trocar

    // Se enviou nova imagem
    if (isset($_FILES['cartaz']) && $_FILES['cartaz']['error'] === UPLOAD_ERR_OK) {
        $extensao = strtolower(pathinfo($_FILES['cartaz']['name'], PATHINFO_EXTENSION));
        $permitidos = ['jpg', 'jpeg', 'png', 'webp'];

        if (in_array($extensao, $permitidos)) {
            $novo_nome = uniqid('promo_', true) . '.' . $extensao;
            $caminho_arquivo = $pasta_destino . $novo_nome;

            if (move_uploaded_file($_FILES['cartaz']['tmp_name'], $caminho_arquivo)) {
                // Apaga imagem antiga se existir
                if (file_exists($promo['cartaz'])) {
                    unlink($promo['cartaz']);
                }
                $novo_caminho = $caminho_arquivo;
            } else {
                $mensagem = "<div class='alert alert-danger'>Erro ao mover o arquivo.</div>";
            }
        } else {
            $mensagem = "<div class='alert alert-warning'>Formato inválido. Use apenas JPG, PNG ou WEBP.</div>";
        }
    }

    if (empty($mensagem)) {
        $query = "UPDATE promocoes SET cartaz = ?, data_inicio = ?, data_fim = ? WHERE id = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "sssi", $novo_caminho, $data_inicio, $data_fim, $id);

        if (mysqli_stmt_execute($stmt)) {
            $mensagem = "<div class='alert alert-success'>Promoção atualizada com sucesso!</div>";
            // Atualiza os dados para o formulário
            $promo['cartaz'] = $novo_caminho;
            $promo['data_inicio'] = $data_inicio;
            $promo['data_fim'] = $data_fim;
        } else {
            $mensagem = "<div class='alert alert-danger'>Erro ao atualizar no banco.</div>";
        }
    }
}
?>

<div class="container my-5">
    <h2 class="text-center fw-bold mb-4">Editar Promoção</h2>

    <?= $mensagem ?>

    <form method="POST" enctype="multipart/form-data">
        <div class="mb-4 text-center">
            <img src="<?= $promo['cartaz'] ?>" alt="Cartaz atual" style="max-width: 400px; max-height: 225px; object-fit: cover;">
        </div>

        <div class="mb-4">
            <label for="cartaz" class="form-label fw-semibold">Trocar Cartaz da Promoção (opcional)</label>
            <input type="file" class="form-control" id="cartaz" name="cartaz">
            <div class="form-text">
                Extensões permitidas: <strong>JPG, PNG, WEBP</strong> — Proporção ideal: <strong>16:9 (ex: 1280×720 px)</strong>.
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <label for="data_inicio" class="form-label fw-semibold">Data de Início</label>
                <input type="date" class="form-control" id="data_inicio" name="data_inicio" required value="<?= $promo['data_inicio'] ?>">
            </div>
            <div class="col-md-6">
                <label for="data_fim" class="form-label fw-semibold">Data de Fim</label>
                <input type="date" class="form-control" id="data_fim" name="data_fim" required value="<?= $promo['data_fim'] ?>">
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary px-4 fw-bold">
                <i class="fas fa-save me-1"></i> Atualizar Promoção
            </button>
            <a href="promocoes_adm.php" class="btn btn-secondary ms-2">Cancelar</a>
        </div>
    </form>
</div>

<?php
include '../includes/footer.php';
include '../includes/scriptBootstrap.php';
?>
