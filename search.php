<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package exploore
 */

get_header(); ?>

	<section id="primary" class="content-area search">
		<main id="main" class="site-main">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<?php
						if ( have_posts() ) : ?>

							<header class="page-header">
								<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'exploore' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
							</header><!-- .page-header -->

							<?php
							/* Start the Loop */
							while ( have_posts() ) : the_post();

								/**
								 * Run the loop for the search to output the results.
								 * If you want to overload this in a child theme then include a file
								 * called content-search.php and that will be used instead.
								 */
								

							endwhile;

							get_template_part( 'template-parts/content', get_post_format() );

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif; ?>
					</div>
					<div class="col-md-4 col-sm-12 col-xs-12">
						<?php get_sidebar();?>
					</div>
				</div>
			</div>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php

get_footer();
