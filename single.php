<?php
/**
 * Single Post Template
 *
 * @package Postmodern
 */

get_header(); ?>


<?php if ( have_posts() ) :
    while ( have_posts() ) : the_post();
        get_template_part( 'content' );
    endwhile;

else : ?>

    <div class="post">
        <p><?php _e( 'Sorry, the page you requested cannot be found.', 'postmodern' ); ?></p>
    </div>

<?php endif; ?>


<?php get_footer(); ?>
