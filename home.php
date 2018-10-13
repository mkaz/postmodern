<?php
/**
 * Home
 *
 * @package Postmodern
 */

get_template_part( 'template-parts/header' ); ?>

<main>

<?php 
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
if ( $paged === 1 ):
?>
<section class="featured">

<div class="main-feature">
<?php
    $query = new WP_Query( array(
        'tag' => 'featured',
        'posts_per_page=1',
    ));

    if ( $query->have_posts() ) {
       while ( $query->have_posts() ) { 
           $query->the_post(); ?>

            <div class="featured-image">
                <?php if ( has_post_thumbnail() ) : ?>
                    <a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_post_thumbnail( 'large' ); ?></a>
                <?php else : ?>
                    <div style="text-align:center">
                        <span class="fa fa-photo" style="font-size:128px"></span>
                    </div>
                <?php endif; ?>
            </div>
            <h2>
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <?php the_title(); ?>
                </a>
            </h2>
    <?php } ?>
<?php } ?>
</div>

<div class="second-feature">
<?php

    $query = new WP_Query( array(
        'tag' => 'featured2',
        'posts_per_page=1',
    ));

    if ( $query->have_posts() ) {
       while ( $query->have_posts() ) { 
           $query->the_post(); ?>

            <div class="featured-image">
                <?php if ( has_post_thumbnail() ) : ?>
                    <a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_post_thumbnail( 'large' ); ?></a>
                <?php else : ?>
                    <div style="text-align:center">
                        <span class="fa fa-photo" style="font-size:128px"></span>
                    </div>
                <?php endif; ?>
            </div>
            <h2>
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <?php the_title(); ?>
                </a>
            </h2>
    <?php } ?>
<?php } ?>
</div>
</section>
<?php wp_reset_postdata(); ?>
<?php endif; ?>


<section class="articles">
    <?php if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            get_template_part( 'template-parts/content', 'excerpt' );
        endwhile;

    else : ?>

        <div class="post">
            <p><?php _e( 'Sorry, the page you requested cannot be found.', 'postmodern' ); ?></p>
        </div>

    <?php endif; ?>
</section>

</main>

<?php if ( ( ! is_singular() ) && ( $wp_query->post_count >= get_option( 'posts_per_page' ) ) ) : ?>
    <div class="pagination">
        <?php next_posts_link( '<span class="fa fa-arrow-left"></span> ' . __( 'Older posts', 'postmodern')  ); ?>
        <?php previous_posts_link( __( 'Newer posts', 'postmodern' ) . ' <span class="fa fa-arrow-right"></span>' ); ?>
    </div>
<?php endif; ?>


<?php get_template_part( 'template-parts/footer' ); ?>
