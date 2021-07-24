<?php
/**
 * The footer for our theme
 *
 * Contains the closing of the body.
 */

?>

<!--  FOOTER  -->
    <footer id="main-footer" class="container-fluid">

        <div class="container "> 
            <div class="row text-center"> 
                <div id="ft-contact" class="col-sm-6 col-md-6 col-lg-4 order-lg-0">

                </div>

                <div class="ft-newsletter col-sm-6 col-md-6 col-lg-4">
                    <h3 class="foot-hdr">Join Our Newsletter</h3>
                    <div>
                        <?php echo do_shortcode('') ?>
                    </div>
                </div>

                <div class="ft-social col-lg-4">
                    <h3 class="foot-hdr">Social&nbsp;Media:</h3>
                    <a href="https://www.facebook.com/#" class="col footer-social-link"><i class="fab fa-facebook"></i></a>
                    <a href="https://www.instagram.com/#/" class="col footer-social-link"><i class="fab fa-instagram"></i></a>
                </div>
            </div>

            <div id="ft-endnotes">
                <p>Copyright © 2021 company name</p>
				<p id="power">Built and maintained by <a href="https://morningowls.com">Morning Owls</a></p>
				<p id="priv"><a href="<?php echo site_url('privacy-policy') ?>" >Privacy Policy</a></p>
			</div>

        </div>
        
        
        
    </footer>

<?php wp_footer(); ?>
</body>
</html>









