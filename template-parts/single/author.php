<?php
/**
 * Let's get author information first
 */
$author_id = get_the_author_meta('ID');
$author_posts_number = get_the_author_posts();
$author_dispay = get_the_author();
$author_posts_url = get_author_posts_url($author_id);
$author_description = get_the_author_meta('user_description');
$author_website = get_the_author_meta('user_url');
$author_twitter = get_the_author_meta('twitter', $author);
$author_facebook = get_the_author_meta('facebook', $author);
$author_github = get_the_author_meta('github', $author);
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
                <?php if($author_github) :?>
                    <li><a href="<?php echo esc_url( $author_github ); ?>">Github</a></li>
                <?php endif; ?>
            </ul>
        <?php endif; ?>
        
    </div><!-- # author-content -->


</div><!-- author -->