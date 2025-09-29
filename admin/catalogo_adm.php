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
<main class="containerMain">
<?php

  $sql = "SELECT * FROM produtos";
  $result = mysqli_query($conn, $sql);

  while($linha = $result->fetch_assoc()) {
    $nome = $linha["nome"];
    $imagem = $linha["imagem"];
    $descricao = $linha["descricao"];

    echo "<div class='col-md-4'>
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
            </div>";
  }
  ?>
</main>
<?php
  include "../includes/footer.php";
  include "../includes/scriptBoostrap.php";
?>