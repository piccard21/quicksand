/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

(function ($) {
    // if not in design-mode, don't go any further
    if (typeof wp.customize !== 'function') {
        return;
    }

    // Site title and description.
    wp.customize('blogname', function (value) {
        value.bind(function (to) {
            $('.site-title').text(to);
        });
    });
    wp.customize('blogdescription', function (value) {
        value.bind(function (to) {
            $('.site-description').text(to);
        });
    });

    wp.customize('header_textcolor', function (value) {
        value.bind(function (to) {
            $('.site-info-wrapper .site-title, .site-info-wrapper .site-description').css('color', to);
        });
    });

    wp.customize('wbts_background_content_color', function (value) {
        value.bind(function (to) {
            $('.site-main-container .navigation.pagination .nav-links a:hover.page-numbers ,.site-main-container .navigation.pagination .nav-links .page-numbers.current').css('color', to);
            $('.site-main-container, .site-main-container .navigation.pagination .nav-links .page-numbers').css('background', to);
        });
    });

    wp.customize('wbts_main_text_color', function (value) {
        value.bind(function (to) {
            $('.site-main-container').css('color', to);
        });
    });

    wp.customize('wbts_secondary_text_color', function (value) {
        value.bind(function (to) {
            $('.site-main-container .site-content h1, .site-main-container .site-content h2, .site-main-container .site-content h3, .site-main-container .site-content h4, .site-main-container .site-content h5, .site-main-container .site-content h6,         .site-main-container .site-content h1>a, .site-main-container .site-content h2>a, .site-main-container .site-content h3>a, .site-main-container .site-content h4>a, .site-main-container .site-content h5>a, .site-main-container .site-content h6>a').css('color', to);
        });
    });

    wp.customize('wbts_link_color', function (value) {
        value.bind(function (to) {
            $('.site-main-container a, .site-footer-info a, .site-main-container .navigation.pagination .nav-links .page-numbers,.site-main-container .navigation.pagination .nav-links a:hover.page-numbers , .site-main-container .navigation.pagination .nav-links .page-numbers.current ').css('color', to);
            $('.site-main-container .navigation.pagination .nav-links .page-numbers, .site-main-container .navigation.pagination .nav-links a:hover.page-numbers , .site-main-container .navigation.pagination .nav-links .page-numbers.current').css('border-color', to);
        });
    });

    /**
     * add style-tag to head for hover-effect
     * because the css()-function adds an inline style, it is not possible
     * to add a :hover function
     * Instead a whole style-tag including is added or replaced
     * 
     * @param {type} wbts_nav_background_color
     * @param {type} wbts_nav_link_color 
     */
    var customizeNavbarHover = function(wbts_nav_background_color, wbts_nav_link_color) { 
            var style, el;

            style = '<style class="hover-styles">'
                    + '.site-nav-container, ' 
                    + '.site-nav-container nav.navbar,'
                    + '.site-nav-container .dropdown-menu { '
                    + 'background: ' + wbts_nav_background_color + ' !important;'
                    + '}'
                    + '#menu-primary .menu-item .nav-link,'
                    + '#menu-primary .menu-item .dropdown-item { '
                    + 'color: ' + wbts_nav_link_color + ' !important;'
                    + '}'
                    + '#menu-primary .menu-item .dropdown-item:hover { '
                    + 'color: ' + wbts_nav_background_color + ' !important;'
                    + 'background: ' + wbts_nav_link_color + ' !important;'
                    + '}'
                    + '</style>';

            el = $('.hover-styles');

            if (el.length) {
                el.replaceWith(style);
            } else {
                $('head').append(style);
            }
    }
    
    wp.customize('wbts_nav_link_color', function (value) {
        value.bind(function (wbts_nav_link_color) {
            var wbts_nav_background_color = wp.customize.value('wbts_nav_background_color')();    
            customizeNavbarHover(wbts_nav_background_color, wbts_nav_link_color);

        });
    });
    wp.customize('wbts_nav_background_color', function (value) {
        value.bind(function (wbts_nav_background_color) { 
            var wbts_nav_link_color = wp.customize.value('wbts_nav_link_color')();  
            customizeNavbarHover(wbts_nav_background_color, wbts_nav_link_color);
        });
    });
    wp.customize('wbts_header_background_color', function (value) {
        value.bind(function (to) {
            $('.site-info-wrapper.jumbotron').css('background', to);
        });
    });
    wp.customize('wbts_footer_background_color', function (value) {
        value.bind(function (to) {
            $('.site-footer-info .site-copyright a:hover').css('color', to);
            $('.site-footer-info .row').css('background', to);
        });
    });
    wp.customize('wbts_footer_link_color', function (value) {
        value.bind(function (to) {
            $('.site-footer-info .site-copyright a ').css('color', to);
            $('.site-footer-info .site-copyright a:hover').css('color', to);
        });
    });
})(jQuery); 