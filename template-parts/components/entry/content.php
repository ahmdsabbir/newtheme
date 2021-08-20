<?php 
/**
 * template for entry content
 * 
 * currently used by the following post format:
 *      gallery,gallery-classic,video, image
 */
if(is_single( )) :
    the_content( );
    wp_link_pages( );
else:
    the_excerpt(); 
endif;    
