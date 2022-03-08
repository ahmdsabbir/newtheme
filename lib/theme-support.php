<?php
/**
 * 
 * Theme Supports
 * 
 */


add_action( 'after_setup_theme', function() {

    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'html5', array('search-form', 'comment-list', 'comment-form', 'gallery', 'caption') );
    add_theme_support( 'customize-selective-refresh-widgets' );
    add_theme_support( 'custom-logo', array(
        'height' => 200,
        'width' => 600,
        'flex-height' => true,
        'flex-width' => true
    ) );
    add_theme_support('post-formats', array(
     'aside',
     'status',
     'image',
     'video',
     'quote',
     'link',
     'gallery',
     'audio',
    ));
    add_theme_support( 'align-wide' );
    add_image_size('_themename-blog-image', 1200, 0);

} );


add_theme_support( 'editor-color-palette', array(
	array(
		'name'  => __( 'Primary Color', '_themename' ),
		'slug'  => 'clr-primary',
		'color'	=> 'var(--clr-primary)',
	),
	array(
		'name'  => __( 'Secondary Color', '_themename' ),
		'slug'  => 'clr-secondary',
		'color' => 'var(--clr-secondary)',
	),
    array(
		'name'  => __( 'Black Color', '_themename' ),
		'slug'  => 'clr-black',
		'color' => 'var(--clr-black)',
	),
    array(
		'name'  => __( 'Gray Color', '_themename' ),
		'slug'  => 'clr-gray',
		'color' => 'var(--clr-gray)',
	),
    array(
		'name'  => __( 'White Color', '_themename' ),
		'slug'  => 'clr-white',
		'color' => 'var(--clr-white)',
	),
) );