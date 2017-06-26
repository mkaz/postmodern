<?php
/*
 * @package postmodern
 */
?>

<article <?php post_class( 'post'); ?>>

    <?php if ( has_post_thumbnail() ) : ?>
        <figure class="full-width">
            <img src="<?php the_post_thumbnail_url( 'post-image' ); ?>"  title="<?php the_title_attribute(); ?>"  class="featured-image"/>
        </figure>
    <?php endif; ?>

    <h1 class="title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>

    <?php if ( get_post_type() == 'post' ) : ?>
    <div class="meta">
        <span class="post-date">
            <span class="fa fa-calendar"></span>
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                <?php the_time( get_option( 'date_format' ) ); ?>
            </a>
        </span>
        <span class="post-category">
            <span class="fa fa-folder"></span>
            <?php the_category( ', ' ); ?>
        </span>
        <span class="post-tags">
            <?php the_tags( ' #', ' #', ' ' ); ?>
        </span>
    </div>
    <?php endif; ?>

    <div class="content">
        <?php the_content(); ?>
    </div>

    <?php if ( is_singular() ) { wp_link_pages(); }?>

    <?php if ( is_singular() ) { comments_template(); } ?>

</article>
