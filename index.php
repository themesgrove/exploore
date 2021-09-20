<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package exploore
 */


$post_number = get_theme_mod('exploore_sticky', '3');

$slider_enable = get_theme_mod('slider_enable');
$slider_post_selector = get_theme_mod('slider_post_selector', 'sticky');
$slider_title_word = get_theme_mod('slider_title_word', '3');

if ($slider_post_selector == 'sticky') {
	$args = array(
		'posts_per_page' => $post_number,
		'post__in'  => get_option( 'sticky_posts' ),
		'ignore_sticky_posts' => 1
	);
}elseif ($slider_post_selector == 'featured'){
	$args = array(
		'posts_per_page' => $post_number,
		'post__in'  => get_option( 'sticky_posts' ),
	    'meta_query' => array(
            array(
                'key'  => 'post-type',
                'value' => 'featured',
                'compare'   => '=',
            )
        ),
		'ignore_sticky_posts' => 1
	);
}elseif ($slider_post_selector == 'recent'){
	$args = array(
		'posts_per_page' => $post_number,
		'post__in'  => get_option( 'sticky_posts' ),
	    'orderby'	=> 'date',
        'order'		=> 'DESC',
		'ignore_sticky_posts' => 1
	);
}else{
	$args = array(
		'posts_per_page' => $post_number,
		'post_type' => 'post',
		'ignore_sticky_posts' => 1
	);

}


$query = new WP_Query( $args );


get_header(); ?>


	<?php if($slider_enable && is_front_page()): ?>

		<div id="exploore-post-slider" class="carousel slide" data-ride="carousel">

		    <!-- Wrapper for slides -->
		    <div class="carousel-inner" role="listbox">
			    <?php 
				    $i=0;
				    
				    while($query->have_posts()) : $query->the_post();
				    $active = ($i == 0 ? 'active' : '');
			    ?>

			    <div class="item <?php echo $active;?>">
			    	
			    	<?php the_post_thumbnail('full'); ?>
			    	
				    <div class="carousel-caption">
				       <?php if(get_the_time()):?>
							<!-- Post date time  -->
							<span class="entry-meta hidden-xs"><a href="<?php the_permalink();?>"><?php the_time('F j, Y'); ?></a></span>
						<?php endif;?> 
					    <h1 class="slider-title text-uppercase">
					    	<a href="<?php the_permalink();?>"><?php echo wp_trim_words( get_the_title(),$slider_title_word, ''); ?></a>
					    </h1>
					    <p class="slider-desc"><?php echo wp_trim_words( get_the_content(),20, ''); ?></p>
					  <a class="btn btn-border" href="<?php the_permalink();?>"><?php esc_html_e('Read More', 'exploore');?></a>
				    </div>
			    </div>
			    <?php $i++; endwhile;  wp_reset_postdata(); ?>

		    </div>
		    <!-- end of /.carousel-inner -->

            

		  <!-- Controls -->
		   <a class="left-control carousel-control" href="#exploore-post-slider" role="button" data-slide="prev">
			   <span class="icon-left ion-ios-arrow-thin-left" aria-hidden="true"></span>
			   <span class="sr-only"><?php esc_html_e('Previous', 'exploore');?></span>
		   </a>
		   <a class="right-control carousel-control" href="#exploore-post-slider" role="button" data-slide="next">
			    <span class="icon-right ion-ios-arrow-thin-right" aria-hidden="true"></span>
			    <span class="sr-only"><?php esc_html_e('Next', 'exploore');?></span>
		    </a>

		</div>
		<!-- end of /#exploore-post-slider -->

	<?php endif; ?>

<?php $sidebar_position = get_theme_mod('tx_sidebar', 'right');?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container">
				<div class="row">

					  
	                <?php if ('left' == $sidebar_position): ?>
                        <div class="col-md-4">
                            <?php get_sidebar(); ?>
                        </div>
                        <!-- end of /.col-md-4 -->
                    <?php endif; ?>
	                     
	                    <div class="col-md-8 main-blog">

						<?php
						if ( have_posts() ) :

							if ( is_home() && ! is_front_page() ) : ?>
								<header>
									<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
								</header>

							<?php
							endif;

							/* Start the Loop */
							while ( have_posts() ) : the_post();

								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'template-parts/content', get_post_format() );

							endwhile;

							the_posts_pagination();

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif; ?>
						
					</div>

					 <?php if ('right' == $sidebar_position): ?>
                        <div class="col-md-4">
                            <?php get_sidebar(); ?>
                        </div>
                    <?php endif; ?>

				</div>
				<!-- end of /.row -->
			</div>
			<!-- end of /.container -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
