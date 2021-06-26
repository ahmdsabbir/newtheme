<?php
/**
 * All the CSS & JS scripts
 * 
 * @package: _themename
 */

function _themename_assets() {
    wp_enqueue_style('_themename-stylesheet', get_template_directory_uri() . '/dist/assets/css/bundle.css', array(), 'all');

    wp_enqueue_script('_themename-scripts', get_template_directory_uri() . '/dist/assets/js/bundle.js', array(),1.1, true);
}
add_action('wp_enqueue_scripts', '_themename_assets');

function _themename_admin_assets() {
    wp_enqueue_style('_themename-admin-stylesheet', get_template_directory_uri() . '/dist/assets/css/admin.css', array(), 'all');

    wp_enqueue_script('_themename-admin-scripts', get_template_directory_uri() . '/dist/assets/js/admin.js', array(), true);
}
add_action('admin_enqueue_scripts', '_themename_admin_assets');