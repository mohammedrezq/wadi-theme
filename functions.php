<?php
/**
 * wadi functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wadi
 */

use Carbon_Fields\Container;
use Carbon_Fields\Field;

if (! defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

if (! function_exists('wadi_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function wadi_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on wadi, use a find and replace
         * to change 'wadi' to the name of your theme in all the template files.
         */
        load_theme_textdomain('wadi', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(
            array(
                'menu-1' => esc_html__('Primary', 'wadi'),
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
            )
        );

        // Set up the WordPress core custom background feature.
        add_theme_support(
            'custom-background',
            apply_filters(
                'wadi_custom_background_args',
                array(
                    'default-color' => 'ffffff',
                    'default-image' => '',
                )
            )
        );

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

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
            )
        );
    }
endif;
add_action('after_setup_theme', 'wadi_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wadi_content_width()
{
    $GLOBALS['content_width'] = apply_filters('wadi_content_width', 640);
}
add_action('after_setup_theme', 'wadi_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wadi_widgets_init()
{
    register_sidebar(
        array(
            'name'          => esc_html__('Sidebar', 'wadi'),
            'id'            => 'sidebar-1',
            'description'   => esc_html__('Add widgets here.', 'wadi'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
    register_sidebar(array(
            'name' 			=> esc_html__('Wadi footer Column 1', 'wadi'),
            'id'   			=> 'wadi-footer-column-one-widget',
            'description'   => esc_html__('Wadi footer column one widget position.', 'wadi'),
            'before_widget' => '<div id="%1$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2>',
            'after_title'   => '</h2>'
        ));
    
    register_sidebar(array(
            'name' 			=> esc_html__('Wadi footer Column 2', 'wadi'),
            'id'   			=> 'wadi-footer-column-two-widget',
            'description'   => esc_html__('Wadi footer column two widget position.', 'wadi'),
            'before_widget' => '<div id="%1$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2>',
            'after_title'   => '</h2>'
        ));
    
    register_sidebar(array(
            'name' 			=> esc_html__('Wadi footer Column 3', 'wadi'),
            'id'   			=> 'wadi-footer-column-three-widget',
            'description'   => esc_html__('Wadi footer column three widget position.', 'wadi'),
            'before_widget' => '<div id="%1$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2>',
            'after_title'   => '</h2>'
        ));
}
add_action('widgets_init', 'wadi_widgets_init');


/**
 * Blog Posts Excerpt Length
 *
 * Source: https://developer.wordpress.org/reference/hooks/excerpt_length/
 *
 */

function mytheme_custom_excerpt_length($length)
{
    return 20;
}
add_filter('excerpt_length', 'mytheme_custom_excerpt_length', 999);

function excerpt_articles($id)
{
    $excerpt = get_the_excerpt($id);

    /**
     * Check if Excerpt Exist if so echo it, else echo
     */
    
    if (! empty($excerpt)) {
        echo $excerpt;
    } else {
        $field_content = get_post($id);

        $the_content_excerpt = $field_content->post_content;
        
        if (!empty($the_content_excerpt)):
            $trimmed_text = wp_html_excerpt($the_content_excerpt, 250);
        $last_space = strrpos($trimmed_text, ' ');
        $modified_trimmed_text = substr($trimmed_text, 0, $last_space);
        echo ''. $modified_trimmed_text ;
        endif;
    }
}

/**
 * Enqueue scripts and styles.
 */
function wadi_scripts()
{
    wp_enqueue_style('wadi-style', get_template_directory_uri() .'/assets/dist/mainStyle.css', array(), _S_VERSION);
    // wp_style_add_data( 'wadi-style', 'rtl', 'replace' );

    wp_enqueue_script('wadi-navigation', get_template_directory_uri() . '/assets/dist/navigation.js', array(), _S_VERSION, true);


    wp_enqueue_script('wadi-search', get_template_directory_uri() . '/assets/dist/wadiSearch.js', array(), _S_VERSION, true);
    wp_enqueue_script('wadi-header', get_template_directory_uri() . '/assets/dist/wadiHeader.js', array(), _S_VERSION, true);
    
    /**
     * Font Awesome
     */

    // https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/js/all.min.js
    // https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css

    wp_enqueue_script('wadi-fa-js', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/js/all.min.js', array(), '6.0.0', true);
    wp_enqueue_style('wadi-fa-style', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css', array(), '6.0.0');
    
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'wadi_scripts');

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
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
    require get_template_directory() . '/inc/woocommerce.php';
}



/**
 *
 * Theme Options - Wadi
 * @package 1.0.0
 */

add_action('carbon_fields_register_fields', 'fields_attach_theme_options');
function fields_attach_theme_options()
{
    Container::make('theme_options', __('Theme Options'))
        ->add_fields(array(
            Field::make('text', 'crb_text', 'Text Field'),
        ));
}

add_action('after_setup_theme', 'wadi_theme_options_load');

function wadi_theme_options_load()
{
    require_once('vendor/autoload.php');
    if(!defined('Carbon_Fields\URL')) {
        define('Carbon_Fields\URL', get_template_directory_uri() . '/vendor/htmlburger/carbon-fields/');
    }
    \Carbon_Fields\Carbon_Fields::boot();
}
