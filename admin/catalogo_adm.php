<?php 
include "../includes/banco.php";

$sql = "SELECT * FROM produtos";
$result = mysqli_query($conn, $sql);

while($linha = $result->fetch_assoc()) {

$id = $linha["id"];
$imagem =
echo "<div class='col-md-4'>
          <div class='card mb-3'>
            <img src='$imagem' class='card-img-top' alt='$nome' style='width: 300px;  height: 275px; object-fit: cover; margin: auto;'>
            <div class='card-body'>
              <h5 class='card-title'>$nome</h5>
              <p class='card-text'>Tipo: $tipo</p>
              <div class='d-flex justify-content-between'>
              <div>
                  <a href='$link' target='_blank' class='btn btn-jogar'>Jogar</a>
                  <a href='editar_jogo.php?id=$id' class='btn btn-editar'>Editar</a>
                  <a href='index.php?apagar=$id' class='btn btn-apagar' onclick=\"return confirm('Tem certeza que deseja apagar este jogo?');\">Apagar</a>
                </div>
              </div>
            </div>
          </div>
        </div>";
}

include "../includes/footer.php";
include "../includes/scriptBoostrap.php";
?>