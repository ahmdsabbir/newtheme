<article <?php post_class(); ?>>

    <header class="entry-header">

        <h2 class="entry-title">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                <?php the_title() ?>
            </a>
        </h2>

        <div class="entry-meta">
            <?php _themename_post_meta(); ?>
        </div><!-- entry-meta end -->
        
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