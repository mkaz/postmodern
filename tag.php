<?php
/**
 * Tag page
 *
 * @package Post Modern
 */

get_template_part( 'template-parts/header' ); ?>


<main class="tags">

	<header class="entry-header">
		<h2 class="entry-title"></h2>
	</header>

	<?php
	if ( have_posts() ) :
		echo '<section class="portfolio-list">';
		while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/content', 'portfolio' );
		endwhile;
		echo '</section>';
	else :
		echo '<p>No posts found for tag: %s </p>';
	endif;
	?>
</main>


<?php get_template_part( 'template-parts/footer' ); ?>
