<?php
include "../includes/banco.php";
$query = "SELECT * FROM unidades";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="pt-br">
<?php
include "../includes/header.php";
include "../includes/navbar.php";
?>

<head>
    <link rel="stylesheet" href="../assets/css/unidades.css">
</head>

<body>
<main class="container py-4">
    <section class="unidades-section card">
        <div class="container-unidades">

            <!-- MAPA -->
            <div class="mapa-container">
                <iframe class="mapa-iframe"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15864.770126881536!2d-42.698683907882995!3d-6.2383360688307725!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7852842f8a1eded%3A0x3da7aa224258bf82!2zUmVnZW5lcmHDp8OjbywgU3RhdGUgb2YgUGlhdcOtLCA2NDQ5MC0wMDA!5e0!3m2!1sen!2sbr!4v1761998622722!5m2!1sen!2sbr"
                    allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

            <!-- LISTA DE LOJAS -->
            <div class="lojas-container">
                <?php while ($loja = mysqli_fetch_assoc($result)): ?>
                    <div class="loja-card">
                        <div class="loja-img m-1">
                            <img src="data:image/jpeg;base64,<?php echo base64_encode($loja['imagem']); ?>" alt="Imagem da loja">
                        </div>
                        <div class="loja-info">
                            <h5 class="mb-1 tituloLoja"><?php echo htmlspecialchars($loja['nome']); ?></h5>
                            <p class="mb-1 small text-muted"><?php echo htmlspecialchars($loja['endereço']); ?></p>
                            <p class="mb-2 small">Representante: <?php echo htmlspecialchars($loja['representante']); ?></p>
                            <button class="btn btn-primary btn-sm w-100"
                                data-bs-toggle="modal"
                                data-bs-target="#modal<?php echo $loja['id']; ?>" id="botaoInfo">
                                Mais informações
                            </button>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="modal<?php echo $loja['id']; ?>" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><?php echo htmlspecialchars($loja['nome']); ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <img src="data:image/jpeg;base64,<?php echo base64_encode($loja['imagem']); ?>" class="img-fluid rounded mb-3">
                                    <p><strong>Endereço:</strong> <?php echo htmlspecialchars($loja['endereço']); ?></p>
                                    <p><strong>Email:</strong> <?php echo htmlspecialchars($loja['email']); ?></p>
                                    <p><strong>Telefone:</strong> <?php echo htmlspecialchars($loja['número']); ?></p>
                                    <p><strong>Representante:</strong> <?php echo htmlspecialchars($loja['representante']); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endwhile; ?>
            </div>
        </div>
    </section>
</main>
    <?php
    include "../includes/footer.php";
    include "/baratao/includes/scriptBootstrap.php";
    ?>
</body>

</html>