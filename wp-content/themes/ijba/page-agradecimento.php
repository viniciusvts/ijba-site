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
set_query_var( 'feedblog_class', 'pb-0' );
set_query_var( 'feedblog_row', 't-up' );
set_query_var( 'feedblog_nocta', true );
get_template_part('template/feedblog');
?>
<a href="/blog/">
    <button class="green mx-auto mb-5">Ver mais notícias</button>
</a>
<div class="container">
    <div class="row">
        <div class="col">
            <?php
            get_template_part('template/newsletter');
            ?>
        </div>
    </div>
</div>
<?php
echo '<div class="mb-5"></div>';
get_footer();
?>