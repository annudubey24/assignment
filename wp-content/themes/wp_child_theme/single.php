<?php  get_header(); ?>


<div class="container">
   <h2> <?php  the_title();?></h2>
   <p><?php the_content(); ?></p>
  <?php
if ( comments_open() || get_comments_number() ) :
    comments_template();
endif;
?>
</div>

<?php get_footer();?>