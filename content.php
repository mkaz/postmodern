<?php
/*
 * @package postmodern
 */
?>

<article <?php post_class( 'post'); ?>>

    <?php if ( has_post_thumbnail() ) : ?>
        <figure class="full-width">
            <img src="<?php the_post_thumbnail_url( 'full' ); ?>"  title="<?php the_title_attribute(); ?>"  class="featured-image"/>
        </figure>
    <?php endif; ?>

    <header>
        <h1 class="title">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
        </h1>
    </header>

    <?php if ( get_post_type() == 'post' ) : ?>
    <section class="meta">
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
    </section>
    <?php endif; ?>

    <section class="content">
        <?php the_content(); ?>
    </section>

    <footer>
        <?php postmodern_get_tags(); ?>
    </footer>

    <?php if ( is_singular() ) { wp_link_pages(); }?>

    <?php if ( is_singular() ) { comments_template(); } ?>

</article>
