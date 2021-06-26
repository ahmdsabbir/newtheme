<?php
/**
 * Theme Function
 * 
 * @package _themename
 */

if ( !defined('_themename_DIR_PATH') ) {
    define ( '_themename_DIR_PATH' , untrailingslashit( get_template_directory() ) );
}

require_once _themename_DIR_PATH . '/lib/helpers.php';
require_once _themename_DIR_PATH . '/lib/enqueue-assets.php';
require_once _themename_DIR_PATH . '/lib/settings.php';
require_once _themename_DIR_PATH . '/lib/widgets.php';
