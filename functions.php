<?php
/**
 * BARNBUS functions and definitions*
 *
 * @package WordPress
 * @subpackage BARNBUS
 * @since BARNBUS 1.0
 */

/**
 * BARNBUS only works in WordPress 4.4 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.4-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}
if ( ! function_exists( 'BARNBUS_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * Create your own BARNBUS_setup() function to override in a child theme.
 *
 */
function BARNBUS_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Twenty Sixteen, use a find and replace
	 * to change 'BARNBUS' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'BARNBUS', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for custom logo.
	 *
	 *  @since Twenty Sixteen 1.2
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	//set_post_thumbnail_size( 1200, 9999 );
	
	// Add featured image sizes
	add_image_size( 'IMAGE-LABEL', 350, 260, true );	
	
	//Add size selector to media editor
	add_filter( 'image_size_names_choose', 'custom_image_sizes_choose' );	
	function custom_image_sizes_choose( $sizes ) {
		$custom_sizes = array(
			'IMAGE-LABEL' => 'IMAGE SIZE NAME',
		);
		return array_merge( $sizes, $custom_sizes );
	}

	// Register Menus.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'BARNBUS' )		
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'video',
		'gallery',
		'audio',
	) );


	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif; // BARNBUS_setup
add_action( 'after_setup_theme', 'BARNBUS_setup' );

/*************************
 * Registers a widget area.
 ************************/
function BARNBUS_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'General Page Sidebar', 'BARNBUS' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on standard pages.', 'BARNBUS' ),
		'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="fancy-title title-bottom-border"><h2>',
		'after_title'   => '</h2></div>',
	) );

}
add_action( 'widgets_init', 'BARNBUS_widgets_init' );

/******************************
 * Enqueues scripts and styles.
 *****************************/
