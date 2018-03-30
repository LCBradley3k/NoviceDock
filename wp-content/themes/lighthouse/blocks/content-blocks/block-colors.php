<div class="content-block content-block__colors">

<h2><?php echo the_sub_field("heading") ?></h2>

<?php

if(have_rows("colors")):
    while(have_rows("colors")): the_row(); ?>
        <div class="color" style="background-color:<?php the_sub_field('color')?>">
            <p><?php the_sub_field("color"); ?></p>
        </div>



<?php
    endwhile;
endif; ?>

</div>