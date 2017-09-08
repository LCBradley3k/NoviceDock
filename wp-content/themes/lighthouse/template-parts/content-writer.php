<?php if(have_rows('writer_block', 'option')) : ?>
  <?php while(have_rows('writer_block', 'option')) : the_row(); ?>
    <?php
      $profile_image = get_sub_field('photo', 'option');
      $name = get_sub_field('name', 'option');
      $bio = get_sub_field('description', 'option');
    ?>

    <div class="writers-block">
      <div class="img-wrap img-wrap-small">
          <img src="<?php echo $profile_image['sizes']['resource-thumb'] ?>" alt="<?php echo $item_img["alt"]; ?>" />
      </div>
      <p><?php echo $name ?></p>
      <div class="tag tag--mentor">MENTOR</div>
      <div class="desc"><?php echo $bio ?></div>
    </div>

  <?php endwhile; ?>
<?php endif; ?>
