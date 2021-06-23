<?php
/**
 * Theme Function
 * 
 * @package newtheme
 */

if ( !defined('NEWTHEME_DIR_PATH') ) {
    define ( 'NEWTHEME_DIR_PATH' , untrailingslashit( get_template_directory() ) );
}

require_once NEWTHEME_DIR_PATH . '/lib/helpers.php';
require_once NEWTHEME_DIR_PATH . '/lib/enqueue-assets.php';
require_once NEWTHEME_DIR_PATH . '/lib/settings.php';
