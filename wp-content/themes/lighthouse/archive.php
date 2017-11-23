<?php
/**
 * The template for displaying archive pages.
 *
 *
 * Please browse readme.txt for credits and forking information
 *
 * @package Lighthouse
 */
get_header(); ?>

<div id="content" class="site-content content-with-sidebar">

<div class="container syllabus-container">

	<div class="row">
		<?php /*
		include('template-parts/content-.php');
		get_template_part( 'template-parts/content', get_post_format() );*/ ?>

		<?php if ( have_posts() ) : ?>

			<div class="col-md-9 content-area">
					<main id="main" class="site-main" role="main">
						<?php get_template_part( 'template-parts/content-topic') ?>
			<?php endif; ?>
					</main><!-- #main -->
			</div><!-- #primary -->
			<div class="col-md-3 sidebar-wrap">
				<?php get_template_part('template-parts/sidebar'); ?>
			</div>

				<?php get_sidebar('sidebar-1'); ?>

	</div> <!--.row-->
</div><!--.container-->
<div class="container writer-container">
	<div class="row">
		<div class="col-md-12">
			<?php get_template_part('template-parts/content-writer'); ?>
		</div>
	</div>
</div>

</div>

		<?php get_footer(); ?>
