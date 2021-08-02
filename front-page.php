<?php get_header(); ?>

<div id="frpg-comp" class="content-area" >
<div id="fphero"class="container-fluid d-flex align-items-end">
    <div class="row">
        <div class="col-4 d-flex align-items-center ms-3">
        <p class="align-bottom">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </p>
        <button class="fpCTA ms-3" type="button">Train&nbspMe!</button>
        </div>
    </div>
</div>
<!-- IF HAS BLOG - FRONT PAGE ANNOUNCEMENT  -->
<?php
    $homepageAnnouncement = new WP_Query(array (
    'posts_per_page' => 1,
    'post_type' => 'post',
            'category_name' => 'front-page-announcement'
    
    )); 

    if ($homepageAnnouncement->have_posts()){ ?>
<section id="fp-announcement">
        <?php
            while($homepageAnnouncement->have_posts()) {
            $homepageAnnouncement->the_post(); ?>
    <div class="fp-announcements container">
        <h2 class="about-starter-hdr"><?php the_field('fp_headline'); ?></h2>
        <div id="tra-img">
            <img  src="<?php the_field('fp_image'); ?>">
        </div>
        <p><?php the_field('fp_supporting_text'); ?></p>
        <a class="catch-announce " href="<?php the_permalink(); ?>">See Details</a>
        <?php
        }?>
    </div>
    </section>
    <?php
        }
        wp_reset_postdata();?> 

<!-- PANEL1  -->


<!-- IF HAS EVENTS - FRONT PAGE EVENTS  -->
<?php
    $today = date('Ymd');
    $homepageEvents = new WP_Query(array(
        'posts_per_page' => 4,
        'post_type' => 'event',
        'meta_key' => 'event_date',
        'orderby' => 'meta_value_num',
        'order' => 'ASC',
        'meta_query' => array(
        array(
            'key' => 'event_date',
            'compare' => '>=',
            'value' => $today,
            'type' => 'numeric'
        ))
    )); 
    if ($homepageEvents->have_posts()){?>
    <section class="frpg-events">
    <h2 class="page-title">Upcoming Events</h2>
        <?php    
        while($homepageEvents->have_posts()) {
        $homepageEvents->the_post(); ?>

        <div class="d-flex justify-content-center event-posting hvr-grow" >
            <div class="col-3 event-page-date">
                <div class="event-date-inset align-middle">
                    <?php
                    $eventDate = new DateTime(get_field('event_date'));
                    echo $eventDate->format('M')
                    ?> </br>
                    <?php
                    $eventDate = new DateTime(get_field('event_date'));
                    echo $eventDate->format('d')
                    ?>  
                </div>
            </div>

            <div class="col-8 event-details">
                <a href="<?php the_permalink(); ?>">
                    <h2 ><?php echo the_field('name_of_location'); ?></h2>
                </a>
                <h4><?php the_field('event_begin_time'); ?></h4>
                <h4><?php the_field('city_state_and_zip_code') ?></h4>

                <div >
                    <a class="event-more" href="<?php the_permalink(); ?>">Find Out More</a>
                </div>
            </div>
        </div>

        <?php  
        } wp_reset_postdata();  ?>
    </section>
    <?php } ?>




<!-- PANEL2  -->
<div id="panel2" class="container-fluid">
    <div class="row">
        <div class="col ms-5 d-flex justify-content-center">
            <img src="<?php echo get_template_directory_uri();?>/assets/img/BarWlogo.png" alt="Picture of..." width="300" height="300">
        </div>
        <div id="textcolp2" class="col me-5">
            <div class="mt-auto">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
            </p>
            </div>
            <br>
            <div class="d-flex justify-content-center">
            <button class="fpCTA ms-3" type="button">Train&nbspMe!</button>
            </div>
        </div>
    </div>
</div>
<!-- PANEL3  -->
<div id="panel3" class="container-fluid">
    <div class="row">
        <div class="col ms-5 d-flex justify-content-center">
            <img src="<?php echo get_template_directory_uri();?>/assets/img/BarWlogo.png" alt="Picture of..." width="300" height="300">
        </div>
        <div id="textcolp2" class="col me-5">
            <div class="mt-auto">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
            </p>
            </div>
            <br>
            <div class="d-flex justify-content-center">
            <button class="fpCTA ms-3" type="button">Train&nbspMe!</button>
            </div>
        </div>
    </div>
</div>



</div> <!-- end frpg-comp -->

<?php get_footer(); ?>
