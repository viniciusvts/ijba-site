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
<?php
global $paged;
$wp_query = new WP_Query(array(
    'post_type' => 'video',
    'posts_per_page' => 8,
    'paged' => $paged,
));
?>
<div class="container mt-5 mb-5 pagevideo">
    <div class="row t-up">
        <?php
        while ($wp_query->have_posts()){
            $wp_query->the_post();
        ?>
        <div class="col-md-6 mb-4">
            <?php the_field('youtube_iframe'); ?>
            <p class="text-center desc"><?php the_title(); ?></p>
        </div>
        <?php
        }
        ?>
    </div>
    <div class="pagination justify-content-center px-2">
        <?php wordpress_pagination(); ?>
    </div>
</div>

<?php get_footer(); ?>