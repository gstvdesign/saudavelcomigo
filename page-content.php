<div class="post">
  <h2 class="post_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  <?php if ( has_post_thumbnail() ) {?>
    <div class="post_img"><?php the_post_thumbnail('full'); ?></div>
    <div class="post_content"><?php the_content(); ?></div>
  <?php } else { ?>
    <?php the_content(); ?>
  <?php } ?>
</div>