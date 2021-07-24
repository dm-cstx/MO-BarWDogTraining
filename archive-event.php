<?php get_header(); ?>

<!-- Associated files and code - remove all if not using
single-event.php
front-page.php
CSS- .frpg-events
CSS- EVENTS PAGE / ARCHIVE EVENTS
CSS- EVENT SINGLE
functions.php - post type 'event'; order of query event
    // Event Gig
    #acf-group_606061eb6138e {background-color: #eeecf0; }
    #acf-group_606061eb6138e p {color: #333;}
Assets: a-c-f-event-gig

-->

<div id="archEvent-comp" >
    <h1 class="page-header">
		EVENT TITLE HERE
	</h1>

    <?php  if (have_posts()) : ?>
        <!-- section designed to show events when have; if no events display filler message  -->
        <section id="event-page" class="container " >
            <div class="event-sect py-5"  >
                <div class="row when-events">

                    <div class="col-lg-7 col-md ">

                        <?php
                            while(have_posts()) {
                            the_post(); ?>

                        <div class=" event-item rounded"> <!-- using advanced custom fields; change accordingly  -->	
                            <div class="row">
                                <div class="col-sm-4">
                                    <a class="event-summary__date text-center" href="<?php the_permalink(); ?>">								 <h2 class="event-summary__month"> <?php $eventDate = new DateTime(get_field('event_date'));
                                        echo $eventDate->format('M'); ?><br>
                                        <?php echo $eventDate->format('d') ?>
                                    </h2>
                                    </a>
                                </div>
                                <div class="col-sm-8 event-summary__content">
                                    <a href="<?php the_permalink(); ?>" class="event-summary__link"><h3 class="event-summary__title headline--tiny"> 
                                        <?php the_title(); ?> </h3>
                                        <h4 class="event-summary__time"><?php the_field('event_begin_time'); ?> 
                                            - <?php the_field('event_end_time'); ?></h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                            <?php
                            }  ?>
                                
                        </div>
                    </div>
                    
                    <?php
                        else:
                    ?>
                </div>
                
                <div class="no-event pt-5" >
                    <div class="col-lg-5 col-md ">
                        <div class="row">
                            <div class="col-md-6 no-event-img"> <!-- for fall back photo if using -->
                                <img src="" alt="" class=" rounded-circle img-fluid">
                            </div>
                            <div class="col-md-6 no-event-txt" >
                                <h3></h3>
                                <h5></h5>
                                <p></p>
                            </div>
                        </div>
                    </div>
                    <hr class="w-75">
                    <?php
                        endif;?>
                        <?php
                        echo paginate_links();
                    ?>
                </div>
            </div>
        </section>

</div>


<?php get_footer(); ?>
