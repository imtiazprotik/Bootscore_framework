<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * 
 * @package bootscore
 */

?>
	
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<div class="row">
				<div class="site-info">
					<div class="col-sm-6">
						<div class="copyright-info">
							&copy; Copyright <?php echo date('Y'); ?> <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
						</div>
					</div>
				</div><!-- .site-info -->
				<div id="footer-links" class="site-links">
					<div class="col-sm-6">
						<ul class="nav navbar-nav navbar-right">
							
							<?php
							wp_nav_menu( array(
								'menu'              => 'footer-links',
								'theme_location'    => 'footer-links',
								'depth'             => 1,
								'container'         => 'div',
								'container_class'   => '',
								'container_id'      => '',
								'menu_class'        => 'nav navbar-nav',
								'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
								'walker'            => new wp_bootstrap_navwalker())
							);
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
