<!DOCTYPE html>
<html lang="pt-br">
<!-- include do head -->
<?php 
    include "../includes/head.php";
?>

<body>
    <!-- include do header com a navbar de navegação no site -->
    <?php
    include "../includes/navbar.php";
    ?>

    <!-- conteudo principal dessa página -->
    <main class="containerMain">

    <h1 class="titulo text-center m-2">Ofertas Imperdíveis!</h1>
    <!-- carrosel de promoções -->
    <div id="carouselExampleIndicators" class="carousel slide">
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

    </div>

</main>
    <!-- fim do conteudo principal dessa página -->



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