<?php get_header(); ?>
<?php get_template_part('template/hero-single-course'); ?>
<div class="container course">
    <div class="row">
        <!-- conteúdo-->
        <div class="col-md-9">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                <?php if (get_field('justificativa') != false) : ?>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-justificativa-tab" data-bs-toggle="pill" data-bs-target="#pills-justificativa" type="button" role="tab" aria-controls="pills-justificativa" aria-selected="true">Justificativa</button>
                    </li>
                <?php endif; ?>

                <?php if (get_field('objetivo') != false) : ?>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-objetivo-tab" data-bs-toggle="pill" data-bs-target="#pills-objetivo" type="button" role="tab" aria-controls="pills-objetivo" aria-selected="false">Objetivo</button>
                    </li>
                <?php endif; ?>

                <?php if (get_field('disciplinas') != false) : ?>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-disciplinas-tab" data-bs-toggle="pill" data-bs-target="#pills-disciplinas" type="button" role="tab" aria-controls="pills-disciplinas" aria-selected="false">Disciplinas</button>
                    </li>
                <?php endif; ?>

                <?php if (get_field('criterios') != false) : ?>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-criterios-tab" data-bs-toggle="pill" data-bs-target="#pills-criterios" type="button" role="tab" aria-controls="pills-criterios" aria-selected="false">Critérios</button>
                    </li>
                <?php endif; ?>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-justificativa" role="tabpanel" aria-labelledby="pills-justificativa-tab">
                    <?php the_field('justificativa'); ?>
                </div>
                <div class="tab-pane fade" id="pills-objetivo" role="tabpanel" aria-labelledby="pills-objetivo-tab">
                    <?php the_field('objetivo'); ?>
                </div>
                <div class="tab-pane fade" id="pills-disciplinas" role="tabpanel" aria-labelledby="pills-disciplinas-tab">
                    <?php the_field('disciplinas'); ?>
                </div>
                <div class="tab-pane fade" id="pills-criterios" role="tabpanel" aria-labelledby="pills-criterios-tab">
                    <?php the_field('criterios'); ?>
                </div>
            </div>

            <?php
            $postId = get_the_id();
            $terms = get_the_terms($postId, 'categoria_curso');
            foreach ($terms as $term) {
                $categoria = $term->term_id;
            }
            ?>
            <a href="<?php bloginfo('url'); ?>/inscricao?curso=<?php echo $postId; ?>&cat=<?php echo $categoria ?>">
                <img src="<?php bloginfo('template_url') ?>/img/banner-inscricao.jpg" alt="Faça sua inscrição" class="banner-subscribe">
            </a>
        </div>

        <!-- sidebar-->
        <div class="col-md-3">
            <div class="informations mb-3">
                <h5>Mais informações</h5>
                <ul>
                    <?php if (get_field('preco') != false) : ?>
                        <li>
                            <h6>Mensalidade</h6>
                            <p><?php the_field('preco'); ?></p>
                        </li>
                    <?php endif; ?>

                    <?php if (get_field('carga_horaria') != false) : ?>
                        <li>
                            <h6>Carga horária</h6>
                            <p><?php the_field('carga_horaria'); ?></p>
                        </li>
                    <?php endif; ?>

                    <?php if (get_field('numero_disciplinas') != false) : ?>
                        <li>
                            <h6>Nº de Disciplinas</h6>
                            <p><?php the_field('numero_disciplinas'); ?></p>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="subscribe mb-3">
                <h5>Ainda em dúvida?</h5>
                <p class="text-center">Preencha o formulário para receber mais informações</p>
                <?php echo do_shortcode('[contact-form-7 id="3733" title="Mais informações" html_id="mais-informacoes"]'); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>