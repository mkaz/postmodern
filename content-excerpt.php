<?php
/*
 * @package postmodern
 */
?>


<article <?php post_class( 'post' ); ?>>

    <?php if ( has_post_thumbnail() ) : ?>
        <div class="featured-image">
    		<a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_post_thumbnail( 'medium' ); ?></a>
        </div>
    <?php endif; ?>

    <section class="post">

        <h2 class="title">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
        </h2>

        <?php if ( get_post_type() == 'post' ) : ?>
        <section class="meta">
            <div class="post-date">
                <span class="fa fa-calendar"></span>
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <?php the_time( get_option( 'date_format' ) ); ?>
                </a>
            </div>
        </section>
        <?php endif; ?>

        <section class="content">
            <?php the_excerpt(); ?>
        </section>

        <?php postmodern_get_tags(); ?>

    </section>

</article>
