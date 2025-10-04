<?php
include "../includes/banco.php"; // conexão com o banco

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Recebe os dados do formulário
    $nome = $_POST['nome'] ?? '';
    $descricao = $_POST['descricao'] ?? '';

    // Verifica se enviou imagem
    $imagem = null;
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === 0) {
        $imagem = addslashes(file_get_contents($_FILES['imagem']['tmp_name']));
    }

    // Query para inserir no banco
    $sql = "INSERT INTO produtos (nome, imagem, descricao) VALUES ('$nome', '$imagem', '$descricao')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Produto cadastrado com sucesso!'); window.location.href='cadastro_adm.php';</script>";
    } else {
        echo "Erro ao cadastrar produto: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<?php
include("../includes/head.php")
?>

<body>
    <?php
    //navbar
    include("navbar_adm.php")
    ?>

    <!-- container principal que deixa o conteudo ao centro e com bordas das laterais -->
    <main class="containerMain">
        <div class="container py-5">
            <h1 class="text-center mb-4">Cadastro de Produto</h1>

            <form method="post" enctype="multipart/form-data" class="card p-4 shadow-sm bg-dark" autocomplete="off">
                <div class="mb-3">
                    <label class="form-label text-white">Nome do Produto</label>
                    <input type="text" name="nome" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label text-white">Imagem</label>
                    <input type="file" name="imagem" accept="image/*" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label text-white">Descrição</label>
                    <textarea name="descricao" class="form-control" rows="4" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary w-100">Cadastrar</button>
            </form>
        </div>
    </main>

<?php 
    include("../includes/scriptBoostrap.php")
?>
</body>

</html>