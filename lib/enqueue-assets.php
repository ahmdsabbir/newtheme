<?php
/**
 * All the CSS & JS scripts
 * 
 * @package: newtheme
 */

function newtheme_assets() {
    wp_enqueue_style('newtheme-stylesheet', get_template_directory_uri() . '/dist/assets/css/bundle.css', array(), 'all');

    wp_enqueue_script('newtheme-scripts', get_template_directory_uri() . '/dist/assets/js/bundle.js', array(), true);
}
add_action('wp_enqueue_scripts', 'newtheme_assets');

function newtheme_admin_assets() {
    wp_enqueue_style('newtheme-admin-stylesheet', get_template_directory_uri() . '/dist/assets/css/admin.css', array(), 'all');

    wp_enqueue_script('newtheme-admin-scripts', get_template_directory_uri() . '/dist/assets/js/admin.js', array(), true);
}
add_action('admin_enqueue_scripts', 'newtheme_admin_assets');