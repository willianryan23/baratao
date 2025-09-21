<!DOCTYPE html>
<html lang="en">
<?php
include "../includes/head.php"
?>

<body>
    <!-- inicio da navbar -->
    <?php
    include "../includes/navbar.php"
    ?>
    <!-- fim da navbar -->

    <main class="containerMain">

        <!-- container da tela com o maps e as lojas -->
        <div class="container">
            <h2 class="text-center">Veja as lojas mais proximas de você</h2>
            <div class="row colum-gap-1">
                <div class="col-sm-8 border rounded w-75 ">
                    <br>
                    <!-- iframe do google maps -->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7932.469789887651!2d-42.691086091308584!3d-6.232735075884415!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-BR!2sbr!4v1758411436307!5m2!1spt-BR!2sbr"
                        width="100%"
                        height="450"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>

                </div>





                <!-- cards laterais com imagens das unidades proximas de você -->
                <div class="col-sm-4 border rounded w-25"
                    style="max-height: 450px; overflow-y: auto; padding: 0.5rem;">

                    <div class="card mb-2">
                        <img src="../assets/img/logo emporio com fundo.jpg" class="card-img-top p-1" alt="imagem do Empório Baratão">
                        <div class="card-body">
                            <h5 class="card-title">Empório Atacadista</h5>
                            <a href="#" class="btn btn-primary w-100" target="_blank">Ir até essa Loja</a>
                        </div>
                    </div>

                    <div class="card mb-2">
                        <img src="../assets/img/logo emporio com fundo.jpg" class="card-img-top p-1" alt="imagem do Empório Baratão">
                        <div class="card-body">
                            <h5 class="card-title">Empório Pharma</h5>
                            <a href="#" class="btn btn-primary w-100" target="_blank">Ir até essa Loja</a>
                        </div>
                    </div>

                    <div class="card mb-2">
                        <img src="../assets/img/logo emporio com fundo.jpg" class="card-img-top p-1" alt="imagem do Empório Baratão">
                        <div class="card-body">
                            <h5 class="card-title">Empório Gás</h5>
                            <a href="#" class="btn btn-primary w-100" target="_blank">Ir até essa Loja</a>
                        </div>
                    </div>

                    <div class="card mb-2">
                        <img src="../assets/img/logo emporio com fundo.jpg" class="card-img-top p-1" alt="imagem do Empório Baratão">
                        <div class="card-body">
                            <h5 class="card-title">Empório Solar</h5>
                            <a href="#" class="btn btn-primary w-100" target="_blank">Ir até essa Loja</a>
                        </div>
                    </div>

                    <div class="card mb-2">
                        <img src="../assets/img/logo emporio com fundo.jpg" class="card-img-top p-1" alt="imagem do Empório Baratão">
                        <div class="card-body">
                            <h5 class="card-title">Empório Baratão</h5>
                            <a href="#" class="btn btn-primary w-100" target="_blank">Ir até essa Loja</a>
                        </div>
                    </div>

                    <div class="card mb-2">
                        <img src="../assets/img/logo emporio com fundo.jpg" class="card-img-top p-1" alt="imagem do Empório Baratão">
                        <div class="card-body">
                            <h5 class="card-title">Empório Construção</h5>
                            <a href="#" class="btn btn-primary w-100" target="_blank">Ir até essa Loja</a>
                        </div>
                    </div>

                    <div class="card mb-2">
                        <img src="../assets/img/logo emporio com fundo.jpg" class="card-img-top p-1" alt="imagem do Empório Baratão">
                        <div class="card-body">
                            <h5 class="card-title">Mini Empório Baratão</h5>
                            <a href="#" class="btn btn-primary w-100" target="_blank">Ir até essa Loja</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>




    </main>

    <!-- footer da página -->
    <?php
    include "../includes/footer.php"
    ?>
    <!-- script de funcionalidades do boostrap -->
    <?php
    include "../includes/scriptBoostrap.php"
    ?>
</body>

</html>