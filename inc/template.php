<?php

function postmodern_get_tags() {
    global $post;
    foreach( get_the_tags( $post->ID ) as $tag ) {
        echo '<a href="' . get_tag_link( $tag->term_id ) . '">#' . $tag->name . '</a>';
    }
}