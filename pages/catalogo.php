<?php
// Conexão com o banco



?>

<!DOCTYPE html>
<html lang="pt-br">
<?php include "../includes/head.php"; ?>

<body class="bg-secondary">

    <!-- Navbar -->
    <?php include "../includes/navbar.php"; ?>

    <main class="containerMain py-4">
        <div class="container">
            <h1 class="text-center text-white mb-4">Catálogo de Produtos</h1>

            <div class="row justify-content-center">
                <?php
                include "../includes/banco.php";

                // Consulta ao banco de dados
                $sql = "SELECT * FROM produtos ORDER BY nome";
                $result = $conn->query($sql);

                // Verifica se há resultados
                if ($result && $result->num_rows > 0) {
                    while ($linha = $result->fetch_assoc()) {
                        $id = $linha['id'];
                        $nome = htmlspecialchars($linha['nome']);
                        $descricao = htmlspecialchars($linha['descricao']);
                        $imagem = !empty($linha['imagem']) ? $linha['imagem'] : 'assets/uploads/default.jpg';

                        echo "
                        <div class='col-md-4 mb-4'>
                            <div class='card bg-dark text-white shadow h-100'>
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

    <!-- Rodapé -->
    <?php include "../includes/footer.php"; ?>

    <!-- Scripts Bootstrap -->
    <?php include "../includes/scriptBoostrap.php"; ?>

</body>

</html>