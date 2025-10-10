<!DOCTYPE html>
<html lang="pt-br">
<?php
include "../../includes/head.php"
?>

<body>
  <?php
  include "../../includes/banco.php"; // conexão com o banco
  include "../navbar_adm.php";        // navbar admin
  ?>
  <main class="containerMain py-4">
    <div class="row justify-content-center">

      <?php

      $sql = "SELECT * FROM produtos";
      $result = mysqli_query($conn, $sql);

      while ($linha = $result->fetch_assoc()) {
        $id = $linha['id'];
        $nome = htmlspecialchars($linha['nome']);
        $descricao = htmlspecialchars($linha['descricao']);

        // Verifica se há imagem no banco
        if (!empty($linha['imagem'])) {
          // Converte o BLOB para Base64
          $imagem = 'data:image/jpeg;base64,' . base64_encode($linha['imagem']);
        } else {
          // Caso não tenha imagem, mostra uma padrão
          $imagem = '../../assets/uploads/default.jpg';
        }

        echo "
          <div class='col-md-4 mb-4'>
              <div class='card cartao bg-dark text-white shadow h-100'>
                  <img src='$imagem' class='card-img-top' alt='$nome' style='object-fit: cover; height: 200px;'>
                  <div class='card-body d-flex flex-column'>
                  <h5 class='card-title'>$nome</h5>
                  <p class='card-text'>$descricao</p>
                  <div class=\"d-flex justify-content-center gap-4\">
                  <a href='editar_produto.php?id=$id' class='btn btn-warning mt-auto'>Editar Produto</a>
                  <a href='deletar_produto.php?id=$id' class='btn btn-danger mt-auto' onclick=\"return confirm('Deseja Realmente Excluir Este Item?')\">Deletar Produto</a>
                  </div>
                  </div>
                  </div>
                  </div>
                  ";
      }
      ?>
    </div>

    <div>
      <?php

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
    </div>
  </main>
  <?php
  include "../../includes/scriptBoostrap.php";
  ?>