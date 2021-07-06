<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <?php the_post_thumbnail('large', array('class' => 'd-block w-100 filter', 'title' => get_the_title(), 'alt' => get_the_title())); ?>
            <div class="carousel-caption">
                <h5>Inscrição na pós-graduação</h5>
                <h1>
                    <?php
                    echo $cursoSelected->post_title;
                    ?>
                </h1>
                <p><?php  wp_custom_breadcrumbs(); ?></p>
            </div>
        </div>
    </div>
</div>