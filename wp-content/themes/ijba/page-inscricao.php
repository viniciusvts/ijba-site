<?php
get_header();
if(isset($_GET['cursoId'])){
    $cursoSelected = get_post($_GET['cursoId']);
    if($cursoSelected){
        set_query_var( 'cursoSelected', $cursoSelected );
        get_template_part('template/header-inscricao-curso');
    } else {
        get_template_part('template/header-inscricao-geral');
    }
} else {
    get_template_part('template/header-inscricao-geral');
}
?>


<div class="container teams-itau-int py-5 t-up">
    <div class="row">
        <div class="col">
        <?php
        get_template_part('/template/form-integracao-teams-itau');
        ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>