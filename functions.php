<?php

/**
 * @package postmodern
 */

function postmodern_setup() {
    
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'post-image', 720, 9999 );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-formats', array( 'aside' ) );
    

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
        wp_register_style( 'postmodern_fonts', '//fonts.googleapis.com/css?family=Roboto:300,400,700|Roboto+Condensed:700' );
        wp_enqueue_style( 'postmodern_style', get_stylesheet_uri(), array( 'postmodern_fonts' ) );
    } 
}
add_action( 'wp_print_styles', 'postmodern_load_style' );
