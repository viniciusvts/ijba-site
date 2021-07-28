<header>
  <nav class="navbar navbar-expand-lg navbar-dark header fixed-top green-nav" id="menu-fixed">
    <div class="container">
      <a class="navbar-brand" href="<?php bloginfo('url') ?>">
        <img src="<?php bloginfo('template_url') ?>/img/ijba.png" alt="IJBA - Instituto Junguiano da Bahia">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center align-items-center" id="navbarText">
      <?php 
        wp_nav_menu(
          array(
            'menu_class' => 'navbar-nav navbar-text mb-2 mb-lg-0',
            'container' => false,
            'theme_location' => 'main-menu',
            'depth' => 1,
            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
            'walker'            => new WP_Bootstrap_Navwalker(),
          )
        ); 
      ?>
      </div>
      <div class="row align-items-center justify-content-end d-none d-md-flex">
        <div class="col">
          <button class="search" data-show="modalSearch">
            <img src="<?php bloginfo('template_url'); ?>/svg/magnifying-glass.svg" alt="Buscar">
          </button>
        </div>
        <div class="col-auto">
          <a href="https://moodle.ijba.com.br" target="_blank">
            <button class="green">
              Área do aluno
            </button>
          </a>
        </div>
      </div>
    </div>
  </nav>
</header>