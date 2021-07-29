<article <?php post_class(); ?>>

    <div class="entry-content">
        <?php
        the_content();
        _themename_post_meta();
        ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php
        if(is_single( )):
            _themename_entry_footer();
        endif;
        ?>
    </footer><!-- .entry-footer -->

</article><!--  article- -->