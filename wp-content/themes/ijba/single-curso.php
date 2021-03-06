<?php get_header(); ?>
<?php get_template_part('template/hero-single-course'); ?>
<div class="container course">
    <div class="row t-up">
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
            /*
            ATENÇÂO PROGRAMADOR DO FUTURO!!!!
            A IJBA tem regra de negócio para algumas categorias de curso, categorias essas:
            >> pos graduação, aperfeiçoamento, extensão, pequena duração <<
            1) pos-graduacao - mostra dois banners: cadastro no teams e reserva de vaga
            o primeiro vou cadastrar no teams o segundo converto o lead para o time de marketing.
            Em ambos, mando depois para o site da bahiana
            2) aperfeiçoamento, extensão - gera boleto, e cadastra no teams
            3) pequena duração - gera boleto e não mand para o teams

            Aqui eu defino no caso de pós os doi banner de decisão
            para o restante dos cursos o banner padrão
            a lógica é aplicada definitivamente na página de inscrição
            */
            $postId = get_the_id();
            $terms = get_the_terms($postId, 'categoria_curso');
            /** Array que contém o slug das categorias do curso */
            $catSlugs = array_map(function($term){
                return $term->slug;
            }, $terms);
            if(in_array('pos-graduacao', $catSlugs)){
            ?>
            <a href="<?php bloginfo('url'); ?>/inscricao/?cursoId=<?php echo $postId; ?>">
                <img src="<?php bloginfo('template_url') ?>/img/banner-reserve-sua-vaga.jpg" alt="Reserve sua vaga" class="banner-subscribe">
            </a>
            <a href="<?php bloginfo('url'); ?>/inscricao/?cursoId=<?php echo $postId; ?>&teams=true">
                <img src="<?php bloginfo('template_url') ?>/img/banner-cadastre-no-teams-2.jpg" alt="Cadastre-se no teams" class="banner-subscribe">
            </a>
            <?php
            } else {
            ?>
            <a href="<?php bloginfo('url'); ?>/inscricao/?cursoId=<?php echo $postId; ?>">
                <img src="<?php bloginfo('template_url') ?>/img/banner-inscricao.jpg" alt="Faça sua inscrição" class="banner-subscribe">
            </a>
            <?php
            }
            ?>
        </div>

        <!-- sidebar-->
        <div class="col-md-3">
            <div class="informations mb-3">
                <h5>Mais informações</h5>
                <ul>
                    <li>
                        <h6>Mensalidade</h6>
                    </li>
                    <?php
                    $preco = get_field('preco');
                    if($preco != false){
                        foreach ($preco as $item) {
                            $custo = number_format($item['preco'], 2, ',', '.');
                            $qtd_parc = $item['qtd_parce'];
                            $parcStr = $item['qtd_parce'] == 1 ? 'parcela' : 'parcelas';
                    ?>
                        <li>
                            <p>
                                R$<?php echo $custo; ?>
                                (<?php echo $qtd_parc . ' ' . $parcStr; ?> )</p>
                        </li>
                    <?php
                        }
                    }
                    ?>

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

<?php get_template_part('template/feedcourse'); ?>
<?php get_template_part('template/greenbox'); ?>
<div class="mb-5"></div>
<?php get_footer(); ?>