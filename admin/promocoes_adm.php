<?php
// =============================================
// Painel Administrativo - Cadastrar Promoções
// =============================================
include '../includes/header_adm.php';
include '../includes/banco.php';
include '../includes/navbar.php';

$mensagem = "";

// Caminho da pasta de destino das imagens
$pasta_destino = "../uploads/promocoes/";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data_inicio = $_POST['data_inicio'];
    $data_fim = $_POST['data_fim'];

    if (isset($_FILES['cartaz']) && $_FILES['cartaz']['error'] === UPLOAD_ERR_OK) {
        $extensao = strtolower(pathinfo($_FILES['cartaz']['name'], PATHINFO_EXTENSION));
        $permitidos = ['jpg', 'jpeg', 'png', 'webp'];

        if (in_array($extensao, $permitidos)) {
            // Cria nome único para o arquivo
            $novo_nome = uniqid('promo_', true) . '.' . $extensao;
            $caminho_arquivo = $pasta_destino . $novo_nome;

            // Move o arquivo para a pasta uploads/promocoes
            if (move_uploaded_file($_FILES['cartaz']['tmp_name'], $caminho_arquivo)) {
                // Salva o caminho e as datas no banco
                $query = "INSERT INTO promocoes (cartaz, data_inicio, data_fim) VALUES (?, ?, ?)";
                $stmt = mysqli_prepare($conn, $query);
                mysqli_stmt_bind_param($stmt, "sss", $caminho_arquivo, $data_inicio, $data_fim);

                if (mysqli_stmt_execute($stmt)) {
                    $mensagem = "<div class='alert alert-success'>Promoção cadastrada com sucesso!</div>";
                } else {
                    $mensagem = "<div class='alert alert-danger'>Erro ao salvar no banco.</div>";
                }
            } else {
                $mensagem = "<div class='alert alert-danger'>Erro ao mover o arquivo.</div>";
            }
        } else {
            $mensagem = "<div class='alert alert-warning'>Formato inválido. Use apenas JPG, PNG ou WEBP.</div>";
        }
    } else {
        $mensagem = "<div class='alert alert-danger'>Envie um cartaz válido.</div>";
    }
}
?>

<div class="container my-5">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">
            <h2 class="text-center text-primary fw-bold mb-4">
                <i class="fas fa-upload me-2"></i>Cadastro de Promoção
            </h2>

            <?= $mensagem ?>

            <form method="POST" enctype="multipart/form-data">
                <div class="mb-4">
                    <label for="cartaz" class="form-label fw-semibold">Cartaz da Promoção</label>
                    <input type="file" class="form-control" id="cartaz" name="cartaz" required>
                    <div class="form-text">
                        Extensões permitidas: <strong>JPG, PNG, WEBP</strong> — Proporção ideal:
                        <strong>16:9 (ex: 1280×720 px)</strong> para melhor exibição.
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="data_inicio" class="form-label fw-semibold">Data de Início</label>
                        <input type="date" class="form-control" id="data_inicio" name="data_inicio" required>
                    </div>
                    <div class="col-md-6">
                        <label for="data_fim" class="form-label fw-semibold">Data de Fim</label>
                        <input type="date" class="form-control" id="data_fim" name="data_fim" required>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success px-4 fw-bold">
                        <i class="fas fa-check-circle me-1"></i>Salvar Promoção
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="mt-5">
        <h4 class="fw-bold text-secondary mb-3">
            <i class="fas fa-images me-2"></i>Promoções Cadastradas
        </h4>
        <div class="row g-3">
            <?php
            $promos = mysqli_query($conn, "SELECT * FROM promocoes ORDER BY id DESC");
            if (mysqli_num_rows($promos) > 0) {
                while ($promo = mysqli_fetch_assoc($promos)) {
                    echo "
                    <div class='col-md-4'>
                        <div class='card border-0 shadow-sm rounded-3'>
                            <img src='{$promo['cartaz']}' class='card-img-top rounded-top-3' alt='Cartaz da Promoção'>
                            <div class='card-body text-center'>
                                <small class='text-muted'>
                                    Válida de " . date('d/m/Y', strtotime($promo['data_inicio'])) . "
                                    até " . date('d/m/Y', strtotime($promo['data_fim'])) . "
                                </small>
                            </div>
                        </div>
                    </div>";
                }
            } else {
                echo "<div class='alert alert-light text-center'>Nenhuma promoção cadastrada ainda.</div>";
            }
            ?>
        </div>
    </div>
</div>

<style>
.card img {
    height: 220px;
    object-fit: cover;
}
</style>

<?php
include '../includes/footer.php';
include '../includes/scriptBootstrap.php';
?>
