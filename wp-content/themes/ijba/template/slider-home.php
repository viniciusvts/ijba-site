  <div id="carouselExampleCaptions" class="carousel carousel-home slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <?php
      /**
       * Exibir no banner ursos marcados como destaque
       * job #24901
       * instruções para filtro: https://www.advancedcustomfields.com/resources/query-posts-custom-fields/
       * instrução do campo true/false: https://www.advancedcustomfields.com/resources/true-false/
       */
      $curso = new WP_Query(array(
        'numberposts'	=> -1,
        'post_type'		=> 'curso',
        'meta_key'		=> 'destaque',
        'meta_value'	=> 1
      ));

      $postsExensao = $curso->found_posts;

      while ($curso->have_posts()) : $curso->the_post();
      ?>
        <div class="carousel-item <?php if ($curso->current_post == 0) {
                                    echo "active";
                                  } ?>">
          <?php the_post_thumbnail('large', array('class' => 'd-block w-100 filter', 'title' => get_the_title(), 'alt' => get_the_title())); ?>
          <div class="carousel-caption">

            <div class="row mt-4">
              <h5>

                Curso de
                <?php
                $postId = get_the_id();
                $terms = get_the_terms($postId, 'categoria_curso');
                foreach ($terms as $term) {
                  echo $term->name;
                }
                ?>
              </h5>

              <h2><?php the_title(); ?></h2>
            </div>

            <?php if (get_field('coordenacao') != false) : ?>
              <h5>
                <?php the_field('coordenacao'); ?>
              </h5>
            <?php endif; ?>

            <div class="row mt-4">
              <!-- duracao -->
              <?php if (get_field('periodicidade') != false) : ?>
                <div class="col-auto">
                  <div class="group">
                    <img src="<?php bloginfo('template_url'); ?>/svg/clock.svg" alt="Duração">
                    <p><?php the_field('duracao'); ?></p>
                  </div>
                </div>
              <?php endif; ?>

              <!-- periodicidade -->
              <?php if (get_field('periodicidade') != false) : ?>
                <div class="col-auto">
                  <div class="group">
                    <img src="<?php bloginfo('template_url'); ?>/svg/calendar.svg" alt="Período">
                    <p><?php the_field('periodicidade'); ?></p>
                  </div>
                </div>
              <?php endif; ?>

              <!-- modalidade -->
              <?php if (get_field('modalidade') != false) : ?>
                <div class="col-auto">
                  <div class="group">
                    <img src="<?php bloginfo('template_url'); ?>/svg/user.svg" alt="Modalidade">
                    <p><?php the_field('modalidade'); ?></p>
                  </div>
                </div>
              <?php endif; ?>
            </div>

            <div class="row mt-5 mb-5">
              <div class="col-auto">
                <a href="<?php the_permalink(); ?>">
                  <button class="green">Inscreva-se</button>
                </a>
              </div>
            </div>

          </div>
        </div>
      <?php
        $index++;
      endwhile;
      wp_reset_postdata();
      ?>
      <div class="selo-mec d-none d-md-flex">
        <img src="<?php bloginfo('template_url') ?>/img/selo-mec.png" alt="Selo MEC">
      </div>
    </div>

    <!-- indicadores -->
    <div class="carousel-indicators">
      <?php
      for ($slide = 0; $slide < $postsExensao; $slide++) {
      ?>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $slide; ?>" class="<?php if ($slide == 0) : echo "active";endif; ?>" aria-current="true" aria-label="Slide <?php echo $slide; ?>"> </button>
      <?php
      }
      ?>
    </div>

    <!-- navegação -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>