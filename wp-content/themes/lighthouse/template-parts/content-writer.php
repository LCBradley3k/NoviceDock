<?php if(have_rows('writer_block', 'option')) : ?>
  <?php while(have_rows('writer_block', 'option')) : the_row(); ?>

    <div class="writers-block">
      Hey yall
    </div>

  <?php endwhile; ?>
<?php endif; ?>
