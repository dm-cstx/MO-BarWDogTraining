<?php get_header(); ?>

<div id="categ-comp"  >
	<div class="categ-title">
		<h1 class="page-header"> <?php echo the_archive_title(); ?> </h1>
	</div>
	<div class="container" >
        <div class="norm-post-side">
            <div class="page-section left">
                <?php
                    while(have_posts()) {
                    the_post();  ?>
                <div class="post-item-hr">
                    <div class="post-item">
                        <div class="post-thumb img-fluid"><?php the_post_thumbnail(); ?></div>
                        <div class="post-content">
                            <h2><a class="blog-post-title" href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h2>
                            <div class="metabox">
                                <p>Posted by <?php the_author_posts_link(); ?> on <?php the_time('n/j/y'); ?> in <?php the_category(', ') ?></p>
                            </div>
                            <div class="generic-post-content"> <?php the_excerpt(); ?> </div>
                            <div><a class="blog-cont" href="<?php the_permalink(); ?>">Continue Reading</a></div>
                        </div>
                    </div>
                    <hr>
                </div>
                <?php  }
                    echo paginate_links();
                ?>
            </div>
            <div class="cats right">
                <?php get_sidebar(); ?>
            </div>
        </div>
            
    </div>

</div>

<?php get_footer(); ?>

