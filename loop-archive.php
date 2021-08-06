<?php
/**
 * The wordpress loop for archives
 * 
 * @package _themename
 * 
 */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if(have_posts()) :               
    while(have_posts() ): the_post();
        get_template_part( '/template-parts/post/content', get_post_format( ));
    endwhile;
    the_posts_pagination();
else:
    get_template_part( '/template-parts/post/content', 'none' );
endif;