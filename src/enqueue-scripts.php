<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if(!function_exists('blt_enqueue_custom_login_css')):
// Enqueue custom CSS for the login page.
function blt_enqueue_custom_login_css() {
    wp_enqueue_style(
        'custom-login-style', // Handle.
        plugin_dir_url( __FILE__ ) . 'admin-style.css' // Path to the same CSS file.
    );
}
add_action( 'login_enqueue_scripts', 'blt_enqueue_custom_login_css' );
endif;

if(!function_exists('blt_remove_wp_logo_from_login')):
// Remove the WordPress logo from the login page.
function blt_remove_wp_logo_from_login() {
    echo '<style type="text/css">
        h1 a { display: none !important; }
    </style>';
}
add_action( 'login_head', 'blt_remove_wp_logo_from_login' );
endif;

if(!function_exists('blt_wrap_login_page_content')):
// Wrap the login form with a custom <div>.
function blt_wrap_login_page_content() {
    echo '<div class="blt-login-wrapper">';
}
add_action( 'login_header', 'blt_wrap_login_page_content', 10 );
endif;

if(!function_exists('blt_close_login_page_wrapper')):
function blt_close_login_page_wrapper() {
    echo '</div>';
}
add_action( 'login_footer', 'blt_close_login_page_wrapper', 10 );
endif;