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
        <?php
        if( has_post_thumbnail() && ( !get_post_gallery() || is_single( )) ) : //if in video post format there is no gallery show thumbnail and in single.php show thumbnail
            the_post_thumbnail( 'medium');
        endif; ?>

        <?php if ( !is_single( ) && get_post_gallery() ) : //if not in single page(in archive) and there is a gallery in the content, then show the first gallery ?>
            <div class="gallery">
                <?php
                foreach($images as $image) :
                    echo wp_get_attachment_image( $image, 'large' );//renders a <img> tag
                endforeach;
                ?>
            </div><!-- #gallery -->
        <?php endif; ?>

        <?php if(is_single()) : ?>
            <h1 class="entry-title">
                <?php the_title() ?>
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
        <?php _themename_entry_footer();?>
    </footer><!-- .entry-footer -->
</article><!--  article- -->