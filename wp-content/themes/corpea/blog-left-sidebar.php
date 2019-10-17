<?php 
/**
* Template Name: Blog Left Sidebar 
*/
get_header();?>

<?php get_template_part('inc/sub-header')?>
<section class="blog_area section_padding about">


    <div class="container">
        <div class="row">

            <?php get_sidebar(); ?>

            <div id="content" class="site-content col-md-9" role="main">
                <?php

                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array('post_type' => 'post','paged' => $paged);
                query_posts($args); 

                if ( have_posts() ) :
                    while ( have_posts() ) : the_post();
                        get_template_part( 'template-parts/content/content', get_post_format() );
                    endwhile;
                else:
                    get_template_part( 'template-parts/content/content', 'none' );
                endif; ?>
        <?php  themesmoon_pagination(); ?>
              
            </div>

        </div> <!-- .row -->
    </div><!-- .container -->
</section> 

<?php get_footer();