<?php  get_header(); ?>

<div id="contactPage">
    <div class="row contactRow">
        <div class="contactForm col-lg">
            <p>
                Lorem ipsum dolor sit amet adipiscing bibendum sem orci tempus aliquet gravida, orci amet iaculis aptent blandit quam accumsan donec in facilisis.
            </p>
            <p class="mb-3"><u> <a href="mailto:rileykdbs@gmail.com?subject=Website Contact.">Send Email</a></u></p>
            <p>(XXX) XXX-XXXX</p>
            <?php echo do_shortcode('[wpforms id="17"]'); ?>
        </div>
        <div class="col">
            <img class="contactImg" src="/wp-content/themes/MO-BarWDogTraining/assets/img/happy_dog_fin.jpg" alt="">
        </div>
    </div>
</div>



<?php get_footer();