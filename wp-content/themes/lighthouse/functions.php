<?php
/**
 * lighthouse functions and definitions
 * Please browse readme.txt for credits and forking information
 *
 * @package Lighthouse
 */


if ( ! function_exists( 'lighthouse_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */


function lighthouse_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on lighthouse, use a find and replace
	 * to change 'lighthouse' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'lighthouse', get_template_directory() . '/languages' );

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
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 604, 270);
	add_image_size( 'lighthouse-full-width', 1038, 576, true );


	function lighthouse_register_lighthouse_menus() {
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Top Primary Menu', 'lighthouse' ),
			) );
	}

	add_action( 'init', 'lighthouse_register_lighthouse_menus' );


	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		) );



	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'lighthouse_custom_background_args', array(
		'default-color' => 'f5f5f5',
		'default-image' => '',
		) ) );
}
endif; // lighthouse_setup
add_action( 'after_setup_theme', 'lighthouse_setup' );

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 */
function lighthouse_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'lighthouse_content_width', 640 );
}
add_action( 'after_setup_theme', 'lighthouse_content_width', 0 );


/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */

function lighthouse_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'lighthouse' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Widgets here will appear in your sidebar', 'lighthouse' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
		) );
}
add_action( 'widgets_init', 'lighthouse_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function lighthouse_scripts ( $in_footer ) {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.css',true );

	// wp_enqueue_style( 'lighthouse-style', get_stylesheet_uri() );
	// dynamic stylesheet
	wp_enqueue_style( 'lighthouse-style', get_stylesheet_directory_uri() . '/style.css', array(), filemtime( get_stylesheet_directory() . '/style.css' ) );

	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/font-awesome/css/font-awesome.min.css',true );

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js',array('jquery'),'',true);

	wp_enqueue_script( 'lighthouse-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array('jquery'), '20130115', true );

	wp_enqueue_script( 'lighthouse-js', get_template_directory_uri() . '/js/lighthouse.js',array('jquery'),'',true);

	wp_enqueue_script( 'html5shiv', get_template_directory_uri().'/js/html5shiv.js', array(),'3.7.3',false );
	wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'lighthouse_scripts' );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';


/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';


/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';


/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * Load custom nav walker
 */
if(!class_exists('wp_bootstrap_navwalker')){
require get_template_directory() . '/inc/navwalker.php';
}


