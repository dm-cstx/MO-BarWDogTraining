<?php get_header(); ?>

<div id="prod-comp" >

	<div class="container">

		<section class="product-side">

      <div class="container row d-flex justify-content-center mt-5" id="product-carousel">
        <div class="col-md-6">
            <div id="myCarousel" class="carousel slide" data-ride="carousel" align="center">
                <div class="carousel-inner ">
                    <div class="carousel-item active"> <img src="<?php echo the_field('product_image'); ?>" class="rounded" width: 100%;> </div>
                    <div class="carousel-item"> <img src="<?php echo the_field('support_image_1'); ?>" class="rounded"> </div>
                    <div class="carousel-item"> <img src="<?php echo the_field('support_image_2'); ?>" class="rounded"> </div>
                    <div class="carousel-item"> <img src="<?php echo the_field('support_image_3'); ?>" class="rounded"> </div>
                    <div class="carousel-item"> <img src="<?php echo the_field('support_image_4'); ?>" class="rounded"> </div>
                </div>
                <ol class="carousel-indicators list-inline">
                    <li class="list-inline-item active"> <a id="carousel-selector-0" class="selected" data-slide-to="0" data-target="#myCarousel"> <img src="<?php echo the_field('product_image'); ?>" class="img-fluid rounded"> </a> </li>
                    <li class="list-inline-item"> <a id="carousel-selector-1" data-slide-to="1" data-target="#myCarousel"> <img src="<?php echo the_field('support_image_1'); ?>" class="img-fluid rounded"> </a> </li>
                    <li class="list-inline-item"> <a id="carousel-selector-2" data-slide-to="2" data-target="#myCarousel"> <img src="<?php echo the_field('support_image_2'); ?>" class="img-fluid rounded"> </a> </li>
                    <li class="list-inline-item"> <a id="carousel-selector-3" data-slide-to="3" data-target="#myCarousel"> <img src="<?php echo the_field('support_image_3'); ?>" class="img-fluid rounded"> </a> </li>
                    <li class="list-inline-item"> <a id="carousel-selector-4" data-slide-to="4" data-target="#myCarousel"> <img src="<?php echo the_field('support_image_4'); ?>" class="img-fluid rounded"> </a> </li>
                </ol>
            </div>
        </div>
        <div class="col col-md-6 prod-info">
          <h1 class="page-header">
            <?php echo the_field('product_name'); ?></h1>
          <p><?php echo the_field('product_intro'); ?></p>
          <p><?php echo the_field('price'); ?></p>
          <a class="main-btn" href="<?php the_field('button_link'); ?>" target="_blank">Purchase</a>
          <p class="inquire-prod"><a  href="<?php echo site_url('/contact') ?>" target="_blank">Inquire about this product</a></p>
          <div id="product-share">
            <p><?php get_template_part('template-parts/share'); ?></p>
          </div>
          
          
        </div>
      </div>

		</section>
<!-- tabs -->
    <div id="product-tab">
      <ul class="nav nav-tabs">
        <li ><a class="active" data-toggle="tab" href="#tabs">Description</a></li>
        <li><a data-toggle="tab" href="#menu1">Features</a></li>
        <li><a data-toggle="tab" href="#menu2">Accessories</a></li>
        <li><a data-toggle="tab" href="#menu3">Shipping</a></li>
      </ul>

      <div class="tab-content">
        <div id="tabs" class="tab-pane  in active">
          <p><?php  echo the_field('description'); ?></p>
        </div>
        <div id="menu1" class="tab-pane fade">
          <p><?php  echo the_field('features'); ?></p>
        </div>
        <div id="menu2" class="tab-pane fade">
          <p><?php  echo the_field('accessories'); ?></p>
        </div>
        <div id="menu3" class="tab-pane fade">
          <p><?php  echo the_field('shipping'); ?></p>
        </div>
      </div>
    </div>

    <h2>You Might Also Like:</h2>
    <div class="row d-flex justify-content-center w-100" >
					
          <?php  
          $related = get_posts( array(
          'post_type' => 'product',
          'numberposts' => 3,
          'orderby' => 'rand',
          ) );
            foreach( $related as $post ){
              setup_postdata( $post );
            if (has_post_thumbnail()) { 
              echo '<div class="col-md-3 small p-3 relate-post"><a href="' . get_permalink() . '">'. get_the_post_thumbnail( get_the_ID(), 'thumbnail' ) . "<br>" . get_the_title() . "<br>" . get_field('price') .'</a></div>';
            } else {
            echo '<div class="col-md-3 small p-3 relate-post"><a href="' . get_permalink() . '">'. '<img src="#">' . get_the_title() . '</a></div>';
            }
          }
        wp_reset_postdata();  ?>
        
    </div>


    <?php 
      while (have_posts()) {
        the_post();
        the_content();
      }
    ?>
	</div>
</div>

<?php get_footer();


