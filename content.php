<?php
/*
 * @package postmodern
 */
?>

<article <?php post_class( 'post'); ?>>
    <?php if ( ! get_post_format() == 'aside' ) : ?>
        <h1 class="title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
    <?php endif; ?>

    <?php if ( has_post_thumbnail() ) : ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="featured-image">
            <?php the_post_thumbnail( 'post-image' ); ?>
        </a>
    <?php endif; ?>

    <div class="post-date">
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <?php the_time( get_option( 'date_format' ) ); ?>
        </a>
    </div>

    <div class="content">
        <?php the_content(); ?>
    </div>

    <?php if ( is_singular() ) { wp_link_pages(); }?>

    <?php if ( get_post_type() == 'post' ) : ?>
        <div class="meta">
            <?php if ( is_singular( 'post' ) ) : ?>
                <p><?php _e( 'In', 'postmodern' ); ?> <?php the_category( ', ' ); ?></p>
                <p><?php the_tags( ' #', ' #', ' ' ); ?></p>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <?php if ( is_singular() ) { comments_template(); } ?>

</article>
