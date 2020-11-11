<div class="post_tag">
  <?php the_category(); ?>
</div>
<div class="post_share">
  <a href="https://twitter.com/intent/tweet?text=<?php echo the_title(); ?>&amp;url=<?php echo get_the_permalink();; ?>" target="_blank"><i class="fab fa-twitter-square"></i></a>
  <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>"><i class="fab fa-facebook-square"></i></a>
  <a href="https://api.whatsapp.com/send?text=<?php echo get_the_permalink(); ?>"><i class="fab fa-whatsapp-square"></i></a>
  
  <?php $pinterestimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
  <a href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink($post->ID)); ?>&media=<?php echo $pinterestimage[0]; ?>&description=<?php the_title(); ?>"><i class="fab fa-pinterest-square"></i></a>
</div>


