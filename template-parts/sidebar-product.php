<?php  ?>



    <div id="sidebar-content" class="p-3">
		<div class="side-title">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/img/BarWlogo.png" alt=""  width="200" height="200">
		</div>
		<div class="side-note">
			<p>
				Lorem ipsum dolor sit amet adipiscing bibendum sem orci tempus aliquet gravida
			</p>
		</div>
		<div class="pt-5">
            <h2 class="cat-title">Categories</h2>
			<?php  
				wp_list_categories( array (
					'style' => "",
					'title_li' => ""
				));
			?>
		</div>
    </div>


