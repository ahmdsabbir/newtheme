<?php
namespace _themename\Lib\Classes;

class Enqueue {


    public function css($handle, $src, $deps=[], $ver=false, $media='all') {

        add_action('wp_enqueue_scripts',function() use ($handle, $src, $deps, $ver, $media){
            
            wp_register_style( $handle, get_template_directory_uri() . $src, $deps, $ver, $media );
            wp_enqueue_style( $handle );
            
        });

    }

    public function js($handle, $src, $deps=[], $ver=false, $media='all') {

        add_action('wp_enqueue_scripts',function() use ($handle, $src, $deps, $ver, $media){

            wp_register_script( $handle, get_template_directory_uri() . $src, $deps, $ver, $media );
            wp_enqueue_script( $handle );
            
        });

    }

    public function admin_css($handle, $src, $deps=[], $ver=false, $media='all') {

        add_action('admin_enqueue_scripts',function() use ($handle, $src, $deps, $ver, $media){
            
            wp_register_style( $handle, get_template_directory_uri() . $src, $deps, $ver, $media );
            wp_enqueue_style( $handle );
            
        });

    }

    public function admin_js($handle, $src, $deps=[], $ver=false, $media='all') {

        add_action('admin_enqueue_scripts',function() use ($handle, $src, $deps, $ver, $media){
            
            wp_register_script( $handle, get_template_directory_uri() . $src, $deps, $ver, $media );
            wp_enqueue_script( $handle );
            
        });

    }

    public function core_script($handle) {

        add_action('wp_enqueue_scripts',function() use ($handle){

            wp_enqueue_script( $handle );
            
        });

    }
    

}