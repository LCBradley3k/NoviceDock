

<?php 
$color = get_sub_field("color"); 
if($color == "dark"){
    $color = "content-block__centered-text--dark";
} else {
    $color = "";
}
?>

<div class="content-block content-block__centered-text content-block--xl <?php echo $color ?>">


<div class="container">
    <div class="row">
        <div class="col-md-12">

            <h2><?php echo the_sub_field("heading") ?></h2>

            <?php the_sub_field("text") ?>

        </div>
    </div>
</div>

</div>
