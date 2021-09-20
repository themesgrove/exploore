<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package exploore
 */


?>

	</div>


			<footer id="footer">
				<div  class="site-footer">
					<div class="container">
					    <div class="row">
							<div class="col-md-4 col-sm-6 col-xs-12">
								<div class="footer-sidebar-1 footer-widget">
									<?php if(dynamic_sidebar('footer-sidebar-1')); ?>
								</div>
							</div>
							<div class="col-md-4 col-sm-6">
								<div class="footer-sidebar-2 col-xs-12 footer-widget">
									<?php if(dynamic_sidebar('footer-sidebar-2')); ?>
								</div>
							</div>
							<div class="col-md-4 col-sm-6 col-xs-12">
								<div class="footer-sidebar-3 footer-widget">
									<?php if(dynamic_sidebar('footer-sidebar-3')); ?>
								</div>
							</div>
					    </div>
					</div>
				</div>
				
				<div class="copyright-info copyright text-center">
				    <div class="container">
				        <div class="row">
					    	<p class="exploore-copy-right">
								<span class="copyright-text">
									<?php
										echo esc_html(get_theme_mod('exploore_copyright', 'Copyright @ 2019. All right reserved.'));
									?>
								</span>
								<br>
								<?php esc_html_e('Exploore Design & Develope By :', 'exploore');?> <a target="_blank" class="copyright-url" href="https://themesgrove.com">
								<?php esc_html_e('Themesgrove', 'exploore');?></a>
							</p>
						</div>
					</div>
				</div><!-- .site-info -->
			</footer><!-- #colophon -->

		<?php wp_footer(); ?>
	</div>

	</body>
</html>
