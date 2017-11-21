<?php
/**
 * Single Post Template
 *
 * @package Postmodern
 */

get_template_part( 'template-parts/header' ); ?>


<?php if ( have_posts() ) :
    while ( have_posts() ) : the_post();
        get_template_part( 'template-parts/content' );
    endwhile;

else : ?>

    <div class="post">
        <p><?php _e( 'Sorry, the page you requested cannot be found.', 'postmodern' ); ?></p>
    </div>

<?php endif; ?>


<?php get_template_part( 'template-parts/footer' ); ?>
