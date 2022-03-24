<?php
/**
 * Let's get previous and next post first
 */

$prev = get_previous_post();
$next = get_next_post();
 ?>

<?php if( $prev || $next ) : ?>

    <div class="post-navigation">
        
        <nav role="navigation">
    
            <h2 class="screen-reader-text"><?php esc_attr_e( 'Post Navigation', '_themename' ); ?></h2>
            <?php if( $prev ) : ?>
                <div class="previous-post">
                    <div class="post-navigation-content">
                        <a class="post-navigation-link" href="<?php the_permalink( $prev->ID ) ?>">
                            <span class="post-navigation-subtitle">
                                <?php esc_html_e( '< Previous Post: ', '_themename' ); ?>
                            </span>
                            <span class="post-navigation-title">
                                <?php echo esc_html( get_the_title( $prev->ID ) ); ?>
                            </span>
                        </a>
                    </div><!-- post-navigation-content -->
                </div><!-- .previous-post -->
            <?php endif; ?>
    
            <?php if($next) : ?>
                <div class="next-post">
                    <div class="post-navigation-content">
                        <a class="post-navigation-link" href="<?php the_permalink( $next->ID ) ?>">
                            <span class="post-navigation-subtitle">
                                <?php esc_html_e( 'Next Post > ', '_themename' ); ?>
                            </span>
                            <span class="post-navigation-title">
                                <?php echo esc_html( get_the_title( $next->ID ) ); ?>
                            </span>
                        </a>
                    </div><!-- post-navigation-content -->
                </div><!-- .previous-post -->
            <?php endif; ?>
    
        </nav>

    </div>


<?php endif; ?>