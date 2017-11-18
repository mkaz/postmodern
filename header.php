
<header class="global">
    <div>
        <a href="<?php echo esc_url( home_url() ); ?>">
            <img src="/img/xpro2.svg" class="camera-logo" alt="camera icon">
            <img src="/img/mkaz.svg" class="logo" alt="mkaz.com"/>
        </a>
    </div>

    <nav>
        <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'menu_id'        => 'primary-menu',
                'container'      => ''
        ) ); ?>
        <div id="menu-toggle">
            <span class="fa fa-bars"></span>
        </div>
    </nav>
</header>
<nav id="extended" class="off">
<?php
    wp_nav_menu( array(
        'theme_location' => 'extended',
        'menu_id' => 'extended-menu',
        'link_before' => '<span class="fa fa-angle-double-right"></span> ',
) ); ?>
</nav>