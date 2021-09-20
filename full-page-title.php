<?php
/**
* Template Name: Full Width With Page Title
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
	// Header Bg
	$header_bg = get_theme_mod('header_image');
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main-full">

		
	<?php if (has_post_thumbnail()):?>
		<?php
		    $thumbnail_data = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'my-fun-size' );
		    $thumbnail_url = $thumbnail_data[0];
		?>
		<div class="page-header-bg"
		  style="
		   background-image:url('<?php echo $thumbnail_url; ?>');
		    background-position: center center;
		    background-size: cover;
		    background-repeat: no-repeat;
		">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="page-header-title">
							<h1 class="title"><?php wp_title(' '); ?></h1>
						</div><!-- .page-header -->
					</div><!-- .col-md-12 -->
				</div><!-- .row -->
			</div><!-- .container -->
		</div> <!-- .header-bg -->
	<?php else: ?>
		<?php if(isset($header_bg)): ?>

			<div class="page-header-bg"
			  style="
			   background-image:url('<?php echo $header_bg; ?>');
			    background-position: center center;
			    background-size: cover;
			    background-repeat: no-repeat;
			">
			<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="page-header-title">
								<h1 class="title"><?php wp_title(' '); ?></h1>
							</div><!-- .page-header -->
						</div><!-- .col-md-12 -->
					</div><!-- .row -->
				</div><!-- .container -->
			</div>
		<?php endif;?>

	<?php endif; ?>

			<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'full-page-title' );

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
