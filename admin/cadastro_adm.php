<!DOCTYPE html>
<html lang="pt-br">
<?php
include "../includes/head.php"
?>

<body>


    <?php
    include "../includes/banco.php"; // conexão com o banco
    include "navbar_adm.php";        // navbar admin

    // Upload de imagens

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['adicionar'])) {

        $nome = $_POST['nome'] ?? '';
        $descricao = $_POST['descricao'] ?? '';

        // Verifica se a imagem foi enviada
        if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === 0) {
            $imagem = $_FILES['imagem']['name'];
            $caminho = "../assets/uploads/" . basename($imagem);

            if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminho)) {
                // Inserção única no banco (nome, descrição e imagem)
                $stmt = $conn->prepare("INSERT INTO produtos (nome, descricao, imagem) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $nome, $descricao, $caminho);

                if ($stmt->execute()) {
                    echo "<p class='text-success'>Produto adicionado com sucesso!</p>";
                } else {
                    echo "<p class='text-danger'>Erro ao adicionar produto: " . $stmt->error . "</p>";
                }

                $stmt->close();
            } else {
                echo "<p class='text-danger'>Erro ao fazer upload da imagem.</p>";
            }
        } else {
            echo "<p class='text-danger'>Selecione uma imagem válida.</p>";
        }
    }
    ?>
    <main class="containerMain">

        <div class="formCadastro">
            <form method='post' enctype='multipart/form-data' class="card-body bg-dark border rounded w-25 p-3 ">
                <h2 class="text-center text-white">Cadastrar Produto</h2>

                <div>
                    <label class="form-label text-white" for='nome'>Nome do alimento:</label>
                    <input class="form-control" type='text' name='nome' id='nome' required maxlength="100">
                </div>

                <div>
                    <label class="form-label text-white" for='imagem'>Imagem:</label>
                    <input class="form-control" type='file' name='imagem' id='imagem' accept='image/*' required>
                </div>

                <div>
                    <label class="form-label text-white" for='descricao'>Descrição:</label>
                    <input class="form-control" type='text' name='descricao' id='descricao' required>
                </div>

                <input class="btn btn-danger mt-3" type='submit' name='adicionar' value='Adicionar'>
            </form>
        </div>

    </main>
    <?php
    include "../includes/scriptBoostrap.php";
    include "../includes/footer.php";

    ?>

</body>

</html>