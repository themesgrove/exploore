<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package exploore
 */
$sidebar_position = get_theme_mod('tx_sidebar');
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		    <div class="container">
				<div class="row">
		            <?php if ('left' == $sidebar_position): ?>
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <?php get_sidebar(); ?>
                        
                    <?php endif; ?>
		                     
				    <div class="col-md-8">

						<section class="error-404 not-found">
							<header class="page-header">
								<h1 class="page-title"><?php esc_html_e( '404! That page can&rsquo;t be found.', 'exploore' ); ?></h1>
							</header><!-- .page-header -->

							<div class="page-content">
								<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'exploore' ); ?></p>

								<?php
									get_search_form();

								?>



							</div><!-- .page-content -->
						</section><!-- .error-404 -->
				    </div>
					 <?php if ('right' == $sidebar_position): ?>
		                <div class="col-md-4 col-sm-12 col-xs-12">
		                    <?php get_sidebar(); ?>
		                </div>
		            <?php endif; ?>
			    </div>

			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
