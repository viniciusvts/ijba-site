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
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-6 mb-4">
            <iframe width="100%" height="315" src="https://www.youtube.com/embed/3dNsgtPoyJE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>

        <div class="col-md-6 mb-4">
            <iframe width="100%" height="315" src="https://www.youtube.com/embed/yg9ZKONBChc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>

        <div class="col-md-6 mb-4">
            <iframe width="100%" height="315" src="https://www.youtube.com/embed/PpQvq_geIGo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>

        <div class="col-md-6 mb-4">
            <iframe width="100%" height="315" src="https://www.youtube.com/embed/6UR-j-4G81o" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>

        <div class="col-md-6 mb-4">
            <iframe width="100%" height="315" src="https://www.youtube.com/embed/ZtF1YrHmVhU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>

        <div class="col-md-6 mb-4">
            <iframe width="100%" height="315" src="https://www.youtube.com/embed/pbcaC8YhpgQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>

        <div class="col-md-6 mb-4">
            <iframe width="100%" height="315" src="https://www.youtube.com/embed/U0X8WwmP7kY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>

        <div class="col-md-6 mb-4">
            <iframe width="100%" height="315" src="https://www.youtube.com/embed/lsSLGPKROng" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>

        <div class="col-md-6 mb-4">
            <iframe width="100%" height="315" src="https://www.youtube.com/embed/fLJEhofYKNs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>

        <div class="col-md-6 mb-4">
            <iframe width="100%" height="315" src="https://www.youtube.com/embed/Qet5x0ARoIk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
</div>

<?php get_footer(); ?>