<form action="" role="search"
method="get" action="<?php echo esc_url( home_url('/')) ?>">

        <label><span class="screen-reader-text"><?php echo esc_html_x( 'Search For', 'label', '_themename' ); ?></span></label>
    
        <input type="search" name="s" placeholder="Search" value="<?php echo esc_attr(get_search_query( )); ?>"/>
        <button type="submit">Search  </button>

</form>