function BARNBUS_scripts() {

	// Theme stylesheets.
	wp_enqueue_style( 'normalise', 'https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css',false,'1.0','all');
	wp_enqueue_style( 'opensans', 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap',false,'1.0','all');
	wp_enqueue_style( 'bootstrapcss', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css',false,'1.0','all');
	wp_enqueue_style( 'fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css',false,'1.0','all');
	wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css',false,'1.0','all');
	
	
	//Theme JS
	// enqueue jQuery migrate to avoid any conflicts
	wp_enqueue_script( 'jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js', array ( '' ), 1.0, true);
	wp_enqueue_script( 'bootstrapjs', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.min.js', array ( 'jquery' ), 1.0, true);
	wp_enqueue_script( 'theme', get_template_directory_uri() . '/js/theme.js', array ( 'jquery' ), 1.0, true);
	wp_enqueue_script( 'jquery-migrate', get_site_url() . '/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.2.1', array ( 'jquery' ), 1.0, true);

}
add_action( 'wp_enqueue_scripts', 'BARNBUS_scripts' );

/******************************
 * Remove plugins styles.
 *****************************/
function remove_plugin_styles() {
	wp_dequeue_style("contact-form-7");
}
//add_action('wp_enqueue_scripts', 'remove_plugin_styles');

/******************************
 * Stop render blocking scripts.
 *****************************/



/*
 * Helper function to print script handels at the top of the page
 */

//add_action( 'wp_print_scripts', 'es_detect_enqueued_scripts' );
function es_detect_enqueued_scripts() {
	global $wp_scripts;
	foreach( $wp_scripts->queue as $handle ) :
		echo $handle . ' | ';
	endforeach;
}

//add_action( 'wp_print_styles', 'es_detect_enqueued_styles' );
function es_detect_enqueued_styles() {
	global $wp_styles;
	foreach( $wp_styles->registered as $handle => $data ) :
		echo $handle . ' | ';
	endforeach;
}

/*
 * Load scripts via async.
 */


/*
* Load scripts via Defer
*/

//add_filter( 'script_loader_tag', 'wsds_defer_scripts', 10, 3 );
//function wsds_defer_scripts( $tag, $handle, $src ) {
//
//	// The handles of the enqueued scripts we want to defer
//	$defer_scripts = array(		
//		'handle'
//	);
//
//    if ( in_array( $handle, $defer_scripts ) ) {
//        return '<script src="' . $src . '" defer="defer" type="text/javascript"></script>' . "\n";
//    }
//    
//    return $tag;
//} 

/*****************************************************
 * Filter system email address and from name
 *****************************************************/
function BARNBUS_filter_wp_mail_from($email){
$sitename = strtolower( $_SERVER['SERVER_NAME'] );
if ( substr( $sitename, 0, 4 ) == 'www.' ) {
$sitename = substr( $sitename, 4 );
}
// Enter first half of email address you want to display.
$myfront = "BARNBUS@";
$myback = $sitename;
$myfrom = $myfront . $myback;
return $myfrom;
}
add_filter("wp_mail_from", "BARNBUS_filter_wp_mail_from");

/* enter the full name you want displayed alongside the email address */
function BARNBUS_filter_wp_mail_from_name($from_name){
return "BARNBUS";
}
//add_filter("wp_mail_from_name", "BARNBUS_filter_wp_mail_from_name");

/*****************************************************************
 * Register and enqueue a custom stylesheet in the WordPress admin.
 ****************************************************************/
function wpdocs_enqueue_custom_admin_style() {
        wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/css/font-awesome.min.css', false, '1.0.0' );
        wp_enqueue_style( 'custom_wp_admin_css' );
		wp_enqueue_style( 'admin-css', get_template_directory_uri() . '/css/admin.css',false,'1.0','all');
}
add_action( 'admin_enqueue_scripts', 'wpdocs_enqueue_custom_admin_style' );

/*******************************************
 *Add custom classes to wordpress body_class
 ******************************************/
add_filter( 'body_class','custom_body_classes' );
function custom_body_classes( $classes ) { 
	global $post;
	if(isset($post)) {
		$classes[] = $post->post_type . '-' . $post->post_name;
	}
    $classes[] = '';
    return $classes;     
}

/*********************
 *Remove Emoji scripts
 ********************/
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' ); 

/*****************************************************
 *ADVANCED CUSTOM FIELDS  
 *****************************************************/
/**
 * Create Option Page
 *
 */
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'General Settings',
		'menu_title'	=> 'Global Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
		'position' => 30
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Header Settings',
		'menu_title'	=> 'Header Settings',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer Settings',
		'menu_title'	=> 'Footer Settings',
		'parent_slug'	=> 'theme-general-settings',
	));
	
}

/**
 * Input field styles
 */ 
function my_acf_admin_head()
{
    ?>
    <style type="text/css">
 		.acf-fields.-left > .width10 > .acf-input { width: 10%;}
 		.acf-fields.-left > .width15 > .acf-input { width: 15%;}
 		.acf-fields.-left > .width20 > .acf-input { width: 20%;}
 		.acf-fields.-left > .width25 > .acf-input { width: 25%;}
 		.acf-fields.-left > .width30 > .acf-input { width: 30%;}
 		.acf-fields.-left > .width40 > .acf-input { width: 40%;}
 		.acf-fields.-left > .width50 > .acf-input { width: 50%;}
 		.acf-fields.-left > .width75 > .acf-input { width: 75%;}
 
    </style>
 
    <script type="text/javascript">
    (function($){
 
        /* ... */
 
    })(jQuery);
    </script>
    <?php
} 
add_action('acf/input/admin_head', 'my_acf_admin_head'); 

//Better Wysiwig control
function enable_more_buttons($buttons) {

	$buttons[] = 'cut';
	$buttons[] = 'copy';
	$buttons[] = 'paste';
	
	return $buttons;
}
add_filter('mce_buttons_3', 'enable_more_buttons');
add_filter( 'tiny_mce_before_init', 'myformatTinyMCE' );
function myformatTinyMCE( $in ) {

$in['wordpress_adv_hidden'] = FALSE;

return $in;
}


function remove_core_updates(){
global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
}
add_filter('pre_site_transient_update_core','remove_core_updates');
add_filter('pre_site_transient_update_plugins','remove_core_updates');
add_filter('pre_site_transient_update_themes','remove_core_updates');

/**************************************************
 * Show customise option in admin bar for admins only.
 *************************************************/
