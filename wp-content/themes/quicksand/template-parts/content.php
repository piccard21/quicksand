<!--template: content-->
<!-- post --> 
<article id="post-<?php the_ID(); ?>" <?php post_class("card"); ?>>   
    <!--post thumbnail-->
    <?php quicksand_entry_thumbnail(); ?> 

    <!--post title-->
    <?php quicksand_entry_title(); ?>

    <!--post-meta--> 
    <?php quicksand_entry_meta(); ?>

    <!--post-content--> 
    <?php 
    if (!is_singular()) {
        quicksand_entry_excerpt();
    } else { 
        quicksand_the_entry_content(); 
    }
    ?> 
    
    <!--edit-link-->
    <?php quicksand_entry_tags(); ?> 
    
    <!--author-bio-->
    <?php quicksand_author_biography(); ?> 
    
    <!--edit-link-->
    <?php quicksand_edit_post(); ?> 

</article><!-- .post-->  