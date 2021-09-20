<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package exploore
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-details'); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
	
		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php if(has_category()):?>
					<!-- Post category -->
					<?php esc_html_e('Category:','exploore');?> <?php the_category(); ?>
				<?php endif;?> 
			   <?php if(get_the_date()):?>
					<!-- Post date time  -->
					<span><?php esc_html_e('Published:','exploore');?> <a href="<?php the_permalink();?>"><?php the_date(); ?></a></span>
				<?php endif;?> 


				<?php if(has_tag()):?>
					<!-- Post tag -->
					<span><?php the_tags(); ?></span>
			    <?php endif;?>
			</div><!-- .entry-meta -->
		<?php endif; ?>

		<?php if ( has_post_thumbnail() ) : ?>
			<div class="single-image">
	        	<?php the_post_thumbnail(); ?>
			</div>
		<?php endif; ?>

	<div class="entry-content">		
		<?php the_content(); ?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->

