<article <?php post_class(); ?>>

    <header class="entry-header">

        <?php
        if( has_post_thumbnail() ) : 
            the_post_thumbnail( 'medium');
        endif;
        ?>

        <?php if(is_single()) : ?>
            <h1 class="entry-title">
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <?php the_title() ?>
                </a>
            </h1>
        <?php else: ?>
            <h2 class="entry-title">
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <?php the_title() ?>
                </a>
            </h2>
        <?php endif; ?>

        <div class="entry-meta">
            <?php _themename_post_meta(); ?>
        </div><!-- entry-meta end -->
        
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
    <?php
    if(!is_single()):
        _themename_read_more_link();
    endif;
    _themename_entry_footer();
     ?>
    </footer><!-- .entry-footer -->

</article><!--  article- -->