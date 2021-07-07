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
                'post_type' => 'post',
                'posts_per_page' => 7,
                'category_name' => 'artigos',
                'paged' => $paged,
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

            <div class="pagination justify-content-center px-2">
                <?php wordpress_pagination(); ?>
            </div>
        </div>
    </div>

    <div class="container">
        <?php get_template_part('template/newsletter') ?>
    </div>
</section>

<?php get_footer(); ?>