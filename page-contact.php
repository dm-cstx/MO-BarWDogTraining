<?php  get_header(); ?>

<div id="contactPage">
    <div class="row container contactRow">
        <div class="contactForm col">
            <p>
                Lorem ipsum dolor sit amet adipiscing bibendum sem orci tempus aliquet gravida, orci amet iaculis aptent blandit quam accumsan donec in facilisis.
            </p>
            <p class="mb-3"><u> <a href="mailto:rileykdbs@gmail.com?subject=Website Contact.">Send Email</a></u></p>
            <p>(XXX) XXX-XXXX</p>
            <?php echo do_shortcode('Edit | Entries | Preview | Duplicate | Delete
	[wpforms id="17"]'); ?>
        </div>
        <div class="contactImg col">
            <img src="/wp-content/themes/MO-BarWDogTraining/assets/img/BarWlogo.jpg" alt="">
        </div>
    </div>
</div>



<?php get_footer();