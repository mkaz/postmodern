<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta http-equiv="content-type" content="<?php bloginfo( 'html_type' ); ?>" charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" >
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>

        <header>
            <h2><a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo( 'name' ); ?></a></h2>
            <p><?php bloginfo( 'description' ); ?></p>
        </header>

        <div class="wrapper">
            <?php if ( have_posts() ) :
                while ( have_posts() ) : the_post();
                    get_template_part( 'content' );
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

            <footer>
                <p>&copy; <?php echo date( 'Y' ); ?> <a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo( 'name' ); ?></a></p>
                <p>Theme: <a href="https://github.com/mkaz/postmodern/">Postmodern</a> by <a href="https://mkaz.com/" rel="designer">mkaz</a></p>
            </footer>

        </div>

        <?php wp_footer(); ?>

    </body>
</html>