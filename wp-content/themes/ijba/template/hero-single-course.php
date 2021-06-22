<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <?php the_post_thumbnail('large', array('class' => 'd-block w-100 filter', 'title' => get_the_title(), 'alt' => get_the_title())); ?>
      <div class="carousel-caption">
        <h5>
          Curso de
          <?php
          $terms = get_the_terms($post->ID, 'categoria_curso');
          foreach ($terms as $term) {
            echo $term->name;
          }
          ?>
        </h5>
        <h1>
          <?php the_title(); ?>
        </h1>

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
      </div>
    </div>

    <div class="selo-mec d-none d-md-flex">
      <img src="<?php bloginfo('template_url') ?>/img/selo-mec.png" alt="Selo MEC">
    </div>
  </div>
</div>