import $ from 'jquery';


// selective refresh for footer_info
wp.customize( '_themename_site_info', (value) => {
    value.bind( (to) => {
        $('#footer-info').html(to);
    })
} )

