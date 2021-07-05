<?php get_header(); ?>

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <?php the_post_thumbnail('large', array('class' => 'd-block w-100 filter', 'title' => get_the_title(), 'alt' => get_the_title())); ?>
            <div class="carousel-caption">
                <h1>
                    <?php the_title(); ?>
                </h1>
                <p><?php  wp_custom_breadcrumbs(); ?></p>
            </div>
        </div>
    </div>
</div>
<div class="container teams-itau-int py-5 t-up">
    <div class="row">
        <div class="col">
        <?php
        get_template_part('/template/form-integracao-teams-itau');
        ?>
        </div>
    </div>
</div>
<!-- <div class="container mt-5 mb-5">
    <?php echo $_GET['cat']; ?>
    <p>Agradecemos o seu contato! Acesse a sua caixa de e-mail para mais informações sobre matrícula.</p>
    <a href="#">
        <button class="green">Acessar agora mesmo</button>
    </a>
</div> -->

<?php get_footer(); ?>