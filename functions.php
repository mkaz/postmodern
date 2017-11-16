<?php

/**
 * @package postmodern
 */

function postmodern_setup() {

    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'post-image', 1920, 9999 );
    add_theme_support( 'title-tag' );

    register_nav_menu( 'primary-menu', __( 'Primary Menu', 'postmodern' ) );
    load_theme_textdomain( 'postmodern', get_template_directory() . '/languages' );

    $locale_file = get_template_directory() . "/languages/" . get_locale();
    if ( is_readable( $locale_file ) ) {
        require_once( $locale_file );
    }

}
add_action( 'after_setup_theme', 'postmodern_setup' );


function postmodern_load_style() {
    if ( ! is_admin() ) {
        wp_register_style( 'postmodern_fonts', '//fonts.googleapis.com/css?family=Noto+Serif:400,700' );
        wp_enqueue_style( 'postmodern_style', get_stylesheet_uri(), array( 'postmodern_fonts' ) );
        wp_enqueue_style( 'postmodern_font_awesome', get_stylesheet_directory_uri() . '/fa/css/font-awesome.min.css' );
    }
}
add_action( 'wp_print_styles', 'postmodern_load_style' );


// Remove Paragraph Tags from Images, wrap instead with <div class="figure"></div>
function img_unautop($pee) {
    $pee = preg_replace('/<p>\\s*?(<a .*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s', '<figure>$1</figure>', $pee);
    return $pee;
}
add_filter( 'the_content', 'img_unautop', 30 );


require get_template_directory() . '/inc/template.php';
require get_template_directory() . '/inc/wp-scrub.php';
