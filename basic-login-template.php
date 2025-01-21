<?php
/**
 * Plugin Name: Basic Login Template
 * Description: A plugin that make the login page basic and not Wordpress-y
 * Version: 1.0.0
 * Author: Martin Ekelund / Kidkie
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

require_once plugin_dir_path( __FILE__ ) . 'src/admin-page.php';
require_once plugin_dir_path( __FILE__ ) . 'src/enqueue-scripts.php';
require_once plugin_dir_path( __FILE__ ) . 'src/admin-inline-styles.php';