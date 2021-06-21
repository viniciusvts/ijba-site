<?php wp_footer(); ?>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-auto mb-4">
                <h4>Menu</h4>
                <ul>
                    <li>Cursos de Pós-Graduação</li>
                    <li>Cursos de Aperfeiçoamento</li>
                    <li>Cursos de Extensão</li>
                    <li>Sobre o IJBA</li>
                    <li>Blog</li>
                    <li>Artigos</li>
                    <li>Área do aluno</li>
                </ul>
            </div>
            <div class="col-md-4 mb-4">
                <h4>Links Úteis</h4>
                <?php
                $args = array(
                    'post_type' => 'post',
                    'tax_query' => array(
                        array(
                            'category' => 'blog',
                        ),
                    ),
                );
                // The Query
                $the_query = new WP_Query($args);


                // The Loop
                if ($the_query->have_posts()) {
                    // var_dump($the_query);
                    echo '<ul>';
                    while ($the_query->have_posts()) {
                        $the_query->the_post();
                ?>
                        <li>
                            <a href="<?php the_permalink() ?>">
                                <?php the_title(); ?>
                            </a>
                        </li>
                <?php
                    }
                    echo '</ul>';
                } else {
                    // no posts found
                }
                /* Restore original Post Data */
                wp_reset_postdata();

                ?>
            </div>
            <div class="col-md-4">
                <h4>Contato</h4>
                <ul>
                    <li><b>Email:</b> instituto@ijba.com.br</li>
                    <li><b>Endereço:</b> Alameda Bons Ares, 15 – Candeal, Salvador – BA, 40296-360</li>
                    <li><b>Telefone:</b> (71) 3356-6811</li>
                </ul>
                <a href="<?php bloginfo('url'); ?>/contato">
                    <button class="green mt-5">Fale conosco </button>
                </a>

                <ul class="social">
                    <li>
                        <a href="https://www.facebook.com/institutojunguianodabahia" target="_blank" rel="noopener noreferrer>
                            <img src=" <?php bloginfo("template_url"); ?>/svg/default-facebook.svg" alt="Facebook">
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/ijba_oficial/" target="_blank" rel="noopener noreferrer">
                            <img src="<?php bloginfo("template_url"); ?>/svg/default-instagram.svg" alt="Instagram">
                        </a>
                    </li>
                    <li>
                        <a href="https://www.linkedin.com/company/instituto-junguiano-da-bahia" target="_blank" rel="noopener noreferrer">
                            <img src="<?php bloginfo("template_url"); ?>/svg/default-linkedin.svg" alt="Linkedin">
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com/junguianobahia" target="_blank" rel="noopener noreferrer">
                            <img src="<?php bloginfo("template_url"); ?>/svg/twitter.svg" alt="Twitter">
                        </a>
                    </li>
                    <li>
                        <a href="https://www.youtube.com/institutojunguiano" target="_blank" rel="noopener noreferrer">
                            <img src="<?php bloginfo("template_url"); ?>/svg/youtube.svg" alt="Youtube">
                        </a>
                    </li>
                    <!-- <li>
                        <a href="instituto@ijba.com.br" target="_blank" rel="noopener noreferrer">
                            <img src="<?php bloginfo("template_url"); ?>/svg/mail.svg" alt="Email">
                        </a>
                    </li> -->
                    <li>
                        <a href="https://api.whatsapp.com/send?phone=557199278183&text=N%C3%A3o%20recebemos%20mensagem%20de%20voz." target="_blank" rel="noopener noreferrer">
                            <img src="<?php bloginfo("template_url"); ?>/svg/whatsapp.svg" alt="Whatsapp">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col mt-4">
                <p class="text-center">IJBA - Instituto Junguiano da Bahia. Copyright © 2021. </p>
            </div>
        </div>
    </div>
</footer>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>-->

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>-->

<script src="<?php bloginfo("template_url"); ?>/node_modules/bootstrap/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

<script src="<?php bloginfo("template_url"); ?>/js/main.js" crossorigin="anonymous"></script>

<script src="<?php bloginfo("template_url"); ?>/js/slide-feed-course.js" crossorigin="anonymous"></script>

</body>

</html>