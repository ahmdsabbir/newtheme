<?php
//Let's get the gallery images id first, $images contains ids of the gallery-images
$blocks =  parse_blocks(get_the_content());
$gallery = false;
foreach ($blocks as $block) {
    if($block['blockName'] === 'core/gallery') {
        $gallery = $block;
        break;
    }
}

/**
 * if in video post format there is no gallery show thumbnail and in single.php show thumbnail
 */
if( has_post_thumbnail() && ( !$gallery || is_single( )) ) : 
    the_post_thumbnail( 'medium');
endif;

/**
 *  if not in single page(in archive) AND there is a gallery in the content, then show the first gallery 
 */
if ( !is_single( ) && $gallery ) :?>

    <div class="gallery">
        <?php echo $gallery['innerHTML']; ?>
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