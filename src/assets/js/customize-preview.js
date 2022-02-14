import $ from 'jquery';

//postMessage refresh for Colors
wp.customize( '_themename_primary_color', (value) => {
    value.bind( (to) => {
        $('#_themename-stylesheet-inline-css').html(
        	`
			    :root {
                    --clr-primary: ${to};
                }
        	`);
    } )
})



// postMessage refresh for footer_info
wp.customize( '_themename_site_info', (value) => {
    value.bind( (to) => {
        $('#footer-info').html(to);
    })
})

wp.customize( '_themename_display_author_info', (value) => {
    value.bind( (to) => {
        if(to) {
            $('#author-info').show();
        } else {
            $('#author-info').hide();
        }
    } )
})


wp.customize('_themename_display_breadcrumb', (value) => {
    value.bind( (to) => {
        if(to) {
            $('#breadcrumb').show();
        } else {
            $('#breadcrumb').hide();
        }
    })
} )

wp.customize('_themename_display_related_posts', (value) => {
    value.bind( (to) => {
        if(to) {
            $('#related-posts').show();
        } else {
            $('#related-posts').hide();
        }
    })
} )

wp.customize('_themename_display_post_navigation', (value) => {
    value.bind( (to) => {
        if(to) {
            $('.post-navigation').show();
        } else {
            $('.post-navigation').hide();
        }
    })
} )

wp.customize('_themename_display_post_share', (value) => {
    value.bind( (to) => {
        if(to) {
            $('#post-share').show();
        } else {
            $('#post-share').hide();
        }
    })
} )






