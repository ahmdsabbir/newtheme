<?php
/**
 * The Archive template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 * 
 * _themename_get_wrapper_id() in /lib/helpers
 *
 * @package _themename
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<?php get_header(); ?> 

<div class="wrapper" id="<?php echo _themename_get_wrapper_id(); ?>-wrapper">
    <div class="container">
        <div class="row">
            <?php if( is_active_sidebar('left-sidebar') ): ?>
                <div class="col-3">
                    <?php get_sidebar('left'); ?>
                </div><!-- .col-3 end -->
            <?php endif; ?>
            <div class="col-<?php _themename_main_column_length(); ?>">
                <div>
                    <?php
                    the_archive_title('<h1>', '</h1>');
                    the_archive_description('<p>', '</p>');
                    ?>
                </div>
                <main class="site-main" role="main">
                    <?php get_template_part( 'loop', 'archive' ); ?> 
                </main>
            </div><!-- .col-6 end -->
            <?php if( is_active_sidebar('right-sidebar') ): ?>
                <div class="col-3">
                    <?php get_sidebar('right'); ?>
                </div><!-- .col-3 end -->
            <?php endif; ?>
        </div><!-- .row end -->
    </div><!-- .container end -->
</div><!-- .wrapper end -->

<?php get_footer(); ?>