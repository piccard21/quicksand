<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage wp-bs-theme-simple
 * @since WP-bs-theme-simple 0.0.1
 */
?>


</div><!-- site-content--> 
</div><!-- .site-main-container -->


<!-- site-footer-widgetbar -->
<div class="container site-footer-widgetbar">  
    <!-- site-sidebar widget-area --> 
    <?php get_sidebar('content-bottom'); ?>   
</div><!-- .site-sidebar.widget-area -->


<?php
$secondary_nav_options = array(
    'theme_location' => 'secondary',
    'depth' => 1,
    'container' => '',
    'container_class' => '',
    'menu_class' => 'nav navbar-nav',
    'fallback_cb' => 'WP_bs_theme_simple_navwalker::fallback',
    'walker' => new WP_bs_theme_simple_navbar_navwalker()
);
?> 

<!-- site-info --> 
<footer class="container-fluid site-footer">
    <div class="row">
        <div class="site-social">
            <div class="text-xs-center text-lg-right"> 
                <?php wp_bs_theme_simple_social_media_icons(); ?>
            </div>
        </div>
        <div class="nav-wrapper">
            <div class="text-xs-center text-lg-left">
                <!--secondary navigation-->
                <?php wp_nav_menu($secondary_nav_options); ?>
            </div>
        </div>
    </div>
</footer><!-- site-info --> 
<?php wp_footer(); ?>
</body>
</html>