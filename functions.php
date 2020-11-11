<?php 

// Theme support
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'custom-logo' );

$header_args = array(
  'width' => 1000,
  'height' => 200,
  'default-image' => get_template_directory_uri() . 'assets/img/hero.png'
);

add_theme_support( 'custom-header', $header_args );

// Styles and scripts
function strategizze_assets() { 
  wp_enqueue_style('strategizze', get_template_directory_uri() . '/style.css', false);
  wp_enqueue_script('strategizze', get_template_directory_uri() . '/assets/js/script.js', true);
  wp_enqueue_script('font-awesome', 'https://kit.fontawesome.com/e27b9210b4.js', true );
}

add_action('wp_enqueue_scripts', 'strategizze_assets');

// Custom font

function strategizze_customfont() {
  wp_register_style('custom-font', 'https://use.typekit.net/poo6pzb.css');
  wp_enqueue_style('custom-font');
}

add_action('wp_print_styles', 'strategizze_customfont');

// Menu
function strategizze_menu() {
  register_nav_menus(
    array(
      'header-menu' => __('Header Menu')
    )
    );
}

add_action('init', 'strategizze_menu');

// Sidebar 

function strategizze_sidebar() {
  register_sidebar(
    array(
      'id'            => 'primary',
      'name'          => __('Widget Lateral'),
      'description'   => __('Pode jogar coisas aqui'),
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget'  => '</aside>',
      'before_title'  => '<h3 class="widget_title">',
      'after_tile'    => '</h3>'
    )
    );
}

add_action('widgets_init', 'strategizze_sidebar');

class My_Widget extends WP_Widget {
 
  function __construct() {

      parent::__construct(
          'my-text',  // Base ID
          'My Text'   // Name
      );

      add_action( 'widgets_init', function() {
          register_widget( 'My_Widget' );
      });

  }

  public $args = array(
      'before_title'  => '<h4 class="widgettitle">',
      'after_title'   => '</h4>',
      'before_widget' => '<div class="widget-wrap">',
      'after_widget'  => '</div></div>'
  );

  public function widget( $args, $instance ) {

      echo $args['before_widget'];

      if ( ! empty( $instance['title'] ) ) {
          echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
      }

      echo '<div class="textwidget">';

      echo esc_html__( $instance['text'], 'text_domain' );

      echo '</div>';

      echo $args['after_widget'];

  }

  public function form( $instance ) {

      $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'text_domain' );
      $text = ! empty( $instance['text'] ) ? $instance['text'] : esc_html__( '', 'text_domain' );
      ?>
      <p>
      <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:', 'text_domain' ); ?></label>
          <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
      </p>
      <p>
          <label for="<?php echo esc_attr( $this->get_field_id( 'Text' ) ); ?>"><?php echo esc_html__( 'Text:', 'text_domain' ); ?></label>
          <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>" type="text" cols="30" rows="10"><?php echo esc_attr( $text ); ?></textarea>
      </p>
      <?php

  }

  public function update( $new_instance, $old_instance ) {

      $instance = array();

      $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
      $instance['text'] = ( !empty( $new_instance['text'] ) ) ? $new_instance['text'] : '';

      return $instance;
  }

}
$my_widget = new My_Widget();

add_action( 'widgets_init', 'wpdocs_register_widgets' );
 
function wpdocs_register_widgets() {
    register_widget( 'My_Widget' );
}

$defautl_header_img = array(
  'default_header' => array(
    'url' => get_template_directory_uri() . '/assets/img/hero.png',
    'description' => 'default image for header'
    ),
  );

register_default_headers( $defautl_header_img );

function wcr_share_buttons() {
  $url = urlencode(get_the_permalink());
  $title = urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8'));
  $media = urlencode(get_the_post_thumbnail_url(get_the_ID(), 'full'));

  include( locate_template('post-footer.php', false, false) );
}


?>