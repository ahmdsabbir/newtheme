
<?php get_header(); ?> 

    <!-- main start -->
    <main role="main">

        <?php if(have_posts()) : ?>
            <?php while(have_posts() ): the_post(); ?>

                <article>
                    <header class="entry-header">
                        <h1>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                <?php the_title() ?>
                            </a>
                        </h1>

                        <div class="post-meta">
                            <?php newtheme_post_meta(); ?>
                        </div><!-- post-meta end -->
                
                        
                    </header><!-- .entry-header -->

                    <div class="entry-content">

                        <?php the_excerpt(); ?>

                        <?php newtheme_read_more_link(); ?>

                    </div><!-- .entry-content -->

                    <footer class="entry-footer">
                    
                    </footer><!-- .entry-footer -->

                </article><!--  article- -->

            <?php endwhile; ?>
      
        <?php else: ?>
            <p>
                <?php esc_html_e('No posts matched your criteria', 'newtheme'); ?>
            </p>
        <?php endif; ?>

    </main><!-- main end-->

    <!-- sidebar start -->
    <aside role="complementary">
        <h3>Sidebar</h3>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi quae ipsum iusto autem laborum. Iure laborum dolorum ut facere sed fuga ipsa consequatur illum quo. Non sequi voluptate unde! Deleniti enim rerum voluptates rem amet. Eaque fuga ratione aliquid neque fugit. Debitis nobis officiis consequuntur distinctio enim fugit consequatur itaque consectetur iste quis. Aperiam deserunt hic magnam dolor possimus consectetur tempora deleniti accusantium amet illo
    </aside><!-- sidebar end -->

<?php get_footer(); ?>