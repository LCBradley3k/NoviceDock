<?php
/**
 * Template Name: Contact
 * Full width template for Lighthouse theme
 *
 * Please browse readme.txt for credits and forking information
 * @package Lighthouse
 */

get_header(); ?>

		<div class="container">
            <div class="row">
              <div class="col-md-12">
				<div id="primary" class="">
					<main id="main" class="site-main" role="main">

            <div class="contact-form-wrap">

            	<?php lighthouse_featured_image_disaplay(); ?>

            	<header class="entry-header">
            		<span class="screen-reader-text"><?php the_title();?></span>
            		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

            		<div class="entry-meta"></div><!-- .entry-meta -->
            	</header><!-- .entry-header -->


            	<div class="entry-content">
            		<?php the_content(); ?>
            	</div><!-- .entry-content -->

            	<footer class="entry-footer">
            		<?php edit_post_link( esc_html__( 'Edit', 'lighthouse' ), '<span class="edit-link">', '</span>' ); ?>
            	</footer><!-- .entry-footer -->
            </div><!-- #post-## -->



					</main><!-- #main -->
				</div><!-- #primary -->
      </div>
			</div> <!--.row-->
        </div><!--.container-->
        <?php get_footer(); ?>
