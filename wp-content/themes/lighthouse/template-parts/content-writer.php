
<?php
  $category = get_queried_object();
  $cat_id = get_queried_object_id();

  if(have_rows('writers', $category)) :
    while(have_rows('writers', $category)) : the_row(); ?>

      <div class="new-line new-line--content-writer"></div>

      <?php $post_objects = get_sub_field('writer', $category ); ?>


      <?php if( $post_objects ) : ?>
        <?php $post = $post_objects; ?>
         <?php setup_postdata($post); ?>
         <?php $photo = get_field('photo', $post); ?>

            <div class="item-block item-block--writer">
              <div class="img-wrap img-wrap-small">
                  <img src="<?php echo $photo['url'] ?>" alt="<?php  ?>" />
              </div>
              <div class="top-wrap">
                <div class="title"><?php echo get_the_title($post_object->ID); ?></div>
                <div class="tag tag--mentor">MENTOR</div>
                <div class="links">
                  <?php
                  if(have_rows('social_links', $post)) :
                    while(have_rows('social_links', $post)) : the_row();
                  ?>
                  <span><a href="<?php echo the_sub_field('link', $post) ?>" ><?php echo the_sub_field('name', $post); ?></a>, </span>
                <?php
                    endwhile;
                  endif;
                ?>
                </div>
              </div>
              <div class="desc"><?php echo get_the_content($post_object->ID);  ?></div>
            </div>

          <?php wp_reset_postdata();?>
        <?php endif; ?>
      <?php endwhile; ?>
    <?php endif; ?>
