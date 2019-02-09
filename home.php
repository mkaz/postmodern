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

<section class="feature">
	<?php
		$cat_id = get_cat_ID( 'series' );
		$query = new WP_Query( array(
			'cat' => $cat_id,
			'posts_per_page' => '1',
		));

		if ( $query->have_posts() ) :
		   while ( $query->have_posts() ) :
			   $query->the_post(); ?>
				<h4><a href="<?php echo get_category_link( $cat_id ); ?>">SERIES </a></h4>
				<?php get_template_part( 'template-parts/content', 'excerpt' ); ?>
			<?php endwhile;
		endif;
		wp_reset_postdata();
	?>
</section>

<section class="feature">
<?php

	$query = new WP_Query( array(
		'tag' => 'dailyphoto',
		'posts_per_page' => '1',
	));

	// need tag id to build link
	$tag = get_term_by('slug', 'dailyphoto','post_tag');
	$tag_id = $tag->term_id;

	if ( $query->have_posts() ) :
	   while ( $query->have_posts() ) :
		   $query->the_post(); ?>
			<h4><a href="<?php echo get_tag_link( $tag_id ); ?>">DAILY PHOTO </a></h4>
			<?php get_template_part( 'template-parts/content', 'excerpt' ); ?>
	<?php endwhile; ?>
<?php endif; ?>
</section>
<?php wp_reset_postdata(); ?>
<?php endif; ?>

<?php
$args = array(
	'tax_query' => array(
		array(
			'taxonomy' => 'post_tag',
			'field'    => 'slug',
			'terms'    => 'dailyphoto',
			'operator' => 'NOT IN',
		),
	),
);
$query = new WP_Query( $args );

if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post();
		get_template_part( 'template-parts/content', 'excerpt' );
	}
	wp_reset_postdata();
}
else { ?>

	<div class="post">
		<p><?php _e( 'Sorry, the page you requested cannot be found.', 'postmodern' ); ?></p>
	</div>

<?php } ?>

</main>

<?php if ( ( ! is_singular() ) && ( $wp_query->post_count >= get_option( 'posts_per_page' ) ) ) : ?>
    <div class="pagination">
        <?php next_posts_link( '<span class="fa fa-arrow-left"></span> ' . __( 'Older posts', 'postmodern')  ); ?>
        <?php previous_posts_link( __( 'Newer posts', 'postmodern' ) . ' <span class="fa fa-arrow-right"></span>' ); ?>
    </div>
<?php endif; ?>


<?php get_template_part( 'template-parts/footer' ); ?>
