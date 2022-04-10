<?php
$hidden_title = get_post_meta( get_the_ID(), '_themename_hide_page_title', true );
$show_title = !$hidden_title;
?>
<article <?php post_class(); ?>>

    <header class="entry-header">
        <?php if ( $show_title ) : ?>
            <h1 class="entry-title">
                <?php the_title() ?>
            </h1>
        <?php endif; ?>
        <?php
        if( has_post_thumbnail() ) : 
            the_post_thumbnail( 'large');
        endif;
        ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php the_content(); ?>   
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php _themename_entry_footer(); ?>
    </footer><!-- .entry-footer -->

</article><!--  article- -->
