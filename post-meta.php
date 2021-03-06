<div class="post_meta">
  <div class="post_date">
    <p class="post_metadesc">Escrito por</p>
    <p class="post_author"><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php the_author(); ?></a></p>
  </div>
  <div class="post_comments">
    <p class="post_metadesc">
      <?php if( get_comments_number() == 0 ) { ?>
        <?php printf('Comece a conversa'); ?> 
      <?php } else printf( _nx( 'Alguém começou a conversa', '%1$s conversando', get_comments_number(), 'comments title', 'textdomain' ), number_format_i18n( get_comments_number() ) ); ?>
      </p>
    <p class="post_comment-cta">
      <a href="<?php comments_link(); ?>">Comenta aqui!</a>
    </p>
  </div>
</div>