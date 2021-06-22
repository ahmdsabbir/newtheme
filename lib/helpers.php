<?php
/**
 * Theme Helper functions
 * 
 * @newtheme
 * 
 */


 /**
  * echos post meta of a post
  */
function newtheme_post_meta() {
    
    echo '<span>';
/** translators: %s Post Date */
    printf(
        esc_html__('Posted on %s', 'newtheme'),
        '<a href="' .  esc_url(get_permalink()) . '"><time datetime="' . esc_attr(get_the_date('c')) . '">' . esc_html(get_the_date()) . '</time></a>'
    );

    printf(
        esc_html__(' By %s ', 'newtheme'),
        '<a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a>'
    );
    echo '</span>';

}


/**
  * echos a Read More Link in a post
  */
function newtheme_read_more_link() {
    echo '<a href="' . esc_url(get_the_permalink()) . '" title="' . the_title_attribute(['echo' => false]) . '">';
    
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

function newtheme_categories_post_list() {
    
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
function newtheme_change_excerpt_length( $length ) {
    return 24;
  }
  add_filter( 'excerpt_length', 'newtheme_change_excerpt_length', 9999);



//Enable SVG upload
// function newtheme_enable_svg_upload( $mimes ) {
//     //Only allow SVG upload by admins
//     if ( !current_user_can( 'administrator' ) ) {
//       return $mimes;
//     }
//     $mimes['svg']  = 'image/svg+xml';
//     $mimes['svgz'] = 'image/svg+xml';
    
//     return $mimes;
//   }
//   add_filter('upload_mimes', 'newtheme_enable_svg_upload');
