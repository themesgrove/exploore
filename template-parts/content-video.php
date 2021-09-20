<?php
/**
 * Template part for displaying video posts formats.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package exploore
 */

?>
<div class="single-blog video-post">
	<article id="post-video-<?php the_ID(); ?>" <?php post_class(); ?>>

				

			<div class="post-details">
				<?php  if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta">
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
			    <?php endif; ?>
				
				<header class="entry-header">
						<h2 class="entry-title">
							<a href="<?php the_permalink();?>"><?php the_title();?></a>
						</h2>

			   </header><!-- .entry-header -->

				<div class="video-excerpt">
						<?php the_content();?>	
				</div>
			  
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

</div>
