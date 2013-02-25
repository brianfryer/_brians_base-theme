<?php

/* =========================================================================== *
 *  Enqueue styles & scripts  *
 * ================= */

if (!function_exists('_brians_base_load_styles_scripts')) {
    function _brians_base_load_styles_scripts() {
        if (!is_admin()) {
            // Screen stylesheet
            wp_enqueue_style( '_brians_base_screen', get_template_directory_uri() . '/css/screen.css', null, null, 'screen' );
            // Google web fonts
            wp_enqueue_style('_brians_base_googlewebfonts', 'http://fonts.googleapis.com/css?family=Cabin:400,700,400italic,700italic', null, null, 'all');
            // TypeKit
            wp_register_script('_brians_base_typekit', '//use.typekit.net/bny7tcf.js', null, null );
            wp_enqueue_script('_brians_base_typekit');
            // Modernizr
            wp_deregister_script('modernizr');
            wp_register_script('modernizr', get_template_directory_uri() . '/js/vendors/modernizr-2.6.2-respond-1.1.0.min.js', null, null );
            wp_enqueue_script('modernizr');
            // HTML5Shiv
            wp_deregister_script('html5shiv');
            wp_enqueue_script('html5shiv', get_template_directory_uri() . '/js/vendors/html5shiv.js', false, '3.4');
            // jQuery
            wp_deregister_script( 'jquery' );
            wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js', null, null );
            wp_enqueue_script('jquery');
        }
    }
}
add_action( 'wp_enqueue_scripts', '_brians_base_load_styles_scripts' );

// TypeKit
if (!function_exists('typekit_inline')) {
    function _brians_base_typekit_inline() {
        if ( wp_script_is( '_brians_base_typekit', 'done' ) ) { ?>
        <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
        <?php }
    }
}
add_action( 'wp_head', '_brians_base_typekit_inline' );


/* =========================================================================== *
 *  Register navigation menus  *
 * =========================== */

if (!function_exists('w_brians_base_register_menus')) {
    function _brians_base_register_menus() {
        register_nav_menus(
            array(
                'primary-nav'  => __( 'Primary Navigation' ),
                'bottom-nav'   => __( 'Bottom Navigation' ),
                'social-media' => __( 'Social Media Links' )
            )
        );
    }
}
add_action( 'init', '_brians_base_register_menus' );


/* =========================================================================== *
 *  Register widget ready areas  *
 * ============================= */

// Home hero
register_sidebar(array(
    'id'            => 'home-hero',
    'name'          => 'Homepage Hero',
    'before_widget' => '<div class="hero-widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>'
));

// Footer
register_sidebar(array(
    'id'            => 'footer',
    'name'          => 'Footer',
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
));


/* =========================================================================== *
 *  Miscellaneous  *
 * =============== */

// Allow shortcodes to be used in widgets
add_filter('widget_text', 'do_shortcode');
