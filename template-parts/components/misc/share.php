<?php 
$postUrl = 'http' . ( isset( $_SERVER['HTTPS'] ) ? 's' : '' ) . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
?>

<div id="post-share">

    <h5>Share on:</h5>

    <a target="_blank" href="https://twitter.com/intent/tweet?url=<?php echo esc_url($postUrl); ?>&text=<?php echo the_title(); ?>&via=<?php the_author_meta( 'twitter' ); ?>" title="<?php esc_attr_e('Tweet this', '_themename'); ?>">Twitter</a>

    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url($postUrl); ?>" title="<?php esc_attr_e('Share on Facebook', '_themename'); ?>">Facebook</a>

    <a target="_blank" href="http://pinterest.com/pin/create/bookmarklet/?url=<?php echo esc_url($postUrl); ?>" title="<?php esc_attr_e('Pin it', '_themename'); ?>">Pinterest</a>

</div>