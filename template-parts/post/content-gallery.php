<?php
/**
 * Template for post-format gallery
 * 
 * @package _themename
 */
?>
<article <?php post_class(); ?>>

    <header class="entry-header">
        <?php get_template_part( '/template-parts/components/entry-header/entry-header', get_post_format( ) ); ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php 
        if(is_single( )) :
            the_content( );
        else:
            the_excerpt(); 
        endif;    
        ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php _themename_entry_footer();?>
    </footer><!-- .entry-footer -->
    
</article><!--  article- -->