function lighthouse_google_fonts() {
	$query_args = array(

		'family' => 'Lato:400,300italic,700,700i|Source+Sans+Pro:400,400italic'
		);
	wp_register_style( 'lighthousegooglefonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
	wp_enqueue_style( 'lighthousegooglefonts');
}

add_action('wp_enqueue_scripts', 'lighthouse_google_fonts');


function lighthouse_new_excerpt_more( $more ) {
	if ( is_admin() ) {
		return $more;
	}

		$link = sprintf( '<p class="read-more"><a class="btn btn-default" href="'. esc_url(get_permalink( get_the_ID() )) . '' . '">' . __(' Read More', 'lighthouse') . '<span class="screen-reader-text"> '. __(' Read More', 'lighthouse').'</span></a></p>',
		esc_url( get_permalink( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;

}
add_filter( 'excerpt_more', 'lighthouse_new_excerpt_more' );




/**
*
* Custom Logo in the top menu
*
**/

function lighthouse_logo() {
	add_theme_support('custom-logo', array(
		'size' => 'lighthouse-logo',
		'width'                  => 250,
		'height'                 => 50,
		'flex-height'            => true,
		));
}

add_action('after_setup_theme', 'lighthouse_logo');


/**
*
* New Footer Widgets
*
**/

function lighthouse_footer_widget_left_init() {

	register_sidebar( array(
		'name' => esc_html__('Footer Widget left', 'lighthouse'),
		'id' => 'footer_widget_left',
		'description'   => esc_html__( 'Widgets here will appear in your footer', 'lighthouse' ),
		'before_widget' => '<div class="footer-widgets">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
		) );
}
add_action( 'widgets_init', 'lighthouse_footer_widget_left_init' );

function lighthouse_footer_widget_middle_init() {

	register_sidebar( array(
		'name' => esc_html__('Footer Widget middle', 'lighthouse'),
		'id' => 'footer_widget_middle',
		'description'   => esc_html__( 'Widgets here will appear in your footer', 'lighthouse' ),
		'before_widget' => '<div class="footer-widgets">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
		) );
}
add_action( 'widgets_init', 'lighthouse_footer_widget_middle_init' );

function lighthouse_footer_widget_right_init() {

	register_sidebar( array(
		'name' => esc_html__('Footer Widget right', 'lighthouse'),
		'id' => 'footer_widget_right',
		'before_widget' => '<div class="footer-widgets">',
		'description'   => esc_html__( 'Widgets here will appear in your footer', 'lighthouse' ),
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
		) );
}
add_action( 'widgets_init', 'lighthouse_footer_widget_right_init' );

/**
*
* Top Widgets
*
**/

function lighthouse_top_widget_left_init() {

	register_sidebar( array(
		'name' => esc_html__('Top Widget left', 'lighthouse'),
		'id' => 'top_widget_left',
		'before_widget' => '<div class="top-widgets">',
		'description'   => esc_html__( 'Widgets here will appear under the header image', 'lighthouse' ),
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
		) );
}
add_action( 'widgets_init', 'lighthouse_top_widget_left_init' );


/* Customize the menus AYE
function custom_novice_menu() {
	wp_nav_menu(array(
		'container' => 'nav',
	));
}

add_filter('lighthouse_top_widget_left_init', 'custom_novice_menu'); */

function custom_novice_menu($args) {
    $args['container'] = false;
		$args['container_id'] = 'my_primary_menu';
		$args['link_before'] = '<div class="topic-card"><div class="topic-circle"></div><span></span><h3>';
		$args['link_after'] = '</h3></div>';
  	return $args;
}

add_filter('wp_nav_menu_args', 'custom_novice_menu');

/*
function clean_custom_menus() {
	$menu_name = 'nav-primary'; // specify custom menu slug
	if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
		$menu = wp_get_nav_menu_object($locations[$menu_name]);
		$menu_items = wp_get_nav_menu_items($menu->term_id);

		$menu_list = '<nav>' ."\n";
		$menu_list .= "\t\t\t\t". '<ul>' ."\n";
		foreach ((array) $menu_items as $key => $menu_item) {
			$title = $menu_item->title;
			$url = $menu_item->url;
			$menu_list .= "\t\t\t\t\t". '<li><a href="'. $url .'">'. $title .'</a></li>' ."\n";
		}
		$menu_list .= "\t\t\t\t". '</ul>' ."\n";
		$menu_list .= "\t\t\t". '</nav>' ."\n";
	} else {
		// $menu_list = '<!-- no list defined -->';
	}
	echo $menu_list;
}
*/

function lighthouse_top_widget_middle_init() {

	register_sidebar( array(
		'name' => esc_html__('Top Widget middle', 'lighthouse'),
		'id' => 'top_widget_middle',
		'description'   => esc_html__( 'Widgets here will appear under the header image', 'lighthouse' ),
		'before_widget' => '<div class="top-widgets">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
		) );
}
add_action( 'widgets_init', 'lighthouse_top_widget_middle_init' );

function lighthouse_top_widget_right_init() {

	register_sidebar( array(
		'name' => esc_html__('Top Widget right', 'lighthouse'),
		'id' => 'top_widget_right',
		'before_widget' => '<div class="top-widgets">',
		'after_widget' => '</div>',
		'description'   => esc_html__( 'Widgets here will appear under the header image', 'lighthouse' ),
		'before_title' => '<h3>',
		'after_title' => '</h3>',
		) );
}
add_action( 'widgets_init', 'lighthouse_top_widget_right_init' );





/**
*
* Bottom Widgets
*
**/

function lighthouse_bottom_widget_left_init() {

	register_sidebar( array(
		'name' => esc_html__('bottom Widget left', 'lighthouse'),
		'id' => 'bottom_widget_left',
		'before_widget' => '<div class="bottom-widgets">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'description'   => esc_html__( 'Widgets here will appear above the footer', 'lighthouse' ),
		'after_title' => '</h3>',
		) );
}
add_action( 'widgets_init', 'lighthouse_bottom_widget_left_init' );


function lighthouse_bottom_widget_middle_init() {

	register_sidebar( array(
		'name' => esc_html__('bottom Widget middle', 'lighthouse'),
		'id' => 'bottom_widget_middle',
		'before_widget' => '<div class="bottom-widgets">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'description'   => esc_html__( 'Widgets here will appear above the footer', 'lighthouse' ),
		'after_title' => '</h3>',
		) );
}
add_action( 'widgets_init', 'lighthouse_bottom_widget_middle_init' );

function lighthouse_bottom_widget_right_init() {

	register_sidebar( array(
		'name' => esc_html__('bottom Widget right', 'lighthouse'),
		'id' => 'bottom_widget_right',
		'before_widget' => '<div class="bottom-widgets">',
		'after_widget' => '</div>',
		'description'   => esc_html__( 'Widgets here will appear above the footer', 'lighthouse' ),
		'before_title' => '<h3>',
		'after_title' => '</h3>',
		) );
}
add_action( 'widgets_init', 'lighthouse_bottom_widget_right_init' );



/**
*
* Admin styles
*
**/
function lighthouse_load_custom_wp_admin_style( $hook ) {
    if ( 'appearance_page_about-lighthouse' !== $hook ) {
        return;
    }
    wp_enqueue_style( 'lighthouse-custom-admin-css', get_template_directory_uri() . '/css/admin.css', false, '1.0.0' );
}
add_action( 'admin_enqueue_scripts', 'lighthouse_load_custom_wp_admin_style' );


/*TGA activation*/

require_once get_template_directory() . '/lib/class-tgm-plugin-activation.php';

/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Free Seo Optimized Responsive Theme for publication on WordPress.org
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
require_once get_template_directory() . '/lib/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'lighthouse_register_required_plugins' );

function lighthouse_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'      => 'Autoptimize',
			'slug'      => 'autoptimize',
			'required'  => false,
			),

		array(
			'name'      => 'WP Super Cache',
			'slug'      => 'wp-super-cache',
			'required'  => false,
			),

		array(
			'name'        => 'WordPress SEO by Yoast',
			'slug'        => 'wordpress-seo',
			'is_callable' => 'wpseo_init',
			),

		);

	$config = array(
		'id'           => 'lighthouse',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.


		);

	tgmpa( $plugins, $config );
}

// unautop for images
function fb_unautop_4_img( $content )
{
    $content = preg_replace(
        '/<p>\\s*?(<a rel=\"attachment.*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s',
        '<figure>$1</figure>',
        $content
    );
    return $content;
}
add_filter( 'the_content', 'fb_unautop_4_img', 99 );

add_filter( 'img_caption_shortcode', 'my_img_caption_shortcode', 10, 3 );

function my_img_caption_shortcode( $empty, $attr, $content ){
	$attr = shortcode_atts( array(
		'id'      => '',
		'align'   => 'aligleft',
		'width'   => '',
		'caption' => '  '
	), $attr );

	if ( $attr['id'] ) {
		$attr['id'] = 'id="' . esc_attr( $attr['id'] ) . '" ';
	}

	return '<div ' . $attr['id']
	. 'class="wp-caption ' . esc_attr( $attr['align'] ) . '" '
	. 'style="max-width: ' . ( 10 + (int) $attr['width'] ) . 'px;">'
	. do_shortcode( $content )
	. '<p class="wp-caption-text">' . $attr['caption'] . '</p>'
	. '</div>';

}
/*
function my_mce_buttons_2( $buttons ) {
	$buttons[] = 'code';
	$buttons[] = 'hr';

	return $buttons;
}
add_filter( 'mce_buttons_2', 'my_mce_buttons_2' );

function my_mce_external_plugins($plugins) {

    $plugins['code'] = get_stylesheet_directory_uri() . '/js/lighthouse.js';
    return $plugins;
}
add_filter('mce_external_plugins', 'my_mce_external_plugins');
*/

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Writer Settings',
		'menu_title'	=> 'Writers',
		'parent_slug'	=> 'theme-general-settings',
	));

}

