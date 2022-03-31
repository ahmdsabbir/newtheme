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
               <div class="card-category"> 
                    <?php 
                    $cats = get_the_category( $related_post->ID );
    
                    foreach ($cats as $cat): ?>
                        <a href="<?php echo get_term_link($cat->term_id); ?>"><?php echo $cat->name; ?></a>
                    <?php endforeach;  ?>
                </div>
            <?php if(has_post_thumbnail( $related_post->ID )): ?>

                <div class="card-header">
                    <img src="<?php echo get_the_post_thumbnail_url($related_post->ID) ?>" alt="">
                </div><!-- card-header -->

            <?php endif; ?>

            <div class="card-body">
                <div class="card-meta">
                     <div class="card-author-holder"> <!-- author avatar and name starts --> 
                     <div class="card-author-avatar">
                         <?php echo get_avatar( $author, 100 ); //100 is the size of the avatar, in this case it's 100x100px ?>
                     </div><!-- author-avatar -->
                     <span>
                       Author Name
                    </span>
                     </div><!-- author avatar and name ends--> 
                     <div class="card-publish-time">
                     <?php _themename_reading_time(); ?>
                     </div>
                </div> <!-- card-author-meta -->
                
                <a href="<?php the_permalink($related_post->ID); ?>">
                    <?php  echo $related_post->post_title; ?>
                </a>
            </div><!-- card-body -->
            
            <div class="card-footer">
             <small> <?php _themename_reading_time(); ?></small>
            </div><!-- card-footer -->

        </div><!-- card -->

    <?php endforeach; ?>

</div><!-- .realated-post -->