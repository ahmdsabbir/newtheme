<?php
/**
 * 
 * Theme Supports
 * 
 */

 namespace _themename\Lib;

 use _themename\Lib\Classes\Support;

 $support = new Support;


 //Now add theme-supports
 $support->add('title-tag');
 $support->add('post-thumbnails');
 $support->add('html5', [
    'search-form',
    'comment-list',
    'comment-form',
    'gallery',
    'caption',
 ]);
 $support->add('customize-selective-refresh-widgets');