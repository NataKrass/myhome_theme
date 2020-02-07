<?php
/**
 * myhome functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package myhome
 */

if ( ! function_exists( 'myhome_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function myhome_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on myhome, use a find and replace
		 * to change 'myhome' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'myhome', get_template_directory() . '/languages' );

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
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu' => esc_html__( 'Primary', 'myhome' ),
			'menu-footer' => esc_html__( 'Footer-menu', 'myhome' ),
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

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'myhome_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'myhome_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function myhome_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'myhome_content_width', 640 );
}
add_action( 'after_setup_theme', 'myhome_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function myhome_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'myhome' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'myhome' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer sidebar', 'myhome' ),
		'id'            => 'sidebar-footer',
		'description'   => esc_html__( 'Footer area', 'myhome' ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'myhome_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function myhome_scripts() {
	wp_enqueue_style( 'myhome-style', get_stylesheet_uri() );
	wp_enqueue_style( 'myhome-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
	wp_enqueue_style( 'myhome-slick', get_template_directory_uri() . '/assets/css/slick.css');
	wp_enqueue_style( 'myhome-slicktheme', get_template_directory_uri() . '/assets/css/slick-theme.css');
	wp_enqueue_style( 'myhome-fonts', get_template_directory_uri() . '/assets/fonts/style.css');
	wp_enqueue_style( 'myhome-fontawesome', get_template_directory_uri() . '/assets/fonts/fontawesome-free-5.12.0-web/css/all.css');
	wp_enqueue_style( 'myhome-main', get_template_directory_uri() . '/assets/css/main.css');
	wp_enqueue_style( 'myhome-responsive', get_template_directory_uri() . '/assets/css/responsive.css');
	wp_enqueue_style( 'myhome-fancy', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css');


	// wp_enqueue_script( 'myhome-jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js', array(), '20151215', true );
	//  wp_enqueue_script('jquery');
	wp_enqueue_script( 'myhome-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'myhome-fancybox', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js', array(), '20151215', true );
	wp_enqueue_script( 'myhome-slick', get_template_directory_uri() . '/assets/js/slick.js', array(), '20151215', true );
	wp_enqueue_script( 'myhome-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'myhome-main', get_template_directory_uri() . '/assets/js/main.js', array(), '20151215', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'myhome_scripts' );

add_action( 'init', 'true_jquery_register' );
 
function true_jquery_register() {
	if ( !is_admin() ) {
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', ( 'http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js' ), false, null, false );
		wp_enqueue_script( 'jquery' );
	}
}
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
// search in nav
add_filter('wp_nav_menu_items','add_search_box', 10, 2);
function add_search_box($items, $args) {
ob_start();
get_search_form();
$searchform = ob_get_contents();
ob_end_clean();
$items .= '<li class = "my_search">' . $searchform . '</li>';
return $items;
}

//post
function create_post_type() {
    $labels = array(
        'name'                  => _x( 'Advantage', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'Advantage', 'Post type singular name', 'textdomain' ),
        'menu_name'             => _x( 'Advantages', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar'        => _x( 'Advantage', 'Add New on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Add New', 'textdomain' ),
        'add_new_item'          => __( 'Add New Advantage', 'textdomain' ),
        'new_item'              => __( 'New Advantage', 'textdomain' ),
        'edit_item'             => __( 'Edit Advantage', 'textdomain' ),
        'view_item'             => __( 'View Advantage', 'textdomain' ),
        'all_items'             => __( 'All Advantage', 'textdomain' ),
        'search_items'          => __( 'Search Advantage', 'textdomain' ),
        'parent_item_colon'     => __( 'Parent Advantage:', 'textdomain' ),
        
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'advantage' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'menu_icon'          => 'dashicons-thumbs-up',
        'hierarchical'       => false,
        'menu_position'      => '30',
		'supports'           => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'excerpt'),
    );
 
    register_post_type( 'advantage', $args );
}
 
add_action( 'init', 'create_post_type' );


function create_newpost_type() {
    $labels = array(
        'name'                  => _x( 'Room', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'Room', 'Post type singular name', 'textdomain' ),
        'menu_name'             => _x( 'Room', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar'        => _x( 'Room', 'Add New on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Add New', 'textdomain' ),
        'add_new_item'          => __( 'Add New Room', 'textdomain' ),
        'new_item'              => __( 'New Room', 'textdomain' ),
        'edit_item'             => __( 'Edit Room', 'textdomain' ),
        'view_item'             => __( 'View Room', 'textdomain' ),
        'all_items'             => __( 'All Rooms', 'textdomain' ),
        'search_items'          => __( 'Search Room', 'textdomain' ),
        'parent_item_colon'     => __( 'Parent Room:', 'textdomain' ),
        
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'room' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'menu_icon'          => 'dashicons-store',
        'hierarchical'       => false,
        'menu_position'      => '20',
		'supports'           => array( 'title', 'editor', 'thumbnail'),
		'taxonomies'   		 => array( 'category' ),
    );
 
    register_post_type( 'room', $args );
} 
add_action( 'init', 'create_newpost_type' );



add_filter('pre_get_posts', 'query_post_type');
function query_post_type($query) {
  if( is_category() ) {
    $post_type = get_query_var('post_type');
    if($post_type)
        $post_type = $post_type;
    else
        $post_type = array('nav_menu_item', 'post', 'room'); // don't forget nav_menu_item to allow menus to work!
    $query->set('post_type',$post_type);
    return $query;
    }
}


///breadcrumbs
function the_breadcrumb(){
 
	$pageNum = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
 
	$separator = ' <i class="fas fa-circle"></i> '; //  »
	if( is_front_page() ){
 
		if( $pageNum > 1 ) {
			echo '<a href="' . site_url() . '">Home</a>' . $separator . $pageNum . '-я страница';
		} else {
			echo 'Home';
		}
 
	} else { 
 
		echo '<a href="' . site_url() . '">Home</a>' . $separator;
		if( is_single() ){ 
 
			 the_title();
 
		} elseif ( is_page() ){ 
			the_title();
 
		} elseif ( is_category() ) {
 
			single_cat_title();
 
		} elseif( is_tag() ) {
 
			single_tag_title();
 
		} elseif ( is_day() ) { 
			echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a>' . $separator;
			echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a>' . $separator;
			echo get_the_time('d');
 
		} elseif ( is_month() ) { 
 
			echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a>' . $separator;
			echo get_the_time('F');
 
		} elseif ( is_year() ) { 
 
			echo get_the_time('Y');
 
		} elseif ( is_author() ) { 
 
			global $author;
			$userdata = get_userdata($author);
			echo 'Posted' . $userdata->display_name;
 
		} elseif ( is_404() ) { 
 
			echo 'Error 404';
 
		}
 
		if ( $pageNum > 1 ) { 
			echo ' (' . $pageNum . '-th page)';
		}
 
	}
 
}
////lang
function polylang_shortcode() {
	ob_start();
	pll_the_languages(array('show_flags'=>1,'show_names'=>0));
	$flags = ob_get_clean();
	return $flags;
	}
	add_shortcode( 'polylang', 'polylang_shortcode' );

