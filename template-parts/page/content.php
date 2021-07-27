<article <?php post_class(); ?>>

    <header class="entry-header">

        <h1 class="entry-title">
            <?php the_title() ?>
        </h1>

        <?php
        if( has_post_thumbnail() ) : 
            the_post_thumbnail( 'large');
        endif;
        ?>

        <div class="entry-meta">
            <?php _themename_post_meta(); ?>
        </div><!-- entry-meta end -->
        
    </header><!-- .entry-header -->

    <div class="entry-content">

        <?php the_content(); ?>   

    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php _themename_entry_footer(); ?>
    </footer><!-- .entry-footer -->

</article><!--  article- -->