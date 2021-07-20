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
            __('Read More <span class="screen-reader-text">About %s</span>'),
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
            echo '<h3>' . esc_html($category->name) . '</h3>';
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
 * accepts arguments : additional classes for the container
 * 
 * return: string : number of columns needed for the container in a 12 column grid
 * 
 *  
 */
function _themename_main_column_length($additional = '') {

    $layout = get_post_meta(get_the_ID(), '__themename_post_layout', true);

    if ( !is_single() ) { //if not single.php only check if both sidebars/one of the sidebar is active
        if ( is_active_sidebar( 'right-sidebar' )  && is_active_sidebar('left-sidebar') ) {// if both sidebar active
            echo '6 ' . $additional;
        } elseif( !is_active_sidebar( 'right-sidebar' )  && !is_active_sidebar('left-sidebar') ) { //if no sidebar active
            echo '12 ' . $additional;
        } else { //if only one of the sidebar active
            echo '9 ' . $additional;
        }
    } elseif( is_single() ) { //if single.php check if Sidebar is not shown in post_meta_box make the main container 12 column
        if($layout == 'no') {
            echo '12' . $additional;
        } elseif($layout == 'yes') { //if sidebar is shown in post_meta_box
            if ( is_active_sidebar( 'right-sidebar' )  && is_active_sidebar('left-sidebar') ) {
                echo '6' . $additional;
            } elseif( !is_active_sidebar( 'right-sidebar' )  && !is_active_sidebar('left-sidebar') ) {
                echo '12' . $additional;
            } else {
                echo '9' . $additional;
            }
        }
    }   

}


function _themename_any_widget_active() {
    $footer_layout = sanitize_text_field(get_theme_mod( '_themename_footer_layout', '3,3,3,3' ));
    $footer_layout = preg_replace('/\s+/', '', $footer_layout);
	$columns = explode(',', $footer_layout);
    $widget_active = false;

    foreach($columns as $index => $column) {
        if(is_active_sidebar('footer-sidebar-' . ($index + 1)) ) {
            return $widget_active = true;
        }
    }

}


function _themename_entry_footer() {
    if(has_category()) {
        echo '<p>';
        /* translators: used betweeen categories */
        $cats_list = get_the_category_list( esc_html__( ', ', '_themename' ) );
        /* translators: %s is the categories list */
        printf(esc_html__( 'Categories: %s', '_themename' ), $cats_list);
        echo '</p>';
    }
    if(has_tag()) {
        $tags_list = get_the_tag_list( '<ul><li>', '</li><li>', '</li></ul>' );
        printf(esc_html__( 'Tags: %s', '_themename' ), $tags_list);
    }

    edit_post_link(
        sprintf(
            /* translators: %s: Name of current post */
            esc_html__( 'Edit %s', '_themename' ),
            the_title( '<span class="screen-reader-text">"', '"</span>', false )
        ),
        '<span class="edit-link">',
        '</span>'
    );

}

 




