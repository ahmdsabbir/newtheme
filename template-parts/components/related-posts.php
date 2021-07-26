<?php
/**
 * Template for showing Related Posts
 * 
 * @package _themename
 * 
 * _themename_related_posts() location: /lib/helpers
 */
$show_rel_posts = get_theme_mod( '_themename_display_related_posts', true);
?>

<?php if($show_rel_posts) : ?>
    <div class="related-posts">
        <h2><?php _e('Related Posts', '_themename'); ?></h2>
        <ul>
        <?php $rels = _themename_related_posts(3); 
            foreach($rels as $rel): ?>
                <li>
                    <a href="<?php the_permalink($rel->ID); ?>"><?php echo $rel->post_title; ?></a>
                </li>
            <?php endforeach;
        ?>
        </ul>
    </div><!-- #related-posts -->
<?php endif; ?>
    