add_action( 'init', 'wptuts_buttons' );
function wptuts_buttons() {
    add_filter( "mce_external_plugins", "wptuts_add_buttons" );
    add_filter( 'mce_buttons_2', 'wptuts_register_buttons' );
}
function wptuts_add_buttons( $plugin_array ) {
    $plugin_array['newbutton'] = get_template_directory_uri() . '/js/buttons.js';
    return $plugin_array;
}
function wptuts_register_buttons( $buttons ) {
    array_push( $buttons, 'code'); // dropcap', 'recentposts
    return $buttons;
}

add_filter( 'mce_buttons_2', 'fb_mce_editor_buttons' );
function fb_mce_editor_buttons( $buttons ) {

    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}

add_filter( 'tiny_mce_before_init', 'fb_mce_before_init' );

function fb_mce_before_init( $settings ) {

    $style_formats = array(
        array(
            'title' => 'Paragraph Label',
						'classes' => 'subtitle',
            'block' => 'div',
            'styles' => array(
                'fontWeight'    => 'bold',
                'textTransform' => 'uppercase'
            )
        )
    );

    $settings['style_formats'] = json_encode( $style_formats );

    return $settings;

}

// REMOVE HEADER OPTIONS FROM WORDPRESS TINYMCE PARAGRAPH DROPDOWN MENU
function tiny_mce_remove_unused_formats($init) {
	// Add block format elements you want to show in dropdown
	$init['block_formats'] = 'Paragraph=p;';
	return $init;
}
add_filter('tiny_mce_before_init', 'tiny_mce_remove_unused_formats' );


// removes wording from archive meta title
add_filter( 'get_the_archive_title', function ( $title ) {

    if( is_category() ) {

        $title = single_cat_title( '', false );

    }

    return $title;

});

/**
 * Fix 404 for permalinks using category_base
 */
