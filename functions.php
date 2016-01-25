<?php
/**
 * Theme functions and definitions
 *
 * Sets up the theme and provides some helper functions including 
 * custom template tags, actions and filter hooks to change core functionality.
 *
 *
 * @package master_theme
 */

/**
 * Set the content width
 */
// if ( ! isset( $content_width ) ) :
// 	$content_width = 600;
// endif;


/**
* Includes content from functions in inc/ directory
**/

// Comments & pingbacks display template
include('inc/functions/comments.php');

// include custom widget file: [TO DO]: customize or remove for new projects
include_once( 'inc/widget.php' );


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * To override master_theme_setup() in a child theme, 
 * add your own master_theme_setup to your child theme's functions.php file.
 */
if ( ! function_exists( 'master_theme_setup' ) ):
	function master_theme_setup() {

		// Make theme available for translation.
		// Translations can be filed in the /languages/ directory.
		load_theme_textdomain( 'master_theme', get_template_directory() . '/languages' );
		
		// Add theme support for customizable features
		// -------------------------------------------
		add_theme_support( 'automatic-feed-links' ); // Add default posts and comments RSS feed links to head
		add_theme_support( 'post-thumbnails' ); // Enable support for Post Thumbnails on posts and pages (aka 'featured image')
		//set_post_thumbnail_size( 120, 90, true ); // All images will be cropped to this thumbnail size
		add_theme_support( 'title-tag' );
		add_theme_support( 'custom-header' );
		add_theme_support( 'custom-background' );

		// Enable support for Post Formats.
		add_theme_support( 'post-formats', array( 
			'aside', 
			'image', 
			'video', 
			'quote', 
			'link' 
		) );

		// Switch default core markup for saerch form, comment form, comment list, and gallery to out valid HTML5 markup
		add_theme_support( 'html5', array(
			'comment-list',
			'search-form',
			'comment-form',
			'gallery',
			'caption'
		) );

		// Enable support for editable menus via Appearance > Menus
		// This theme uses wp_nav_menu() in one location.
		// You can allow clients to create multiple menus by
		// adding additional menus to the array. */
		register_nav_menus( array(
			'primary' => 	__( 'Primary Navigation', 'master_theme' ),
			'footer' => 	__( 'Footer Menu', 'master_theme' ),
		) );

		// Add custom image sizes
		add_image_size(     'small-square', 150, 150, true ); // (cropped)
		add_image_size(     'medium-square', 400, 400, true ); // (cropped)
		add_image_size(     'big-square', 	1000, 1000, true ); // (cropped)

		// add image sizes to back-end for client
		add_filter('image_size_names_choose', 'my_image_sizes');
		    function my_image_sizes($sizes) {
		        $addsizes = array(
		            'small-square'  => __( 'Square - Small', 'master_theme'),
		            'medium-square' => __( 'Square - Medium', 'master_theme'),
		            'big-square' 	 => __( 'Square - Large', 'master_theme'),
		);
		    $newsizes = array_merge($sizes, $addsizes);
		    return $newsizes;
		} // end of image name function

	}
endif; // master_theme_setup

add_action( 'after_setup_theme', 'master_theme_setup' );


/**
* Enqueue Scripts & Styles
**/
// Add all JavaScript files here. Let WordPress add them to our templates automatically instead of writing out own script tags in the header and footer
function master_theme_scripts() {
	
    //wp_enqueue_style( 'master-theme-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,600,400italic', false ); // theme google fonts
    //wp_enqueue_style( 'master-theme-style', get_stylesheet_uri() ); // theme style.css file

	// if ( is_singular('post') && comments_open() && get_option( 'thread_comments' ) ) {
	// 	wp_enqueue_script( 'comment-reply' );
	// }

	//Don't use WordPress' local copy of jquery, load our own version from a CDN instead
  wp_deregister_script('jquery');

  wp_enqueue_script(
  	'jquery',
  	"http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js",
  	false, //dependencies
  	null, //version number
  	true //load in footer
  );

  wp_enqueue_script(
    'plugins', //handle
    get_template_directory_uri() . '/js/plugins.js', //source
    array( 'jquery' ), //dependencies
    null, // version number
    true //load in footer
  );

  wp_enqueue_script(
    'scripts', //handle
    get_template_directory_uri() . '/js/main.min.js', //source
    array( 'jquery', 'plugins' ), //dependencies
    null, // version number
    true //load in footer
  );
}

  wp_enqueue_script(
    'smoothScroll', //handle
    get_template_directory_uri() . '/js/smoothscroll.js', //source
    array( 'jquery' ), //dependencies
    null, // version number
    true //load in footer
  );
}
    
add_action('wp_enqueue_scripts', 'master_theme_scripts');


/**
* Enable Custom Editor styles
**/
function master_theme_add_editor_styles() {
	add_editor_style( 'editorStyle.css' );
}

add_action( 'admin_init', 'master_theme_add_editor_styles' );


/*
  Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function master_theme_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'master_theme_page_menu_args' );


/*
 * Sets the post excerpt length to 100 characters.
 */
function master_theme_excerpt_length( $length ) {
	return 100;
}
add_filter( 'excerpt_length', 'master_theme_excerpt_length' );


/*
 * Returns a "Continue Reading" link for excerpts
 */
function master_theme_continue_reading_link() {
	return ' <a href="'. get_permalink() . '">Continue reading<span class="meta-nav">&rarr;</span></a>';
}


/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and master_theme_continue_reading_link().
 */
function master_theme_auto_excerpt_more( $more ) {
	return ' &hellip;' . hackeryou_continue_reading_link();
}
add_filter( 'excerpt_more', 'master_theme_auto_excerpt_more' );


/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 */
function master_theme_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= master_theme_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'master_theme_custom_excerpt_more' );


