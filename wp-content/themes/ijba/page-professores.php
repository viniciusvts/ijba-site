<?php get_header(); ?>

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <?php the_post_thumbnail('large', array('class' => 'd-block w-100 filter', 'title' => get_the_title(), 'alt' => get_the_title())); ?>
            <div class="carousel-caption">
                <h1>
                    <?php the_title(); ?>
                </h1>
                <p><?php wp_custom_breadcrumbs(); ?></p>
            </div>
        </div>
    </div>
</div>



<section class="feedblog">
    <div class="container">
        <div class="row t-up">
            <?php
            global $paged;
            $wp_query = new WP_Query(array(
                'post_type' => 'professor',
                'posts_per_page' => 9,
                'paged' => $paged,
            ));
            $position = 0;
            while ($wp_query->have_posts()) : $wp_query->the_post();
            ?>
                <div class="col-md-4 mb-4">
                    <div class="informations">
                        <h3><?php the_title(); ?></h3>
                        <span>
                            <?php echo get_field('leciona'); ?>
                        </span>
                        <?php the_post_thumbnail('full', array('class' => 'img-fluid w-100 img-filter rounded')); ?>
                    </div>
                </div>
            <?php
            endwhile;
            ?>

            <div class="pagination justify-content-center px-2">
                <?php wordpress_pagination(); ?>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="news green-box">
                    <h2 class="text-center mb-3">Receba conteúdos exclusivos</h2>
                    <?php echo do_shortcode('[contact-form-7 id="3746" title="Newsletter" html_id="newsletter"]'); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>