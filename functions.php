<?php

/**
 * @package postmodern
 */

function postmodern_setup() {

    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'post-image', 720, 9999 );
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
        wp_register_style( 'postmodern_fonts', '//fonts.googleapis.com/css?family=Roboto:300,400,700|Roboto+Condensed:300,700' );
        wp_enqueue_style( 'postmodern_style', get_stylesheet_uri(), array( 'postmodern_fonts' ) );
        wp_enqueue_style( 'postmodern_font_awesome', get_stylesheet_directory_uri() . '/fa/css/font-awesome.min.css' );
    }
}
add_action( 'wp_print_styles', 'postmodern_load_style' );


/* the following cleans up a bunch of stuff that gets included */

// disable emoji
add_action( 'init', function() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
} );

// remove wp embeds
add_action( 'init', function() {
    remove_action('rest_api_init', 'wp_oembed_register_route');
    remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
    remove_action('wp_head', 'wp_oembed_add_host_js');
}, PHP_INT_MAX - 1 );

// remove jetpack devicepx
add_action( 'wp_enqueue_scripts', function() {
    wp_dequeue_script( 'devicepx' );
}, 20);

// remove jquery-migrate
add_action( 'wp_default_scripts', function( $scripts ) {
    if ( ! empty( $scripts->registered['jquery'] ) ) {
        $scripts->registered['jquery']->deps = array_diff( $scripts->registered['jquery']->deps, array( 'jquery-migrate' ) );
    }
} );