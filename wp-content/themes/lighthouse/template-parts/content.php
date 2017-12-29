<?php
/**
 * Template part for displaying posts.
 *
 * Please browse readme.txt for credits and forking information
 * @package Lighthouse
 */

?>
	<?php
	$post = get_queried_object();
	$post_id = get_the_ID();
	$cat = get_the_category();
	$cat_id = "category_".$cat[0]->term_id;
	$cat_name = esc_html( $cat[0]->name );
	$cat_link = get_category_link( $cat[0]->term_id );
	$title = the_title('', '', 0);
	$title = html_entity_decode($title);
	$title = strtolower(preg_replace("#\s+#u", "-", preg_replace("#[^\w\s]|_#u", "", $title)));

	 ?>
	 <?php /*
	<div class="resources-top-wrap">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="title">
						<a href="<?php echo esc_html($cat_link); ?>#<?php echo $title ?>"><h1 class="go-back">Return to <span class="cat"><?php echo $cat_name ?></span></h1></a>
					</div>
				</div>
			</div>
		</div>
	</div>
*/ ?>
<div class="syllabus-section-visual">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
			<h1><?php echo the_title(); ?></h1>
			<a href="<?php echo esc_html($cat_link); ?>#<?php echo $title ?>"><span class="arrow"><i class="fa fa-arrow-left" aria-hidden="true"></i></span> Return to <span class="section"><?php echo $cat_name ?></span> <span class="syllabus">Syllabus</span></a>
			</div>
		</div>
	</div>
</div>
<div class="container content-container">
	<!--<div class="row">
		<div class="col-md-12">
			<div class="title-block title-block--resources">
				<div class="title-block__wrap">
					<div class="tag tag--resources">RESOURCES</div>
					<span class="cat-details"><a href="<?php echo esc_html($cat_link); ?>#<?php echo $title ?>">in <span class="cat"><?php echo $cat_name ?></span></a></span>
				</div>
			</div>
		</div>
	</div>-->
	<div class="row row--section-content">
		<div class="col-md-9 content-area">
			<article class="section-article post-content">
				<!--<div class="top-line">Last updated on Nov. 26 2017</div>-->
				<?php lighthouse_featured_image_disaplay(); ?>
				</a>
				<header class="entry-header">
					
				</header><!-- .entry-header -->

					<?php /*
					<div class="entry-summary">

							<?php the_excerpt(); ?>
					</div><!-- .entry-summary -->
					*/ ?>
					<div class="entry-content">

							<?php the_content(); ?>
					</div><!-- .entry-summary -->

				<footer class="entry-footer">
				</footer>
			</article>
		</div>
		<div class="col-md-3">
			<div class="section-sidebar-wrap">
				<img class="note" src="<?php echo get_template_directory_uri(); ?>/images/spaceship.png" alt="Spaceship Icon">
				<?php $i = 0; ?>
				<?php 
				$numOfQuotes = count(get_field('quotes', 'option')) - 1;
				$random = rand(0,$numOfQuotes); ?>

				<?php if(have_rows('quotes', 'option')) : ?>
					<?php while(have_rows('quotes', 'option')) : the_row(); ?>
						<?php if($i == $random) : ?>
							<p><?php echo the_sub_field('quote', 'option'); ?></p>
						<?php endif; ?>
						<?php $i++; ?>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">

			<?php 
				$has_resources = get_field('resource_btn');
				if ($has_resources == true) { ?>
					<div class="resource-wrap resource-wrap--section">
						<?php 
						$numOfResources = 0; 
						while(have_rows('resource_blocks')) : the_row();
							$numOfResources++;
						endwhile; 
						?>
						<h3><span class="number"><?php echo $numOfResources ?></span> Curated Resources</h3>
						
					</div>
				<?php } else { ?>
					<div class="resource-wrap resource-wrap--no-resources resource-wrap--section">
						<h3 class="--none">No Resources</h3>
						<p>Check the other sections in this syllabus to find more resources!</p>
					</div>
			<?php } ?>
			<?php get_template_part('blocks/resource-layouts/layout-generic') ?>
		</div>
	</div>
</div>
<div class="section-footer">
	<div class="container">
		<div class="row row--section-footer">
			<div class="col-md-6 prev">
				<?php next_post_link('%link', '<i style="margin-right:0.5em" class="fa fa-arrow-left" aria-hidden="true"></i> Previous Section', TRUE); ?> 
			</div>
			<div class="col-md-6 next">
				<?php previous_post_link('%link', 'Next Section <i style="margin-left:0.5em" class="fa fa-arrow-right" aria-hidden="true"></i>', TRUE); ?> 
			</div>
		</div>
	</div>
</div>