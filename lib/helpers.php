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

//Add Social Links in User Profile
add_action( 'show_user_profile', '_themename_extra_user_profile_fields' );
add_action( 'edit_user_profile', '_themename_extra_user_profile_fields' );

function _themename_extra_user_profile_fields( $user ) { ?>
    <h3><?php _e("Social Links", "_themename"); ?></h3>

    <table class="form-table">
    <tr>
        <th><label for="twitter"><?php _e("Twitter", '_themename'); ?></label></th>
        <td>
            <input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" class="regular-text" /><br />
            <span class="description"><?php esc_html__("Please enter your twitter link.", '_themename'); ?></span>
        </td>
    </tr>
    <tr>
        <th><label for="facebook"><?php _e("facebook", '_themename'); ?></label></th>
        <td>
            <input type="text" name="facebook" id="facebook" value="<?php echo esc_attr( get_the_author_meta( 'facebook', $user->ID ) ); ?>" class="regular-text" /><br />
            <span class="description"><?php esc_html__("Please enter your facebook link", '_themename'); ?></span>
        </td>
    </tr>
    <tr>
    <th><label for="github"><?php _e("Github"); ?></label></th>
        <td>
            <input type="text" name="github" id="github" value="<?php echo esc_attr( get_the_author_meta( 'github', $user->ID ) ); ?>" class="regular-text" /><br />
            <span class="description"><?php esc_html__("Please enter your Github Link", '_themename'); ?></span>
        </td>
    </tr>
    </table>
<?php }

//Save Extra User Fields
add_action( 'personal_options_update', '_themename_save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', '_themename_save_extra_user_profile_fields' );

function _themename_save_extra_user_profile_fields( $user_id ) {
    if ( empty( $_POST['_wpnonce'] ) || ! wp_verify_nonce( $_POST['_wpnonce'], 'update-user_' . $user_id ) ) {
        return;
    }
    
    if ( !current_user_can( 'edit_user', $user_id ) ) { 
        return false; 
    }
    update_user_meta( $user_id, 'twitter', $_POST['twitter'] );
    update_user_meta( $user_id, 'facebook', $_POST['facebook'] );
    update_user_meta( $user_id, 'github', $_POST['github'] );
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