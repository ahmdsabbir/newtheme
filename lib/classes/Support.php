<?php
namespace _themename\Lib\Classes;

class Support {
    
    public function add($feature, $options = null) {
        add_action( 'after_setup_theme', function() use ($feature, $options) {
            if($options) {
                add_theme_support( $feature, $options );
            } else {
                add_theme_support( $feature );
            }

        } );
    }

}