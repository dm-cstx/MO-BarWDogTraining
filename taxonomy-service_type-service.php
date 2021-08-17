<?php get_header(); ?>
<div  >
    <div id="sphero"class="container-fluid d-flex align-items-end">
        <h1 class="page-header triHeader">
        Services
        </h1>
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