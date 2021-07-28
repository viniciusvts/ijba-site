<?php
$wp_query_extensao = new WP_Query(array(
    'post_type' => 'curso',
    'posts_per_page' => 4,
    'tax_query' => array(
        array(
            'taxonomy' => 'categoria_curso',
            'field' => 'slug',
            'terms' => 'extensao'
        )
    ),
));
$wp_query_aperf = new WP_Query(array(
    'post_type' => 'curso',
    'posts_per_page' => 6,
    'tax_query' => array(
        array(
            'taxonomy' => 'categoria_curso',
            'field' => 'slug',
            'terms' => 'aperfeicoamento'
        )
    ),
));
if ($wp_query_aperf->have_posts() || $wp_query_extensao->have_posts()){
?>
<div class="container mt-5 mb-5 course" id="section-feed-courses">
    <h2 class="text-center">Mais cursos em destaque</h2>
    <div class="row">
        <div class="col">
            <!-- navegação -->
            <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist"> 
                <?php
                if($wp_query_extensao->have_posts()){
                ?>
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-extensao-tab" data-bs-toggle="pill" data-bs-target="#pills-extensao" type="button" role="tab" aria-controls="pills-extensao" aria-selected="true">Extensão</button>
                </li>
                <?php
                }
                if($wp_query_aperf->have_posts()){
                ?>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-aperfeicoamento-tab" data-bs-toggle="pill" data-bs-target="#pills-aperfeicoamento" type="button" role="tab" aria-controls="pills-aperfeicoamento" aria-selected="true">Aperfeiçoamento</button>
                </li>
                <?php
                }
                ?>
            </ul>

            <!-- conteúdo -->
            <div class="tab-content mt-5" id="pills-tabContent">
                <?php
                if($wp_query_extensao->have_posts()){
                ?>
                <div class="tab-pane fade show active" id="pills-extensao" role="tabpanel" aria-labelledby="pills-extensao-tab">
                    <div class="slider-course" id="extensao">
                        <div class="container-slider-course">
                            <div class="itens-slider-course">
                                <?php
                                $positionExtensao = 0;
                                
                                $postsExensao = $wp_query_extensao->found_posts;
                                
                                while ($wp_query_extensao->have_posts()) : $wp_query_extensao->the_post();
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
                <?php
                }
                if($wp_query_aperf->have_posts()){
                ?>
                <div class="tab-pane fade" id="pills-aperfeicoamento" role="tabpanel" aria-labelledby="pills-aperfeicoamento-tab">
                    <div class="slider-course" id="aperf">
                        <div class="container-slider-course">
                            <div class="itens-slider-course">
                                <?php
                                $positionAperf = 0;
                                
                                $postsExensao = $wp_query_aperf->found_posts;
                                
                                while ($wp_query_aperf->have_posts()) : $wp_query_aperf->the_post();
                                    $categorias_aperf = wp_get_object_terms($post->ID, 'categoria_curso');
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
                                    $positionAperf++;
                                endwhile;
                                ?>
                            </div>
                        </div>
                        <div class="bullets-slider-course">
                        
                            <ul>
                                <?php for ($list = 0; $list < $positionAperf; $list++) { ?>
                                    <li index-bullet="<?php echo $list ?>" class="<?php if ($list == 0) : echo "active"; endif; ?>"></li>
                                <?php } ?>
                                
                            </ul>
                        </div>
                        <div class="text-center">
                            <div class="navContainer-course">
                                <div class="navArrow" id-slider="aperf">
                                    <button class="navPrev" style="opacity: 0.1" disabled="true">
                                        ‹
                                    </button>
                                    <button class="navNext"
                                    <?php if($positionAperf <= 1){ echo 'style="opacity: 0.1" disabled="true"';} ?>>
                                        ›
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    wp_reset_postdata();
                    wp_reset_query();
                    ?>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php
}