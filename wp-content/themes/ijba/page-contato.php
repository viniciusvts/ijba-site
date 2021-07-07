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

<div class="container contato mt-5 mb-5">
    <div class="row">
        <div class="col-lg-6">
            <?php echo do_shortcode('[contact-form-7 id="66" title="Fale Conosco" html_id="contato"]'); ?>
        </div>
        <div class="col-lg-6">
            <p>
                <b>E-mail:</b>
                <?php the_field('email'); ?>
            </p>
            <p>
                <b>Endereço:</b>
                <?php the_field('endereco'); ?>
            </p>
            <p>
                <b>Telefone:</b>
                <?php the_field('telefone'); ?>
            </p>

            <?php the_field('mapa'); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>