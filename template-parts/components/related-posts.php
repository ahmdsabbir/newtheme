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
<div class="related-posts">
    <h2><?php _e('Related Posts', '_themename'); ?></h2>
    <ul>
        <?php foreach($related_posts as $related_post): ?>
            <li>
                <a href="<?php the_permalink($related_post->ID); ?>"><?php echo $related_post->post_title; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</div><!-- #related-posts -->
    