<?php
/**
 * Enqueue all the CSS & JS scripts
 * 
 * @package: _themename
 */

 /**
 * Frontend Styles and Scripts
 */
add_action( 'wp_enqueue_scripts', function() {

    wp_enqueue_style( '_themename-stylesheet', get_template_directory_uri() . '/dist/assets/css/bundle.css', array(), time(), 'all' );

    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( '_themename-scripts', get_template_directory_uri() . '/dist/assets/js/bundle.js', array('jquery'), time(), true );

    if( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    /** 
     * Table of contents
     * include this if enabled from the customizer
     */
    if( is_single() ) :
        wp_enqueue_script( $handle = 'post_table_of_contents', get_template_directory_uri() . '/lib/toc/js/post_table_of_contents.js', $deps = array('jquery'), time(), $in_footer = true );

        wp_enqueue_style( $handle = 'post_table_of_contents', get_template_directory_uri() . '/lib/toc/css/post_table_of_contents.css', $deps = array(), time(), $media = 'all' );
    endif;

} );

/**
 * Admin Styles and Scripts
 */
add_action( 'admin_enqueue_scripts', function() {

    wp_enqueue_style( '_themename-admin-stylesheet', get_template_directory_uri() . '/dist/assets/css/admin.css', array(), time(), 'all' );
    wp_enqueue_script( '_themename-admin-scripts', get_template_directory_uri() . '/dist/assets/js/admin.js', array(), time(), true );

} );

/**
 * Customizer Styles and Scripts
 */
add_action( 'customize_preview_init', function() {

    wp_enqueue_script( '_themename-cutomize-preview', get_template_directory_uri() . '/dist/assets/js/customize-preview.js', array('customize-preview', 'jquery'), time() , true );

} );