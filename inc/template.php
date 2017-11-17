<?php

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


add_filter( 'img_caption_shortcode', 'postmodern_caption_shortcode', 10, 3 );
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