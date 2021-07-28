<?php
$content = apply_filters('the_content', get_the_content());
$audios = get_media_embedded_in_content($content, array('audio', 'iframe'));

if( has_post_thumbnail() && (empty($audios) || is_single( )) ) : //if in video post format there is no video show thumbnail and in single.php show thumbnail
    the_post_thumbnail( 'medium');
endif; ?>

<?php if (!is_single( ) && !empty($audios)) : //if not in single page(in archive) and there is a video in the content, then show the first video?>
    <div class="audio">
        <?php echo $audios[0]; ?>
    </div><!-- audio -->
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