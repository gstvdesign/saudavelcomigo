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

    <div class="posts_nav">
      <div class="posts_nav_right">
        <?php next_posts_link('Próxima página') ?>
      </div>
      <div class="posts_nav_left">
        <?php previous_posts_link('Página anterior') ?>
      </div>
    </div>
  </div>

  <div class="sidebar">
    <?php get_template_part('sidebar'); ?>
  </div>
</div>
<?php get_footer(); ?>