<section class="feedblog">
    <h2>
        O mais completo conteúdo
        <b>Sobre Psicologia Junguiana</b>
    </h2>
    <div class="container">
        <div class="row">
            <?php
            $wp_query = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => 3
            ));
            $position = 0;
            while ($wp_query->have_posts()) : $wp_query->the_post();
            ?>
                <div class="<?php echo ($position == 0 ? "col-md-12 mb-4" : "col-md-6 mb-4") ?>">
                    <div class="informations">
                        <?php
                        $categories = get_the_category();
                        if (!empty($categories)) {
                            echo "<h5>" . "- " . esc_html($categories[0]->name) . "<h5>";
                        }
                        ?>
                        <h3><?php the_title(); ?></h3>
                        <span>
                            Leia mais
                            <img src="<?php bloginfo('template_url'); ?>/svg/read-more.svg" alt="Leia mais">
                        </span>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('full', array('class' => 'img-fluid w-100 img-filter rounded')); ?>
                        </a>
                    </div>
                </div>
            <?php
                $position++;
            endwhile;
            ?>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="news">
                <h3 class="text-center mb-3">Receba conteúdos exclusivos</h3>
                <?php echo do_shortcode('[contact-form-7 id="3746" title="Newsletter" html_id="newsletter"]'); ?>
            </div>
        </div>
    </div>
</section>