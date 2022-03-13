<?php
/**
 * Let's get author information first
 */
$author = get_query_var( 'author' );
$author_posts_number = count_user_posts($author);
$author_dispay = get_the_author_meta( 'display_name', $author );
$author_description = get_the_author_meta('user_description', $author);
$author_website = get_the_author_meta('user_url', $author);
$author_twitter = get_the_author_meta('_themename_user_twitter', $author);
$author_facebook = get_the_author_meta('_themename_user_facebook', $author);
$author_insta = get_the_author_meta('_themename_user_instagram', $author);
$author_pinterest = get_the_author_meta('_themename_user_pinterest', $author);
$author_dribble = get_the_author_meta('_themename_user_dribble', $author);
?>

<div id="author-info">

    <h2 class="screen-reader-text">
        <?php esc_attr_e( 'About the Author', '_themename'); ?>
    </h2>

    <div id="author-avatar">
        <?php echo get_avatar( $author_id, 100 ); //100 is the size of the avatar, in this case it's 100x100px ?>
    </div><!-- # avatar -->

    <div id="author-content">
        <!-- author name and url -->
        <?php if( $author_website) : ?>
            <h3>
                <a href="<?php echo esc_url( $author_website ); ?>" target="_blank"><?php echo esc_html( $author_dispay ); ?></a>
            </h3>
        <?php else: ?>
            <h3>
                <?php echo esc_html( $author_dispay ); ?>
            </h3>
        <?php endif; ?>

        <!-- author posts in the website -->
        <a href="<?php echo esc_url($author_posts_url) ?>">
            <?php
                printf(esc_html(_n('%s post', '%s posts', $author_posts_number, '_themename')), number_format_i18n( $author_posts_number ))
            ?>
        </a>

        <!-- author description -->
        <p>
            <?php echo esc_html( $author_description ); ?>
        </p>

        <?php if($author_twitter || $author_facebook || $author_github) : ?>
        <ul class="social-links">
            <?php if($author_twitter) :?>
                <li><a href="<?php echo esc_url( $author_twitter ); ?>">Twitter</a></li>
            <?php endif; ?>
            <?php if($author_facebook) :?>
                <li><a href="<?php echo esc_url( $author_facebook ); ?>">Facebook</a></li>
            <?php endif; ?>
            <?php if($author_insta) :?>
                <li><a href="<?php echo esc_url( $author_insta ); ?>">Instagram</a></li>
            <?php endif; ?>
            <?php if($author_pinterest) :?>
                <li><a href="<?php echo esc_url( $author_pinterest ); ?>">pinterest</a></li>
            <?php endif; ?>
            <?php if($author_dribble) :?>
                <li><a href="<?php echo esc_url( $author_dribble ); ?>">dribble</a></li>
            <?php endif; ?>
        </ul>
    <?php endif; ?>
        
    </div><!-- # author-content -->


</div><!-- author -->