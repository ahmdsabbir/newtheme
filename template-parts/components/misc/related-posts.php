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

    <?php foreach($related_posts as $related_post): ?>
        
        <div class="card">

            <?php if(has_post_thumbnail( $related_post->ID )): ?>

                <div class="card-header">
                    <img src="<?php echo get_the_post_thumbnail_url($related_post->ID) ?>" alt="">
                </div><!-- card-header -->

            <?php endif; ?>

            <div class="card-body">

                <a href="<?php the_permalink($related_post->ID); ?>">
                    <?php  echo $related_post->post_title; ?>
                </a>
                
            </div><!-- card-body -->

            <div class="card-footer">

                <p><?php _themename_reading_time(); ?></p>

                <p>
                    <?php 
                    $cats = get_the_category( $related_post->ID );

                    foreach ($cats as $cat): ?>
                        <a href="<?php echo get_term_link($cat->term_id); ?>"><?php echo $cat->name; ?></a>
                    <?php endforeach;  ?>
                </p>

            </div><!-- card-footer -->

        </div><!-- card -->

    <?php endforeach; ?>

</div><!-- .realated-post -->