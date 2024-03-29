<?php
/**
 * The template for displaying the footer.
 *
 * Please browse readme.txt for credits and forking information
 * Contains the closing of the #content div and all content after
 *
 * @package Lighthouse
 */

?>




<div class="footer-widget-wrapper">
	<div class="container">

		<div class="row">
				<div class="col-md-4">
								</div>
				<div class="col-md-4">
								</div>
				<div class="col-md-4">
								</div>
			</div>
		</div>
</div>
<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="row info-wrap container">
		<div class="row">
		<div class="col-md-12">
		<div class="made-with">Made With <i class="fa fa-heart" aria-hidden="true"></i> For The Mind</div>
			<div class="fb-like" data-href="https://facebook.com/novicedock" data-layout="button" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div>
			<div class="footer-links">
				<?php while(have_rows('footer_links', 'option')) : the_row(); ?>
					<div class="link"><a href="<?php echo the_sub_field('link', 'option') ?>"><?php echo get_sub_field('name'); ?></a></div>
				<?php endwhile; ?>
			</div>
		</div>
	</div>
	</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>



</body>
</html>
