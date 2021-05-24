<?php get_header(); ?>
<div class="single-blog">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <?php the_post_thumbnail('large', array('class' => 'd-block w-100 blur filter')); ?>
            </div>
            <div class="carousel-caption">
                <h1><?php the_title(); ?></h1>
                <p><?php wp_custom_breadcrumbs(); ?></p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <?php the_post_thumbnail('large', array('class' => 'd-block w-100 hero', 'title' => get_the_title(), 'alt' => get_the_title())); ?>
            </div>
        </div>
        <div class="row">
            <!-- conteúdo-->
            <div class="container mb-5 mt-5">
                <div class="row">
                    <div class="col-md-9">
                        <?php the_content(); ?>
                    </div>

                    <!-- sidebar-->
                    <div class="col-md-3">
                        <div class="sidebar">
                            <div class="search">
                                <form action="/" method="get">
                                    <h5>Buscar</h5>
                                    <input type="text" name="s" id="search" placeholder="Digite aqui" value="<?php the_search_query(); ?>" />
                                    <input type="image" alt="Search" src="<?php bloginfo('template_url'); ?>/svg/magnifying-glass.svg" />
                                </form>
                            </div>

                            <!-- posts-->
                            <div class="posts">
                                <h5>Posts Recentes</h5>
                                <ul>
                                    <?php
                                    $args = array(
                                        'posts_per_page' => 6,
                                    );
                                    $posts = new WP_Query($args);
                                    while ($posts->have_posts()) : $posts->the_post();
                                        $author = get_the_author();
                                    ?>
                                        <li>
                                            <a href="<?php the_permalink(); ?>">
                                                <p><?php the_title(); ?></p>
                                            </a>
                                            <span>Por <?php echo $author; ?> - <?php the_date(); ?></span>
                                        </li>
                                    <?php endwhile; ?>
                                </ul>
                            </div>

                            <!-- categories-->
                            <div class="categories">
                                <h5>Categorias</h5>
                                <ul>
                                    <?php
                                    $categorias = get_categories(
                                        array('taxonomy' => 'category', 'orderby' => 'name', 'number' => 6)
                                    );
                                    foreach ($categorias as $categoria) {
                                    ?>
                                        <li>
                                            <a href="<?php bloginfo("url"); ?>/category/<?php echo $categoria->slug ?>">
                                                <?php echo $categoria->name; ?>
                                            </a>
                                            <span>(<?php echo $categoria->count; ?>)
                                            </span>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>