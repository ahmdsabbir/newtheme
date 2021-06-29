<?php

function _themename__customize_register( $wp_customize ) {

    // No panels added!
    
    // Create our sections
    
    $wp_customize->add_section( '_themename_footer_options' , array(
        'title'             => __('Footer Options', '_themename'),
        'priority'          => 161,
        'description'       => esc_html__('You can change footer options from here', '_themename'),
    ) );
            
    // Footer Site info
    
    $wp_customize->add_setting( '_themename_site_info' , array(
        'default'       => '',
        'type'          => 'theme_mod',
        'sanitize_callback' => '_themename_sanitize_site_info',
        'transport'     => 'refresh',
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
        'transport'     => 'refresh',
    ) );
    $wp_customize->add_control( '_themename_footer_layout', array(
        'label'      => esc_html__('Site Info', '_themename'),
        'description'=> __('Choose Footer Grids', '_themename'),
        'section'    => '_themename_footer_options',
        'settings'   => '_themename_footer_layout',
        'type'       => 'text',
    ) );

            
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


    function _themename_validate_footer_layout($validity, $value) {
        if(!preg_match('/^([1-9]|1[012])(,[1-9]|1[012]))*$/', $value)) {
            $validity->add('invalid_footer_layout', esc_html__( 'Footer Layout is invalid', '_themename' ));
        }
        return $validity;
    }