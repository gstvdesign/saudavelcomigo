<?php 

$theme = wp_get_theme();
define('THEME_VERSION', $theme->Version); 


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
  wp_enqueue_style('strategizze', get_template_directory_uri() . '/style.css', [], THEME_VERSION, false);
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
      'header-menu' => __('Header Menu'),
      'footer-menu' => __('Footer Menu')
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
    register_sidebar(
      array(
        'id'            => 'secondary',
        'name'          => __('Widget de rodapé'),
        'description'   => __('Pode jogar coisas aqui'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget_title">',
        'after_tile'    => '</h3>'
      )
      );
}

add_action('widgets_init', 'strategizze_sidebar');

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