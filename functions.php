<?php
/**
 *school-theme  Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package school-theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.2.4' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function school_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on FWD Starter Theme, use a find and replace
		* to change 'fwd' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'school', get_template_directory() . '/languages' );

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

	//custom crop image size:

	add_image_size( 'portrait-blog',200, 250, true );
	add_image_size( 'latest-blog-post',400, 200, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'header' => esc_html__( 'Header Menu Location', 'school' ),
			'footer-left' => esc_html__( 'Footer - left side', 'school' ),
			'footer-right' => esc_html__( 'Footer - right side', 'school' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
			'navigation-widgets',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'school_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
			// 'unlink-homepage-logo' 	=> true,
		)
	);

	/**
	 * Add support for Block Editor features.
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/
	 */
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
}
add_action( 'after_setup_theme', 'school_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function school_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'school_content_width', 960 );
}
add_action( 'after_setup_theme', 'school_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function school_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar1', 'school' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'school' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar( 
		array(
		'name'          => esc_html__( 'Sidebar2', 'school' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	    ) 
    );
}
add_action( 'widgets_init', 'school_widgets_init' );

/**
 * Enqueue scripts and styles.
 */

 function school_scripts(){
	wp_enqueue_style(
		'school-googlefonts',//unique handle
		'href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&display=swap',//url
		array(),// dependencies
		null,// only use null for Google Fonts
		'all'//default
	);
	wp_enqueue_style(
		'school-googlefonts',//unique handle
		'href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;700&display=swap',//url
		array(),// dependencies
		null,// only use null for Google Fonts
		'all'//default
	);

	wp_enqueue_style( 'school-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'school-style', 'rtl', 'replace' );

	wp_enqueue_script( 'school-navigation', get_template_directory_uri() . '/js/navigation.js', array(),
	 _S_VERSION, true );

	wp_enqueue_script( 'school-scroll', get_template_directory_uri() . '/js/scroll.js', array(),
	_S_VERSION, array( 'strategy' => 'defer' )   );
	 

	if(is_home()){
		wp_enqueue_style( 
			'aos-styles', 
			get_template_directory_uri() .'/css/aos.css',
			array(),
			'2.3.1'
			);
		wp_enqueue_script( 
			'aos-scripts', 
			get_template_directory_uri() .'/aos/aos.js',
			array(), 
			'2.3.1',
			array( 'strategy' => 'defer' )  
		);
		wp_enqueue_script( 
			'aos-settings', 
			get_template_directory_uri() .'/aos/aos-settings.js', 
			array( 'aos-scripts' ),
			_S_VERSION,
			array( 'strategy' => 'defer' )  
		);
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'school_scripts' );

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
 * Register CPT
 */
require get_template_directory() . '/inc/cpt-taxonomy.php';
/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
//Add Theme Color Meta Tag
function school_theme_color(){
	echo '<meta name="theme-color" content="#fff200">';
}
add_action('wp_head','school_theme_color', 1);

//Change the Excerpt length to 25
function student_excerpt_length($length){
	return 25;
}
add_filter('excerpt_length','student_excerpt_length',999);

//Modify the end of the excerpt

function student_excerpt_more($more){
	if (is_post_type_archive('school-student')){}
    $more = '...<a class="read-more" href="'. esc_url( get_permalink() ) .'">Read more about the student ...</a>';
	return $more;
}

add_filter('excerpt_more','student_excerpt_more');

//Create Block template
function school_block_editor_templates() {
    // Replace ‘14’ with the Page ID
    if ( isset( $_GET['post'] ) && '71' == $_GET['post'] ) {
        $post_type_object = get_post_type_object( 'page' );
        $post_type_object->template = array(
            //define blocks here...
            array(
                'core/paragraph',
                array(
                    'placeholder' => 'Add your introduction here...'
                )
            ),
            array(
                'core/heading',
                array(
                    'placeholder' => 'Add your heading here...',
                    'level' => 2
                )
            ),
            array(
                'core/paragraph',
                array(
                    'placeholder' => 'Add courses'
                )
            ),
        );
        $post_type_object->template_lock = 'all';
    }
}
add_action('init', 'school_block_editor_templates');