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

  
<div class="sm-col-span-12 md-col-span-12 md-order-2">
    <main class="site-main" role="main">
        <strong>
            <?php echo esc_html__( 'Looks like you just got lost, silly!', '_themename' ); ?>
        </strong>
    </main>
</div><!-- .col-6 end --> 

<?php get_footer(); ?>