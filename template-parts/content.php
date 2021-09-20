<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package exploore
 */
$list_page_meta_position = get_theme_mod('list_page_meta_position', 'top');
?>

<article id="main-post-<?php the_ID(); ?>" <?php post_class('post-image'); ?>> 
	<?php if ( is_sticky() && is_home() && ! is_paged() ): ?>
	      <div class="triangle">
	          <span><i class="fa fa-star-o"></i></span>
	      </div>
	<?php endif; ?>


		<a href="<?php the_permalink(); ?>">
			<div class="single-image">
					<?php the_post_thumbnail(); ?>
			</div>
	    </a> 

	<div class="post-details">

		<?php  if ($list_page_meta_position == 'top'):
		if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta meta-top">
				<?php if(has_category()):?>
					<!-- Post category -->
					<?php esc_html_e('Category:', 'exploore');?> <?php the_category(); ?>
				<?php endif;?> 
			   <?php if(get_the_date()):?>
					<!-- Post date time  -->
					<span><?php esc_html_e('Published:', 'exploore');?> <a href="<?php the_permalink();?>"><?php the_date(); ?></a></span>
				<?php endif;?> 


				<?php if(has_tag()):?>
					<!-- Post tag -->
					<span><?php the_tags(); ?></span>
			    <?php endif;?>
			</div><!-- .entry-meta -->
		<?php endif; endif;?>

		<header class="entry-header">
			<h2 class="entry-title <?php echo ($list_page_meta_position == 'bottom') ? 'margin-top' : ''; ?>"><a href="<?php the_permalink();?>"><?php the_title();?></a>
			</h2>
		</header><!-- .entry-header -->
		<?php  if ($list_page_meta_position == 'bottom'):
			if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta meta-bottom">
					<?php if(has_category()):?>
						<!-- Post category -->
						<?php esc_html_e('Category:', 'exploore');?> <?php the_category(); ?>
					<?php endif;?> 
				   <?php if(get_the_date()):?>
						<!-- Post date time  -->
						<span><?php esc_html_e('Published:', 'exploore');?> <a href="<?php the_permalink();?>"><?php the_date(); ?></a></span>
					<?php endif;?> 


					<?php if(has_tag()):?>
						<!-- Post tag -->
						<span><?php the_tags(); ?></span>
				    <?php endif;?>
				</div><!-- .entry-meta -->
			<?php endif; endif;?>

		<div class="entry-excerpt">
			<p><?php the_excerpt();?></p>
		</div><!-- .entry-content -->

			<footer class="entry-footer">
				<div class="content-btn pull-left">
						<a href="<?php the_permalink(); ?>" class="btn btn-border"><?php esc_html_e('Read More', 'exploore');?></a>					
				</div>
				<div class="edit">	
					<?php
						edit_post_link(
							sprintf(
								/* translators: %s: Name of current post */
								esc_html__( 'Edit %s', 'exploore' ),
								the_title( '<span class="screen-reader-text">"', '"</span>', false )
							),
							'<span class="edit-link">',
							'</span>'
						);
					?>
		        </div>
			</footer> <!-- .entry-footer -->

	</div>

</article><!-- #post-## -->
