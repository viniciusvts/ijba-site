<?php get_header(); ?>

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <?php the_post_thumbnail('large', array('class' => 'd-block w-100 filter', 'title' => get_the_title(), 'alt' => get_the_title())); ?>
            <div class="carousel-caption">
                <h1>
                    <?php
                    the_title();
                    ?>
                </h1>
                <p><?php  wp_custom_breadcrumbs(); ?></p>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <?php the_content(); ?>
    </div>
</div>
<?php
set_query_var( 'feedblog_class', 'mb-5' );
set_query_var( 'feedblog_row', 't-up' );
set_query_var( 'feedblog_nocta', true );
get_template_part('template/feedblog');
get_template_part('template/greenbox');
echo '<div class="mb-5"></div>';
get_footer();
?>