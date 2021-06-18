
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
                        
                        <p>
                            Posted On
                            <a href="<?php echo get_permalink(); ?>">
                                <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date() ?></time>
                            </a>
                            By <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author(); ?></a>
                        </p>
                        
                    </header><!-- .entry-header -->

                    <div class="entry-content">

                        <?php the_content(); ?>

                    </div><!-- .entry-content -->

                    <footer class="entry-footer">
                    
                    </footer><!-- .entry-footer -->

                </article><!--  article- -->

            <?php endwhile; ?>
      
        <?php else: ?>
            No posts matched your criteria
        <?php endif; ?>

    </main><!-- main end-->

    <!-- sidebar start -->
    <aside>
        
    </aside><!-- sidebar end -->

<?php get_footer(); ?>