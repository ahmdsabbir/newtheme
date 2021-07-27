<?php
/**
 * The wordpress loop for single post
 * 
 * @package _themename
 * 
 */

$show_author_info = get_theme_mod( '_themename_display_author_info', true);
$show_related_posts = get_theme_mod( '_themename_display_related_posts', true);

if(have_posts()) :                   
    while(have_posts() ): the_post();
        get_template_part( '/template-parts/post/content', get_post_format( ) );
        
        /**
         * Get Author info for this post if it's enabled from the customizer
         */
        if( $show_author_info ) :
            get_template_part( '/template-parts/single/author' );
        endif;
        /**
         * Get post previous and next post navigation
         */
        get_template_part( '/template-parts/single/post-navigation' );
        /**
         * Get Related Posts for this post if it's enabled from the customizer
         */
        if($show_related_posts) :
            get_template_part( '/template-parts/components/related-posts' );
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