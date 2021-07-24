<?php get_header(); ?>

<!-- Associated files and code - remove all if not using
single-product.php
CSS-  PRODUCT PAGE / ARCHIVE PRODUCTS
CSS- PRODUCT SINGLE
functions.php - post type 'product'; Product Order By
    
-->

<div >

    <section id="archProduct-page" class="container " >
        <h1 class="page-header">
        Products
        </h1>
        <div class="col ">
            <div class="row" >

            <?php 
                while(have_posts()) {
                the_post();  ?>
                <div class="col-xl-4 col-md-6 pt-3 products" >
                    <div class="event-card h-100" >
                        <a href="<?php the_permalink(); ?>">
                        <div class="event-img-top">
                            <div class="event-img"> <?php the_post_thumbnail() ?>  </div>
                        </div>
                        </a>
                        <div class="event-body">
                            <a href="<?php the_permalink(); ?>">
                                <h5 class="event-title" >
                                <?php the_title(); ?>
                            </h5>
                            </a>
                            <p class="event-text">
                                <?php echo the_field('price') ?>
                            </p>
                            <a class="main-btn" href="<?php the_permalink(); ?>">See More</a>
                        </div>
                    </div>
                </div>
                <?php  
                } ?>
            </div>
        </div>

    </section>

</div>


<?php get_footer(); ?>
