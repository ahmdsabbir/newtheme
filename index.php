<?php get_header(); ?> 

<div class="wrapper" id="<?php echo _themename_get_wrapper_id(); ?>-wrapper">

        <div class="row">

        <?php if( is_active_sidebar('left-sidebar') ): ?>

            <div class="<?php _themename_left_sidebarmain_column_length(); ?>">

                <aside role="complementary">
                <?php dynamic_sidebar( 'left-sidebar' ); ?>
                </aside>

            </div><!-- .col-3 end -->

            <?php endif; ?>

            <div class="<?php _themename_main_column_length(); ?>">

                <main class="site-main" role="main">
                    
                    <?php if(have_posts()) : ?>

                        <?php while(have_posts() ): the_post(); ?>

                            <article <?php post_class('mb-4'); ?>>

                                <header class="entry-header">
                                    <h1 class="entry-title">
                                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                            <?php the_title() ?>
                                        </a>
                                    </h1>

                                    <div class="entry-meta">
                                        <?php _themename_post_meta(); ?>
                                    </div><!-- entry-meta end -->
                            
                                    
                                </header><!-- .entry-header -->

                                <div class="entry-content">

                                    <?php the_excerpt(); ?>

                                    <?php _themename_read_more_link(); ?>
                                    

                                </div><!-- .entry-content -->

                                <footer class="entry-footer">
                                    entry footer
                                </footer><!-- .entry-footer -->

                            </article><!--  article- -->

                        <?php endwhile; ?>

                        <?php the_posts_pagination();?>
                    <?php else: ?>
                        <p>
                            <?php esc_html_e('No posts matched your criteria', '_themename'); ?>
                        </p>
                    <?php endif; ?>
                    
                </main>

            </div><!-- .col-6 end -->

            <?php if( is_active_sidebar('right-sidebar') ): ?>

            <div class="<?php _themename_right_sidebarmain_column_length(); ?>">

                <aside role="complementary">
                    <?php dynamic_sidebar( 'right-sidebar' ); ?>
                </aside>

            </div><!-- .col-3 end -->

            <?php endif; ?>

        </div><!-- .row end -->

    </div><!-- .#content end -->

</div><!-- .wrapper end -->

<?php get_footer(); ?>