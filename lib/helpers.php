<?php
/**
 * Theme Helper functions
 * 
 * @_themename
 * 
 */


 /**
  * echos post meta of a post
  */
function _themename_post_meta() {
    
    echo '<span>';
    /** translators: %s Post Date */
    printf(
        esc_html__('Posted on %s', '_themename'),
        '<a href="' .  esc_url(get_permalink()) . '"><time datetime="' . esc_attr(get_the_date('c')) . '">' . esc_html(get_the_date()) . '</time></a>'
    );

    printf(
        esc_html__(' By %s ', '_themename'),
        '<a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a>'
    );
    echo '</span>';

}


/**
  * echos a Read More Link in a post
  */
function _themename_read_more_link($btn_class='') {

    if ( $btn_class != '' ) {
        $class = 'Class="' . $btn_class . '"';
    } else {
        $class= null;
    }
    
    echo '<a href="' . esc_url(get_the_permalink()) . '" title="' . the_title_attribute(['echo' => false]) . '" ' . $class . '>';
    
    /** translators: %s Post Title */
    printf(
        wp_kses(
            __('Read More <span class=u-screen-reader-text">About %s</span>'),
            [
                'span' => [
                    'class' => []
                ]
            ]
        ),
        get_the_title()
    );

    echo '</a>';
}


/**
 * 
 * echos a list of categories and some specified posts in them
 */

function _themename_categories_post_list() {
    
    $categories = get_categories();
    
    foreach($categories as $category) :

        $args = array(
            'posts_per_page' => 4,
            'category_name'  => $category->name,
        );

        $my_query = new WP_Query($args);

        if( $my_query->have_posts() ) :

            //this part before while() repeats for every category
            echo '<h3>' . $category->name . '</h3>';
            echo '<ul>';

            while($my_query->have_posts()) : $my_query->the_post();

                //this part repeats for every post in a category
                echo '<li>' . get_the_title() . '</li>';

            endwhile;

            echo '</ul>';

            wp_reset_query();

        endif;

    endforeach;

}

//Change the default excerpt length in WordPress (default is 55 words)
function _themename_change_excerpt_length( $length ) {
    return 24;
  }
  add_filter( 'excerpt_length', '_themename_change_excerpt_length', 9999);



//Enable SVG upload
// function _themename_enable_svg_upload( $mimes ) {
//     //Only allow SVG upload by admins
//     if ( !current_user_can( 'administrator' ) ) {
//       return $mimes;
//     }
//     $mimes['svg']  = 'image/svg+xml';
//     $mimes['svgz'] = 'image/svg+xml';
    
//     return $mimes;
//   }
//   add_filter('upload_mimes', '_themename_enable_svg_upload');

/**
 * Function to get the wrapper ID of the div
 * return: string
 */
function _themename_get_wrapper_id() {

    $wrapper_id = '';

    if( is_home() ) {
        $wrapper_id = 'index';
    } elseif ( is_page() ) {
        $wrapper_id = 'page';
    } elseif ( is_archive() ) {
        $wrapper_id = 'archive';
    } elseif ( is_search() ) {
        $wrapper_id = 'search';
    } elseif ( is_single() ) {
        $wrapper_id = 'single';
    }

    return $wrapper_id;
}


/**
 * Function to determine if a sidebar is active
 * accepts arguments
 * return: boolean
 */

/**
 * Function to determine if a sidebar is active
 * accepts arguments
 * return: string
 */
function _themename_main_column_length($additional = '') {

    if ( is_active_sidebar( 'right-sidebar' )  && is_active_sidebar('left-sidebar') ) {
        echo '6' . $additional;
    } elseif( !is_active_sidebar( 'right-sidebar' )  && !is_active_sidebar('left-sidebar') ) {
        echo '12' . $additional;
    } else {
        echo '9' . $additional;
    }

}

function _themename_any_widget_active() {
    $footer_layout = '3,3,3,3';
	$columns = explode(',', $footer_layout);
    $widget_active = false;

    foreach($columns as $index => $column) {
        if(is_active_sidebar('footer-sidebar-' . ($index + 1)) ) {
            return $widget_active = true;
        }
    }

}


 




