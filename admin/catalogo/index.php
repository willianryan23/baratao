<?php
include "../../includes/header_adm.php";
include "../../includes/banco.php";
include "../navbar_adm.php";
session_start();
?>

<main class="containerMain">

  <!-- Botão que abre o modal de cadastro -->
  <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#cadastroProdutoModal">
    Cadastrar Produto
  </button>

  <!--========= Modal de cadastro =========-->
  <div class="modal fade" id="cadastroProdutoModal" tabindex="-1" aria-labelledby="cadastroProdutoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content bg-dark text-white">
        <div class="modal-header">
          <h5 class="modal-title" id="cadastroProdutoModalLabel">Cadastro de Produto</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="create.php" enctype="multipart/form-data" autocomplete="off">
            <div class="mb-3">
              <label class="form-label">Nome do Produto</label>
              <input type="text" name="nome" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Imagem</label>
              <input type="file" name="imagem" accept="image/*" class="form-control">
            </div>

            <div class="mb-3">
              <label class="form-label">Descrição</label>
              <textarea name="descricao" class="form-control" rows="4" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary w-100">Cadastrar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!--========= Fim do Modal de cadastro =========-->


  <!--========= Listagem dos produtos =========-->
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
    <?php
    $sql = "SELECT * FROM produtos";
    $result = mysqli_query($conn, $sql);

    while ($linha = $result->fetch_assoc()) {
      $id = $linha['id'];
      $nome = htmlspecialchars($linha['nome']);
      $descricao = htmlspecialchars($linha['descricao']);
      $imagem = htmlspecialchars($linha['imagem'] ?? 'sem-imagem.jpg');

      echo "
        <div class='col'>
          <div class='card bg-dark text-white shadow h-100'>
            <img src='$imagem' class='card-img-top' alt='$nome'
              style='object-fit: cover; height: 200px; cursor: pointer;'
              data-bs-toggle='modal' data-bs-target='#produtoModal$id'>
            <div class='card-body text-center'>
              <h5 class='card-title'>$nome</h5>
            </div>
          </div>
        </div>

        <!-- Modal individual do produto -->
        <div class='modal fade' id='produtoModal$id' tabindex='-1' aria-labelledby='produtoModalLabel$id' aria-hidden='true'>
          <div class='modal-dialog modal-lg modal-dialog-centered'>
            <div class='modal-content bg-dark text-white'>
              <div class='modal-header'>
                <h5 class='modal-title' id='produtoModalLabel$id'>$nome</h5>
                <button type='button' class='btn-close btn-close-white' data-bs-dismiss='modal' aria-label='Fechar'></button>
              </div>
              <div class='modal-body text-center'>
                <img src='$imagem' alt='$nome' class='img-fluid rounded mb-3' style='max-height: 300px; object-fit: cover;'>
                <p class='lead'>$descricao</p>
              </div>
              <div class='modal-footer d-flex justify-content-center gap-3'>
                <button class='btn btn-warning' data-bs-target='#editarModal$id' data-bs-toggle='modal'>Editar</button>
                <form method='POST' action='delete.php' onsubmit='return confirm(\"Deseja realmente excluir este item?\")'>
                  <input type='hidden' name='id' value='$id'>
                  <button type='submit' class='btn btn-danger'>Excluir</button>
                </form>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal de edição do produto -->
        <div class='modal fade' id='editarModal$id' tabindex='-1' aria-labelledby='editarModalLabel$id' aria-hidden='true'>
          <div class='modal-dialog modal-lg modal-dialog-centered'>
            <div class='modal-content bg-dark text-white'>
              <div class='modal-header'>
                <h5 class='modal-title' id='editarModalLabel$id'>Editar Produto - $nome</h5>
                <button type='button' class='btn-close btn-close-white' data-bs-dismiss='modal' aria-label='Fechar'></button>
              </div>
              <div class='modal-body'>
                <form method='POST' action='edit.php' enctype='multipart/form-data' autocomplete='off'>
                  <input type='hidden' name='id' value='$id'>

                  <div class='mb-3'>
                    <label class='form-label'>Nome do Produto</label>
                    <input type='text' name='nome' value='$nome' class='form-control' required>
                  </div>

                  <div class='mb-3'>
                    <label class='form-label'>Imagem Atual</label><br>
                    <img src='$imagem' alt='$nome' class='img-thumbnail mb-2' style='max-height: 150px;'>
                    <input type='file' name='imagem' accept='image/*' class='form-control'>
                  </div>

                  <div class='mb-3'>
                    <label class='form-label'>Descrição</label>
                    <textarea name='descricao' class='form-control' rows='4' required>$descricao</textarea>
                  </div>

                  <div class='d-flex justify-content-end'>
                    <button type='submit' class='btn btn-success'>Salvar Alterações</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      ";
    }
    ?>
  </div>
  <!--========= Fim da listagem =========-->

</main>

<?php include "../../includes/footer.php"; ?>
