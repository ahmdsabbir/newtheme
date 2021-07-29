<?php
/**
 *Template Name: Right Sidebar Page
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<?php get_header(); ?> 

<div class="wrapper" id="page-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-9">
                <main class="site-main" role="main">  
                    <?php get_template_part( 'loop', 'page' ); ?> 
                </main>
            </div><!-- .col-9 end -->
            <?php if( is_active_sidebar('right-sidebar') ): ?>
                <div class="col-3">
                    <?php get_sidebar('right'); ?>
                </div><!-- .col-3 end -->
            <?php endif; ?>
        </div><!-- .row end -->
    </div><!-- .container end -->
</div><!-- .wrapper end -->

<?php get_footer(); ?>