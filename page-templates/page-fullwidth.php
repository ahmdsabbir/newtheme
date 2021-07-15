<?php
/**
 * Template Name: Full Width Page
 */
?>
<?php get_header(); ?>

<div class="wrapper" id="page-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <main class="site-main" role="main">  
                    <?php get_template_part( 'loop', 'page' ); ?> 
                </main>
            </div><!-- .col-12 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</div><!-- .wrapper end -->

<?php get_footer(); ?>