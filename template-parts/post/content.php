<article <?php post_class(); ?>>

    <header class="entry-header">
       <?php get_template_part( '/template-parts/components/entry-header/entry-header', get_post_format( ) ); ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php 
        if(is_single( )) :
            the_content( );
            wp_link_pages( );
        else:
            the_excerpt(); 
        endif;    
        ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php
        if( !is_single() ):
            _themename_read_more_link();
        endif;
        
        _themename_entry_footer();
        
        ?>
    </footer><!-- .entry-footer -->

</article><!--  article- -->