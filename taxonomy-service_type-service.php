<?php get_header(); ?>
<div id="frpg-comp" class="content-area" >
    <div id="sphero"class="container-fluid d-flex align-items-end">
        <div class="row-col-1">
            <div class="col-5 d-flex justify-content-center ms-3">
            <p class="align-bottom">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
            </div>
            <div class="col-3 d-flex justify-content-center">
            <button class="spCTA ms-3" type="button">Train&nbspMe!</button>
            </div>
        </div>
    </div>
</div>
<div id="servicesPage" class="container-fluid">
<?php 
if ( have_posts() ) {
    $count = 0;
	while ( have_posts() ) {
        the_post();
        ++$count;
        if (($count % 2) == 1) { ?>
            <div class="row">
                <div class="col">
                <?php 
                the_post_thumbnail();
                ?>
                </div>
                <div class="col">
                <h2><?php the_title()?></h2>
                <?php the_field ('details');?>
                </div>
            </div> 
            <?php
        }
        else {  ?>
            <div class="row">
                <div class="col">
                <h2><?php the_title()?></h2>
                <?php the_field ('details'); ?>
                </div>
                <div class="col">
                <?php 
                the_post_thumbnail();
                ?>
                </div>                
            </div>
            <?php
        } 
    }
}?>

</div>


<?php get_footer();