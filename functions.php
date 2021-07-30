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
	
	// wp_enqueue_script('morning-popper-script', '//cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', NULL, '1.0', true);
	// wp_enqueue_script('morning-bootstrap-script', '//cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js', NULL, '1.0', true);
  // wp_enqueue_style ('bootstrap', '//stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css');
  //wp_enqueue_style ('custom-google-fonts', '');

  wp_enqueue_script('morning-bootstrap-script', '//cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js', NULL, '1.0', true);
  wp_enqueue_style ('custom-google-fonts', '//fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,400;0,500;1,300&display=swap');
  wp_enqueue_style ('bootstrap', get_template_directory_uri() . '/css/bootstrap_css.css', array(), '1.0.0', 'all');
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
  register_post_type('services', array(
    'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
    'show_in_rest' => true,
    'rewrite' => array('slug' => 'services'),
    'has_archive' => true,
    'public' => true,
    'labels' => array(
      'name' => 'Services',
      'add_new_item' => 'Add New Service',
      'edit_item' => 'Edit Service',
      'all_items' => 'All Services',
      'singular_name' => 'Service'
    ),
    'menu_icon' => 'dashicons-pets'
  ));

// If Change the name of post type 'product' see Product Order By below

}

add_action('init', 'client_post_types');

/*
====================================================
Create Categories for Services 
====================================================
*/
function add_custom_taxonomies() {
  register_taxonomy( 'service_type', 'services', array(
    'hierarchical' => true,
    'show_in_rest' => true,
    'labels' => array(
      'name' => _x( 'Type of Service', 'taxonomy general name' ),
      'singular_name' => _x( 'Service Type', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Service Types' ),
      'all_items' => __( 'All Service Types' ),
      'parent_item' => __( 'Parent Service Type' ),
      'parent_item_colon' => __( 'Parent Service Type:' ),
      'edit_item' => __( 'Edit Service Type' ),
      'update_item' => __( 'Update Service Type' ),
      'add_new_item' => __( 'Add New Service Type' ),
      'new_item_name' => __( 'New Service Type Name' ),
      'menu_name' => __( 'Service Types' ),
    ),
    'rewrite' => array(
      'slug' => 'service_type',
      'with_front' => false,
      'hierarchical' => true
    )
    ) );

  register_taxonomy( 'service_category', 'services', array(
    'hierarchical' => true,
    'show_in_rest' => true,
    'labels' => array(
      'name' => _x( 'Service Category', 'taxonomy general name' ),
      'singular_name' => _x( 'Service Category', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Service Categories' ),
      'all_items' => __( 'All Service Categories' ),
      'parent_item' => __( 'Parent Service Category' ),
      'parent_item_colon' => __( 'Parent Service Category:' ),
      'edit_item' => __( 'Edit Service Category' ),
      'update_item' => __( 'Update Service Category' ),
      'add_new_item' => __( 'Add New Service Category' ),
      'new_item_name' => __( 'New Service Category Name' ),
      'menu_name' => __( 'Service Categories' ),
    ),
    'rewrite' => array(
      'slug' => 'service_category',
      'with_front' => false,
      'hierarchical' => true
    )
    ) );


  }
add_action('init', 'add_custom_taxonomies', 0);

/* Add columns to Custom Post Type List Page */
function set_custom_edit_services_columns($columns) {

  $columns['service_type'] = __( 'Service Type', 'your_text_domain' );
  $columns['service_category'] = __( 'Service Category', 'your_text_domain' );

    return $columns;
}

function custom_services_column( $column, $post_id ) {
    switch ( $column ) {

        case 'service_type' :
          $terms = get_the_term_list( $post_id , 'service_type' , '' , ',' , '' );
          if ( is_string( $terms ) )
              echo $terms;
          else
              _e( ' ', 'your_text_domain' );
          break;

        case 'service_category' :
          $terms = get_the_term_list( $post_id , 'service_category' , '' , ',' , '' );
          if ( is_string( $terms ) )
              echo $terms;
          else
              _e( ' ', 'your_text_domain' );
          break;

    }
}

add_filter( 'manage_services_posts_columns', 'set_custom_edit_services_columns' );
add_action( 'manage_services_posts_custom_column' , 'custom_services_column', 10, 2 );

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
    'edit.php?post_type=services', // Services
    'edit.php?post_type=page', // Pages
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
#adminmenu li#menu-posts {display:none;}
#adminmenu li#menu-comments {display:none;}
//#adminmenu li#menu-pages {display:none;}
//#adminmenu li#toplevel_page_members  {display:none;}
//#adminmenu li#toplevel_page_wpforms-overview {display:none;}
//#adminmenu li#toplevel_page_cmp-settings {display:none;}
#adminmenu li#toplevel_page_smush {display:none;}
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


