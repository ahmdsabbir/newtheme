<?php
/**
 * @package _themename
 * This is for theme settings
 */



//----------------- Remove jQuery migrate
function _themename_remove_jquery_migrate( $scripts ) {
    if ( !is_admin() && !empty( $scripts->registered['jquery'] ) ) {
        $scripts->registered['jquery']->deps = array_diff( $scripts->registered['jquery']->deps, ['jquery-migrate'] );
    }
}
add_action('wp_default_scripts', '_themename_remove_jquery_migrate');

