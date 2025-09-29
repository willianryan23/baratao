<?php
// Exemplo de produtos (poderia vir do banco de dados)
$produtos = [
    [
        "nome" => "Coca-Cola Lata 350ml",
        "preco_unit" => 3.50,
        "preco_caixa" => 40.00,
        "img" => "https://via.placeholder.com/300x200?text=Coca-Cola"
    ],
    [
        "nome" => "Arroz 5kg",
        "preco_unit" => 25.00,
        "preco_caixa" => 240.00,
        "img" => "https://via.placeholder.com/300x200?text=Arroz"
    ],
    [
        "nome" => "Detergente 500ml",
        "preco_unit" => 2.20,
        "preco_caixa" => 22.00,
        "img" => "https://via.placeholder.com/300x200?text=Detergente"
    ]
];
?>



<!DOCTYPE html>
<html lang="pt-br">
<?php
include "../includes/head.php"
?>

<body>
    <!-- inicio da navbar -->
    <?php
    include "../includes/navbar.php"
    ?>
    <!-- inicio da navbar -->

    <!-- div do conteudo principal da página -->
    <main class="containerMain">

        <div class="container mt-4">
            <div class="row">
                <?php foreach ($produtos as $p): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <img src="<?= $p['img']; ?>" class="card-img-top" alt="<?= $p['nome']; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= $p['nome']; ?></h5>
                                <p class="card-text">
                                    <strong>Preço Unitário:</strong> R$ <?= number_format($p['preco_unit'], 2, ',', '.'); ?><br>
                                    <strong>Preço Caixa:</strong> R$ <?= number_format($p['preco_caixa'], 2, ',', '.'); ?>
                                </p>
                                <a href="#" class="btn btn-success w-100">Adicionar ao Orçamento</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>




        <div class="container">

            <div class="row">



            </div>

        </div>





        <div class='card mb-3'>
            <img src='$imagem' class='card-img-top' alt='$nome' style='width: 300px;  height: 275px; object-fit: cover; margin: auto;'>
            <div class='card-body'>
                <h5 class='card-title'>$nome</h5>
                <p class='card-text'>Descrição: $descricao</p>
                <div class='d-flex justify-content-between'>
                    <div>
                        <a href='#' class='btn btn-editar'>Editar</a>
                    </div>
                </div>
            </div>
        </div>
        </div>;

    </main>


    <!-- footer da página -->
    <?php
    include "../includes/footer.php"
    ?>
    <!-- script de funcionalidades do boostrap -->
    <?php
    include "../includes/scriptBoostrap.php"
    ?>
</body>

</html>