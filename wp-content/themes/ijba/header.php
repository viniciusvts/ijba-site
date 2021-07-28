<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="<?php bloginfo("template_url"); ?>/node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php bloginfo("template_url"); ?>/css/general.css">
    

    <title>IJBA - Instituto Junguiano da Bahia</title>

    <?php wp_head(); ?>
</head>

<body>

<?php
    get_template_part('template/modal', 'buscar');
    get_template_part('template/head');
?>