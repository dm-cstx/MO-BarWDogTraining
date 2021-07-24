<?php get_header(); ?>

<div id="sing-comp" >

	<div class="container">
		<div class="sing-pg-hdr">
				<h1 class="page-header">
					<?php the_title(); ?></h1>
			<div class="metabox">
				<p>Posted on <?php the_time('n/j/y'); ?> in <?php the_category(', '); ?> </p>
			</div>
		</div>
		<div class="norm-post-side">
			<div id="single-post-item " class=" left">
				<div class="single-post-content"> 
					<?php
						while(have_posts()) {
						the_post(); ?>
					<div class="generic-post-content"><?php the_content(); ?></div>
				<!-- If using social media plugin -->
						<div class="soc-icons-post" >
							<?php echo do_shortcode(''); ?> <!-- [DISPLAY_ULTIMATE_SOCIAL_ICONS]  -->
						</div>
						
					<hr class="w-75">
				
				<!-- shows three random associated posts -->
					<div class="row d-flex justify-content-center w-100" >
						<?php  
						$related = get_posts( array(
						'numberposts' => 3,
						'orderby' => 'random',
						) );
							foreach( $related as $post ){
							setup_postdata( $post );
							if (has_post_thumbnail()) { 
							echo '<div class="col-md-3 small p-3 relate-post"><a href="' . get_permalink() . '">'. get_the_post_thumbnail( get_the_ID(), 'thumbnail' ) . "<br>" . get_the_title() . '</a></div>';
							} else {
							echo '<div class="col-md-3 small p-3 relate-post"><a href="' . get_permalink() . '">'. '<img src="insert image here">' . get_the_title() . '</a></div>';
							}
						}
					wp_reset_postdata();  ?>
					</div>
					
					<div id="bl-comm" class="container p-5 blog-comment" >
						<?php
							if (comments_open() || get_comments_number()) {
							comments_template();
							}
						} ?>
					</div>
				</div>
			</div>
        	<div class="cats right"> <?php get_sidebar(); ?></div>
		</div>
	</div>

</div>

<?php get_footer();


