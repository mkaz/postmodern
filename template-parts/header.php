<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta http-equiv="content-type" content="<?php bloginfo( 'html_type' ); ?>" charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" >
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>

        <header class="global">

            <div class="site-branding">
                <a href="<?php echo esc_url( home_url() ); ?>">
                    <?php echo get_avatar(
                        'marcus@automattic.com', 72, null, 'Marcus Kazmierczak Profile Photo' );
                    ?>
                </a>
                <div class="title">
                    <h3><?php echo get_bloginfo( 'title' ); ?></h2>
                    <h4><?php echo get_bloginfo( 'description' ); ?></h3>
                </div>
            </div>

            <nav>
                <?php wp_nav_menu( array( 'theme_location' => 'primary-menu' ) ); ?>
                <?php wp_nav_menu( array( 'theme_location' => 'extended-menu' ) ); ?>
            </nav>

        </header>
