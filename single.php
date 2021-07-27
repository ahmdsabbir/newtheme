<?php
/**
 * The Single post template file
 * _themename_get_wrapper_id() location: /lib/helpers
 *  _themename_main_column_length() location: /lib/helpers
 *
 * @package _themename
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

//Get sidebar layout from post_meta for this single post
$layout = get_post_meta(get_the_ID(), '__themename_post_layout', true);
get_header();
?>

<div class="wrapper" id="<?php echo _themename_get_wrapper_id(); ?>-wrapper">
    <div class="container">
        <div class="row">
            <?php if( is_active_sidebar('left-sidebar') && $layout == 'yes' ): ?>
                <div class="col-3">
                    <?php get_sidebar('left'); ?>
                </div><!-- .col-3 end -->
            <?php endif; ?>
            <div class="col-<?php _themename_main_column_length(); ?>">
                <main class="site-main" role="main">   
                    <?php get_template_part( 'loop', 'single' ); ?>    
                </main>
            </div><!-- .col-6 end -->
            <?php if( is_active_sidebar('right-sidebar') && $layout == 'yes' ): ?>
                <div class="col-3">
                    <?php get_sidebar('right'); ?>
                </div><!-- .col-3 end -->
            <?php endif; ?>
        </div><!-- .row end -->
    </div><!-- .container end -->
</div><!-- .wrapper end -->

<?php get_footer(); ?>