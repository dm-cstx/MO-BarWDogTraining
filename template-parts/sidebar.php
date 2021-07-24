<?php  ?>



    <div id="sidebar-content" class="p-3">
	    <div class="side-title">
		    <!-- add logo/name/title  -->
	    </div>
	    <div class="side-note">
		    <!-- add logo/name/title  -->
	    </div>
	    <div class="pt-5">
            <h2 class="cat-title">Categories</h2>
		    <?php  
		        wp_list_categories( array (
					'show_count' => 1,
					'style' => "",
					'title_li' => "",
					'exclude' => '7',  //'7' being the id assigned to new category "Front Page Announcement"
				));
		    ?>
	    </div>
    </div>


