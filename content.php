<div class="post">
  <h2 class="post_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  <?php get_template_part('post-meta'); ?>
  <?php if ( has_post_thumbnail() ) {?>
    <div class="post_img"><?php the_post_thumbnail('full'); ?></div>
    <div class="post_excerpt"><?php the_excerpt(); ?></div>
  <?php } else { ?>
    <?php the_excerpt(); ?>
  <?php } ?>
  <p class="post_read"><a href="<?php the_permalink(); ?>">Ler mais</a></p>
  <?php get_template_part('post-footer'); ?>
</div>