<?php
$content = apply_filters('the_content', get_the_content());
$audios = get_media_embedded_in_content($content, array('audio', 'iframe'));

/**
 *  if in video post format there is no video show thumbnail and in single.php show thumbnail
 */
if( has_post_thumbnail() && (empty($audios) || is_single( )) ) :
    the_post_thumbnail( 'medium');
endif;

/**
 *  if not in single page(in archive) AND there is a video in the content, then show the first video
 */
if (!is_single( ) && !empty($audios)) :?>

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
    <?php get_template_part( '/template-parts/components/entry/meta'); ?>
</div><!-- entry-meta end -->