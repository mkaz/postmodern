<?php
/**
 * Template Name: Portfolio Page Template
 *
 * @package Post Modern
 */

get_template_part( 'template-parts/header' ); ?>


	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<header class="entry-header">
			<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		</header>

		<?php

			// get tag from custom values
			$custom_data = get_post_custom();
			if ( isset( $custom_data['portfolio-category'] ) ) {
				$categories = $custom_data['portfolio-category'];
				if ( ! empty( $categories ) && is_array( $categories ) ) {
					$category = trim( $categories[0] );

					$args = array(
						'category_name' => $category,
						'order' => 'DESC',
					);

					$query = new WP_Query( $args );

					// a loop
					if ( $query->have_posts() ) {

						echo '<div class="portfolio-wrapper">';
						while ( $query->have_posts() ) {
							$query->the_post();
							get_template_part( 'template-parts/content', 'portfolio' );
						}
						echo '</div>';

						wp_reset_postdata();
					}
					else {
						echo '<p> Sorry, no posts matching <b>' . esc_html( $category ) . '</b> category </p>';
					}
				}
				else {
					echo '<p>No category defined for this Portfolio page</p>';
				}
			}
			else {
				echo '<p>Custom Field: <b>portfolio-category</b> not defined.</p>';
			}

		?>
		</main>
	</div>


<?php get_template_part( 'template-parts/footer' ); ?>
