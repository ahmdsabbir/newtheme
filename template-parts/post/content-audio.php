<article <?php post_class(); ?>>

    <header class="entry-header">
        <?php get_template_part( '/template-parts/components/entry/header', get_post_format( ) ); ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php get_template_part( '/template-parts/components/entry/content', get_post_format( ) ); ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php get_template_part( '/template-parts/components/entry/footer', get_post_format( ) ); ?>
    </footer><!-- .entry-footer -->
    
</article><!--  article- -->