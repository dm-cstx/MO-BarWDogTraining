<?php get_header(); ?>

<div id="productPage">
    <h1 class="page-header">
        Products
    </h1>
    <section class="row productListSidebar ">
        <div class="row productRow col-sm-8">
            <?php 
                while(have_posts()) {
                the_post();  ?>
            <div class="card productCard col-md-8 col-lg-3" >
                <div >
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('', ['class' => 'card-img-top productImg']); ?></a>
                </div>

                <div class="card-body productBody">
                    <h2 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <p class="card-text">Lorem ipsum dolor sit amet adipiscing bibendum sem orci tempus aliquet gravida, orci amet.</p>
                    <a href="<?php the_permalink(); ?>" class="btn btn-primary">Learn More</a>
                </div>
            </div>
            <?php  
                } ?>
        </div>
        <div class="productSidebar col-sm-4">
            <?php get_template_part('template-parts/sidebar-product'); ?>
        </div>
</section>
    
    
</div>


<?php get_footer();