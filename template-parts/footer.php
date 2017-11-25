
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
    <section class="copyright">
        <span> &copy; 1997-<?php echo date( 'Y' ); ?>
            <a href="<?php echo esc_url( home_url() ); ?>" rel="copyright">mkaz.com</a>
        </span>
        <span class="creative-commons">
            <a rel="license" href="https://creativecommons.org/licenses/by-nc/4.0/">
            <img src="<?php echo get_template_directory_uri(); ?>/inc/by-nc.eu.svg"
                width="88" alt="Creative Commons Attribution-NonCommercial 4.0 International License.">
            </a>
        </span>
    </section>
    <p>Theme: <a href="https://github.com/mkaz/postmodern/">Postmodern</a> by <a href="https://mkaz.com/" rel="designer">mkaz</a></p>
</footer>

<?php wp_footer(); ?>

</body>
</html>