<?php
/**
 * Home, Archive, Category Template
 *
 * @package Postmodern
 */

get_template_part( 'template-parts/header' ); ?>


<?php if ( have_posts() ) :
    while ( have_posts() ) : the_post();
        get_template_part( 'template-parts/content', 'excerpt' );
    endwhile;

else : ?>

    <div class="post">
        <p><?php _e( 'Sorry, the page you requested cannot be found.', 'postmodern' ); ?></p>
    </div>

<?php endif; ?>

<?php if ( ( ! is_singular() ) && ( $wp_query->post_count >= get_option( 'posts_per_page' ) ) ) : ?>
    <div class="pagination">
        <?php previous_posts_link( '&larr; ' . __( 'Newer posts', 'postmodern' ) ); ?>
        <?php next_posts_link( __( 'Older posts', 'postmodern') . ' &rarr;' ); ?>
    </div>
<?php endif; ?>


<?php get_template_part( 'template-parts/footer' ); ?>
