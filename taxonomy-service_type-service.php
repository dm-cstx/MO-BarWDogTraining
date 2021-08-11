<?php get_header(); ?>
<div  >
    <div id="sphero"class="container-fluid d-flex align-items-end">
        <div class="row-col-1">
            <div class="col-5 d-flex justify-content-center ms-3">
            <p class="align-bottom">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
            </div>
            <div class="col-3 d-flex justify-content-center">
            <button class="spCTA ms-3" type="button">Train&nbsp;Me!</button>
            </div>
        </div>
    </div>
</div>
<div id="servicesPage" class="container-fluid">
    <h1 class="page-header">
        Services
    </h1>
    <?php 
    if ( have_posts() ) {
        $count = 0;
        while ( have_posts() ) {
            the_post();
            ++$count;
            if (($count % 2) == 1) { ?>
                <div class="servicesOdd">
                    <div class="row servicesRow">
                        <div class="col-md-7">
                            <a href="<?php the_permalink(); ?>"><?php 
                            the_post_thumbnail();
                            ?></a>
                        </div>
                        <div class="col-md-5">
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title()?></a></h2>
                            <?php the_field('price'); ?>
                            <div class="servicesDetails">
                                <?php the_field ('details');?>
                            </div>
                            <a href="<?php the_permalink(); ?>"><button class="fpCTA ms-3" type="button">Learn&nbsp;More</button></a>
                        </div>
                    </div>
                    
                </div> 
                <?php
            }
            else {  ?>
                <div class="row servicesEven">
                    <div class="row servicesRow">
                        <div class="col-md-5">
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title()?></a></h2>
                            <?php the_field('price'); ?>
                            <div class="servicesDetails">
                                <?php the_field ('details');?>
                            </div>
                            <a href="<?php the_permalink(); ?>"><button class="fpCTA ms-3" type="button">Learn&nbsp;More</button></a>
                        </div>
                        <div class="col-md-7">
                            <a href="<?php the_permalink(); ?>"><?php 
                            the_post_thumbnail();
                            ?></a>
                        </div> 
                    </div>
                </div>
                <?php
            } 
        }
    }?>

</div>


<?php get_footer();