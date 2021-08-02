<?php get_header(); ?>

<div id="servicesSinglePage" >

	<div class="container">

		<section class="servicesSingleRow">
            <div class="container row d-flex justify-content-center mt-5" id="product-carousel">
                <div class="col-xs col-md-6">
                    <div id="carouselControls" class="carousel slide" data-bs-ride="carousel" data-bs-ride="carousel" data-bs-interval="5000">
                        <div class="carousel-inner ">
                            <?php 
                            
                            $supportPhoto1 = get_field('support_photo_1');
                            $supportPhoto2 = get_field('support_photo_2');
                            $supportPhoto3 = get_field('support_photo_3');
                            $supportPhoto4 = get_field('support_photo_4');
                            $supportPhoto5 = get_field('support_photo_5');
                            
                            if ($supportPhoto1){
                            echo '<div class="carousel-item active"> <img src="' . $supportPhoto1 . '" class="w-100 d-block"> </div>';
                            }
                            if ($supportPhoto2){
                            echo ('<div class="carousel-item"> <img src="'. $supportPhoto2 . '" class="w-100 d-block"> </div>');
                            }
                            if ($supportPhoto3){
                            echo ('<div class="carousel-item"> <img src="'. $supportPhoto3 . '" class="w-100 d-block"> </div>');
                            }
                            if ($supportPhoto4){
                            echo ('<div class="carousel-item"> <img src="'. $supportPhoto4 . '" class="w-100 d-block"> </div>');
                            }
                            if ($supportPhoto5){
                            echo ('<div class="carousel-item"> <img src="'. $supportPhoto5 . '" class="w-100 d-block"> </div>');
                            }
                            
                            ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>

                <div class="col col-md-6 servicesInfo text-center pd-5">
                    <h1 class="page-header text-center">
                    <?php the_title(); ?></h1>
                    <p><?php the_field('price'); ?></p>
                    <div class="shrtDescript">
                        <?php the_field('details'); ?>
                    </div>
                    <div id="product-share">
                        <p><?php get_template_part('template-parts/share-service'); ?></p>
                    </div>
                </div>
            </div>
		</section>

        <section id="singleForm">
            <h2 class="text-center fs-3">Inquire</h2>
            <?php echo do_shortcode(''); ?>
        </section>

    <h2>Other Services:</h2>
    <div class="row d-flex justify-content-center w-100 " >
					
        <?php  
        $related = get_posts( array(
        'post_type' => 'services',
        'numberposts' => '4',
        'orderby' => 'rand',
        'tax_query' => array(
        array(
            'taxonomy' => 'service_type',
            'field' =>  'slug',
            'terms' => 'service')
        )
        )
        );
            foreach( $related as $post ){
                setup_postdata( $post );
            if (has_post_thumbnail()) { 
                echo '<div class="col-md-3 small p-3 relate-post"><a href="' . get_permalink() . '">'. get_the_post_thumbnail( get_the_ID(), 'thumbnail' ) . "<br>" . get_the_title() . "<br><br>" . get_field('price') .'</a></div>';
            } else {
            echo '<div class="col-md-3 small p-3 relate-post"><a href="' . get_permalink() . '">'. '<img src=" ">' . get_the_title() . '</a></div>';
            }
            }
        wp_reset_postdata();  ?>




	</div>
</div>

<?php get_footer();

