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

            <div class="heading">

                <div class="categories">
                    <?php 
                        $cats = get_the_category( $related_post->ID );

                        foreach ($cats as $cat): ?>
                            <a href="<?php echo get_term_link($cat->term_id); ?>"><?php echo $cat->name; ?></a>
                    <?php endforeach;  ?>
                </div>

                <?php if(has_post_thumbnail( $related_post->ID )): ?>
                    <img src="<?php echo get_the_post_thumbnail_url($related_post->ID) ?>" alt="" />
                <?php endif; ?>          
            </div>

            <div class="body">
                 <div class="meta">
                     <a href="#" class="meta-author">
                        <div class="meta-author-avatar"><?php echo get_avatar( $author, 100 ); ?></div>
                        <span><?php echo get_author_name(); ?></span>
                    </a>
                    <span class="meta-separator">·</span>
                    <span class="meta-readTime"><?php _themename_reading_time(); ?></span>
                </div> <!-- meta author profile name -->
                <h3>
                    <a href="<?php the_permalink($related_post->ID); ?>">
                        <?php  echo $related_post->post_title; ?>
                    </a>      
                </h3>

                <p class="excerpt">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Numquam di
                atque itaque at deserunt, nulla ullam voluptatem a iure nam, sed
                modi nihil quidem molestias. Eaque, odio officia?
                </p>
                

            </div>

            <div class="footer">
                    <a href=""><?php _themename_published_on(); ?></a>
                </div>
              
        </div>

    <?php endforeach; ?>

</div><!-- .realated-post -->