
<?php
  $category = get_queried_object();
  $cat_id = get_queried_object_id();

  if(have_rows('writers', $category)) :
    while(have_rows('writers', $category)) : the_row(); ?>

      <div class="new-line new-line--content-writer animate-fade-in"></div>

      <?php $post_objects = get_sub_field('writer', $category ); ?>


      <?php if( $post_objects ) : ?>
        <?php $post = $post_objects; ?>
         <?php setup_postdata($post); ?>
         <?php $photo = get_field('photo', $post); ?>

            <div class="item-block item-block--writer">
              <div class="img-wrap img-wrap-small animate-scale-up">
                  <img src="<?php echo $photo['url'] ?>" alt="<?php  ?>" />
              </div>
              <div class="top-wrap animate-left">
                <div class="title"><?php echo get_the_title($post_object->ID); ?></div>
                <div class="tag tag--mentor">MENTOR</div>

              </div>
              <div class="desc animate-left"><?php echo get_the_content($post_object->ID);  ?>
                <div class="links">
                  <?php
                  $numOfLinks = count(get_field('social_links'));
                  $i = 0;
                  if(have_rows('social_links', $post)) :
                    while(have_rows('social_links', $post)) : the_row();
                    $i++;
                  ?>
                  <?php if($i != $numOfLinks){ ?>
                    <span><a href="<?php echo the_sub_field('link', $post) ?>" ><?php echo the_sub_field('name', $post); ?></a> &#8226 </span>
                  <?php } else { ?>
                    <span><a href="<?php echo the_sub_field('link', $post) ?>" ><?php echo the_sub_field('name', $post); ?></a></span>
                  <?php } ?>
                <?php
                    endwhile;
                  endif;
                ?>
                </div>
                <a class="bmc-button" target="_blank" href="https://www.buymeacoffee.com/novicedock"><img src="https://www.buymeacoffee.com/assets/img/BMC-btn-logo.svg" alt="BMC logo"><span style="margin-left:5px">Buy me a coffee</span></a>
              </div>
            </div>

          <?php wp_reset_postdata();?>
        <?php endif; ?>
      <?php endwhile; ?>
    <?php endif; ?>
