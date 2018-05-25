<?php 
/*
Template Name: Single
*/
get_header(); ?>

<div class="content">
<?php the_title(); ?>
<?php the_excerpt(); ?>
<?php the_content(); ?>
</div>
<?php get_footer(); ?>