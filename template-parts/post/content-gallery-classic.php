<?php
/**
 * Template for post-format gallery
 * 
 * @package _themename
 */
//Let's get the gallery images id first, $images contains ids of the gallery-images
$images = _themename_get_gallery_images();
?>
<article <?php post_class(); ?>>

    <header class="entry-header">
        <?php get_template_part( '/template-parts/components/entry/header', get_post_format( ) ); ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php get_template_part( '/template-parts/components/entry-content/entry-content', get_post_format( ) ); ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php get_template_part( '/template-parts/components/entry/footer', get_post_format( ) ); ?>
    </footer><!-- .entry-footer -->
    
</article><!--  article- -->