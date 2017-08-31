
<div class="resources-block">
<?php while(have_rows('resource_blocks')) : the_row();
  $item_title =  get_sub_field('title');
  $item_img = get_sub_field('image');
  $item_price = get_sub_field('price');
  $item_media_type = get_sub_field('media_type');
  $item_desc = get_sub_field('description');
  $item_url = get_sub_field('url');

  ?>
  <div class="resource-item">
    <div class="img-wrap img-wrap-small">
      <a href="<?php echo $item_url ?>">
        <img src="<?php echo $item_img['sizes']['resource-thumb'] ?>" alt="<?php echo $item_img["alt"]; ?>" /> 
      </a>
    </div>
    <div class="top-wrap">
      <a href="<?php echo $item_url ?>"><h3><?php echo $item_title ?></h3></a>
      <div class="main-info">
        <div class="media-type"> <span class="price <?php if($item_price == 'free'){ echo 'free'; } ?>"><?php echo $item_price ?></span> | <?php echo $item_media_type ?> </div>
      </div>
    </div>
      <div class="desc"><?php echo $item_desc ?></div>

  </div>
<?php endwhile;?>
</div>
