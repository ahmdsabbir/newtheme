<?php
/**
 * The wordpress loop for pages
 * 
 * @package _themename
 * 
 */

 // Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<main class="site-main" role="main">

    <?php 
    if(have_posts()) :                
        while(have_posts() ): the_post();
            get_template_part( '/template-parts/page/content');
            
            /* Get comments for this post if enabled in the backend
            */
            if( comments_open() || get_comments_number()) :
                comments_template();
            endif;
        endwhile;
        the_posts_pagination();
    else:
        get_template_part( '/template-parts/post/content', 'none' );
    endif;
    ?>

</main>