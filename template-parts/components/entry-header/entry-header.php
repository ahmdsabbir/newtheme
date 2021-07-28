<?php
if( has_post_thumbnail() ) : 
    the_post_thumbnail( 'medium');
endif;
if(is_single()) : ?>
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