/*
 * Register a single widget area.
 * You can register additional widget areas by using register_sidebar again
 * within master_theme_widgets_init.
 * Display in your template with dynamic_sidebar()
 */
function master_theme_widgets_init() {
	register_sidebar( array(
	  'name' => __( 'Main Sidebar', 'master_theme' ),
	  'id' => 'sidebar1', // ID to use when including sidebar in other templates
	  'description' => 'The primary widget area',
	  'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	  'after_widget' => '</aside>',
	  'before_title' => '<h3 class="widget-title">',
	  'after_title' => '</h3>',
	) );    
}

add_action( 'widgets_init', 'master_theme_widgets_init' );


/**
 * Customizer
 */
function master_theme_customize_sanitize( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

// Customize Socia Profiles for displaying social media links
function master_theme_social_profiles( $wp_customize ) {
	
    $wp_customize->add_section(
        'custom_social_profiles',
        array(
            'title'             => __('Social Links', 'master_theme'),
            'capability'        => 'edit_theme_options',
            'description'       => __('Edit your social media profiles here and they will be updated throughout the website', 'master_theme'),
            'priority'          => 10,
        )
    );

    /**
     * Instagram
     */
    $wp_customize->add_setting(
        'social_profile_instagram',
        array(
            'default' => '',
            'sanitize_callback' => 'master_theme_customize_sanitize',
        )
    );

    $wp_customize->add_control(
        'social_profile_instagram',
        array(
            'label'     => __('Instagram Username', 'master_theme'),
            'section'   => 'custom_social_profiles',
            'type'      => 'link',
        )
    );

    /**
     * Linkedin
     */
    $wp_customize->add_setting(
        'social_profile_linkedin',
        array(
            'default' => '',
            'sanitize_callback' => 'master_theme_customize_sanitize',

        )
    );

    $wp_customize->add_control(
        'social_profile_linkedin',
        array(
            'label'         => __('Linkedin Profile', 'master_theme'),
            'description'   => __('Full URL for your LinkedIn profile', 'master_theme'),
            'section'       => 'custom_social_profiles',
            'type'          => 'link',
        )
    );

    /**
     * Twitter
     */
    $wp_customize->add_setting(
        'social_profile_twitter',
        array(
            'default' => '',
            'sanitize_callback' => 'master_theme_customize_sanitize',

        )
    );

    $wp_customize->add_control(
        'social_profile_twitter',
        array(
            'label'         => __('Twitter Username', 'master_theme'),
            'description'   => __('Username only (no @ symbol)', 'master_theme'),
            'section'       => 'custom_social_profiles',
            'type'          => 'link',
        )
    );
}

add_action( 'customize_register', 'master_theme_social_profiles' );


/**
 * Remove the front-end admin bar for everybody, always
 */

show_admin_bar( false );


/**
* Get rid of junk! - Gets rid of all the crap in the header that you dont need 
*/
function clean_stuff_up() {
	// windows live
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	// wordpress gen tag
	remove_action('wp_head', 'wp_generator');
	// comments RSS
	remove_action( 'wp_head', 'feed_links_extra', 3 );
	remove_action( 'wp_head', 'feed_links', 3 );
}

add_action('init', 'clean_stuff_up');


// Wes Bos blog cutomization:

/**
 * Removes the default styles that are packaged with the Recent Comments widget.
 */
// function hackeryou_remove_recent_comments_style() {
// 	global $wp_widget_factory;
// 	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
// }
// add_action( 'widgets_init', 'hackeryou_remove_recent_comments_style' );


// if ( ! function_exists( 'hackeryou_posted_on' ) ) :
// /**
//  * Prints HTML with meta information for the current post—date/time and author.
//  */
// function hackeryou_posted_on() {
// 	printf('<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s',
// 		'meta-prep meta-prep-author',
// 		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
// 			get_permalink(),
// 			esc_attr( get_the_time() ),
// 			get_the_date()
// 		),
// 		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
// 			get_author_posts_url( get_the_author_meta( 'ID' ) ),
// 			sprintf( esc_attr( 'View all posts by %s'), get_the_author() ),
// 			get_the_author()
// 		)
// 	);
// }
// endif;

// if ( ! function_exists( 'hackeryou_posted_in' ) ) :
// /**
//  * Prints HTML with meta information for the current post (category, tags and permalink).
//  */
// function hackeryou_posted_in() {
// 	// Retrieves tag list of current post, separated by commas.
// 	$tag_list = get_the_tag_list( '', ', ' );
// 	if ( $tag_list ) {
// 		$posted_in = 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.';
// 	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
// 		$posted_in = 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.';
// 	} else {
// 		$posted_in = 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.';
// 	}
// 	// Prints the string, replacing the placeholders.
// 	printf(
// 		$posted_in,
// 		get_the_category_list( ', ' ),
// 		$tag_list,
// 		get_permalink(),
// 		the_title_attribute( 'echo=0' )
// 	);
// }
// endif;

// End of Wes Bes blog customization


/* Here are some utility helper functions for use in your templates! */

/* pre_r() - makes for easy debugging. <?php pre_r($post); ?> */
function pre_r($obj) {
	echo "<pre>";
	print_r($obj);
	echo "</pre>";
}

/* is_blog() - checks various conditionals to figure out if you are currently within a blog page */
function is_blog () {
	global  $post;
	$posttype = get_post_type($post );
	return ( ((is_archive()) || (is_author()) || (is_category()) || (is_home()) || (is_single()) || (is_tag())) && ( $posttype == 'post')  ) ? true : false ;
}

/* get_post_parent() - Returns the current posts parent, if current post if top level, returns itself */
function get_post_parent($post) {
	if ($post->post_parent) {
		return $post->post_parent;
	}
	else {
		return $post->ID;
	}
}