<?php
/**
 * @package _themename
 * This is for theme settings
 */

 //---------------- Generate Container class and row class to integrate css frameworks easily
 //---------------- But /inc/helpers footer widget col classes must be edited in case of different css frameworks

 if ( !defined('_themename_CONTAINER_CLASS') ) {
    define ( '_themename_CONTAINER_CLASS' , 'container' );
}

if ( !defined('_themename_ROW_CLASS') ) {
    define ( '_themename_ROW_CLASS' , 'row' );
}

 function _themename_container_class($additional='') {
    //echo 'class="' . _themename_CONTAINER_CLASS . ' ' . $additional . '"';
    if($additional == '') {
        $class_name = _themename_CONTAINER_CLASS;
    } else {
        $class_name = _themename_CONTAINER_CLASS . ' ' . $additional;
    }
    echo 'class="' . esc_attr( $class_name ) . '"';
 }

 function _themename_row_class($additional='') {
    //echo 'class="' . _themename_CONTAINER_CLASS . ' ' . $additional . '"';
    if($additional == '') {
        $class_name = _themename_ROW_CLASS;
    } else {
        $class_name = _themename_ROW_CLASS . ' ' . $additional;
    }
    echo 'class="' . esc_attr( $class_name ) . '"';
 }

//----------------- Remove jQuery migrate
function _themename_remove_jquery_migrate( $scripts ) {
    if ( !is_admin() && !empty( $scripts->registered['jquery'] ) ) {
        $scripts->registered['jquery']->deps = array_diff( $scripts->registered['jquery']->deps, ['jquery-migrate'] );
    }
}
add_action('wp_default_scripts', '_themename_remove_jquery_migrate');

