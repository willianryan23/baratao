<?php


// Define o título da página
$titulo = "Promoções - Sistema de Vendas";

// Inclui cabeçalho e conexão com o banco
include '../includes/header.php';
include '../includes/banco.php';

// Data atual
$hoje = date('Y-m-d');

// Consulta promoções ativas (entre data_inicio e data_fim)
$query = "SELECT * FROM promocoes 
          WHERE data_inicio <= '$hoje' 
          AND data_fim >= '$hoje'
          ORDER BY data_inicio DESC";

$resultado = mysqli_query($conn, $query);
?>

<?php include '../includes/navbar.php'; ?>

<div class="container my-5">
    <div class="text-center mb-5">
        <h1 class="fw-bold textoPromocao">
            <i class="fas fa-tags me-2"></i>Promoções Ativas
        </h1>
        <p class="text-muted">Aproveite as ofertas válidas até o fim do período!</p>
    </div>

    <?php if (mysqli_num_rows($resultado) > 0): ?>
        <div class="row g-4">
            <?php while ($promo = mysqli_fetch_assoc($resultado)): ?>
                <div class="col-md-4 col-sm-6">
                    <div class="card shadow-sm border-0 rounded-4 h-100 promo-card">
                        <!-- Exibe o cartaz armazenado no banco -->
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($promo['cartaz']); ?>"
                            class="card-img-top rounded-top-4 promo-img" alt="Cartaz da promoção">

                        <div class="card-body text-center">
                            <h6 class="text-success fw-bold mb-2">
                                <i class="fas fa-clock me-1"></i>
                                Válida de <?php echo date('d/m/Y', strtotime($promo['data_inicio'])); ?>
                                até <?php echo date('d/m/Y', strtotime($promo['data_fim'])); ?>
                            </h6>
                            <button class="btn btn-warning text-dark fw-bold mt-2">
                                <i class="fas fa-shopping-cart me-1"></i> Ver ofertas
                            </button>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else: ?>
        <div class="alert alert-light text-center">
            <i class="fas fa-info-circle me-2"></i>
            Nenhuma promoção ativa no momento.
        </div>
    <?php endif; ?>
</div>

<?php
include '../includes/footer.php';
include '../includes/scriptBootstrap.php';
?>