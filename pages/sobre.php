<!DOCTYPE html>
<html lang="pt-BR">
<?php
include "../includes/head.php"
?>

<body>
    <!-- inicio da navbar -->
    <?php
    include "../includes/navbar.php"
    ?>
    <!-- fim da navbar -->

    <!-- conteudo principal da pagina -->
    <main class="containerMain">
        <section class="py-5 d-flex justify-content-center">
            <div class="container">
                <div class="row g-5">
                    <div class="col-md-6">
                        <h2>Quem Somos</h2>
                        <p>Somos uma empresa com atuação diversificada, oferecendo soluções que abrangem vários segmentos de mercado, proporcionando crescimento e inovação para nossos clientes e parceiros.</p>
                        <p>Desde nossa fundação, temos como objetivo unir expertise e tecnologia para entregar valor em diferentes áreas estratégicas, fortalecendo nosso posicionamento como líderes multissetoriais.</p>
                    </div>
                    <div class="col-md-6">
                        <img src="../assets/img/logo emporio baratao sem fundo.png" alt="Equipe da empresa" class="team-photo" />
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-light py-5">
            <div class="container">
                <h2 class="mb-4 text-center">Nossos Valores e Missão</h2>
                <div class="row text-center g-4">
                    <div class="col-md-4">
                        <div class="p-4 border rounded" style="height: 220px;">
                            <h4>Missão</h4>
                            <p>Oferecer soluções integradas com qualidade e inovação, promovendo o desenvolvimento sustentável dos negócios de nossos clientes.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-4 border rounded" style="height: 220px;">
                            <h4>Visão</h4>
                            <p>Ser referência nacional em atuação multissetorial, impulsionando a transformação digital e a excelência em serviços.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-4 border rounded" style="height: 220px;">
                            <h4>Valores</h4>
                            <ul class="list-unstyled">
                                <li>• Ética e Transparência</li>
                                <li>• Inovação Contínua</li>
                                <li>• Sustentabilidade</li>
                                <li>• Comprometimento</li>
                                <li>• Valorização das Pessoas</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-5">
            <div class="container">
                <h2 class="text-center mb-5">Segmentos de Atuação</h2>
                <div class="row g-4 text-center">
                    <div class="col-md-3">
                        <div class="p-4 border rounded">
                            <div class="segment-icon mb-3">🏭</div>
                            <h5>Indústria</h5>
                            <p>Soluções para processos produtivos e automação industrial, com foco em eficiência e qualidade.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-4 border rounded">
                            <div class="segment-icon mb-3">💼</div>
                            <h5>Serviços Corporativos</h5>
                            <p>Consultoria, gestão e tecnologia para aprimorar a gestão e operação das empresas.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-4 border rounded">
                            <div class="segment-icon mb-3">🌿</div>
                            <h5>Meio Ambiente</h5>
                            <p>Projetos sustentáveis e soluções ambientais para preservação e responsabilidade social.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-4 border rounded">
                            <div class="segment-icon mb-3">💻</div>
                            <h5>Tecnologia</h5>
                            <p>Desenvolvimento de sistemas, inovação digital e suporte tecnológico personalizado.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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