function permalinkWithCategoryBaseFix() {
    global $wp_query;
    // Only check on 404's
    if ( true === $wp_query->is_404) {
        $currentURI = !empty($_SERVER['REQUEST_URI']) ? trim($_SERVER['REQUEST_URI'], '/') : '';
        if ($currentURI) {
            $categoryBaseName = trim(get_option('category_base'), '/.'); // Remove / and . from base
            if ($categoryBaseName) {
                // Perform fixes for category_base matching start of permalink custom structure
                if ( substr($currentURI, 0, strlen($categoryBaseName)) == $categoryBaseName ) {
                    // Find the proper category
                    $childCategoryObject = get_category_by_slug($wp_query->query_vars['name']);
                    // Make sure we have a category
                    if (is_object($childCategoryObject)) {
                        $paged = ($wp_query->query_vars['paged']) ? $wp_query->query_vars['paged']: 1;
                        $wp_query->query(array(
                                              'cat' => $childCategoryObject->term_id,
                                              'paged'=> $paged
                                         )
                        );
                        // Set our accepted header
                        status_header( 200 ); // Prevents 404 status
                    }
                    unset($childCategoryObject);
                }
            }
            unset($categoryBaseName);
        }
        unset($currentURI);
    }
}

add_action('template_redirect', 'permalinkWithCategoryBaseFix');

/**
 * Fix the problem where next/previous of page number buttons are broken of posts in a category when the custom permalink
 * The problem is that with a url like this:
 * /categoryname/page/2
 * the 'page' looks like a post name, not the keyword "page"
 */
function fixCategoryPagination($queryString) {
    if (isset($queryString['name']) && $queryString['name'] == 'page' && isset($queryString['page'])) {
        unset($queryString['name']);
        // 'page' in the query_string looks like '/2', so i'm exploding it
        list($delim, $page_index) = explode('/', $queryString['page']);
        $queryString['paged'] = $page_index;
    }
    return $queryString;
}

add_filter('request', 'fixCategoryPagination');

// custom thumbnail sizes
add_action( 'after_setup_theme', 'wpdocs_theme_setup' );

add_theme_support( 'post-thumbnails' );
function wpdocs_theme_setup() {
    add_image_size( 'resource-thumb', 100, 100, false ); // 300 pixels wide and tall
}

/* Custom post type section for writers */

function create_post_type() {
  register_post_type( 'writer',
    array(
      'labels' => array(
        'name' => __( 'Writers' ),
        'singular_name' => __( 'Writers' )
      ),
			'public' => true,  // it's not public, it shouldn't have it's own permalink, and so on
			/*'publicly_queryable' => true,  // you should be able to query it
			'show_ui' => true,  // you should be able to edit it in wp-admin
			'exclude_from_search' => true,  // you should exclude it from search results
			'show_in_nav_menus' => false,  // you shouldn't be able to add it to menus
			'has_archive' => false,  // it shouldn't have archive page
			'rewrite' => false,  // it shouldn't have rewrite rules */
    )
  );
}
add_action( 'init', 'create_post_type' );

// DELETING COOKIE
add_action( 'init', 'my_deletecookie' );
function my_deletecookie() {
   setcookie( 'MCPopupClosed', '', time() - 3600, COOKIEPATH, COOKIE_DOMAIN );
}

// Custom Excerpt length
if ( ! function_exists( 'wpse0001_custom_wp_trim_excerpt' ) ) : 
	
	function wpse0001_custom_wp_trim_excerpt($wpse0001_excerpt) {
	global $post;
	$raw_excerpt = $wpse0001_excerpt;
	if ( '' == $wpse0001_excerpt ) {
	
	$wpse0001_excerpt = get_the_content('');
	$wpse0001_excerpt = strip_shortcodes( $wpse0001_excerpt );
	$wpse0001_excerpt = apply_filters('the_content', $wpse0001_excerpt);
	// Here we choose how many paragraphs do we want to cutthe excerpt at, This part thanks to Clément Malet
		$wanted_number_of_paragraph = 2;
		$tmp = explode ('</p>', $wpse0001_excerpt);
		for ($i = 0; $i < $wanted_number_of_paragraph; $i++) {
		   if (isset($tmp[$i]) && $tmp[$i] != '') {
			   $tmp_to_add[$i] = $tmp[$i];
		   }
		}
	$wpse0001_excerpt = implode('</p>', $tmp_to_add) . '</p>';
	
	$wpse0001_excerpt = str_replace(']]>', ']]&gt;', $wpse0001_excerpt);
	
	$wpse0001_excerpt .= $excerpt_end;
	
	return $wpse0001_excerpt;
	
	}
	return apply_filters('wpse0001_custom_wp_trim_excerpt', $wpse0001_excerpt, $raw_excerpt);
	}
	
	endif; 
	
	remove_filter('get_the_excerpt', 'wp_trim_excerpt');
	add_filter('get_the_excerpt', 'wpse0001_custom_wp_trim_excerpt');

