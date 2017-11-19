
<header class="global">

    <div class="site-branding">
        <a href="<?php echo esc_url( home_url() ); ?>">
            <?php echo get_avatar(
                'marcus@automattic.com', 128, null, 'Marcus Kazmierczak Profile Photo' );
            ?>
        </a>
        <div class="title">
            <img src="/img/mkaz.svg" class="logo" alt="mkaz.com"/>
            <div><?php echo get_bloginfo( 'description' ); ?></div>
        </div>
    </div>

    <nav>
        <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'menu_id'        => 'primary-menu',
                'container'      => ''
        ) ); ?>

        <?php
            wp_nav_menu( array(
                'theme_location' => 'extended',
                'menu_id' => 'extended-menu',
            ) ); ?>

    </nav>
</header>
