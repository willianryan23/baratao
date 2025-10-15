<?php
include "../includes/header.php";
include "../includes/navbar.php";
include "../includes/banco.php";
?>

<main class="containerMain">
    <div class="container locUnidades">
        <h2 class="text-center mb-3">Nossas Lojas</h2>
        <div class="row g-3">
            <!-- Mapa -->
            <div class="col-12 col-sm-8 border rounded">
                <!-- link original do maps do iframe (https://www.google.com/maps/embed?pb=...)  -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1983.137149080189!2d-42.687020361694984!3d-6.227520932056076!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x785285f064313e9%3A0x125031625c3e9a7e!2zRW1ww7NyaW8gQmFyYXTDo28!5e0!3m2!1sen!2sbr!4v1760550904939!5m2!1sen!2sbr"
                        width="100%" height="450"
                        style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>

            <!-- Lista de lojas -->
            <div class="col-12 col-sm-4 border rounded" style="max-height:480px; overflow-y:auto; padding:0.5rem;">
                <?php
                
                $result = $conn->query("SELECT * FROM unidades ORDER BY id DESC");
                while ($loja = $result->fetch_assoc()):
                    $img = 'data:image/jpeg;base64,' . base64_encode($loja['imagem']);
                ?>
                    <div class="card mb-2">
                        <div class="d-flex align-items-center p-2">
                            <img src="<?= $img ?>"
                                 class="img-fluid"
                                 style="width:80px; height:80px; object-fit:cover;"
                                 alt="<?= htmlspecialchars($loja['nome']) ?>">
                            <div class="ms-3 flex-grow-1">
                                <h5 class="card-title mb-2"><?= htmlspecialchars($loja['nome']) ?></h5>
                                <button type="button" class="btn btn-primary w-100"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalLoja<?= $loja['id'] ?>">
                                    Informações Desta Loja
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Modal da Loja -->
                    <div class="modal fade" id="modalLoja<?= $loja['id'] ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5"><?= htmlspecialchars($loja['nome']) ?></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <img src="<?= $img ?>" class="d-block w-100 mb-3" alt="Imagem da Loja">
                                    <p><strong>Endereço:</strong> <?= htmlspecialchars($loja['endereço']) ?></p>
                                    <p><strong>Email:</strong> <?= htmlspecialchars($loja['email']) ?></p>
                                    <p><strong>Número:</strong> <?= htmlspecialchars($loja['número']) ?></p>
                                    <p><strong>Representante:</strong> <?= htmlspecialchars($loja['representante']) ?></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</main>

<?php include "../includes/footer.php"; ?>

