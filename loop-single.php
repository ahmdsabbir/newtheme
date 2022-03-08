<?php
/**
 * The wordpress loop for single post
 * 
 * @package _themename
 * 
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
$show_post_share = get_theme_mod( '_themename_display_post_share', true);
$show_author_info = get_theme_mod( '_themename_display_author_info', true);
$show_post_navigation = get_theme_mod( '_themename_display_post_navigation', true );
$show_related_posts = get_theme_mod( '_themename_display_related_posts', true);
$in_customizer = isset($GLOBALS['wp_customize']);
?>

<main class="site-main" role="main">

    <?php 
    if(have_posts()) :                   
        while(have_posts() ): the_post();
            get_template_part( '/template-parts/post/content', get_post_format( ) );
            

            
            /**
             * Social Sharing Buttons
             */
            if( $in_customizer || $show_post_share ) :
                get_template_part( '/template-parts/components/misc/share' );
            endif;
            
            /**
             * Get Author info for this post if it's enabled from the customizer
             */
            if( $in_customizer || $show_author_info ) :
                get_template_part( '/template-parts/single/author' );
            endif;
            /**
             * Get post previous and next post navigation
             */
            if ( $in_customizer || $show_post_navigation ) :
                get_template_part( '/template-parts/single/post-navigation' );
            endif;
            /**
             * Get Related Posts for this post if it's enabled from the customizer
             */
            if( $in_customizer || $show_related_posts ) :
                get_template_part( '/template-parts/components/misc/related-posts' );
            endif;
            /**
             *  Get comments for this post if enabled 
            */
            if( comments_open() || get_comments_number()) :
                comments_template();
            endif;
        endwhile;
    else:
        get_template_part( '/template-parts/post/content', 'none' );
    endif; 
    ?>
    
</main>