<div class="container mt-5 mb-5 course" id="section-feed-courses">
    <h2 class="text-center">Mais cursos em destaque</h2>
    <div class="row">
        <div class="col">
            <!-- navegação -->
            <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">                
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-extensao-tab" data-bs-toggle="pill" data-bs-target="#pills-extensao" type="button" role="tab" aria-controls="pills-extensao" aria-selected="true">Extensão</button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-aperfeicoamento-tab" data-bs-toggle="pill" data-bs-target="#pills-aperfeicoamento" type="button" role="tab" aria-controls="pills-aperfeicoamento" aria-selected="true">Aperfeiçoamento</button>
                </li>
            </ul>

            <!-- conteúdo -->
            <div class="tab-content mt-5" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-extensao" role="tabpanel" aria-labelledby="pills-extensao-tab">
                    <div class="slider-course">
                        <div class="container-slider-course">
                            <div class="itens-slider-course">
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
                                $positionExtensao = 0;
                                
                                $postsExensao = $wp_query_extensao->found_posts;
                                
                                while ($wp_query_extensao->have_posts()) : $wp_query_extensao->the_post();
                                    $categorias_extensao = wp_get_object_terms($post->ID, 'categoria_curso');
                                ?>
                                    <div class="item-slider-course">
                                        <div class="row">
                                            <div class="col-md-6 slider-description-course">
                                                <h4>
                                                    <?php foreach ($categorias_extensao as $categoria_extensao) : echo $categoria_extensao->name;
                                                    endforeach; ?>
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
                                <div class="navArrow" id-slider="section-feed-courses">
                                    <button class="navPrev" style="opacity: 0.1" disabled="true">
                                        ‹
                                    </button>
                                    <button class="navNext">
                                        ›
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-aperfeicoamento" role="tabpanel" aria-labelledby="pills-aperfeicoamento-tab">
                    <?php
                    $wp_query = new WP_Query(array(
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
                    $position = 0;
                    // var_dump($wp_query);
                    while ($wp_query->have_posts()) : $wp_query->the_post();
                    ?>
                        <h3><?php the_title(); ?></h3></br>
                    <?php
                        $position++;
                    endwhile;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>