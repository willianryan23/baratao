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

        <!-- Título principal -->
        <h1 class="titulo text-center m-4">Ofertas Imperdíveis!</h1>

        <!-- Carrossel de promoções -->
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../assets/img/1.jpg" class="d-block w-100" alt="Promoção 1">
                </div>
                <div class="carousel-item">
                    <img src="../assets/img/2.jpg" class="d-block w-100" alt="Promoção 2">
                </div>
                <div class="carousel-item">
                    <img src="../assets/img/3.jpg" class="d-block w-100" alt="Promoção 3">
                </div>
            </div>
        </div>

        <!-- Resumo das seções principais -->
        <section class="container my-5">
            <div class="row text-center">
                <div class="col-md-3 mb-3">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title">Catálogo</h5>
                            <p class="card-text">Confira todos os nossos produtos disponíveis.</p>
                            <a href="catalogo.php" class="btn btn-primary">Ver Catálogo</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title">Promoções</h5>
                            <p class="card-text">Descontos especiais para você economizar.</p>
                            <a href="promocoes.php" class="btn btn-danger">Ver Promoções</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title">Unidades</h5>
                            <p class="card-text">Encontre a loja mais próxima de você.</p>
                            <a href="unidades.php" class="btn btn-success">Ver Unidades</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title">Sobre Nós</h5>
                            <p class="card-text">Conheça nossa história e missão.</p>
                            <a href="sobre.php" class="btn btn-secondary">Saiba Mais</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Produtos em Destaque -->
        <section class="container my-5">
            <h2 class="text-center mb-4">Produtos em Destaque</h2>
            <div class="row">
                <?php
                // Simulação - depois você pode puxar do banco
                $produtos = [
                    ["nome" => "Produto 1", "preco" => "R$ 99,90", "img" => "../assets/img/prod1.jpg"],
                    ["nome" => "Produto 2", "preco" => "R$ 79,90", "img" => "../assets/img/prod2.jpg"],
                    ["nome" => "Produto 3", "preco" => "R$ 129,90", "img" => "../assets/img/prod3.jpg"],
                    ["nome" => "Produto 4", "preco" => "R$ 59,90", "img" => "../assets/img/prod4.jpg"],
                ];

                foreach ($produtos as $p) {
                    echo '
                    <div class="col-md-3 mb-4">
                        <div class="card shadow-sm h-100">
                            <img src="'.$p["img"].'" class="card-img-top" alt="'.$p["nome"].'">
                            <div class="card-body text-center">
                                <h5 class="card-title">'.$p["nome"].'</h5>
                                <p class="card-text">'.$p["preco"].'</p>
                                <a href="catalogo.php" class="btn btn-primary">Comprar</a>
                            </div>
                        </div>
                    </div>
                    ';
                }
                ?>
            </div>
        </section>

        <!-- Mini Sobre -->
        <section class="container text-center py-5">
            <h2>Sobre Nós</h2>
            <p class="lead">Somos uma empresa dedicada a oferecer os melhores produtos com preços acessíveis. 
               Nosso compromisso é com a sua satisfação.</p>
            <a href="sobre.php" class="btn btn-outline-primary">Saiba Mais</a>
        </section>

    </main>
    <!-- fim do conteudo principal dessa página -->

    <!-- include do footer -->
    <?php include "../includes/footer.php"; ?>

    <!-- script das funcionalidades do bootstrap -->
    <?php include "../includes/scriptBoostrap.php"; ?>
</body>
</html>
