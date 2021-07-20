<?php
/**
 * The wordpress loop for index / fallback for loop-{filename}
 * 
 * @package _themename
 * 
 */
if(have_posts()) :                
    while(have_posts() ): the_post();
        get_template_part( '/template-parts/post/content' );
    endwhile;
    the_posts_pagination();
else:
    get_template_part( '/template-parts/post/content', 'none' );
endif;