<p>this is a color test</p>

<?php

if(have_rows("colors")):
    while(have_rows("colors")): the_row(); ?>
        <div class="color" style="background-color:<?php the_sub_field('color')?>;height:25px;width:25px;">
            <p>Color name</p>
        </div>



<?php
    endwhile;
endif; ?>