<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="content-block content-block__team">

                <h2><?php echo the_sub_field("heading"); ?></h2>

                <span><?php echo the_sub_field("text");?></span>
                
                <?php

                if(have_rows("team_members")):
                    while(have_rows("team_members")): the_row(); ?>

                    <div class="member-wrap">
                        <?php $photo = get_sub_field("photo") ?>
                        <img src="<?php echo $photo['url'] ?>" />
                        <p><?php echo the_sub_field("name") ?></p>
                        <p><?php echo the_sub_field("role") ?></p>
                    </div>
                        
                <?php
                    endwhile;

                endif;
                ?>

            </div>

        </div>
    </div>
</div>