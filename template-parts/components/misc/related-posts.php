<?php
/**
 * Template for showing Related Posts
 * 
 * @package _themename
 * 
 * _themename_related_posts() location: /lib/helpers
 */
$related_posts = _themename_related_posts(3); 
?>
<div id="related-posts">
    <h2><?php _e('Related Posts', '_themename'); ?></h2>

    <?php foreach($related_posts as $related_post): ?>

        <a href="<?php the_permalink($related_post->ID); ?>">
            <?php echo $related_post->post_title; ?>
        </a>

    <?php endforeach; ?>
    
</div><!-- #related-posts -->
    