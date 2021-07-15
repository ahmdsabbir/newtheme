<?php
/**
 * The 404 page
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
            <div class="col-12">
                <main class="site-main" role="main">
                    <strong>
                        <?php echo esc_html__( 'Looks like you just got lost, silly!', '_themename' ); ?>
                    </strong>
                </main>
            </div><!-- .col-6 end --> 
        </div><!-- .row end -->
    </div><!-- .container end -->
</div><!-- .wrapper end -->

<?php get_footer(); ?>