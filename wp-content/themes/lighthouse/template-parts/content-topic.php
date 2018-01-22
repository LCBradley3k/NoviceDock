<?php
/**
 * Template part for displaying posts.
 *
 * Please browse readme.txt for credits and forking information
 * @package Lighthouse
 */

?>

<?php /* Start the Loop */
$i = 1 // number posts
?>

<?php while ( have_posts() ) : the_post(); ?>

	<?php // get the number of resources in a post
		$numOfResources = 0;
		while(have_rows('resource_blocks')) : the_row();
			$numOfResources++;

		endwhile;
	?>
	<?php
	/*
		* Include the Post-Format-specific template for the content.
		* If you want to override this in a child theme, then include a file
		* called content-___.php (where ___ is the Post Format name) and that will be used instead.
		*/
		//include('template-parts/content-excerpt.php');
	/*get_template_part( 'template-parts/content', get_post_format() );*/
	?>

	<article id="post-<?php the_ID(); ?>"  <?php post_class('post-content'); ?>>

		<?php
		if ( is_sticky() && is_home() && ! is_paged() ) {
			printf( '<span class="sticky-post">%s</span>', __( 'Featured', 'lighthouse' ) );
		} ?>
	<a href="<?php the_permalink(); ?>" rel="bookmark">
		<?php lighthouse_featured_image_disaplay(); ?>
		</a>
		<header class="entry-header">
			<?php $title = the_title('', '', 0);
			$title = html_entity_decode($title);
			$title = strtolower(preg_replace("#\s+#u", "-", preg_replace("#[^\w\s]|_#u", "", $title)));
			?>
			<span class="screen-reader-text"><?php the_title();?></span>
			<?php if ( is_single() ) : ?>
				<h1 id="<?php echo $title ?>" class="entry-title"><?php the_title(); ?></h1>
			<?php else : ?>
				<h2 id="<?php echo $title ?>" class="entry-title">
					<span class="post-number"><?php echo $i ?></span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
				</h2>
			<?php endif; // is_single() ?>

		</header><!-- .entry-header -->

	<?php /*
			<div class="entry-summary">

					<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
			*/ ?>
			<div class="entry-content">

					<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->

		<footer class="entry-footer">
			<?php $has_resources = get_field('resource_btn');
			if ($has_resources == true) { ?>
				<div class="resource-wrap">
					<?php $i = 0; ?>
					<h3><span class="number"><?php echo $numOfResources ?></span> Curated Resources <img class="present-icon" src="<?php echo get_template_directory_uri(); ?>/images/present.png" alt="Present Icon"></h3> 
					<?php 
					while(have_rows('resource_blocks')) : the_row();
					if($i < 2) :
						$item_title =  get_sub_field('title');
						$item_img = get_sub_field('image');
						$item_price = get_sub_field('price');
						$item_media_type = get_sub_field('media_type');
						$item_url = get_sub_field('url');

						?>
						<div class="item-block item-block--syllabus">
							<div class="img-wrap img-wrap-small">
							<a rel="noopener noreferrer" target="_blank" href="<?php echo $item_url ?>" onclick="trackOutboundLink('<?php echo $item_url ?>')">
								<img src="<?php echo $item_img['sizes']['resource-thumb'] ?>" alt="<?php echo $item_img["alt"]; ?>" />
							</a>
							</div>
							<div class="top-wrap">
							<a rel="noopener noreferrer" target="_blank" href="<?php echo $item_url ?>" onclick="trackOutboundLink('<?php echo $item_url ?>')"><h4><?php echo $item_title ?></h4></a>
							<div class="main-info">
								<div class="media-type"> <span class="price <?php echo $item_price ?>"><?php echo $item_price ?></span>, <?php echo $item_media_type ?> </div>
							</div>
							</div>

						</div>
					<?php
					endif;
					if($i >= 2 && $i < 5){ 
						// small item blocks
						$item_img = get_sub_field('image');
						$item_url = get_sub_field('url'); ?>
						<div class="item-block-xs">
							<a rel="noopener noreferrer" target="_blank" href="<?php echo $item_url ?>" onclick="trackOutboundLink('<?php echo $item_url ?>')">
								<div class="img-wrap-small"><img src="<?php echo $item_img['sizes']['resource-thumb'] ?>" alt="<?php echo $item_img["alt"]; ?>" /></div>
							</a>
						</div>

					<?php }

					$i++;
				endwhile; ?>
				<a class="entry-footer__btn entry-footer__btn--post" href="<?php the_permalink(); ?>">View Full Summary and Resources</a>
					
				</div>
			<?php } else { ?>
				<div class="resource-wrap resource-wrap--no-resources">
					<h3 class="--none">No Resources</h3>
					<p>Check the other sections in this syllabus to find more resources!</p>
					<a class="entry-footer__btn entry-footer__btn--post" href="<?php the_permalink(); ?>">View Full Summary</a>
				</div>
			<?php } ?>

			<?php lighthouse_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</article><!-- #post-## -->
		<?php $i++ ?>
		<?php endwhile; ?>

		<?php lighthouse_posts_navigation(); ?>
