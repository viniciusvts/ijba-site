<?php
get_header();
$isRequestOk = ($_GET['isRequestOk'] == true);
?>
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
</div>
<?php
if($isRequestOk){
?>
<div class="container my-5 text-center">
    <?php the_content(); ?>
    <a href="https://moodle.ijba.com.br/login/index.php" target="_blank">
        <button class="green mx-auto">Acesse agora mesmo</button>
    </a>
</div>
<?php
} else {
?>
<div class="container my-5 text-center">
    <p>Houve um erro ao processar sua solicitação, tente novamente mais tarde.</p>
</div>
<?php
}
?>

<?php get_footer(); ?>