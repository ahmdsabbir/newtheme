<?php
/**
 * Theme Helper functions
 * 
 * @_themename
 * 
 */


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


function _themename_wrapper_id() {

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
function _themename_main_column_class ($both, $left, $right, $no, $additional = '') {

    $layout = get_post_meta(get_the_ID(), '__themename_post_layout', true);

    $for_both_sidebar   = $both;
    $for_left_sidebar    = $left;
    $for_right_sidebar    = $right;
    $for_no_sidebar     = $no;

    if ( $additional != '' ) {  //put an extra space after class names if there is additional classes
        $for_both_sidebar   = $for_both_sidebar . ' ';
        $for_one_sidebar    = $for_one_sidebar . ' ';
        $for_no_sidebar     = $for_no_sidebar . ' ';
    }
    

    if ( !is_single() ) { //if not single.php only check if both sidebars/one of the sidebar is active
        if ( is_active_sidebar( 'right-sidebar' )  && is_active_sidebar('left-sidebar') ) {// if both sidebar active
            echo $for_both_sidebar . $additional;
        } elseif( !is_active_sidebar( 'right-sidebar' )  && !is_active_sidebar('left-sidebar') ) { //if no sidebar active
            echo $for_no_sidebar . $additional;
        } else { //if only one of the sidebar active
            if ( is_active_sidebar( 'right-sidebar' ) ) {
                echo $for_right_sidebar . $additional;
            } else {
                echo $for_left_sidebar . $additional;
            }
        }
    } elseif ( is_single() ) { //if single.php check if Sidebar is not shown in post_meta_box make the main container 12 column
        if ( $layout == 'no' ) {
            echo $for_no_sidebar . $additional;
        } elseif ( $layout == 'yes' ) { //if sidebar is shown in post_meta_box
            if ( is_active_sidebar( 'right-sidebar' )  && is_active_sidebar('left-sidebar') ) {
                echo $for_both_sidebar . $additional;
            } elseif( !is_active_sidebar( 'right-sidebar' )  && !is_active_sidebar('left-sidebar') ) {
                echo $for_no_sidebar . $additional;
            } else {
                if ( is_active_sidebar( 'right-sidebar' ) ) {
                    echo $for_right_sidebar . $additional;
                } else {
                    echo $for_left_sidebar . $additional;
                }
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



/**
 * Related Posts
 */
function _themename_related_posts($count, $sort = 'rand') {
    // Check if post has got minimum one category set
    if (!$categories = get_the_category()) {
        return [];
    }

    // get an array with just the IDs of the categories
    $categories = array_reduce($categories, function ($v, $w) {
        $v[] = $w->term_id;

        return $v;
    });

    // get the power set of the categories
    $powerSet = [[]];

    foreach ($categories as $id) {
        foreach ($powerSet as $powerSetElement) {
            if (!empty(array_merge([$id], $powerSetElement))) {
                array_push($powerSet, array_merge([$id], $powerSetElement));
            }
        }
    }
    // remove the empty array from the power set
    array_splice($powerSet, 0, 1);

    // the posts array
    $resultPostArray = [];

    // iterator for the loop
    $i = count($powerSet) - 1;

    // init the array of posts which are already in $resultPostArray
    // already filled with id of recent post
    $excludePostIds = [get_the_ID()];

    // start the loop and let it run until $resultPostArray has reached
    // limit or every combinations of the category power set tried
    while (count($resultPostArray) < $count && !empty($powerSet)) {
        // the WP_Query
        $query = new WP_Query([
            'category__and' => $powerSet[$i],
            'orderby' => $sort,
            'post__not_in' => $excludePostIds,
            'posts_per_page' => $count,
        ]);

        $posts = $query->get_posts();

        // remove the combination from power set
        array_splice($powerSet, $i, 1);

        // update iterator
        --$i;

        // Loop the query_posts and add ones which are not already in the
        // $resultPostArray
        foreach ($posts as $post) {
            if (count($resultPostArray) >= $count) {
                break;
            }

            $resultPostArray[] = $post;
            $excludePostIds[] = $post->ID;
        }
    }

    return $resultPostArray;
}

/**
 * The function below adds .odd or .even classes in wordpress posts for easy css styling
 */
// function oddeven_post_class ( $classes ) {
//     global $current_class;
//     $classes[] = $current_class;
//     $current_class = ($current_class == 'odd') ? 'even' : 'odd';
//     return $classes;
//  }
//  add_filter ( 'post_class' , 'oddeven_post_class' );
//  global $current_class;
//  $current_class = 'odd';
