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

<div id="author">
    
    <?php
    /**
     * get avatar image
     */
    echo get_avatar( $author, 100);
    ?>
    <h1>
        <?php 
        /**
         * get author display name
         */
        echo esc_html( $author_dispay ); ?>
    </h1>
    <?php
    /**
     * get number of author posts
     */
    printf(esc_html(_n('%s post', '%s posts', $author_posts_number, '_themename')), number_format_i18n( $author_posts_number ));
    ?>
    <br />
    <?php
    /**
     * get author website
     */
    if($author_website) :
    ?>
        <a href="<?php echo esc_url( $author_website ); ?>" target="_blank"><?php echo esc_html( $author_website ); ?></a>
    <?php endif; ?>

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
    <p>
        <?php
        /**
         * get author description
         */
        echo esc_html( $author_description );
        ?>
    </p>

</div>