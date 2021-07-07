<?php get_header(); ?>
<?php get_template_part('template/slider-home'); ?>
<?php set_query_var( 'grennbox_negativetop', true ); ?>
<?php get_template_part('template/greenbox'); ?>
<?php get_template_part('template/feedcourse'); ?>
<?php set_query_var( 'feedblog_class', 'gray-bg mb-5' ); ?>
<?php get_template_part('template/feedblog'); ?>
<?php get_template_part('template/feedvideo'); ?>
<?php get_footer(); ?>

