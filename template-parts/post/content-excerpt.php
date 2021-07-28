<article <?php post_class(); ?>>

    <header class="entry-header">
        <?php get_template_part( '/template-parts/components/entry-header/entry-header' ); ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php the_excerpt(); ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php
        _themename_read_more_link();
        _themename_entry_footer();
        ?>
    </footer><!-- .entry-footer -->

</article><!--  article- -->