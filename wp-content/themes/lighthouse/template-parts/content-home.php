<?php
/**
 * Template part for displaying posts.
 *
 * Please browse readme.txt for credits and forking information
 * @package Lighthouse
 */

?>

<div id="content" class="site-content">

<div id="main-categories-wrap">
<div class="container">
	<div class="row">
		<div class="col-md-12 homepage-widget-wrap">
		<?php /* <h4><?php echo the_field('top_text', 'option'); ?></h4> */ ?>
		<div class="categories-container">
			<?php $i = 0 ?>
			<?php if(have_rows('steps', 'option')) : ?>
				<?php while(have_rows('steps', 'option')) : the_row(); ?>
					<?php $i++ ?>
					<div class="item"><span style="color:<?php echo the_sub_field('color', 'option') ?>"><?php echo $i ?></span><?php echo the_sub_field('text', 'option') ?></div>

				<?php endwhile; ?>
			<?php endif; ?>

		</div>
		<?php /*
		<div class="categories-container">
				<?php
					 $categories = get_terms('category',array('parent' => 0));
					 foreach ($categories as $category) { ?>
						 <a href="#<?php echo get_cat_id($category->name) ?>">
							 <?php $category_id = "category_".get_cat_id($category->name);
							 $cat_color = get_field('cat_color', $category_id);
							 ?>
							 <div class="item" >
								 <div class="color-icon-wrap">
									 <div class="color-icon"  style="background-color:<?php echo $cat_color ?>"></div>
								 </div>
								 <p><?php echo esc_html($category->name); ?></p>
							 </div>
						 </a>
					 <?php }  ?>
		</div> */ ?>

		</div>
	</div> <!-- end row -->
</div> <!-- end container -->

<div class="back-mountains"></div>
<div class="land-backing"></div>
<div class="bottom-water-bar"></div>
<div class="mountain-close"></div>
<div class="container lighthouse-img-wrap">
	<img src="<?php echo get_template_directory_uri(); ?>/images/lighthouse.png" />
</div>
</div>

<?php /*
<div class="info-block">
	<div class="post-card-wrap"></div>
	<div class="container post-card">
		<img class="post-right-static post-img" src="<?php echo get_template_directory_uri(); ?>/images/post-right-static.png" />
		<img class="stamp post-img" src="<?php echo get_template_directory_uri(); ?>/images/stamp.png" />
		<img class="mountain-left post-img" src="<?php echo get_template_directory_uri(); ?>/images/mountain-128.png" />
		<img class="two-mountain-big post-img" src="<?php echo get_template_directory_uri(); ?>/images/two-mountain.png" />
		<img class="two-mountain-small post-img" src="<?php echo get_template_directory_uri(); ?>/images/two-mountain-small.png" />
		<img class="cloud-1 post-img" src="<?php echo get_template_directory_uri(); ?>/images/cloud-1.png" />
		<img class="cloud-2 post-img" src="<?php echo get_template_directory_uri(); ?>/images/cloud-2.png" />
		<img class="cloud-3 post-img" src="<?php echo get_template_directory_uri(); ?>/images/cloud-3.png" />
		<img class="cloud-4 post-img" src="<?php echo get_template_directory_uri(); ?>/images/cloud-4.png" />
		<div class="row">
			<div class="col-md-12">
				<div class="circle"><img src="<?php echo get_template_directory_uri(); ?>/images/anchor-blue.png" /></div>
				<h4><?php echo the_field('title', 'option') ?></h4>
				<p><?php echo the_field('text', 'option') ?></p>
			</div>
		</div>
	</div>
</div>
*/ ?>

<div class="container">
	<div class="row">
		<div class="col-md-12 homepage-categories-wrap">
		<!--<h4> <span class="text"><?php echo the_field('categories_title', 'option'); ?></span>
			<div class="view-type-wrap">
				<a href="#" class="layout-condensed">
					<span></span><span></span><span></span>
				</a>
				<a href="#" class="layout-large">
					<span></span><span></span><span></span><span></span><span></span><span></span><span></span>
				</a>
			</div>
		</h4>-->

		<?php if(have_rows('category_blocks', 'option')) : ?>

			<?php while(have_rows('category_blocks', 'option')) : the_row(); ?>
			<div class="top-widgets top-widgets-reveal">
				<?php $main_cat_name = get_cat_name(get_sub_field('category_title')); ?>
				<h2 id="<?php echo get_cat_id($main_cat_name); ?>"><span><?php echo $main_cat_name ?></span>
				</h2>
				<ul class="menu">
					<?php while(have_rows('courses', 'option')) : the_row(); ?>
						<li class="menu-item">
							<?php if (get_sub_field('coming_soon')){ ?>
									<div class="topic-card coming-soon">
										<h3><?php echo get_cat_name(get_sub_field('title')); ?></h3>
										<span><?php echo get_sub_field('release_date') ?></span>
									</div>
							<?php } else { ?>
								<a href="<?php echo get_category_link(get_sub_field('title')); ?>">
									<div class="topic-card <?php echo $coming_soon ?>">
										<h3><?php echo get_cat_name(get_sub_field('title')); ?></h3>
									</div>
								</a>
							<?php } ?>
						</li>
					<?php endwhile; ?>
				</ul>
			</div> <!-- end top-widgets -->
		<?php endwhile; ?>
		<?php endif; ?>

		</div> <!-- homepage-widget-wrap -->
	</div>
</div> <!-- end container -->
</div> <!-- end content -->

<?php /* Parent category color code

$cat_id = get_cat_id(get_cat_name(get_sub_field('title')));
$cat = get_category($cat_id);
$parent = $cat->parent;
$parent_id = get_category($parent);
$parent_id = $parent_id->term_id;
$parent_cat_color = get_field('cat_color', "category_".$parent_id);

<div class="topic-circle" style="background-color:<?php echo $parent_cat_color ?>">
	<img src="<?php echo get_sub_field('image') ?>" />
</div>

*/ ?>
