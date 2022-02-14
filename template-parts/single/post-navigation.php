<?php
/**
 * Let's get previous and next post first
 */

$prev = get_previous_post();
$next = get_next_post();
 ?>

<?php if( $prev || $next ) : ?>

    <nav class="post-navigation container" role="navigation">

        <h2 class="screen-reader-text"><?php esc_attr_e( 'Post Navigation', '_themename' ); ?></h2>
        <?php if( $prev ) : ?>
            <div class="previous-post sm-col-span-12 md-col-span-6">
                <?php if(has_post_thumbnail( $prev->ID )) : ?>
                    <div class="post-navigation-thumbnail">
                        <?php echo get_the_post_thumbnail( $prev->ID, 'thumbnail' ); ?>
                    </div><!-- post-navigation-thumbnail -->
                <?php endif; ?>
                <div class="post-navigation-content">
                    <a class="post-navigation-link" href="<?php the_permalink( $prev->ID ) ?>">
                        <span class="post-navigation-subtitle">
                            <?php esc_html_e( 'Previous Post: ', '_themename' ); ?>
                        </span>
                        <span class="post-navigation-title">
                            <?php echo esc_html( get_the_title( $prev->ID ) ); ?>
                        </span>
                    </a>
                </div><!-- post-navigation-content -->
            </div><!-- .previous-post -->
        <?php endif; ?>

        <?php if($next) : ?>
            <div class="next-post sm-col-span-12 md-col-span-6">
                <?php if(has_post_thumbnail( $next->ID )) : ?>
                    <div class="post-navigation-thumbnail">
                        <?php echo get_the_post_thumbnail( $next->ID, 'thumbnail' ); ?>
                    </div><!-- post-navigation-thumbnail -->
                <?php endif; ?>
                <div class="post-navigation-content">
                    <a class="post-navigation-link" href="<?php the_permalink( $next->ID ) ?>">
                        <span class="post-navigation-subtitle">
                            <?php esc_html_e( 'Next Post: ', '_themename' ); ?>
                        </span>
                        <span class="post-navigation-title">
                            <?php echo esc_html( get_the_title( $next->ID ) ); ?>
                        </span>
                    </a>
                </div><!-- post-navigation-content -->
            </div><!-- .previous-post -->
        <?php endif; ?>

    </nav>

<?php endif; ?>