<?php
// =============================================
// Página de Cadastro de Promoções - ADM
// =============================================

// Título da página
$titulo = "Gerenciar Promoções - Sistema de Vendas";

// Includes principais
include '../includes/header_adm.php';
include '../includes/banco.php';

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data_inicio = $_POST['data_inicio'];
    $data_fim = $_POST['data_fim'];

    // Diretório de destino
    $diretorio = "../uploads/promocoes/";

    // Cria o diretório se não existir
    if (!is_dir($diretorio)) {
        mkdir($diretorio, 0777, true);
    }

    // Verifica se o arquivo foi enviado
    if (isset($_FILES['cartaz']) && $_FILES['cartaz']['error'] == 0) {
        $extensao = pathinfo($_FILES['cartaz']['name'], PATHINFO_EXTENSION);
        $extensao = strtolower($extensao);

        // Extensões permitidas
        $permitidas = ['jpg', 'jpeg', 'png', 'webp'];
        if (!in_array($extensao, $permitidas)) {
            $erro = "Extensão inválida. Envie um arquivo JPG, PNG ou WEBP.";
        } else {
            // Gera nome único para o arquivo
            $nomeArquivo = "promo_" . uniqid() . "." . $extensao;
            $caminho = $diretorio . $nomeArquivo;

            // Move o arquivo para a pasta de destino
            if (move_uploaded_file($_FILES['cartaz']['tmp_name'], $caminho)) {
                // Insere no banco apenas o nome do arquivo
                $query = "INSERT INTO promocoes (cartaz, data_inicio, data_fim)
                          VALUES (?, ?, ?)";
                $stmt = mysqli_prepare($conn, $query);
                mysqli_stmt_bind_param($stmt, "sss", $nomeArquivo, $data_inicio, $data_fim);

                if (mysqli_stmt_execute($stmt)) {
                    $sucesso = "Promoção cadastrada com sucesso!";
                } else {
                    $erro = "Erro ao salvar no banco.";
                }
            } else {
                $erro = "Falha ao mover o arquivo.";
            }
        }
    } else {
        $erro = "Nenhum arquivo enviado.";
    }
}
?>



<div class="container my-5">
    <h1 class="text-center text-primary mb-4">
        <i class="fas fa-bullhorn me-2"></i>Nova Promoção
    </h1>

    <?php if (!empty($erro)): ?>
        <div class="alert alert-danger text-center"><?php echo $erro; ?></div>
    <?php elseif (!empty($sucesso)): ?>
        <div class="alert alert-success text-center"><?php echo $sucesso; ?></div>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data" class="card shadow p-4 mx-auto" style="max-width: 600px;">
        <div class="mb-3">
            <label class="form-label fw-bold">Cartaz da Promoção</label>
            <input type="file" name="cartaz" class="form-control" required>
            <small class="text-muted">
                Extensões permitidas: JPG, PNG, WEBP.  
                Proporção ideal: **1080x1080 px**.
            </small>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Data de Início</label>
                <input type="date" name="data_inicio" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Data de Fim</label>
                <input type="date" name="data_fim" class="form-control" required>
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success px-4">
                <i class="fas fa-save me-1"></i> Salvar Promoção
            </button>
        </div>
    </form>
</div>

<?php include '../includes/scriptBootstrap.php'; ?>
