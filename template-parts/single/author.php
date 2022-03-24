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

<div id="author-info" class="author-info">

    <h2 class="screen-reader-text">
        <?php esc_attr_e( 'About the Author', '_themename'); ?>
    </h2>


    <div class="author-avatar">
        <?php echo get_avatar( $author, 100 ); //100 is the size of the avatar, in this case it's 100x100px ?>
    </div><!-- author-avatar -->

    <div class="author-meta">
        <p>
            <a href="<?php echo esc_url( $author_website ); ?>" target="_blank"><?php echo esc_html( $author_dispay ); ?></a>
        </p>
        <p>
            <?php echo esc_html( $author_dispay ); ?>
        </p>
        <p>
            <a href="<?php echo esc_url($author_posts_url) ?>">
                <?php
                    printf(esc_html(_n('%s post', '%s posts', $author_posts_number, '_themename')), number_format_i18n( $author_posts_number ))
                ?>
            </a>
        </p>
    </div><!-- author-meta -->

    

    <div class="author-info-desc">

        <p>
            <?php echo esc_html( $author_description ); ?>
        </p>

    </div><!-- author-info-body -->

    <div class="author-info-social">

        <?php if($author_twitter || $author_facebook || $author_insta || $author_pinterest || $author_dribble) : ?>
            <ul>
                <?php if($author_twitter) :?>
                    <li>
                        <a href="<?php echo esc_url( $author_twitter ); ?>">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/src/images/twitter.svg">
                        </a>
                    </li>
                <?php endif; ?>
                <?php if($author_facebook) :?>
                    <li>
                        <a href="<?php echo esc_url( $author_facebook ); ?>">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/src/images/facebook.svg">
                        </a>
                    </li>
                <?php endif; ?>
                <?php if($author_insta) :?>
                    <li>
                        <a href="<?php echo esc_url( $author_insta ); ?>">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/src/images/insta.svg">
                        </a>
                    </li>
                <?php endif; ?>
                <?php if($author_pinterest) :?>
                    <li>
                        <a href="<?php echo esc_url( $author_pinterest ); ?>">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/src/images/pinterest.svg">
                        </a>
                    </li>
                <?php endif; ?>
                <?php if($author_dribble) :?>
                    <li>
                        <a href="<?php echo esc_url( $author_dribble ); ?>">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/src/images/dribbble.svg">
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        <?php endif; ?>

    </div><!-- author-info-footer -->

</div><!-- author-info -->