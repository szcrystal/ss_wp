<?php
/**
 * _s functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package _s
 */

if ( ! function_exists( '_s_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function _s_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on _s, use a find and replace
	 * to change '_s' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( '_s', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', '_s' ),
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
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( '_s_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', '_s_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function _s_content_width() {
	$GLOBALS['content_width'] = apply_filters( '_s_content_width', 640 );
}
add_action( 'after_setup_theme', '_s_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function _s_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', '_s' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', '_s' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', '_s_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function _s_scripts() {
	wp_enqueue_style( 'awsome', get_template_directory_uri() . '/css/font-awesome.min.css', false, '4.5.0', 'all');
    wp_enqueue_style( 'mfizz', get_template_directory_uri() . '/font-mfizz/font-mfizz.css', false, '2.3.0', 'all');
    wp_enqueue_style( 'devicon', get_template_directory_uri() . '/devicon/devicon.min.css', false, '2.0.0', 'all');

	if(isAgent('all'))
    	wp_enqueue_style( 'style-sp', get_template_directory_uri() . '/style-sp.css');
    else
		wp_enqueue_style( 'style', get_stylesheet_uri() );
    
    wp_enqueue_script( 'jquery');
    //wp_enqueue_script( 'jquery-3', 'https://code.jquery.com/jquery-3.0.0.min.js', array(), '20160101', false );
    wp_enqueue_script( 'jq-script', get_template_directory_uri() . '/js/script.js', array(), '20160102', false );


	wp_enqueue_script( '_s-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( '_s-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', '_s_scripts' );

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



/* Custom ****************************** */
function thisUrl($arg) {
	echo get_template_directory_uri(). '/' . $arg;
}

/* add class */
function addMainClass() {
	$class = 'class="';
    
	if(is_front_page()) 
    	$class .= 'top';
    elseif(is_page() || is_singular('member')) {
    	$class .= 'fix';
        
        if(get_page_slug(get_the_ID()) != '') {
            $class .= ' ' . get_page_slug(get_the_ID());
        }
    }
    elseif(is_post_type_archive()) {
    	$class .= get_post_type() . 's';
    }
    elseif(is_home() || is_archive() || is_search())
    	$class .= 'allpost';
    else
    	$class .= 'site';
    
    
    echo $class . '"';
}

/* Pagenation */
function set_pagenation($queryArg = '') {
	
    if($queryArg != '') {
		global $wp_query;
		$wp_query->max_num_pages = $queryArg->max_num_pages; //$GLOBALS['wp_query']
    }
                   		
    the_posts_pagination(
    	array(
           'mid_size' => 1,
           'prev_text' => '<i class="fa fa-angle-double-left"></i> Prev',
           'next_text' => 'Next <i class="fa fa-angle-double-right"></i>',
           'screen_reader_text' => __( 'Posts navigation' ),
           'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'cm' ) . ' </span>',
    	)
    );
}

// slug from ID
function get_page_slug($page_id) {
    $page = get_page($page_id);
    return $page->post_name;
}

function outUrl($arg) {
	$id = get_page_by_path($arg);
    echo get_permalink($id);
}

/* Custom Excerpt */
function new_excerpt_length($length) { 
    return 100;
}
add_filter( 'excerpt_length', 'new_excerpt_length');

function new_excerpt_more($more) {
    return '';
}
add_filter('excerpt_more', 'new_excerpt_more');


function sz_content($char_count) {

    //$more_class = '';
    $texts = get_the_excerpt();
    
    //$continue_format = '<a %shref="%s" title="%sのページへ"> …</a>';
    //$continue_format = sprintf($continue_format, $more_class, esc_url(get_permalink()), get_the_title());
    $continue_format = '...';
    
    //$texts = strip_tags($texts); //html
    //$texts = str_replace("\n", '', $texts); //改行
        
    if(mb_strlen($texts) > $char_count+1) {
    	$texts = mb_substr($texts, 0, $char_count);
	    $texts = $texts . $continue_format;
	}
    
    echo $texts;
}


/* Custom Post */
function create_member() {
	register_post_type( 'member',
        array(
            'labels' => array(
            	'name' => 'メンバー',
            	'singular_name' => 'MEMBER', //news_project
                'all_items' => 'メンバー一覧',
                'add_new_item' => '新規メンバーを追加',
                'edit_item' => 'メンバーを編集',
          	),
            'public' => true,
            'hierarchical' => false,
            'menu_position' => 9,
            'has_archive' => true, 
            'publicly_queryable' => true,
            'show_ui' => true,
            'query_var' => true,
            'capability_type' => 'post',
            //'taxonomies' => array('category', 'post_tag'),
            //'rewrite' => false,
            'rewrite' => array('slug' => 'member', 'with_front' => false),
            'supports' => array('title','editor','custom-fields', 'thumbnail', 'page-attributes', 'post-formats', 'comments')
    )
  );
  
}
add_action( 'init', 'create_member' );


//User Agent Check
function isAgent($agent) {

    $ua_sp = array('iPhone','iPod','Mobile ','Mobile;','Windows Phone','IEMobile');
    $ua_tab = array('iPad','Kindle','Sony Tablet','Nexus 7','Android Tablet');
    $all_agent = array_merge($ua_sp, $ua_tab);
    
    switch($agent) {
        case 'sp':
            $agent = $ua_sp;
            break;
    
        case 'tab':
            $agent = $ua_tab;
            break;
        
        case 'all':
            $agent = $all_agent;
            break;
            
        default:
            //$agent = '';
            break;
    }
       
    if(is_array($agent)) {
        $agent = implode('|', $agent);
    }
    
    return preg_match('/'. $agent .'/', $_SERVER['HTTP_USER_AGENT']);    
}



function isLocal() {
    return strpos($_SERVER['SERVER_NAME'], '192.168.10') !== false;
}

function isDK() {
	return strpos($_SERVER['SERVER_NAME'], 'turquoise') !== false;
}


