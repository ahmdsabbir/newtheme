<?php
/**
 * The wordpress loop for single post
 * 
 * @package _themename
 * 
 */
if(have_posts()) :                   
    while(have_posts() ): the_post();
        get_template_part( '/template-parts/loop-templates/content-single' );
        /**
         * Get Author info for this post if it's enabled from the customizer
         */
        if( get_theme_mod( '_themename_display_author_info', true) ):
            get_template_part( '/template-parts/single/author' );
        endif;
        /**
         * Get post previous and next post navigation
         */
        get_template_part( '/template-parts/single/post-navigation' );
        /**
         * Get comments for this post if enabled in the backend
         */
        if( comments_open() || get_comments_number()) {
            comments_template();
        }
    endwhile;
else:
    get_template_part( '/template-parts/loop-templates/content', 'none' );
endif; 