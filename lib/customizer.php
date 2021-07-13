<?php

function _themename__customize_register( $wp_customize ) {

    /**##################### General ##################### */
    $wp_customize->get_setting('blogname')->transport = 'postMessage';

    $wp_customize->selective_refresh->add_partial('blogname', array(
        'selector' => '.navbar-brand',
        'container_incusive' => false,
        'render_callback' => function() {
            bloginfo('name');
        }
    ));

    /**##################### footer ##################### */

    $wp_customize->selective_refresh->add_partial('_themename_footer_partial', array(
        'settings' => array('_themename_footer_layout'),
        'selector' => '#footer',
        'container_incusive' => false,
        'render_callback' => function() {

            if(_themename_any_widget_active()) :
                get_template_part( '/template-parts/footer/footer', 'widgets' );
            endif; 
        
            get_template_part( '/template-parts/footer/footer', 'info' );

        }
    ));
    
    $wp_customize->add_section( '_themename_footer_options' , array(
        'title'             => esc_html__('Footer Options', '_themename'),
        'priority'          => 161,
        'description'       => esc_html__('You can change footer options from here', '_themename'),
    ) );
        
    // Footer Site info
    
    $wp_customize->add_setting( '_themename_site_info' , array(
        'default'       => '',
        'type'          => 'theme_mod',
        'sanitize_callback' => '_themename_sanitize_site_info',
        'transport'     => 'postMessage',
    ) );

    $wp_customize->add_control( '_themename_site_info', array(
        'label'      => esc_html__('Site Info', '_themename'),
        'description'=> __('Choose Footer Copyright Text', '_themename'),
        'section'    => '_themename_footer_options',
        'settings'   => '_themename_site_info',
        'type'       => 'text',
    ) );

    //Footer Layout

    $wp_customize->add_setting( '_themename_footer_layout' , array(
        'default'       => '3,3,3,3',
        'type'          => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
        'validate_callback' => '_themename_validate_footer_layout',
        'transport'     => 'postMessage',
    ) );
    $wp_customize->add_control( '_themename_footer_layout', array(
        'label'      => esc_html__('Footer Layout', '_themename'),
        'description'=> __('Choose Footer Grids', '_themename'),
        'section'    => '_themename_footer_options',
        'settings'   => '_themename_footer_layout',
        'type'       => 'text',
    ) );

    /** ############################ Single #################################### */
    $wp_customize->add_section('_themename_single_blog_options', array(
        'title' => esc_html__( 'Single Blog Options', '_themename' ),
        'description' => esc_html__( 'You can change single blog options from here.', '_themename' ),
        'active_callback' => '_themename_show_single_blog_section'
    ));

    $wp_customize->add_setting('_themename_display_author_info', array(
        'default' => true,
        'transport' => 'postMessage',
        'sanitize_callback' => '_themename_sanitize_checkbox'
    ));

    $wp_customize->add_control('_themename_display_author_info', array(
        'type' => 'checkbox',
        'label' => esc_html__( 'Show Author Info', '_themename' ),
        'section' => '_themename_single_blog_options'
    ));

    function _themename_sanitize_checkbox( $checked ) {
        return (isset($checked) && $checked === true) ? true : false;
    }

    function _themename_show_single_blog_section() {
        global $post;
        return is_single() && $post->post_type === 'post';
    }

            
}
add_action( 'customize_register', '_themename__customize_register' );



function _themename_sanitize_site_info($input) {
    $allowed = [
        'a' => [
            'href' => [],
            'title' => [],

        ]
    ];
    return wp_kses( $input, $allowed);
}


function _themename_validate_footer_layout( $validity, $value) {
    if(!preg_match('/^([1-9]|1[012])(,([1-9]|1[012]))*$/', $value)) {
        $validity->add('invalid_footer_layout', esc_html__( 'Footer layout is invalid', '_themename' ));
    }
    return $validity;
}