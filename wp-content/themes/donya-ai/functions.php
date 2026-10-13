<?php
if (!defined('ABSPATH')) exit;

define('DONYA_AI_VERSION', '1.0.0');

/**
 * Theme setup: supports, menus, image sizes.
 */
function donya_ai_setup()
{
    load_theme_textdomain('donya-ai', get_template_directory() . '/languages');

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    add_theme_support('responsive-embeds');
    add_theme_support('html5', [
        'search-form', 'comment-form', 'comment-list',
        'gallery', 'caption', 'style', 'script',
    ]);
    add_theme_support('custom-logo', [
        'height'      => 50,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ]);

    register_nav_menus([
        'primary' => __('منوی اصلی', 'donya-ai'),
        'footer'  => __('منوی فوتر', 'donya-ai'),
    ]);

    add_image_size('card-thumbnail', 480, 300, true);
    add_image_size('hero-image', 1280, 640, true);
}
add_action('after_setup_theme', 'donya_ai_setup');

/**
 * Content width.
 */
function donya_ai_content_width()
{
    $GLOBALS['content_width'] = 1200;
}
add_action('after_setup_theme', 'donya_ai_content_width', 0);

/**
 * Enqueue styles and scripts.
 */
function donya_ai_scripts()
{
    // Vazirmatn font from Google Fonts
    wp_enqueue_style(
        'vazirmatn',
        'https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;500;600;700;800&display=swap',
        [],
        null
    );

    // Theme stylesheet (required by WordPress)
    wp_enqueue_style('donya-ai-style', get_stylesheet_uri(), [], DONYA_AI_VERSION);

    // Main CSS
    wp_enqueue_style(
        'donya-ai-main',
        get_template_directory_uri() . '/assets/css/main.css',
        ['donya-ai-style', 'vazirmatn'],
        DONYA_AI_VERSION
    );

    // Main JS
    wp_enqueue_script(
        'donya-ai-main',
        get_template_directory_uri() . '/assets/js/main.js',
        [],
        DONYA_AI_VERSION,
        true
    );
}
add_action('wp_enqueue_scripts', 'donya_ai_scripts');

/**
 * Register widget areas.
 */
function donya_ai_widgets_init()
{
    register_sidebar([
        'name'          => __('ستون کناری', 'donya-ai'),
        'id'            => 'sidebar-1',
        'description'   => __('ستون کناری اصلی', 'donya-ai'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ]);

    for ($i = 1; $i <= 3; $i++) {
        register_sidebar([
            'name'          => sprintf(__('ستون فوتر %d', 'donya-ai'), $i),
            'id'            => "footer-$i",
            'description'   => sprintf(__('ابزارک فوتر %d', 'donya-ai'), $i),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        ]);
    }
}
add_action('widgets_init', 'donya_ai_widgets_init');

/**
 * Excerpt length.
 */
function donya_ai_excerpt_length($length)
{
    return 28;
}
add_filter('excerpt_length', 'donya_ai_excerpt_length');

/**
 * Excerpt "more" string.
 */
function donya_ai_excerpt_more($more)
{
    return '…';
}
add_filter('excerpt_more', 'donya_ai_excerpt_more');

/**
 * Body classes.
 */
function donya_ai_body_classes($classes)
{
    $classes[] = 'donya-ai-body';
    if (!is_active_sidebar('sidebar-1') || is_front_page()) {
        $classes[] = 'no-sidebar';
    }
    return $classes;
}
add_filter('body_class', 'donya_ai_body_classes');

/**
 * Helper: get category ID by slug.
 */
function donya_ai_cat_id($slug)
{
    $term = get_term_by('slug', $slug, 'category');
    return $term ? (int) $term->term_id : 0;
}

/**
 * Helper: get category link by slug.
 */
function donya_ai_cat_link($slug)
{
    $id = donya_ai_cat_id($slug);
    return $id ? get_category_link($id) : '#';
}

/**
 * Helper: get category name by slug.
 */
function donya_ai_cat_name($slug)
{
    $term = get_term_by('slug', $slug, 'category');
    return $term ? $term->name : '';
}
