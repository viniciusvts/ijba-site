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
</div>
<div class="container about mt-5 mb-5">
    <div class="row t-up">
        <?php the_content(); ?>
    </div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
<div class="lightbox-gallery">
    <div class="container mt-5 mb-5">
        <div class="row photos g-0">
            <?php
            $images = get_field('galeria');
            if ($images) :
                foreach ($images as $image) :
            ?>
                <div class="col-sm-6 col-md-2 col-lg-3 item">
                    <a href="<?php echo $image['sizes']['large'];?>" data-lightbox="photos"><img class="img-fluid" src="<?php echo $image['sizes']['medium_large'];?>" alt="<?php echo $image['alt']; ?>"></a>
                </div>
            <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>