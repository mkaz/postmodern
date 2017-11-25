<?php
/*
 * @package postmodern
 */
?>


<article <?php post_class( 'post' ); ?>>


        <div class="featured-image">
            <?php if ( has_post_thumbnail() ) : ?>
    		    <a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_post_thumbnail( 'large' ); ?></a>
            <?php else : ?>
                <div style="text-align:center">
                    <span class="fa fa-photo" style="font-size:128px"></span>
                </div>
            <?php endif; ?>
        </div>


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
