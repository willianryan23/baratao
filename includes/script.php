<script>
  // Controle do menu mobile
  const menuToggle = document.querySelector('.menu-toggle');
  const menu = document.querySelector('.menu');
  const submenuParents = document.querySelectorAll('.has-submenu');

  // Abrir/fechar menu principal mobile
  menuToggle.addEventListener('click', () => {
    menu.classList.toggle('active');
  });

  menuToggle.addEventListener('keydown', (e) => {
    if (e.key === 'Enter' || e.key === ' ') {
      e.preventDefault();
      menu.classList.toggle('active');
    }
  });

  // Abrir submenu mobile ao clicar na categoria pai
  submenuParents.forEach(parent => {
    parent.addEventListener('click', (e) => {
      if (window.innerWidth <= 768) /*768*/ {
        e.preventDefault();
        parent.classList.toggle('open');
      }
    });
  });


  // =====================
  // Copiar email ao clicar
  //======================


</script>