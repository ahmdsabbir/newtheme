<?php 
if(is_single( )) :
    the_content( );
    wp_link_pages( );
else:
    the_excerpt(); 
endif;    
