<!DOCTYPE html>
<html lang="pt-br">
<?php
include "../includes/head.php"
?>

<body>
  <?php
  include "../includes/banco.php"; // conexão com o banco
  include "navbar_adm.php";        // navbar admin
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
          $imagem = '../assets/uploads/default.jpg';
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

    
  </main>
  <?php
  include "../includes/scriptBoostrap.php";
  ?>