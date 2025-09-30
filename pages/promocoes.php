<?php
// Conexão
$pdo = new PDO("mysql:host=localhost;dbname=emporio_baratao", "root", "");

// Pega promoções (cartazes)
$sqlPromo = "SELECT * FROM promocoes WHERE CURDATE() BETWEEN data_inicio AND data_fim";
$cartazes = $pdo->query($sqlPromo)->fetchAll(PDO::FETCH_ASSOC);

// Pega produtos em promoção
$sqlProdutos = "SELECT * FROM produtos WHERE preco_caixa IS NOT NULL ORDER BY RAND() LIMIT 12";
$produtos = $pdo->query($sqlProdutos)->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<?php include "../includes/head.php"; ?>
<body>
    <?php include "../includes/navbar.php"; ?>

    <main class="container my-4">

        <?php if ($cartazes): ?>
            <div id="carouselPromo" class="carousel slide mb-5" data-bs-ride="carousel">
                <div class="carousel-inner rounded shadow-sm">
                    <?php foreach ($cartazes as $i => $c): ?>
                        <div class="carousel-item <?= $i == 0 ? 'active' : '' ?>">
                            <div class="ratio ratio-21x9">
                                <img src="data:image/jpeg;base64,<?= base64_encode($c['cartaz']); ?>" 
                                     class="d-block w-100 object-fit-cover" alt="Promoção">
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselPromo" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselPromo" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        <?php endif; ?>

        <h2 class="mb-4 text-center text-danger fw-bold">🔥 Ofertas Relâmpago</h2>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            <?php if ($produtos): ?>
                <?php foreach ($produtos as $p): ?>
                    <div class="col">
                        <div class="card h-100 shadow-sm border-danger d-flex flex-column">
                            <img src="<?= htmlspecialchars($p['imagem']); ?>" class="card-img-top" 
                                 style="height: 180px; object-fit: cover;" alt="<?= htmlspecialchars($p['nome']); ?>">
                            
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title"><?= htmlspecialchars($p['nome']); ?></h5>
                                <p class="card-text text-muted small flex-grow-1"><?= htmlspecialchars($p['descricao']); ?></p>
                                
                                <p class="mb-1">
                                    <span class="text-decoration-line-through text-muted">
                                        R$ <?= number_format($p['preco_caixa'] * 1.15, 2, ',', '.'); ?>
                                    </span>
                                </p>
                                <p class="fw-bold text-danger fs-5 mb-3">
                                    R$ <?= number_format($p['preco_caixa'], 2, ',', '.'); ?>
                                </p>
                                <a href="orcamento.php?id=<?= $p['id']; ?>" class="btn btn-danger w-100 mt-auto">
                                    Aproveitar Oferta
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <p class="alert alert-warning">Nenhuma promoção ativa no momento.</p>
                </div>
            <?php endif; ?>
        </div>
    </main>

    <?php include "../includes/footer.php"; ?>
    <?php include "../includes/scriptBoostrap.php"; ?>
</body>
</html>