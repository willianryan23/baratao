<?php
include "includes/header.php";
include "includes/navbar.php";
?>

<main class="containerMain">

    <!-- HERO PRINCIPAL -->
    <section class="hero-section text-white text-center d-flex align-items-center justify-content-center">
        
    </section>

    <!-- CATEGORIAS -->
    <section class="container my-5">
        <h2 class="text-center mb-4">Compre por Categoria</h2>
        <div class="d-flex flex-nowrap overflow-auto pb-3">
            <?php
            $categorias = [
                ["nome" => "Bebidas", "img" => "../assets/img/cat_bebidas.jpg"],
                ["nome" => "Açougue", "img" => "../assets/img/cat_acougue.jpg"],
                ["nome" => "Higiene", "img" => "../assets/img/cat_higiene.jpg"],
                ["nome" => "Limpeza", "img" => "../assets/img/cat_limpeza.jpg"],
                ["nome" => "Padaria", "img" => "../assets/img/cat_padaria.jpg"],
                ["nome" => "Laticínios", "img" => "../assets/img/cat_laticinios.jpg"],
            ];

            foreach ($categorias as $c) {
                echo '
                <div class="card mx-2 flex-shrink-0" style="width: 180px;">
                    <img src="'.$c["img"].'" class="card-img-top" alt="'.$c["nome"].'">
                    <div class="card-body text-center">
                        <h6 class="card-title">'.$c["nome"].'</h6>
                        <a href="catalogo.php?categoria='.urlencode($c["nome"]).'" class="btn btn-outline-primary btn-sm">Ver</a>
                    </div>
                </div>';
            }
            ?>
        </div>
    </section>

    <!-- PROMOÇÕES RELÂMPAGO -->
    <section class="container my-5">
        <h2 class="text-center mb-4 text-danger"><i class="bi bi-lightning-fill"></i> Promoções Relâmpago</h2>
        <div class="row g-3">
            <?php
            $ofertas = [
                ["nome" => "Coca-Cola 2L", "preco" => "R$ 8,99", "img" => "../assets/img/prod_coca.jpg"],
                ["nome" => "Arroz 5Kg", "preco" => "R$ 19,90", "img" => "../assets/img/prod_arroz.jpg"],
                ["nome" => "Sabonete Dove", "preco" => "R$ 3,50", "img" => "../assets/img/prod_dove.jpg"],
                ["nome" => "Queijo Mussarela 500g", "preco" => "R$ 22,90", "img" => "../assets/img/prod_queijo.jpg"],
            ];
            foreach ($ofertas as $o) {
                echo '
                <div class="col-6 col-md-3">
                    <div class="card shadow-sm h-100">
                        <img src="'.$o["img"].'" class="card-img-top" alt="'.$o["nome"].'">
                        <div class="card-body text-center">
                            <h6 class="card-title">'.$o["nome"].'</h6>
                            <p class="fw-bold text-danger">'.$o["preco"].'</p>
                            <a href="catalogo.php" class="btn btn-sm btn-danger">Aproveitar</a>
                        </div>
                    </div>
                </div>';
            }
            ?>
        </div>
    </section>

    <!-- PRODUTOS EM DESTAQUE -->
    <section class="container my-5">
        <h2 class="text-center mb-4">Produtos em Destaque</h2>
        <div class="row g-3">
            <?php
            $produtos = [
                ["nome" => "Leite Integral 1L", "preco" => "R$ 4,99", "img" => "../assets/img/prod_leite.jpg"],
                ["nome" => "Pão Francês", "preco" => "R$ 12,00/kg", "img" => "../assets/img/prod_pao.jpg"],
                ["nome" => "Detergente Ypê", "preco" => "R$ 2,49", "img" => "../assets/img/prod_detergente.jpg"],
                ["nome" => "Carne Bovina", "preco" => "R$ 29,90/kg", "img" => "../assets/img/prod_carne.jpg"],
            ];
            foreach ($produtos as $p) {
                echo '
                <div class="col-6 col-md-3">
                    <div class="card shadow-sm h-100 border-0">
                        <img src="'.$p["img"].'" class="card-img-top" alt="'.$p["nome"].'">
                        <div class="card-body text-center">
                            <h6 class="card-title">'.$p["nome"].'</h6>
                            <p class="fw-bold">'.$p["preco"].'</p>
                            <a href="catalogo.php" class="btn btn-primary btn-sm">Comprar</a>
                        </div>
                    </div>
                </div>';
            }
            ?>
        </div>
    </section>

    <!-- POR QUE COMPRAR CONOSCO -->
    <section class="bg-light py-5">
        <div class="container text-center">
            <h2 class="mb-4">Por que comprar conosco?</h2>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <i class="bi bi-truck fs-1 text-primary"></i>
                    <h5 class="mt-2">Entrega Rápida</h5>
                    <p>Receba suas compras com agilidade e segurança.</p>
                </div>
                <div class="col-md-4 mb-3">
                    <i class="bi bi-tags fs-1 text-success"></i>
                    <h5 class="mt-2">Preços Imbatíveis</h5>
                    <p>Ofertas exclusivas e descontos imperdíveis todos os dias.</p>
                </div>
                <div class="col-md-4 mb-3">
                    <i class="bi bi-shield-check fs-1 text-warning"></i>
                    <h5 class="mt-2">Compra Segura</h5>
                    <p>Ambiente 100% confiável para suas transações.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- SOBRE -->
    <section class="container text-center my-5">
        <h2>Sobre Nós</h2>
        <p class="lead">Somos o <strong>Mercado Econômico</strong>, um supermercado que oferece variedade, economia e confiança há mais de 10 anos. Nosso compromisso é proporcionar a melhor experiência de compra para nossos clientes, com produtos de qualidade e atendimento diferenciado.</p>
        <a href="sobre.php" class="btn btn-outline-primary">Saiba Mais</a>
    </section>
</main>

<?php include "includes/script.php"; ?>
<?php include "includes/footer.php"; ?>
