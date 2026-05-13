<?php
/**
 * UrbanFit Theme Functions
 *
 * @package UrbanFit
 */

// Define theme version
define( 'URBANFIT_VERSION', '1.0.0' );

/**
 * Set up theme defaults and register support for WordPress features
 */
function urbanfit_setup() {
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title.
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'urbanfit-hero', 1920, 1080, true );
    add_image_size( 'urbanfit-card', 600, 400, true );

    // Register navigation menus
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary Menu', 'urbanfit' ),
    ) );

    // Switch default core markup for search form, comment form, and comments
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );

    // Enable support for custom logo
    add_theme_support( 'custom-logo', array(
        'height' => 50,
        'width'  => 200,
        'flex-width'  => true,
        'flex-height' => true,
    ) );

    // Add support for Gutenberg
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'align-wide' );
}

add_action( 'after_setup_theme', 'urbanfit_setup' );

/**
 * Register widget areas
 */
function urbanfit_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Column 1', 'urbanfit' ),
        'id'            => 'footer-1',
        'description'   => esc_html__( 'First footer column', 'urbanfit' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Column 2', 'urbanfit' ),
        'id'            => 'footer-2',
        'description'   => esc_html__( 'Second footer column', 'urbanfit' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Column 3', 'urbanfit' ),
        'id'            => 'footer-3',
        'description'   => esc_html__( 'Third footer column', 'urbanfit' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Column 4', 'urbanfit' ),
        'id'            => 'footer-4',
        'description'   => esc_html__( 'Fourth footer column', 'urbanfit' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}

add_action( 'widgets_init', 'urbanfit_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function urbanfit_scripts() {
    // Google Fonts
    wp_enqueue_style( 'urbanfit-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&family=Poppins:wght@300;400;500;600;700;800&display=swap', array(), URBANFIT_VERSION );

    // Font Awesome
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0' );

    // Main stylesheet
    wp_enqueue_style( 'urbanfit-style', get_stylesheet_uri(), array( 'urbanfit-fonts', 'font-awesome' ), URBANFIT_VERSION );

    // Main JavaScript
    wp_enqueue_script( 'urbanfit-main', get_template_directory_uri() . '/js/main.js', array(), URBANFIT_VERSION, true );

    // Pass AJAX URL to JavaScript
    wp_localize_script( 'urbanfit-main', 'urbanfitData', array(
        'ajaxUrl' => admin_url( 'admin-ajax.php' ),
    ) );

    // Comment reply script
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

add_action( 'wp_enqueue_scripts', 'urbanfit_scripts' );

/**
 * Admin scripts and styles
 */
function urbanfit_admin_scripts( $hook ) {
    wp_enqueue_style( 'urbanfit-admin', get_template_directory_uri() . '/css/admin.css', array(), URBANFIT_VERSION );
}

add_action( 'admin_enqueue_scripts', 'urbanfit_admin_scripts' );

/**
 * Custom Customizer settings
 */
function urbanfit_customize_register( $wp_customize ) {
    // Hero Section
    $wp_customize->add_section( 'urbanfit_hero', array(
        'title'       => esc_html__( 'Hero Section', 'urbanfit' ),
        'description' => esc_html__( 'Customize the hero section', 'urbanfit' ),
    ) );

    $wp_customize->add_setting( 'urbanfit_hero_title', array(
        'default'           => 'Transform Your Body',
        'sanitize_callback' => 'wp_kses_post',
    ) );

    $wp_customize->add_control( 'urbanfit_hero_title', array(
        'label'       => esc_html__( 'Hero Title', 'urbanfit' ),
        'section'     => 'urbanfit_hero',
        'type'        => 'textarea',
    ) );

    $wp_customize->add_setting( 'urbanfit_hero_subtitle', array(
        'default'           => 'Join our state-of-the-art gym with expert trainers, modern equipment, and a supportive community.',
        'sanitize_callback' => 'wp_kses_post',
    ) );

    $wp_customize->add_control( 'urbanfit_hero_subtitle', array(
        'label'       => esc_html__( 'Hero Subtitle', 'urbanfit' ),
        'section'     => 'urbanfit_hero',
        'type'        => 'textarea',
    ) );

    $wp_customize->add_setting( 'urbanfit_hero_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'urbanfit_hero_image', array(
        'label'       => esc_html__( 'Hero Background Image', 'urbanfit' ),
        'section'     => 'urbanfit_hero',
    ) ) );

    // Button Text
    $wp_customize->add_setting( 'urbanfit_btn_primary_text', array(
        'default'           => 'Start Training',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'urbanfit_btn_primary_text', array(
        'label'       => esc_html__( 'Primary Button Text', 'urbanfit' ),
        'section'     => 'urbanfit_hero',
        'type'        => 'text',
    ) );

    $wp_customize->add_setting( 'urbanfit_btn_primary_url', array(
        'default'           => '#services',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( 'urbanfit_btn_primary_url', array(
        'label'       => esc_html__( 'Primary Button URL', 'urbanfit' ),
        'section'     => 'urbanfit_hero',
        'type'        => 'text',
    ) );

    // Colors Section
    $wp_customize->add_section( 'urbanfit_colors', array(
        'title'       => esc_html__( 'Colors', 'urbanfit' ),
        'description' => esc_html__( 'Customize theme colors', 'urbanfit' ),
    ) );

    $wp_customize->add_setting( 'urbanfit_primary_color', array(
        'default'           => '#e63900',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'urbanfit_primary_color', array(
        'label'   => esc_html__( 'Primary Color', 'urbanfit' ),
        'section' => 'urbanfit_colors',
    ) ) );

    $wp_customize->add_setting( 'urbanfit_text_color', array(
        'default'           => '#e0e0e0',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'urbanfit_text_color', array(
        'label'   => esc_html__( 'Text Color', 'urbanfit' ),
        'section' => 'urbanfit_colors',
    ) ) );
}

add_action( 'customize_register', 'urbanfit_customize_register' );

/**
 * Output customizer CSS
 */
function urbanfit_customizer_css() {
    ?>
    <style id="urbanfit-customizer-css">
        :root {
            --primary: <?php echo esc_attr( get_theme_mod( 'urbanfit_primary_color', '#e63900' ) ); ?>;
            --text: <?php echo esc_attr( get_theme_mod( 'urbanfit_text_color', '#e0e0e0' ) ); ?>;
        }
    </style>
    <?php
}

add_action( 'wp_head', 'urbanfit_customizer_css' );

/**
 * Custom excerpt length
 */
function urbanfit_excerpt_length( $length ) {
    return 20;
}

add_filter( 'excerpt_length', 'urbanfit_excerpt_length' );

/**
 * Custom excerpt more
 */
function urbanfit_excerpt_more( $more ) {
    return ' ...';
}

add_filter( 'excerpt_more', 'urbanfit_excerpt_more' );

/**
 * Get hero image URL
 */
function urbanfit_get_hero_image() {
    $image = get_theme_mod( 'urbanfit_hero_image' );
    return ! empty( $image ) ? $image : 'https://images.pexels.com/photos/841130/pexels-photo-841130.jpeg?auto=compress&cs=tinysrgb&w=1920&h=1080&dpr=2';
}

/**
 * Get hero title
 */
function urbanfit_get_hero_title() {
    return wp_kses_post( get_theme_mod( 'urbanfit_hero_title', 'Transform Your Body' ) );
}

/**
 * Get hero subtitle
 */
function urbanfit_get_hero_subtitle() {
    return wp_kses_post( get_theme_mod( 'urbanfit_hero_subtitle', 'Join our state-of-the-art gym with expert trainers, modern equipment, and a supportive community.' ) );
}

/**
 * Get primary button text
 */
function urbanfit_get_btn_primary_text() {
    return sanitize_text_field( get_theme_mod( 'urbanfit_btn_primary_text', 'Start Training' ) );
}

/**
 * Get primary button URL
 */
function urbanfit_get_btn_primary_url() {
    return esc_url( get_theme_mod( 'urbanfit_btn_primary_url', '#services' ) );
}
