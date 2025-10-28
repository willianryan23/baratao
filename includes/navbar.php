<nav class="navbar navbar-expand-lg navbar-light bg-warning shadow-sm">
  <div class="container">
    <!-- Logo -->
    <a class="navbar-brand" href="../index.php">
      <img src="/baratao/assets/img/Logo Grupo Empório.png" alt="Logo do Grupo Empório" width="130" />
    </a>

    <!-- Botão toggle para mobile -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMega" aria-controls="navbarMega" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Conteúdo da navbar -->
    <div class="collapse navbar-collapse" id="navbarMega">
      <!-- Barra de busca estilo Mercado Livre -->
      <form class="d-flex mx-auto w-50" role="search">
        <input class="form-control me-2 rounded-start" type="search" placeholder="Buscar produtos, marcas e muito mais..." aria-label="Buscar">
        <button class="btn btn-dark rounded-end" type="submit">
          <i class="bi bi-search"></i>
        </button>
      </form>

      <!-- Menu principal -->
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">

        <li class="nav-item">
          <a class="nav-link fw-bold text-dark" href="/baratao/index.php">Início</a>
        </li>

        <li class="nav-item">
          <a class="nav-link fw-bold text-dark" href="/../baratao/pages/catalogo.php">Produtos</a>
        </li>

        <li class="nav-item">
          <a class="nav-link fw-bold text-dark" href="/../baratao/pages/promocoes.php">Promoções</a>
        </li>

        <li class="nav-item">
          <a class="nav-link fw-bold text-dark" href="/baratao/pages/unidades.php">Retire na Loja</a>
        </li>

        <!-- Dropdown "Mais Informações" -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle fw-bold text-dark" href="#" id="maisInfoDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Mais Informações
          </a>
          <ul class="dropdown-menu shadow" aria-labelledby="maisInfoDropdown">
            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="fa-solid fa-address-card me-2"></i> Trabalhe Conosco
              </a>
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-archive-fill me-2"></i> Seja nosso Fornecedor
              </a>
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="../pages/sobre.php">
                <i class="fa-solid fa-book me-2"></i> Quem Somos
              </a>
            </li>
          </ul>
        </li>

      
      </ul>
    </div>
  </div>
</nav>
