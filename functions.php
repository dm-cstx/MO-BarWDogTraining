<?php
/*  reference: https://code.tutsplus.com/tutorials/the-headerphp-what-needs-to-go-in-it-and-what-doesnt--wp-24923 */
define("THEME_DIR", get_template_directory_uri());
/* ---REMOVE GENERATOR META TAG--- */
remove_action('wp_head', 'wp_generator');

/*
===========================
Include Scripts
===========================
*/
function morningowls_script_enqueue() {
    /* wp_enqueue_script('morning-jquery-script', '//code.jquery.com/jquery-3.6.0.min.js', NULL, '1.0', true); */
	
	wp_enqueue_script('morning-popper-script', '//cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', NULL, '1.0', true);
	wp_enqueue_script('morning-bootstrap-script', '//cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js', NULL, '1.0', true);
  wp_enqueue_style ('bootstrap', '//stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css');
  //wp_enqueue_style ('custom-google-fonts', '');
  wp_enqueue_script('font-awesome', '//kit.fontawesome.com/abcbe4b956.js', NULL, '1.0', true);
  wp_enqueue_style ('customstyle', get_template_directory_uri() . '/css/MorningOwls-client.css', array(), '1.0.0', 'all');
  wp_enqueue_style ('custommedia', get_template_directory_uri() . '/css/queries.css', array(), '1.0.0', 'all');
  wp_enqueue_script('customjs', get_template_directory_uri() . '/js/MorningOwls-client.js', array(), '1.0.0', true);
}

add_action('wp_enqueue_scripts', 'morningowls_script_enqueue');

/*
====================================================
Theme Support Function
====================================================
*/
function morningowls_theme_setup() {
	add_theme_support('menus');
    add_theme_support('post-thumbnails');
	add_theme_support('post-formats');
	add_theme_support('automatic-feed-links');
}

add_action('init', 'morningowls_theme_setup');


/*
====================================================
Post Types
====================================================
*/

function client_post_types() {
		//change 'event' to represent clients post type intent- don't forget dashicon and other attributes
  register_post_type('event', array(
    'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
	'show_in_rest' => true,
    'rewrite' => array('slug' => 'events'),
    'has_archive' => true,
    'public' => true,
    'labels' => array(
      'name' => 'Events',
      'add_new_item' => 'Add New Event',
      'edit_item' => 'Edit Event',
      'all_items' => 'All Events',
      'singular_name' => 'Event'
    ),
    'menu_icon' => 'dashicons-calendar'
  ));

  register_post_type('product', array(
    'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
	  'show_in_rest' => true,
    'rewrite' => array('slug' => 'products'),
    'has_archive' => true,
    'public' => true,
    'labels' => array(
      'name' => 'Products',
      'add_new_item' => 'Add New Product',
      'edit_item' => 'Edit Product',
      'all_items' => 'All Products',
      'singular_name' => 'Product'
    ),
    'menu_icon' => 'dashicons-universal-access'
  ));
// If Change the name of post type 'product' see Product Order By below

}

add_action('init', 'client_post_types');

/*
====================================================
Change order of query results
====================================================
*/
function mo_adjust_queries($query) {
  if (!is_admin() AND is_post_type_archive('event') AND $query->is_main_query()) {
    $today = date('Ymd');
    $query->set('meta_key', 'event_date');
    $query->set('orderby', 'meta_value_num');
    $query->set('order', 'ASC');
    $query->set('meta_query', array(
      array(
        'key' => 'event_date',
        'compare' => '>=',
        'value' => $today,
        'type' => 'numeric'
      )));
  }
  
}

add_action('pre_get_posts', 'mo_adjust_queries');

/*
====================================================
Product Order By
====================================================
*/
function mo_adjust_queries2($query) {
  if (!is_admin() AND is_post_type_archive('product') AND $query->is_main_query()) {
    $today = date('Ymd');
    $query->set('meta_key', 'product_order');
    $query->set('orderby', 'meta_value_num');
    $query->set('order', 'ASC');
  }
}

