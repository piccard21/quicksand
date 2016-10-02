<?php
/**
 * WP-bs-theme-simple Theme Customizer 
 *
 * @since WP-bs-theme-simple 0.0.1
 *
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @see https://codex.wordpress.org/Theme_Customization_API
 * 
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function wp_bs_theme_simple_customize_register($wp_customize) {
    // build-in 
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    // Colors Section
    $colors = array();
    $colors[] = array(
        'slug' => 'wbts_text_color',
        'default' => '#686868',
        'label' => __('Content Text Color', 'wp-bs-theme-simple')
    );
    $colors[] = array(
        'slug' => 'wbts_link_color',
        'default' => '#cecece',
        'label' => __('Content Link Color', 'wp-bs-theme-simple')
    );
    $colors[] = array(
        'slug' => 'wbts_background_color',
        'default' => '#ffffff',
        'label' => __('Content Background Color', 'wp-bs-theme-simple')
    );
    $colors[] = array(
        'slug' => 'wbts_background_color',
        'default' => '#ffffff',
        'label' => __('Content Background Color', 'wp-bs-theme-simple')
    );
    $colors[] = array(
        'slug' => 'wbts_nav_link_color',
        'default' => '#ffffff',
        'label' => __('Navbar Link Color', 'wp-bs-theme-simple')
    );
    $colors[] = array(
        'slug' => 'wbts_nav_background_color',
        'default' => '#cecece',
        'label' => __('Navbar Background Color', 'wp-bs-theme-simple')
    );

    foreach ($colors as $color) {
        $wp_customize->add_setting(
                $color['slug'], array(
            'default' => $color['default'],
            'transport' => 'postMessage',
                )
        );

        $wp_customize->add_control(
                new WP_Customize_Color_Control(
                $wp_customize, $color['slug'], array(
            'label' => $color['label'],
            'section' => 'colors',
            'settings' => $color['slug'])
                )
        );
    }

    /* Theme Section */
    
    /* header fullwidth
     * transport: refresh */
    $wp_customize->add_section('wp_bs_theme_simple_theme', array(
        'title' => __('Theme Options', 'wp-bs-theme-simple'),
        'priority' => 35,
    ));

    $wp_customize->add_setting("wp_bs_theme_simple_nav_fullwidth", array(
        'type' => 'theme_mod',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('wp_bs_theme_simple_nav_fullwidth', array(
        'label' => __("Navigation Fullwidth:", 'wp-bs-theme-simple'),
        'section' => 'wp_bs_theme_simple_theme',
        'type' => 'checkbox',
        'settings' => 'wp_bs_theme_simple_nav_fullwidth',
        'priority' => 12,
    ));

    // Google Fonts
    // eiegenes Object erstellen
//    $fonts = array();
//
//    function get_font_name($font) {
//        return split(":", $font)[0];
//    }
//
//    $fonts = array_map("get_font_name", wp_bs_theme_simple_get_google_fonts());
//
//    $wp_customize->add_setting('wp_bs_theme_simple_header_google_fonts', array(
//        'capability' => 'edit_theme_options',
//        'type' => 'option', // ????
//        'sanitize_callback' => 'absint'
//    ));
//
//    $wp_customize->add_control('themename_page_test', array(
//        'label' => __('Google Fonts', 'wp-bs-theme-simple'),
//        'section' => 'wp_bs_theme_simple_theme',
//        'type' => 'select',
//        'settings' => 'wp_bs_theme_simple_header_google_fonts',
//        'choices' => $fonts,
//    ));
}

add_action('customize_register', 'wp_bs_theme_simple_customize_register');

/**
 * integrate a scoial-media-menu
 * 
 * @see https://www.competethemes.com/blog/social-icons-wordpress-menu-theme-customizer/
 * 
 * @return string
 */
function wp_bs_theme_simple_social_media_array() {
    /* store social site names in array */
    $social_sites = array('twitter', 'facebook', 'google-plus', 'flickr', 'pinterest', 'youtube', 'tumblr', 'dribbble', 'rss', 'linkedin', 'instagram', 'email');

    return $social_sites;
}

function wp_bs_theme_simple_add_social_sites_customizer($wp_customize) {

    $wp_customize->add_section('wp_bs_theme_simple_social_settings', array(
        'title' => __('Social Media Icons', 'text-domain'),
        'priority' => 35,
    ));

    $social_sites = wp_bs_theme_simple_social_media_array();
    $priority = 5;

    foreach ($social_sites as $social_site) {

        $wp_customize->add_setting("$social_site", array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw'
        ));

        $wp_customize->add_control($social_site, array(
            'label' => __("$social_site url:", 'text-domain'),
            'section' => 'wp_bs_theme_simple_social_settings',
            'type' => 'text',
            'priority' => $priority,
        ));

        $priority = $priority + 5;
    }
}

/* add settings to create various social media text areas. */
add_action('customize_register', 'wp_bs_theme_simple_add_social_sites_customizer');


/*
 * template-tag:
 * 
 * takes user input from the customizer and outputs linked social media icons 
 */

function wp_bs_theme_simple_social_media_icons() {

    $social_sites = wp_bs_theme_simple_social_media_array();

    /* any inputs that aren't empty are stored in $active_sites array */
    foreach ($social_sites as $social_site) {
        if (strlen(get_theme_mod($social_site)) > 0) {
            $active_sites[] = $social_site;
        }
    }

    /* for each active social site, add it as a list item */
    if (!empty($active_sites)) {
        echo '<ul class="list-inline">';

        foreach ($active_sites as $active_site) {

            /* setup the class */
            $class = 'fa fa-' . $active_site;

            if ($active_site == 'email') {
                ?>                 
                <li class="d-inline">
                    <a  class="<?php echo $active_site; ?>" target="_blank" href="<?php echo esc_url(get_theme_mod($active_site)); ?>">
                        <span class="fa-stack fa-lg">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-envelope fa-stack-1x fa-inverse" title="<?php printf(__('%s icon', 'text-domain'), $active_site); ?>"></i>
                        </span>
                    </a>
                </li> 
            <?php } else { ?> 
                <li class="d-inline">
                    <a  class="<?php echo $active_site; ?>" target="_blank" href="<?php echo esc_url(get_theme_mod($active_site)); ?>">
                        <span class="fa-stack fa-lg">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa <?php echo esc_attr($class); ?> fa-stack-1x fa-inverse" title="<?php printf(__('%s icon', 'text-domain'), $active_site); ?>"></i>
                        </span>
                    </a>
                </li> 
                <?php
            }
        }
        echo "</ul>";
    }
}
