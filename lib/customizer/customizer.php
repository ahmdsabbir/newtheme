<?php

function _themename__customize_register( $wp_customize ) {

    /**##################### Wordpress Core ##################### */
    $wp_customize->get_setting('blogname')->transport = 'postMessage';

    $wp_customize->selective_refresh->add_partial('blogname', array(
        'selector' => '.navbar-brand',
        'container_inclusive' => false,
        'render_callback' => function() {
            bloginfo('name');
        }
    ));


    //############################################ Custom Range Control #################################
    class WP_Customize_Range_Control extends WP_Customize_Control
    {
        public $type = 'custom_range';
        public function enqueue()
        {
            wp_enqueue_script(
                'cs-range-control',
                get_template_directory_uri() . '/lib/customizer/range-control.js',
                array('jquery'),
                false,
                true
            );
        }
        public function render_content()
        {
            ?>
            <label>
                <?php if ( ! empty( $this->label )) : ?>
                    <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                <?php endif; ?>
                <div class="cs-range-value"><?php echo esc_attr($this->value()); ?></div>
                <input data-input-type="range" type="range" <?php $this->input_attrs(); ?> value="<?php echo esc_attr($this->value()); ?>" <?php $this->link(); ?> />
                <?php if ( ! empty( $this->description )) : ?>
                    <span class="description customize-control-description"><?php echo $this->description; ?></span>
                <?php endif; ?>
            </label>
            <?php
        }
    }

    /** #################### General Theme Options ###################### */

    $wp_customize->add_panel( '_themename_general_theme_options', array(
        'title' => esc_html__( 'General Theme Options', '_themename' ),
        'description' => esc_html__( 'You can change General Theme options from here.', '_themename' ),
        'priority' => 10,
     ) );

     $wp_customize->add_section('_themename_color_options', array(
        'title' => esc_html__( 'Colors', '_themename' ),
        'description' => esc_html__( 'You can change Breadcrumb Options from here', '_themename' ),
        'panel' => '_themename_general_theme_options'
    ));

     $wp_customize->add_setting('_themename_primary_color', array(
        'default' => '#13B140',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, '_themename_primary_color', array(
        'label' => __( 'Primary Color', '_themename' ),
        'section' => '_themename_color_options',
    )));
     
    $wp_customize->add_section('_themename_breadcrumb_options', array(
        'title' => esc_html__( 'Breadcrumb', '_themename' ),
        'description' => esc_html__( 'You can change Breadcrumb Options from here', '_themename' ),
        'panel' => '_themename_general_theme_options'
    ));

    $wp_customize->add_setting('_themename_display_breadcrumb', array(
        'default' => true,
        'transport' => 'postMessage',
        'sanitize_callback' => '_themename_sanitize_checkbox'
    ));

    $wp_customize->add_control('_themename_display_breadcrumb', array(
        'type' => 'checkbox',
        'label' => esc_html__( 'Show Breadcrumb', '_themename' ),
        'section' => '_themename_breadcrumb_options'
    ));

    $wp_customize->add_setting('_themename_breadcrumb_height', array(
        'default' => true,
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(
        new WP_Customize_Range_Control(
            $wp_customize,
            '_themename_breadcrumb_height',
            array(
                'label'       => __('Padding'),
                'section'     => '_themename_breadcrumb_options',
                'description' => __('Measurement is in rem.'),
                'input_attrs' => array(
                    'min' => 1,
                    'max' => 20,
                ),
            )
        )
    );

    /**##################### footer ##################### */

    $wp_customize->selective_refresh->add_partial('_themename_footer_partial', array(
        'settings' => array('_themename_footer_layout'),
        'selector' => '#footer',
        'container_inclusive' => false,
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

    $wp_customize->add_setting('_themename_display_post_share', array(
        'default' => true,
        'transport' => 'postMessage',
        'sanitize_callback' => '_themename_sanitize_checkbox'
    ));

    $wp_customize->add_control('_themename_display_post_share', array(
        'type' => 'checkbox',
        'label' => esc_html__( 'Enable Post Sharing', '_themename' ),
        'section' => '_themename_single_blog_options'
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


    //Post Navigation
    $wp_customize->add_setting('_themename_display_post_navigation', array(
        'default' => true,
        'transport' => 'postMessage',
        'sanitize_callback' => '_themename_sanitize_checkbox'
    ));

    $wp_customize->add_control('_themename_display_post_navigation', array(
        'type' => 'checkbox',
        'label' => esc_html__( 'Show Post Navigation', '_themename' ),
        'section' => '_themename_single_blog_options'
    ));

    //Related Posts
    $wp_customize->add_setting('_themename_display_related_posts', array(
        'default' => true,
        'transport' => 'postMessage',
        'sanitize_callback' => '_themename_sanitize_checkbox'
    ));

    $wp_customize->add_control('_themename_display_related_posts', array(
        'type' => 'checkbox',
        'label' => esc_html__( 'Show Related Posts', '_themename' ),
        'section' => '_themename_single_blog_options'
    ));

    $wp_customize->add_setting('_themename_enable_toc', array(
        'default' => false,
        'transport' => 'refresh',
        'sanitize_callback' => '_themename_sanitize_checkbox'
    ));

    $wp_customize->add_control('_themename_enable_toc', array(
        'type' => 'checkbox',
        'label' => esc_html__( 'Enable Table of Content', '_themename' ),
        'section' => '_themename_single_blog_options'
    ));

   
           
}
add_action( 'customize_register', '_themename__customize_register' );


//Functions
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
        $validity->add('invalid_footer_layout', esc_html__( 'Footer layout is invalid, use a 12 column grid.', '_themename' ));
    }
    return $validity;
}

function _themename_sanitize_checkbox( $checked ) {
    return (isset($checked) && $checked === true) ? true : false;
}

function _themename_show_single_blog_section() {
    global $post;
    return is_single() && $post->post_type === 'post';
}
