<?php
$videos = get_posts(array(
    'post_type' => 'video',
    'posts_per_page' => 4,
));
?>
<section class="feedvideo">
    <h2>
        Galeria de vídeos
        <b>Aprenda com nossos especialistas</b>
    </h2>
    <div class="container mt-5 mb-5">
        <div class="row">
            <?php
            foreach ($videos as $key => $video) {
            ?>
            <div class="col-md-6 mb-4">
                <?php echo get_field('youtube_iframe', $video->ID); ?>
                <p class="text-center desc"><?php echo $video->post_title; ?></p>
            </div>
            <?php
            }
            ?>
        <a href="/videos/">
            <button class="green mx-auto">Veja mais vídeos</button>
        </a>
    </div>
</section>