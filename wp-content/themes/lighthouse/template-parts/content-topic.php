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

<?php $cat = get_queried_object();
$cat_id = "category_".$cat->term_id;
?>
<div class="title-block title-block--mobile">
	<div class="title-block__wrap">
		<h1><?php echo single_cat_title() ?></h1>
		<div class="tag tag--syllabus">SYLLABUS</div>
		<span class="cat-details"><span><?php echo $cat->count ?></span> Sections</span>
	</div>
</div>

<?php while ( have_posts() ) : the_post(); ?>
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
							<span class="post-number"><?php echo $i ?></span><span><?php the_title(); ?></span>
						</h2>
					<?php endif; // is_single() ?>

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
					<?php $has_resources = get_field('resource_btn');
					if ($has_resources == true) { ?>
						<?php $i = 0;
							while(have_rows('resource_blocks')) : the_row();
							if($i < 3) :
								$item_img = get_sub_field('image'); ?>
								<a href="<?php the_permalink(); ?>">
									<div class="entry-footer__img-wrap entry-footer__img-wrap--<?php echo $i ?> animate-scale-up"><img src="<?php echo $item_img['sizes']['resource-thumb'] ?>" alt="<?php echo $item_img["alt"]; ?>" /></div>
								</a>
							<?php
							endif;
							$i++;
						endwhile; ?>
						<br />
						<a class="resource-btn" href="<?php the_permalink(); ?>">See all resources <i class="fa fa-arrow-right" aria-hidden="true"></i></a>

					<?php } else { ?>
					<?php } ?>

					<?php lighthouse_entry_footer(); ?>
				</footer><!-- .entry-footer -->
			</article><!-- #post-## -->
		<?php $i++ ?>
		<?php endwhile; ?>

		<?php lighthouse_posts_navigation(); ?>
