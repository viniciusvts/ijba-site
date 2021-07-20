<?php
get_header();
if(isset($_GET['cursoId'])){
    $cursoSelected = get_post($_GET['cursoId']);
    if($cursoSelected){
        $terms = get_the_terms($cursoSelected->ID, 'categoria_curso');
        set_query_var( 'cursoSelected', $cursoSelected );
        set_query_var( 'terms', $terms );
        get_template_part('template/header-inscricao-curso');
    } else {
        get_template_part('template/header-inscricao-geral');
    }
} else {
    get_template_part('template/header-inscricao-geral');
}
?>

<?php
/*
ATENÇÂO PROGRAMADOR DO FUTURO!!!!
veja a regra de negócio em @link single-curso.php:50
*/
?>
<div class="container teams-itau-int py-5 t-up">
    <div class="row">
        <div class="col">
        <?php
        $terms = get_the_terms($cursoSelected->ID, 'categoria_curso');
        set_query_var( 'terms', $terms );
        get_template_part('/template/form-integracao-teams-itau');
        ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>