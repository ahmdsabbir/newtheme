<?php
/**
 * All the CSS & JS scripts
 * 
 * @package: _themename
 */
namespace _themename\Lib;

use _themename\Lib\Classes\Enqueue;

$enqueue = new Enqueue;



/**
 * Load CSS
 */

$enqueue->css('_themename-stylesheet', '/dist/assets/css/bundle.css');
$enqueue->admin_css('_themename-admin-stylesheet', '/dist/assets/css/admin.css');


/**
 * Load JS
 */

$enqueue->core_script('jquery');
$enqueue->js('_themename-scripts', '/dist/assets/js/bundle.js', array(), 1.1, true);
$enqueue->admin_js('_themename-scripts', '/dist/assets/js/admin.js', array(), 1.1, true);

