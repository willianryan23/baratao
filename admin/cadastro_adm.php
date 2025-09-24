<!DOCTYPE html>
<html lang="en">
<?php 
    include "../includes/head.php"
?>

<body>
    <?php
    //processa o envio de imagens do formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome_equipamento']);
    $imagem = $_FILES['imagem']['name'];
    $caminho = "uploads/" . $imagem;

    // Cria a pasta uploads se não existir
    @mkdir("uploads");

    // Move o arquivo e insere no banco
    if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminho)) {
        $conexao->query("INSERT INTO equipamentos (nome_equipamento, imagem) VALUES ('$nome_equipamento', '$caminho')");
        header("Location: index.php");
        exit();
    } else {
        echo "Erro ao fazer upload da imagem.";
    }
}

    // Adiciona produto se o formulário for enviado
    if (isset($_POST['adicionar'])) { // Verifica se o formulário de adicionar foi enviado
        $nome = $_POST['nome']; // Pega o preço do produto do formulário
        $descricao = $_POST['descricao']; // Pega a descrição do produto do formulário

        $sql_insert = "INSERT INTO produtos (nomw, descricao) VALUES ('$nome', '$descricao')"; // Monta o comando SQL para inserir o produto
        $conexao->query($sql_insert); // Executa o comando SQL no banco de dados
    } 
    include "../includes/banco.php";
    include "navbar_adm.php"; // Importa o arquivo que faz a conexão com o banco de dados
    ?>

    <!-- Formulário para adicionar produto -->
   <form action='' method='post' enctype='multipart/form-data'>
        <h2>cadastrar alimento</h2>
        <div>
            <label for='nome_equipamento'>Nome do alimento:</label><br>
            <input type='text' name='nome' id='nome' required><br>
        </div>
        <div>
            <label for='imagem'>Imagem:</label><br>
            <input type='file' name='imagem' id='imagem' accept='image/*' required><br>
        </div>
        <div>
            <label for='descricao'>Descrição:</label><br>
            <input type='text' name='descricao' id='descricao' required><br>
        </div>
        <input type='submit' value='Adicionar'>
    </form>
<?php 
    include "../includes/scriptBoostrap.php";
    include "../includes/footer.php";

?>

</body>

</html>