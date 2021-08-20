<?php


function _themename_add_meta_box() {
    add_meta_box( 
        '_themename_post_metabox', 
        'Post Settings', 
        '_themename_post_metabox_html', 
        'post', 
        'side', 
        'default');
}

add_action( 'add_meta_boxes', '_themename_add_meta_box' );

function _themename_post_metabox_html($post) {
    $layout = get_post_meta($post->ID, '__themename_post_layout', true);
    wp_nonce_field( '_themename_update_post_metabox', '_themename_update_post_nonce' );
    ?>
    
    <p>
        <label for="_themename_post_layout_field"><?php esc_html_e( 'Sidebar Option', '_themename' ); ?></label>
        <select name="_themename_post_layout_field" id="_themename_post_layout_field" class="widefat">
            <option <?php selected( $layout, 'yes' ); ?> value="yes"><?php esc_html_e( 'Show  Sidebar', '_themename' ); ?></option>
            <option <?php selected( $layout, 'no' ); ?> value="no"><?php esc_html_e( 'Don\'t Show Sidebar', '_themename' ); ?></option>
        </select>
    </p>
    <?php
}

function _themename_save_post_metabox($post_id, $post) {

    $edit_cap = get_post_type_object( $post->post_type )->cap->edit_post;
    if( !current_user_can( $edit_cap, $post_id )) {
        return;
    }
    if( !isset( $_POST['_themename_update_post_nonce']) || !wp_verify_nonce( $_POST['_themename_update_post_nonce'], '_themename_update_post_metabox' )) {
        return;
    }
    
  

    if(array_key_exists('_themename_post_layout_field', $_POST)) {
        update_post_meta( 
            $post_id, 
            '__themename_post_layout', 
            sanitize_text_field($_POST['_themename_post_layout_field'])
        );
    }
}

add_action( 'save_post', '_themename_save_post_metabox', 10, 2 );