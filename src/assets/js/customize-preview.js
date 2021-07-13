import $ from 'jquery';


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

