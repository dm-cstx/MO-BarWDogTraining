<?php
/**
 * The footer for our theme
 *
 * Contains the closing of the body.
 */

?>

<!--  FOOTER  -->
    <div id="newsletter" class="container-fluid">
        <div class="newsletterForm row-col-12 text-center">
            <h3>Newsletter</h3>
            <p>Sign up to be notified about new services and products.</p>
            <?php echo do_shortcode('[email-subscribers-form id="1"]'); ?>
        </div>
        
    </div>
    <footer id="main-footer" class="bg-success">

        <div class="container "> 
            <div class="row text-center footerRow"> 
                <div id="footLeft" class="col-sm-6 col-md-6 col-lg-4 order-lg-0 footLeft">
                    <h3>Organizations</h3>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/CCPDT.png" alt="ISCDT Logo" width="80" height="80">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/cert1.png" alt="SDC Logo" width="80" height="80">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/cert3.png" alt="CCPDT Logo" width="80" height="80">                    
                </div>

                <div class="ft-newsletter col-sm-6 col-md-6 col-lg-4 footCenter">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/BarWlogo.png" alt="Bar W Dog Training Logo" width="150" height="150">
                </div>

                <div class="col-lg-4 footRight">
                    <h3>Social</h3>
                    <a href="https://www.facebook.com/#" class="col footer-social-link"><i class="fab fa-facebook"></i></a>
                    <a href="https://www.instagram.com/#/" class="col footer-social-link"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.twitter.com/#/" class="col footer-social-link"><i class="fab fa-twitter-square"></i></a>
                    
                    <h3 id="contact">Contact</h3>
                    <p class="mb-3"><u> <a href="mailto:rileykdbs@gmail.com?subject=Website Contact.">RileyKDBS@gmail.com</a></u></p>
                </div>
            </div>

            <div id="ft-endnotes">
                <p>Copyright © 2021 Bar W Dog Training</p>
				<p id="power">Built and maintained by <a href="https://morningowls.com">Morning Owls</a></p>
				<p id="priv"><a href="<?php echo site_url('privacy-policy') ?>" >Privacy Policy</a></p>
			</div>

        </div>
        
        
        
    </footer>

<?php wp_footer(); ?>
</body>
</html>









