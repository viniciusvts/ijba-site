<?php get_header(); ?>

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <?php the_post_thumbnail('large', array('class' => 'd-block w-100 filter', 'title' => get_the_title(), 'alt' => get_the_title())); ?>
            <div class="carousel-caption">
                <h1>
                    <?php single_cat_title(); ?>
                </h1>
                <p><?php wp_custom_breadcrumbs(); ?></p>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5 mb-5 course" id="section-feed-courses">
    <h2 class="text-center">Cursos de <?php single_cat_title(); ?></h2>
    <div class="row">
        <div class="col">
            <!-- conteúdo -->
            <div class="tab-content mt-5" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-extensao" role="tabpanel" aria-labelledby="pills-extensao-tab">
                    <div class="slider-course" id="extensao">
                        <div class="container-slider-course">
                            <div class="itens-slider-course">
                                <?php
                                $positionExtensao = 0;
                                while (have_posts()) : the_post();
                                    $categorias_extensao = wp_get_object_terms($post->ID, 'categoria_curso');
                                ?>
                                    <div class="item-slider-course">
                                        <div class="row">
                                            <div class="col-md-6 slider-description-course">
                                                <h4>
                                                    <?php
                                                    foreach ($categorias_extensao as $key => $categoria_extensao) {
                                                        if($key != 0) echo ' | ';
                                                        echo $categoria_extensao->name;
                                                    }
                                                    ?>
                                                </h4>
                                                <h3>
                                                    <?php
                                                        the_title();
                                                    ?>
                                                </h3>
                                                <p>
                                                    <?php
                                                    $justificativa = get_field('justificativa', get_the_id());
                                                    $justificativaStripTags = strip_tags($justificativa);
                                                    echo $excerpt = substr($justificativaStripTags, 0, 320);
                                                    ?>
                                                    [...]
                                                </p>
                                                <a href="<?php the_permalink(); ?>">
                                                    <button class="green">Saiba mais</button>
                                                </a>
                                            </div>
                                            <div class="col-md-6 slider-description-image">
                                                <?php the_post_thumbnail('full', array('class' => 'img-fluid')); ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                    $positionExtensao++;
                                endwhile;
                                wp_reset_postdata();
                                wp_reset_query();
                                ?>
                            </div>
                        </div>
                        <div class="bullets-slider-course">
                        
                            <ul>
                                <?php for ($list = 0; $list < $positionExtensao; $list++) { ?>
                                    <li index-bullet="<?php echo $list ?>" class="<?php if ($list == 0) : echo "active"; endif; ?>"></li>
                                <?php } ?>
                                
                            </ul>
                        </div>
                        <div class="text-center">
                            <div class="navContainer-course">
                                <div class="navArrow" id-slider="extensao">
                                    <button class="navPrev" style="opacity: 0.1" disabled="true">
                                        ‹
                                    </button>
                                    <button class="navNext"
                                    <?php if($positionExtensao <= 1){ echo 'style="opacity: 0.1" disabled="true"';} ?>>
                                        ›
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>