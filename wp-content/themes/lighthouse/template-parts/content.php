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
<div class="container content-container">
	<div class="row">
		<div class="col-md-12">
			<div class="title-block title-block--resources">
				<div class="title-block__wrap">
					<h1><?php echo the_title(); ?></h1>
					<div class="tag tag--resources">RESOURCES</div>
					<span class="cat-details"><a href="<?php echo esc_html($cat_link); ?>#<?php echo $title ?>">in <span class="cat"><?php echo $cat_name ?></span></a></span>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<?php get_template_part('blocks/resource-layouts/layout-generic') ?>
		</div>
	</div>
</div>
