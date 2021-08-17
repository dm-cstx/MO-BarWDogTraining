<?php get_header(); ?>
<div  >
    <div id="pphero"class="container-fluid d-flex align-items-end">
        <h1 class="page-header triHeader">
        Products
        </h1>
    </div>
</div>
<div id="productPage">
    <section class="row productListSidebar ">
        <div class="row productRow col-md-8">
            <?php 
                while(have_posts()) {
                the_post();  ?>
            <div class="card productCard col-md-6 col-lg-3" >
                <div >
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large', ['class' => 'card-img-top perfect-pict img-fluid']); ?></a>
                </div>

                <div class="card-body productBody d-flex">
                    <h2 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <?php the_field('price'); ?>
                    <p class="card-text">Lorem ipsum dolor sit amet adipiscing bibendum sem orci tempus aliquet gravida, orci amet.</p>
                    <div class="mt-auto">
                        <a href="<?php the_permalink(); ?>" class="btn btn-primary">Learn More</a>
                    </div>
                    
                </div>
            </div>
            <?php  
                } ?>
        </div>
        <div class="productSidebar col-md-4 border">
            <?php get_template_part('template-parts/sidebar-product'); ?>
        </div>
    </section>
    
    
</div>


<?php get_footer();