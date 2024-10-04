<?php get_header(); ?>


<?php echo the_title(); ?>
<?php the_post(); ?>

<?php the_content(); ?>

<?php the_post_thumbnail('full'); ?>


<?php get_footer(); ?>