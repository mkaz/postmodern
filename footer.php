
<?php if ( is_active_sidebar( 'footer_left' ) || is_active_sidebar( 'footer_center' ) || is_active_sidebar( 'footer_right' )  ) : ?>
<section class="widget-area">
    <?php if ( is_active_sidebar( 'footer_left' ) ) : ?>
        <aside><?php dynamic_sidebar( 'footer_left' ); ?></aside>
    <?php endif; ?>

    <?php if ( is_active_sidebar( 'footer_center' ) ) : ?>
        <aside><?php dynamic_sidebar( 'footer_center' ); ?></aside>
    <?php endif; ?>

    <?php if ( is_active_sidebar( 'footer_right' ) ) : ?>
        <aside><?php dynamic_sidebar( 'footer_right' ); ?></aside>
    <?php endif; ?>

</section>
<?php endif; ?>

<footer class="global">
    <p>&copy; <?php echo date( 'Y' ); ?> <a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo( 'name' ); ?></a></p>
    <p>Theme: <a href="https://github.com/mkaz/postmodern/">Postmodern</a> by <a href="https://mkaz.com/" rel="designer">mkaz</a></p>
</footer>
