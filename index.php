<?php get_header(); ?>
<div class="main">
  <div class="posts">
    <?php 
      if( have_posts() ) : 
        while( have_posts() ) : the_post();
          get_template_part('content');
        endwhile;
    endif;
    ?>
  </div>

  <div class="sidebar">
    <?php get_template_part('sidebar'); ?>
  </div>
</div>
<?php get_footer(); ?>