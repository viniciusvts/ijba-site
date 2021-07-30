<div class="container">
    <div class="row">
        <div class="col-md-10 mx-auto green-box <?php echo $grennbox_negativetop ? 'negative-top' : ''; ?>">
            <h2>Escolha seu curso e inscreva-se</h2>
            <form action="/" method="get" name="greenbox">
                <?php 
                // primeiro dropdown das categorias
                wp_dropdown_categories( array(
                    'show_option_none' => 'Selecione o tipo',
                    'option_none_value' => '',
                    'orderby' => 'name',
                    'echo' => true,
                    'hide_empty'         => 1,
                    'name' => '', // não é necessario enviar esse input no get
                    'hierarchical' => true,
                    'id'	=> 'cat_curso',//há um evento no javascript capturando este id
                    'value_field' => 'id',
                    'taxonomy' => 'categoria_curso',
                ) );
                // dropdõwn inicia com todos os cursos
                wp_dropdown_pages( array(
                    'post_type' => 'curso',
                    'show_option_none' => 'Nome do curso',
                    'option_none_value' => '',
                    'orderby' => 'name',
                    'echo' => true,
                    'name' => 'curso',
                    'id'	=> 'curso',//há um evento no javascript capturando este id
                    'value_field' => 'post_name',
                    //2021/06/30 não adiciona required ao select, está sendo adicionado por javascript
                    'required' => true,
                ) );
                ?>
                <button class="green">Inscreva-se</button>
            </form>
        </div>
    </div>
</div>
<script src="<?php bloginfo("template_url"); ?>/js/greenbox.js" crossorigin="anonymous"></script>