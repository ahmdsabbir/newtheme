<?php
/**
 * Comments form template
 */

 if( post_password_required( )) {
     return;
 }
?>
<div class="comments" id="comments">
    <?php if(have_comments(  )): ?>
        <h2 class="comments-title">
            <?php
            /* translators: 1 is number of comments and 2 is post title */
            printf(
                esc_html( _n( 
                    '%1$s Reply to "%2$s"', 
                    '%1$s Replies to "%2$s"', 
                    get_comments_number(), 
                    '_themename' 
                )),
                number_format_i18n( get_comments_number() ),
                get_the_title()
            )
            ?>
        </h2>
        <ul class="comments-list">           
            <?php
                wp_list_comments( array(
                    'short_ping' => false,
                    'avatar_size' => 50,
                    'reply_text' => 'Reply',
                    'callback' => '_themename_comment_callback'
                ) );
            ?>
        </ul>
        <?php the_comments_pagination() ?>
    <?php endif; ?>
    <?php
    if( ! comments_open() && get_comments_number()) : ?>
        <p class="comments-closed">
            <?php esc_html_e( 'Comments are closed for this post', '_themename' ) ?>
        </p>
    <?php endif; ?>
    <?php comment_form() ?>
</div><!-- # comments -->