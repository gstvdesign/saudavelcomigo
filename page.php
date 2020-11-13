<?php get_header(); ?>

<div class="main">
  <?php 
    if( have_posts() ) : 
      while( have_posts() ) : the_post();
        get_template_part('page-content');
      endwhile;
  endif;
  ?>

  <div class="sidebar">
    <?php get_template_part('sidebar'); ?>
  </div>
</div>



<?php get_footer(); ?>