add_action('pre_get_posts', 'mo_adjust_queries2');


/*
====================================================
Customize Dashboard
====================================================
*/
function customize_post_admin_menu_labels() {
  global $menu, $submenu;
  $menu[5][0] = 'Blog';
  $submenu['edit.php'][5][0] = 'Articles';
  $submenu['edit.php'][10][0] = 'Add Articles';
  echo '';
}

add_action('admin_menu', 'customize_post_admin_menu_labels');

function customize_admin_labels() {
  global $wp_post_types;
  $labels = &$wp_post_types['post']->labels;
  $labels->name = 'Articles';
  $labels->singular_name = 'Article';
  $labels->add_new = 'Add Article';
  $labels->add_new_item = 'Add Article';
  $labels->edit_item = 'Edit Article';
  $labels->new_item = 'Article';
  $labels->view_item = 'View Articles';
  $labels->search_items = 'Search Articles';
  $labels->not_found = 'No Articles Found';
  $labels->not_found_in_trash = 'No Articles found in Trash';
}

add_action('init', 'customize_admin_labels');

function wpse_custom_menu_order ( $menu_ord) {
  if ( !$menu_ord ) return true;

  return array(
    'index.php', // Dashboard
    'separator1', // First separator
    'edit.php', // Posts
    'edit.php?post_type=page', // Pages
    'edit.php?post_type=event', // Events
    'upload.php', // Media
    'edit-comments.php', // Comments
    'link-manager.php', // Links
    'separator2', // Second separator
    'themes.php', // Appearance
    'plugins.php', // Plugins
    'users.php', // Users
    'tools.php', // Tools
    'options-general.php', // Settings
    'separator-last', // Last separator
  );
}

add_filter ('custom_menu_order', 'wpse_custom_menu_order'  );
add_filter ( 'menu_order', 'wpse_custom_menu_order', 10, 1);


/*
====================================================
Custom CSS
====================================================
*/

add_action('admin_head', 'my_custom_css_do');
function my_custom_css_do() {
echo '<style>
//#adminmenu li#menu-posts {display:none;}
//#adminmenu li#menu-comments {display:none;}
//#adminmenu li#menu-pages {display:none;}
//#adminmenu li#toplevel_page_members  {display:none;}
//#adminmenu li#toplevel_page_wpforms-overview {display:none;}
//#adminmenu li#toplevel_page_cmp-settings {display:none;}
//#adminmenu li#toplevel_page_smush {display:none;}
//#adminmenu li#toplevel_page_members  {display:none;}
//#wpadminbar li#wp-admin-bar-updraft_admin_node {display:none;}
//#adminmenu li#toplevel_page_edit-post_type-acf-field-group {display:none;}
// Quick Post
#acf-group_604ca6d05bdc4 {background-color: #ede1fa; } 
#acf-group_604ca6d05bdc4 p {color: #333;}
// Front Page Videos
#acf-group_60685d311095f {background-color: #ede1fa; }
#acf-group_60685d311095f p {color: #333;}
// Event Gig
#acf-group_606061eb6138e {background-color: #ede1fa; }
#acf-group_606061eb6138e p {color: #333;}
// LinkStack
#acf-group_604fc41f518e9 {background-color: #ede1fa; }
#acf-group_604fc41f518e9 p {color: #333;}
// General Artist Press Kit
#acf-group_604f473ddb4d5 {background-color: #ede1fa; }
#acf-group_604f473ddb4d5 p {color: #333;}
// Song Press Kit
#acf-group_605cfae759a01 {background-color: #ede1fa; }
#acf-group_605cfae759a01 p {color: #333;}
// Front Page Announcement
#acf-group_60ae8d4fbc557 {background-color: #ede1fa; }
#acf-group_60ae8d4fbc557 p {color: #333;}


</style>';
}


