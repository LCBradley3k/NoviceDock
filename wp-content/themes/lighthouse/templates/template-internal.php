<?php 
/*
Template Name: Internal

*/

get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <h1 class="internal-page__title"><?php echo get_the_title(); ?></h1>

        </div>
    </div>
</div>

<?php 
// loop through content blocks
if(have_rows("blocks")):
    while(have_rows("blocks")) : the_row();

        // get the name of the block
        $layout_name = get_row_layout(); 
        // render that block
        get_template_part('blocks/content-blocks/block', $layout_name) ?>

<?php
    endwhile;
else:
    // no layouts found
endif;

?>



<?php get_footer(); ?>