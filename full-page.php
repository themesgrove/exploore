<?php
/**
* Template Name: Full Width Page
*/
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package exploore
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main-full">
			<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'full-page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
