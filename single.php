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
?>

    <section class="prevnext">
        <?php
            $prev = get_previous_post( true ); // same category
            if ( $prev ) :
                $thumbnail = get_the_post_thumbnail( $prev, 'thumbnail' ); ?>
                <div class="prev">
                    <a href="<?php echo get_permalink( $prev ); ?>">
                        <?php echo $thumbnail; ?>
                        <span class="fa fa-arrow-left"></span>
                        <?php echo get_the_title( $prev );  ?>
                    </a>
                </div>
        <?php endif; ?>

        <?php
            $next = get_next_post( true ); // same category
            if ( $next ) :
                $thumbnail = get_the_post_thumbnail( $next, 'thumbnail' ); ?>
                <div class="next">
                    <a href="<?php echo get_permalink( $next ); ?>">
                        <?php echo $thumbnail; ?>
                        <?php echo get_the_title( $next ); ?>
                        <span class="fa fa-arrow-right"></span>
                    </a>
                </div>
            <?php endif; ?>
    </section>

    <?php if ( is_singular() ) { comments_template(); } ?>

<?php else : ?>

    <div class="post">
        <p><?php _e( 'Sorry, the page you requested cannot be found.', 'postmodern' ); ?></p>
    </div>

<?php endif; ?>


<?php get_template_part( 'template-parts/footer' ); ?>
