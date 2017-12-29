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

      <div class="title-block title-block--sidebar animate-heavy-left">
        <div class="title-block__wrap">
          <h1><?php echo single_cat_title() ?></h1>
        </div>
      </div>
    <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post(); ?>
        <?php
        $title = the_title('', '', 0);
        $title = html_entity_decode($title);
        $title = strtolower(preg_replace("#\s+#u", "-", preg_replace("#[^\w\s]|_#u", "", $title)));
        ?>
        <span><a class="side-post animate-heavy-left" href="#<?php echo $title ?>"><?php the_title() ?></a></span>
      <?php endwhile; ?>
      <!--<div class="fb-save-wrap">
        <?php
        global $wp;
        $current_url = home_url(add_query_arg(array(),$wp->request));
         ?>
  			<div class="fb-save" data-uri="<?php echo $current_url ?>" data-size="large"></div>
  			<a href='https://www.facebook.com/help/220284408163249' rel="noopener noreferrer" target="_blank"><span><i class="fa fa-question-circle" aria-hidden="true"></i></span></a>
  		</div>-->
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
      <span><a class="side-post animate-left" href="#<?php echo $title ?>"><?php echo the_sub_field('title'); ?></a></span>
    <?php endwhile; ?>

  <?php endif;  ?>
</div>
