<?php
/**
 * @package _themename
 * This is for theme settings
 */

//-----------------Set Content Width
if(!isset($content_width)) $content_width=1116;

function _themename_content_width() {
    $layout = get_post_meta(get_the_ID(), '__themename_post_layout', true);

    if ( !is_single() ) { //if not single.php only check if both sidebars/one of the sidebar is active
        if ( is_active_sidebar( 'right-sidebar' )  && is_active_sidebar('left-sidebar') ) {// if both sidebar active
            $GLOBALS['content_width'] = 546;
        } elseif( !is_active_sidebar( 'right-sidebar' )  && !is_active_sidebar('left-sidebar') ) { //if no sidebar active
            $GLOBALS['content_width'] = 1116;
        } else { //if only one of the sidebar active
            $GLOBALS['content_width'] = 831;
        }
    } elseif( is_single() ) { //if single.php check if Sidebar is not shown in post_meta_box make the main container 12 column
        if($layout == 'no') {
            $GLOBALS['content_width'] = 1116;
        } elseif($layout == 'yes') { //if sidebar is shown in post_meta_box
            if ( is_active_sidebar( 'right-sidebar' )  && is_active_sidebar('left-sidebar') ) {
                $GLOBALS['content_width'] = 546;
            } elseif( !is_active_sidebar( 'right-sidebar' )  && !is_active_sidebar('left-sidebar') ) {
                $GLOBALS['content_width'] = 1116;
            } else {
                $GLOBALS['content_width'] = 831;
            }
        }
    }
}
add_action( 'template_redirect', '_themename_content_width' );


//----------------- Remove jQuery migrate

add_action('wp_default_scripts', function() {
    if ( !is_admin() && !empty( $scripts->registered['jquery'] ) ) {
        $scripts->registered['jquery']->deps = array_diff( $scripts->registered['jquery']->deps, ['jquery-migrate'] );
    }
});

