<?php
/**
 * Template tags
 * 
 * @package _themename
 */

 /**
  * ================================== Helper template tags
  */

 function _themename_published_on() {
     /** translators: %s Post Date */
    printf(
        esc_html__('Published on %s', '_themename'),
        '<a href="' .  esc_url(get_permalink()) . '"><time datetime="' . esc_attr(get_the_date('c')) . '">' . esc_html(get_the_date()) . '</time></a>'
    );
 }

 function _themename_written_by() {
    printf(
        esc_html__(' Written By %s ', '_themename'),
        '<a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a>'
    );
 }

 function _themename_comments_number($singular='1 comment', $plural=' Comments') {
     $num_comments = get_comments_number( get_the_ID() );
     if ( 0 != $num_comments ) {
          if(1==$num_comments) {
              echo $singular;
          } else {
              echo $num_comments . $plural;
          }
     } else {
         echo 'No Comments Yet';
     }
 }

function _themename_reading_time() {
    $content = get_post_field( 'post_content', get_the_ID(  ) );
    $word_count = str_word_count( strip_tags( $content ) );
    $readingtime = ceil($word_count / 200);
    
    if ($readingtime == 1) {
        $timer = " minute Read";
    } else {
        $timer = " minutes Read";
    }
    $totalreadingtime = $readingtime . $timer;
    
    echo $totalreadingtime;
}

 function _themename_post_catagory_list() {
    if(has_category()) {
        /* translators: used betweeen categories */
        $cats_list = get_the_category_list( esc_html__( ', ', '_themename' ) );
        /* translators: %s is the categories list */
        printf(esc_html__( 'Categories: %s', '_themename' ), $cats_list);
    }
 }

 function _themename_post_tag_list() {
    if(has_tag()) {
        $tags_list = get_the_tag_list( '<ul><li>', '</li><li>', '</li></ul>' );
        printf(esc_html__( 'Tags: %s', '_themename' ), $tags_list);
    }
 }

 function _themename_post_edit_link() {
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

 function _themename_last_updated() {
    $u_time = get_the_time('U'); 
    $u_modified_time = get_the_modified_time('U'); 

    if ($u_modified_time >= $u_time + 86400) { 
        echo esc_html__( ' Last modified on : ', '_themename');
        echo the_modified_time('F jS, Y') ; 
    } 
 }

 /**
  * echos post meta of a post
  */
  function _themename_post_meta($separator=', ') {
    
    _themename_published_on();
    echo $separator;
    _themename_written_by();
    echo $separator;
    _themename_comments_number();
    echo $separator;
    _themename_reading_time();
    echo $separator;
    _themename_last_updated();
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
    echo '<p>';
    _themename_post_catagory_list();
    echo '</p><p>';
    _themename_post_tag_list();
    echo '</p><p>';
    _themename_post_edit_link();
    echo '</p>';

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


 