<!DOCTYPE html>
<html lang="pt-br">
<?php
include "../includes/head.php";
?>

<body>
    <!-- inicio da navbar -->
    <?php
    include "../includes/navbar.php";
    ?>
    <!-- fim da navbar -->

    <main class="containerMain">
        <!-- container da tela com o maps e as lojas -->
        <div class="container locUnidades">
            <h2 class="text-center">Nossas Lojas</h2>
            <div class="row g-3">
                <!-- Mapa Google -->
                <div class="col-12 col-sm-8 border rounded">
                    <br>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7932.469789887651!2d-42.691086091308584!3d-6.232735075884415!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-BR!2sbr!4v1758411436307!5m2!1spt-BR!2sbr"
                        width="100%"
                        height="450"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>

                <!-- Cards laterais com imagens das unidades próximas de você -->
                <div class="col-12 col-sm-4 border rounded" style="max-height: 480px; overflow-y: auto; padding: 0.5rem;">
                    <!-- Card 0 -->
                    <div class="card mb-2">
                        <div class="d-flex align-items-center p-2">
                            <img src="../assets/img/Empório Atacadista.jpeg"
                                class="img-fluid"
                                alt="Empório Atacadista"
                                style="width: 80px; height: 80px; object-fit:cover;">
                            <div class="ms-3 flex-grow-1">
                                <h5 class="card-title mb-2">Empório Atacadista</h5>
                                <!-- =================================
                                MODAL DE INFORMAÇÃO DE CADA UNIDADE
                                =====================================-->
                                <!-- botão que dispara o Modal -->
                                <button type="button" class="btn btn-primary w-100 linkNavegacao" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Informações Desta Loja
                                </button>
                                <!-- Scrollable modal -->
                                <div class="modal-dialog modal-dialog-scrollable">
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Empório Atacadista</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- imagem da lojá correspondente -->
                                                    <img src="" class="d-block w-100" alt="Imagem da Loja">
                                                    <p><strong>Endereço:</strong> Endereço - Piauí</p>
                                                    <p><strong>Telefone:</strong> (00) 00000-0000</p>
                                                    <p><strong>Horário de Funcionamento:</strong><br>
                                                        Segunda a Sábado: 8h às 18h<br>
                                                        Domingo: 8h às 12h
                                                    </p>
                                                    <p><strong>Serviços:</strong></p>
                                                    <ul>
                                                        <li>Venda no atacado e varejo</li>
                                                        <li>Entrega para comércios</li>
                                                        <li>Programa de fidelidade</li>
                                                    </ul>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                                    <a href="https://maps.app.goo.gl/zGFPnYsKArqqoQnh8" target="_blank" class="btn btn-primary"><i class="fa-solid fa-location-dot"></i>  Ir Até a Loja</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card 1 -->
                    <div class="card mb-2">
                        <div class="d-flex align-items-center p-2">
                            <img src="../assets/img/Empório Pharma.jpeg"
                                class="img-fluid"
                                style="width:80px; height:80px; object-fit:cover;"
                                alt="Empório Pharma">
                            <div class="ms-3 flex-grow-1">
                                <h5 class="card-title mb-2">Empório Pharma</h5>
                                <a href="#" class="btn btn-primary w-100 linkNavegacao" target="_blank">Ir até essa Loja</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card 2 -->
                    <div class="card mb-2">
                        <div class="d-flex align-items-center p-2">
                            <img src="../assets/img/Empório Gás.jpeg"
                                class="img-fluid"
                                style="width:80px; height:80px; object-fit:cover;"
                                alt="Empório Gás">
                            <div class="ms-3 flex-grow-1">
                                <h5 class="card-title mb-2">Empório Gás</h5>
                                <a href="#" class="btn btn-primary w-100 linkNavegacao" target="_blank">Ir até essa Loja</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card 3 -->
                    <div class="card mb-2">
                        <div class="d-flex align-items-center p-2">
                            <img src="../assets/img/Empório Solar.jpeg"
                                class="img-fluid"
                                style="width:80px; height:80px; object-fit:cover;"
                                alt="Empório Solar">
                            <div class="ms-3 flex-grow-1">
                                <h5 class="card-title mb-2">Empório Solar</h5>
                                <a href="#" class="btn btn-primary w-100 linkNavegacao" target="_blank">Ir até essa Loja</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card 4 -->
                    <div class="card mb-2">
                        <div class="d-flex align-items-center p-2">
                            <img src="../assets/img/Empório Baratão.jpeg"
                                class="img-fluid"
                                style="width:80px; height:80px; object-fit:cover;"
                                alt="Empório Baratão">
                            <div class="ms-3 flex-grow-1">
                                <h5 class="card-title mb-2">Empório Baratão</h5>
                                <a href="#" class="btn btn-primary w-100 linkNavegacao" target="_blank">Ir até essa Loja</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card 5 -->
                    <div class="card mb-2">
                        <div class="d-flex align-items-center p-2">
                            <img src="../assets/img/Empório Construção.jpeg"
                                class="img-fluid"
                                style="width:80px; height:80px; object-fit:cover;"
                                alt="Empório Construção">
                            <div class="ms-3 flex-grow-1">
                                <h5 class="card-title mb-2">Empório Construção</h5>
                                <a href="#" class="btn btn-primary w-100 linkNavegacao" target="_blank">Ir até essa Loja</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card 6 -->
                    <div class="card mb-2">
                        <div class="d-flex align-items-center p-2">
                            <img src="../assets/img/Mini Empório Baratão.jpeg"
                                class="img-fluid"
                                style="width:80px; height:80px; object-fit:cover;"
                                alt="Mini Empório Baratão">
                            <div class="ms-3 flex-grow-1">
                                <h5 class="card-title mb-2">Mini Empório Baratão</h5>
                                <a href="#" class="btn btn-primary w-100 linkNavegacao" target="_blank">Ir até essa Loja</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- footer da página -->
    <?php
    include "../includes/footer.php";
    ?>
    <!-- script de funcionalidades do bootstrap -->
    <?php
    include "../includes/scriptBoostrap.php";
    ?>
</body>

</html>