<!--template: content-link--> 
<article class="card" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
     
    <!--post excerpt-->
    <?php quicksand_entry_excerpt(); ?> 

    <!--post title-->
    <?php quicksand_entry_title_postformat_gallery(); ?>

    <!--post-meta--> 
    <?php quicksand_entry_meta(); ?>

    <!--post-content--> 
    <?php quicksand_entry_content_single(); ?> 
    
    <!--edit-link-->
    <?php quicksand_edit_post(); ?> 

</article><!-- .post-->  