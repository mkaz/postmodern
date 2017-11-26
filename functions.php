<?php
/**
 * @package Postmodern
 */

function postmodern_setup() {
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'post-image', 1920, 9999 );
    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'postmodern_setup' );


function postmodern_load_style() {
    if ( ! is_admin() ) {
        $version = filemtime( get_stylesheet_directory() . '/style.css' );
        wp_register_style( 'postmodern_fonts', '//fonts.googleapis.com/css?family=Noto+Serif:400,700' );
        wp_enqueue_style( 'postmodern_style', get_stylesheet_uri(), array( 'postmodern_fonts' ), $version );
        wp_enqueue_style( 'postmodern_font_awesome', get_stylesheet_directory_uri() . '/fa/css/font-awesome.min.css' );
    }
}
add_action( 'wp_print_styles', 'postmodern_load_style' );


function postmodern_excerpt_length( $length ) {
	return 27;
}
add_filter( 'excerpt_length', 'postmodern_excerpt_length', 999 );


function postmodern_register_menus() {
    register_nav_menus( array(
    	'primary-menu' => 'Primary Menu',
    	'social-menu' => 'Social Menu',
    ) );
}
add_action( 'init', 'postmodern_register_menus' );


function postmodern_widgets_init() {
	register_sidebar( array(
		'name'          => 'Footer Left Widget Area',
		'id'            => 'footer_left',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => 'Footer Center Widget Area',
		'id'            => 'footer_center',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );


	register_sidebar( array(
		'name'          => 'Footer Right Widget Area',
		'id'            => 'footer_right',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'postmodern_widgets_init' );



// Remove Paragraph Tags from Images, wrap instead with <div class="figure"></div>
function img_unautop($pee) {
    $pee = preg_replace('/<p>\\s*?(<a .*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s', '<figure>$1</figure>', $pee);
    return $pee;
}
add_filter( 'the_content', 'img_unautop', 30 );


function postmodern_get_tags() {
    global $post;
    $tags = get_the_tags( $post->ID );
    if ( empty( $tags ) ) { return; }

    echo '<div class="post-tags">';
    echo '<span class="fa fa-tag"></span>';

    foreach( get_the_tags( $post->ID ) as $tag ) {
        echo '<a href="' . get_tag_link( $tag->term_id ) . '">#' . $tag->name . '</a>';
    }
    echo '</div>';
}


function postmodern_caption_shortcode( $empty, $attr, $content ) {
	$attr = shortcode_atts( array(
		'id'      => '',
		'align'   => 'alignnone',
		'width'   => '',
		'caption' => ''
	), $attr );

	if ( 1 > (int) $attr['width'] || empty( $attr['caption'] ) ) {
		return '';
	}

	if ( $attr['id'] ) {
		$attr['id'] = 'id="' . esc_attr( $attr['id'] ) . '" ';
	}

	return '<figure ' . $attr['id']
	. 'class="wp-caption ' . esc_attr( $attr['align'] ) . '" '
	. 'style="max-width: ' . ( 10 + (int) $attr['width'] ) . 'px;">'
	. do_shortcode( $content )
	. '<figcaption>' . $attr['caption'] . '</figcaption>'
	. '</figure>';
}
add_filter( 'img_caption_shortcode', 'postmodern_caption_shortcode', 10, 3 );

require get_template_directory() . '/inc/wp-scrub.php';
