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
    <h1 class="text-center m-2">Veja as nossas ofertas </h1>
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

    <!-- container flex para os itens do atacado -->
    <div class="container border">
        <!-- container por card de produto -->
        <div class="container">
            <div class="row row-cols-2">
                <?php
                // Inclui o arquivo de conexão
                include "../includes/banco.php";

                // Consulta dos produtos
                $sql = "SELECT titulo, descricao, imagem FROM produtos LIMIT 4";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <div class="col">
                            <div class="card" style="width: 18rem;">
                                <img src="<?php echo htmlspecialchars($row['imagem']); ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo htmlspecialchars($row['titulo']); ?></h5>
                                    <p class="card-text"><?php echo htmlspecialchars($row['descricao']); ?></p>
                                    <a href="#" class="btn btn-primary">Ver mais</a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "<p>Nenhum produto encontrado.</p>";
                }
                $conn->close();
                ?>
            </div>
        </div>
    </div>

    <!-- script das funcionalidades do boostrap -->
    <?php
    include "../includes/scriptBoostrap.php";
    ?>
</body>

</html>
