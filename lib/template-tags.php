<?php
/**
 * Template tags
 * 
 * @package _themename
 */


 /**
  * echos post meta of a post
  */
  function _themename_post_meta($before='<span>', $after='</span>') {
    
    echo $before;
    /** translators: %s Post Date */
    printf(
        esc_html__('Published on %s', '_themename'),
        '<a href="' .  esc_url(get_permalink()) . '"><time datetime="' . esc_attr(get_the_date('c')) . '">' . esc_html(get_the_date()) . '</time></a>'
    );

    printf(
        esc_html__(', Written By %s ', '_themename'),
        '<a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a>'
    );
    echo $after;
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
 * Displays entry footer
 */

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

function _themename_get_gallery_images() {
    $images = array();

    if ( function_exists( 'get_post_galleries' ) ) {
        $galleries = get_post_galleries( get_the_ID(), false );
        if ( isset( $galleries[0]['ids'] ) ) {
            $images = explode( ',', $galleries[0]['ids'] );
        }
    } else {
        $pattern = get_shortcode_regex();
        preg_match( "/$pattern/s", get_the_content(), $match );
        $atts = shortcode_parse_atts( $match[3] );
        if ( isset( $atts['ids'] ) ) {
            $images = explode( ',', $atts['ids'] );
        }
    }

    if ( ! $images ) {
        $images = get_posts(
            array(
                'fields'         => 'ids',
                'numberposts'    => 999,
                'order'          => 'ASC',
                'orderby'        => 'menu_order',
                'post_mime_type' => 'image',
                'post_parent'    => get_the_ID(),
                'post_type'      => 'attachment',
            )
        );
    }

    return $images;
}


 