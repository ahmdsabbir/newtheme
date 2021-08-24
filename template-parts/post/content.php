<article <?php post_class(); ?>>

    <header class="entry-header">
       <?php get_template_part( '/template-parts/components/entry/header', get_post_format( ) ); ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php get_template_part( '/template-parts/components/entry/content', get_post_format( ) ); ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <div class="container">
            <div class="md-4 sm-12">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus ab sint officiis facilis nemo corporis, molestiae officia quos a? Illum itaque dicta temporibus enim, sit repellendus quae dolores corporis repudiandae.</div>
            <div class="md-4 sm-12">Modi labore dolor consectetur quae architecto doloribus fugit. Commodi doloribus et repudiandae! In maiores necessitatibus quisquam exercitationem molestiae maxime voluptatibus, adipisci nihil nulla laborum esse magni, nemo ipsa enim deleniti.</div>
            <div class="md-4 sm-12">Obcaecati voluptatem eius rem labore iste esse voluptatum excepturi illo, reprehenderit nesciunt minus eligendi deserunt nobis a, ad ea soluta, quam ducimus aut in quo laudantium. Dignissimos provident quo eaque!</div>
        </div>
        <?php get_template_part( '/template-parts/components/entry/footer', get_post_format( ) ); ?>
    </footer><!-- .entry-footer -->

</article><!--  article- -->