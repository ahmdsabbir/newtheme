<?php
/**
 * Theme Function
 * 
 * @package _themename
 */

if ( !defined('_themename_DIR_PATH') ) {
    define ( '_themename_DIR_PATH' , untrailingslashit( get_template_directory() ) );
}

//require required files
require_once _themename_DIR_PATH . '/lib/customizer.php';
require_once _themename_DIR_PATH . '/lib/template-tags.php';
require_once _themename_DIR_PATH . '/lib/helpers.php';
require_once _themename_DIR_PATH . '/lib/enqueue-assets.php';
require_once _themename_DIR_PATH . '/lib/settings.php';
require_once _themename_DIR_PATH . '/lib/widgets.php';
require_once _themename_DIR_PATH . '/lib/theme-support.php';
require_once _themename_DIR_PATH . '/lib/navigation.php';
require_once _themename_DIR_PATH . '/lib/metaboxes.php';
require_once _themename_DIR_PATH . '/lib/comments-callback.php';
require_once _themename_DIR_PATH . '/lib/breadcrumb.php';
