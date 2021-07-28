<?php
$content = apply_filters('the_content', get_the_content());
$videos = get_media_embedded_in_content($content, array('video', 'object', 'embed', 'iframe'));

if( has_post_thumbnail() && (empty($videos) || is_single( )) ) : //if in video post format there is no video show thumbnail and in single.php show thumbnail
    the_post_thumbnail( 'medium');
endif; ?>

<?php if (!is_single( ) && !empty($videos)) : //if not in single page(in archive) and there is a video in the content, then show the first video?>
    <div class="videos">
        <?php echo $videos[0]; ?>
    </div><!-- video -->
<?php endif; ?>

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