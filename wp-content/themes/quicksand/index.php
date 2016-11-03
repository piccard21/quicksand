<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage quicksand
 * @since Quicksand 0.2.1
 */
//phpinfo();
get_header();
?>

<!--template: index-->
<div class="row">
    <!--  site-content-area -->  
    <main id="primary" class="site-content-area">  

        <!-- post-list -->
        <?php
        if (have_posts()) :
            // header for screen-readers
            if (is_home() && !is_front_page()) :
                ?>
                <header>
                    <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                </header> 
                <?php
            endif;

            // show posts in masonry-style 
            $showMasonry = !is_single() && !is_attachment() && !is_page() && count($posts) > 3 && get_theme_mod('qs_content_masonry', quicksand_get_color_scheme()['settings']['qs_content_masonry']);
            if ($showMasonry) {
                ?><div class="card-columns"> <?php
                }


                while (have_posts()) : the_post();

                    /*
                     * Include the Post-Format-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                     * 
                     * This is only for the listing part.
                     * For single presention have a look inside ... single.php
                     */
                    get_template_part('template-parts/content', get_post_format());

                endwhile;

                // show posts in masonry-style
                if ($showMasonry) {
                    ?></div> <?php
            }


            // pagination
            quicksand_bs_style_paginator();
        else :
            get_template_part('template-parts/content', 'none');
        endif;
        ?> 
    </main><!-- .site-content-area  -->  

    <?php get_sidebar(); ?>

</div><!-- row--> 

<?php get_footer(); ?>