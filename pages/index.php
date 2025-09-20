<!DOCTYPE html>
<html lang="pt-br">
<!-- include do head -->
<?php
include "../includes/head.php";
?>

<body>
    <!-- include do header com a navbar de navegação no site -->
    <?php
    include "../includes/header.php";
    ?>
    <h1 class="text-center m-2">Ofertas Inperdiveis!</h1>
    <!-- carrosel de promoções -->
    <div id="carouselExampleIndicators" class="carousel slide p-2">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../assets/img/imagem de representação para caarrosel.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="../assets/img/imagem de representação para caarrosel.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="../assets/img/imagem de representação para caarrosel.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- container para os itens do atacado -->
    <div class="container my-4">
        <h2 class="text-center mb-4">Produtos em Destaque</h2>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
            <?php
            include "../includes/banco.php";

            $sql = "SELECT titulo, descricao, imagem FROM produtos LIMIT 4";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0">
                            <img src="<?php echo htmlspecialchars($row['imagem']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($row['titulo']); ?>">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title"><?php echo htmlspecialchars($row['titulo']); ?></h5>
                                <p class="card-text text-truncate" title="<?php echo htmlspecialchars($row['descricao']); ?>">
                                    <?php echo htmlspecialchars($row['descricao']); ?>
                                </p>
                                <a href="#" class="btn btn-outline-primary mt-auto">Ver mais</a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo '<div class="col"><div class="alert alert-warning text-center">Nenhum produto encontrado.</div></div>';
            }
            $conn->close();
            ?>
        </div>
    </div>

    <!-- include do footer -->
    <?php
    include "../includes/footer.php";
    ?>
    <!-- script das funcionalidades do boostrap -->
    <?php
    include "../includes/scriptBoostrap.php";
    ?>
</body>

</html>