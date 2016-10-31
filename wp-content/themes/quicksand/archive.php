<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage quicksand
 * @since Quicksand 0.2.1
 */
get_header();
?>

<!--template: archive-->
<div class="row">

    <!--  site-content-area -->  
    <main id="primary" class="site-content-area">  

        <?php if (have_posts()) : ?>

            <!--Month: February 2016--> 
            <div class="card"> 
                <div class="card-block">
                    <?php 
                    the_archive_title('<h4 class="card-title">', '</h4>');
                    the_archive_description('<h6 class="card-subtitle text-muted">', '</h6>'); 
                    ?>
                </div>
            </div> 
            
            <?php 
            while (have_posts()) : the_post();

                /*
                 * Include the Post-Format-specific template for the content.
                 * If you want to override this in a child theme, then include a file
                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                 */
                get_template_part('template-parts/content', get_post_format());

            // End the loop.
            endwhile;
            
            // pagination
            quicksand_bs_style_paginator();
            
        // If no content, include the "No posts found" template.
        else :
            get_template_part('template-parts/content', 'none');
        endif;
        ?>

    </main><!--  .site-content-area --> 
    <?php get_sidebar(); ?>
</div> 

<?php get_footer(); ?>
