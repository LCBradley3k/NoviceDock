<?php
/**
 * The template for displaying all single posts.
 *
 * Please browse readme.txt for credits and forking information
 * @package Lighthouse
 */

get_header(); ?>

<div id="content" class="site-content">

			<div id="primary" class="col-md-12 content-area">
				<main id="main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/content',get_post_format()); ?>
				</main><!-- #main -->
			<?php endwhile; ?>
			</div><!-- #primary -->
    </div><!--.container-->
    <?php get_footer(); ?>
