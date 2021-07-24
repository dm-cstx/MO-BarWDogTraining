<?php get_header(); ?>

<div id="sing-event-comp" class="content-area">

    <div class="stand-bl-setup container-fluid"> <!-- event-post setup same as blog setup; posts (75%) on left; sidebar (25%) on right  -->
        <div class="container row d-flex">
            <div id="post-item" class="col-lg-9 post-item w-100">

                <div class="row event-content"> 
                    <?php
                    while(have_posts()) :
                    the_post(); ?>

                    <div class="row">
                        <?php 
                        if (has_post_thumbnail()) { ?>

                        <div class="col-md pt-4 pb-4">
                            <?php 
                            the_post_thumbnail('post-thumbnail', ['class' => 'single-event-img img-fluid']); 
                            ?> 
                        </div>
                        <?php 
                        }

                        else { ?>
                        <div class="col-md pt-4 pb-4">
                            <img src="" class="single-event-img img-fluid"><!-- gives template a backup image -->
                        </div>	
                        <?php 
                        } 
                        ?>

                        <div class="col-md single-event-txt" > <!-- stylize for client event -->
                            <hr class="w-50">
                            <h2 ><?php the_title(); ?></h2>
                            <h3 class="pt-2"><?php the_field('event_date'); ?></h3> <!-- advanced custom fields used- change accordingly -->
                            <h4><?php the_field('event_begin_time'); ?> - <?php the_field('event_end_time'); ?></h4>
                            <hr class="w-50">
                            <a href="https://www.google.com/maps/search/?api=1&query=
                                    <?php 
                                    the_field(street_address);
                                    echo '+';
                                    the_field(city_state_and_zip_code);
                                            ?>
                                    ">
                            <h4><?php the_field('name_of_location'); ?><br>
                            <?php the_field('street_address'); ?><br>
                            <?php the_field('city_state_and_zip_code'); ?></h4>
                            </a>
                        
                        </div>
                    
                    </div>
                </div>

            </div>
            <div id="cats" class="sidebar col-lg-3 pt-4"> 
                <?php get_sidebar(); ?>
            </div>

        </div>


    </div>

</div>

<?php get_foooter(); ?>