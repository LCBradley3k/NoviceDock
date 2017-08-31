<?php
/**
 * Template part for displaying posts.
 *
 * Please browse readme.txt for credits and forking information
 * @package Lighthouse
 */

?>


<div class="sidebar">

  <?php if(is_category()) :?>

    <?php $cat = get_queried_object(); $cat_id = "category_".$cat->term_id;?>

      <div class="title-block title-block--sidebar">
        <div class="title-block__wrap">
          <h1><?php echo single_cat_title() ?></h1>
          <div class="tag tag--syllabus">SYLLABUS</div>
          <span class="cat-details"><span><?php echo $cat->count ?></span> Sections</span>
        </div>
      </div>
    <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post(); ?>
        <?php
        $title = the_title('', '', 0);
        $title = html_entity_decode($title);
        $title = strtolower(preg_replace("#\s+#u", "-", preg_replace("#[^\w\s]|_#u", "", $title)));
        ?>
        <span><a class="side-post" href="#<?php echo $title ?>"><?php the_title() ?></a></span>
      <?php endwhile; ?>
    <?php endif; ?>

  <?php endif; ?>

  <?php /* if(is_front_page()) : ?><div class="title-wrap"><h1>Pick a Course!</h1></div> <?php endif; */ ?>
  <?php  if(is_single()) : ?>
    <?php $post = get_queried_object(); $post_name = $post->post_title;?>
    <div class="title-wrap">
      <h1><?php echo $post_name ?></h1>

    </div>
    <?php while(have_rows('item_blocks')) : the_row(); ?>
      <?php $title = get_sub_field('title');
      $title = html_entity_decode($title);
      $title = strtolower(preg_replace("#\s+#u", "-", preg_replace("#[^\w\s]|_#u", "", $title)));
      ?>
      <span><a class="side-post" href="#<?php echo $title ?>"><?php echo the_sub_field('title'); ?></a></span>
    <?php endwhile; ?>

  <?php endif;  ?>
</div>
