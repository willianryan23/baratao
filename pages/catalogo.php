<?php
// Conexão com o banco
include "../includes/banco.php";

// Verifica se foi feita uma busca
$busca = "";
if (isset($_POST['produto']) && !empty(trim($_POST['produto']))) {
    $busca = trim($_POST['produto']);
    // Prepara a query com filtro
    $sql = "SELECT * FROM produtos 
            WHERE nome LIKE '%$busca%' 
            OR descricao LIKE '%$busca%' 
            ORDER BY nome";
} else {
    // Se não houver busca, mostra todos
    $sql = "SELECT * FROM produtos ORDER BY nome";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<?php include "../includes/head.php"; ?>

<body>
    <?php include "../includes/navbar.php"; ?>

    <main class="containerMain py-4">
        <div class="container">
            <h1 class="text-center mb-4">Catálogo de Produtos</h1>

            <!-- formulário de pesquisa -->
            <form method="post">
                <div class="container d-flex mb-4 gap-2">
                    <input type="text" class="form-control" name="produto" placeholder="Buscar Produto..." 
                        value="<?= htmlspecialchars($busca) ?>">
                    <button class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i> Buscar</button>
                </div>
            </form>

            <div class="row justify-content-center">
                <?php
                // Verifica se há resultados
                if ($result && $result->num_rows > 0) {
                    while ($linha = $result->fetch_assoc()) {
                        $id = $linha['id'];
                        $nome = htmlspecialchars($linha['nome']);
                        $descricao = htmlspecialchars($linha['descricao']);
                        $imagem = !empty($linha['imagem']) ? $linha['imagem'] : 'assets/uploads/default.jpg';

                        echo "
                        <div class='col-md-4 mb-4'>
                            <div class='card cartao bg-dark text-white shadow h-100'>
                                <img src='$imagem' class='card-img-top' alt='$nome'>
                                <div class='card-body d-flex flex-column'>
                                    <h5 class='card-title'>$nome</h5>
                                    <p class='card-text'>$descricao</p>
                                    <a href='#' class='btn btn-success mt-auto'>Ver produto</a>
                                </div>
                            </div>
                        </div>
                        ";
                    }
                } else {
                    echo "<p class='text-center text-light'>Nenhum produto encontrado.</p>";
                }
                ?>
            </div>
        </div>
    </main>

    <?php include "../includes/footer.php"; ?>
    <?php include "../includes/scriptBoostrap.php"; ?>
</body>
</html>