function adminbar_remove_customise() {
    global $wp_admin_bar;
	if(!current_user_can('administrator')) {
    	$wp_admin_bar->remove_menu('customize');
	}
}
add_action( 'wp_before_admin_bar_render', 'adminbar_remove_customise' );

/**************************************************
 * Let Editors manage users, and run this only once.
 *************************************************/
function isa_editor_manage_users() {
    if ( get_option( 'isa_add_cap_editor_once' ) != 'done' ) {     
        // let editor manage users 
        $edit_editor = get_role('editor'); // Get the user role
        $edit_editor->add_cap('edit_users');
        $edit_editor->add_cap('list_users');
        $edit_editor->add_cap('promote_users');
        $edit_editor->add_cap('create_users');
        $edit_editor->add_cap('add_users');
        $edit_editor->add_cap('delete_users');
 
        update_option( 'isa_add_cap_editor_once', 'done' );
    } 
}
//add_action( 'init', 'isa_editor_manage_users' );

//prevent editor from deleting, editing, or creating an administrator
// only needed if the editor was given right to edit users 
class BARNBUS_User_Caps { 
  // Add our filters
  function __construct(){
    add_filter( 'editable_roles', array(&$this, 'editable_roles'));
    add_filter( 'map_meta_cap', array(&$this, 'map_meta_cap'),10,4);
  }
  // Remove 'Administrator' from the list of roles if the current user is not an admin
  function editable_roles( $roles ){
    if( isset( $roles['administrator'] ) && !current_user_can('administrator') ){
      unset( $roles['administrator']);
    }
    return $roles;
  }
  // If someone is trying to edit or delete an
  // admin and that user isn't an admin, don't allow it
  function map_meta_cap( $caps, $cap, $user_id, $args ){
    switch( $cap ){
        case 'edit_user':
        case 'remove_user':
        case 'promote_user':
            if( isset($args[0]) && $args[0] == $user_id )
                break;
            elseif( !isset($args[0]) )
                $caps[] = 'do_not_allow';
            $other = new WP_User( absint($args[0]) );
            if( $other->has_cap( 'administrator' ) ){
                if(!current_user_can('administrator')){
                    $caps[] = 'do_not_allow';
                }
            }
            break;
        case 'delete_user':
        case 'delete_users':
            if( !isset($args[0]) )
                break;
            $other = new WP_User( absint($args[0]) );
            if( $other->has_cap( 'administrator' ) ){
                if(!current_user_can('administrator')){
                    $caps[] = 'do_not_allow';
                }
            }
            break;
        default:
            break;
    }
    return $caps;
  } 
}
 
//$BARNBUS_User_Caps = new BARNBUS_User_Caps();

// Hide all administrators from user list.
 
//add_action('pre_user_query','BARNBUS_pre_user_query');
function BARNBUS_pre_user_query($user_search) {
 
    $user = wp_get_current_user();
     
    if ( ! current_user_can( 'manage_options' ) ) {
   
        global $wpdb;
     
        $user_search->query_where = 
            str_replace('WHERE 1=1', 
            "WHERE 1=1 AND {$wpdb->users}.ID IN (
                 SELECT {$wpdb->usermeta}.user_id FROM $wpdb->usermeta 
                    WHERE {$wpdb->usermeta}.meta_key = '{$wpdb->prefix}capabilities'
                    AND {$wpdb->usermeta}.meta_value NOT LIKE '%administrator%')", 
            $user_search->query_where
        );
 
    }
}

function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );


//Custom Post Type
function team_post_type () {
register_post_type('team', array(
        'show_in_rest' => true,
        'supports' => array('title'),
        'rewrite' => array(
            'slug' => 'team',
        ),
        'has_archive' => true,
        'public' => true,
        'labels' => array(
            'name' => 'Team Members',
            'add_new_item' => 'Add New Team Member',
            'edit_item' => 'Edit Team Member',
            'all_items' => 'All Team Members',
            'singular_name' => 'Team Member',
        ),
        'menu_icon' => 'dashicons-admin-users',
    ));
}

//Add the action
add_action('init', 'team_post_type');
?>
