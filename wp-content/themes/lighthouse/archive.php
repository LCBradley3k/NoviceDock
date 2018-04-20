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

<div class="syllabus-visual">
	<div class="container">
	<div class="row">
	<div class="col-md-12">
		<div class="syllabus-visual__inner-wrap">
			<h1><?php echo single_cat_title() ?></h1>
			<div class="tag tag--syllabus">
			<?php $cat = get_queried_object(); 
					$catid = get_queried_object_id();
			?>
			<?php echo the_field("category_type", $cat); ?>
			
			</div>
		</div>
		<div class="syllabus-visual--footer">

			<?php 
			$totalNumOfResources = 0;
			$totalWords = 0;
			while ( have_posts() ) : the_post(); 
				// get the number of resources in a post
				$text = wp_strip_all_tags( get_the_content() );
				$totalWords += str_word_count($text);
				while(have_rows('resource_blocks')) : the_row();
					$totalNumOfResources++;
				endwhile;
			endwhile;
			?>

				<p class="desc">Written by <span class="writer">
					<?php $category = get_queried_object();
					$j = 0;
					if(have_rows('writers', $category)) :
					while(have_rows('writers', $category)) : the_row(); ?> 
						<?php $post_objects = get_sub_field('writer', $category ); ?>
						<?php if( $post_objects ) : 
							$post = $post_objects; 
							setup_postdata($post); 	
							if($j == 0){ ?>
								<?php echo get_the_title($post_object->ID);?>
							<?php }
							$j++;
						endif; ?>
					<?php endwhile;
					endif; ?>
				</span></p>
				<p class="desc"><span class="number number--sections"><?php echo $category->count ?></span> Sections</p>
				<p class="desc"><span class="number number--resources"><?php echo $totalNumOfResources ?></span> Resources</p>
				<p class="desc"><span class="number number--min"><?php echo floor($totalWords / 220) ?></span> Min Read</p>
			</div>
	</div>
	</div>
	</div>
</div>

<div class="container syllabus-container">

	<div class="row">
		<?php /*
		include('template-parts/content-.php');
		get_template_part( 'template-parts/content', get_post_format() );*/ ?>

		<?php if ( have_posts() ) : ?>

			<div class="col-md-9 content-area">
				<?php  
					$category = get_queried_object();
					$cta = get_field("cta", $category);
					if (!empty($cta)):
				?>
				<div class="cta">
					<div class="alert-icon-wrap"><img src="<?php echo get_template_directory_uri(); ?>/images/announce.png" alt="Announcement Icon"></div>
						<?php echo $cta ?>
				</div>
					<?php endif; ?>
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
