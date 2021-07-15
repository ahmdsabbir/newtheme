<?php
/**
 * The wordpress loop for archives
 * 
 * @package _themename
 * 
 */
if(have_posts()) :               
    while(have_posts() ): the_post();
        get_template_part( '/template-parts/loop-templates/content', 'search' );
    endwhile;
    the_posts_pagination();
else:
    get_template_part( '/template-parts/loop-templates/content', 'none' );
endif;