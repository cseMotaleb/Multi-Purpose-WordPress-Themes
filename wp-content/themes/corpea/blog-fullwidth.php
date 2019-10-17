<?php 
/**
* Template Name: Blog Fullwidth 
*/
get_header();?>

<?php get_template_part('inc/sub-header')?>
<section class="blog_area section_padding about">

    <div class="container">
            <div class="row">
            <?php
                $paged  = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args   = array(
                                'post_type' => 'post',
                                'paged'     => $paged
                            );

                $thequery   = new WP_Query($args); 

                $index = 1;
                $col = get_theme_mod( 'blog_column', 6 );

                if ( $thequery->have_posts() ) :
                while ( $thequery->have_posts() ) : $thequery->the_post();
                    if ( $index == '1' ) { ?>
                        
                        <?php } ?>
                        <div class="separator-wrapper col-xs-12 col-sm-6 col-md-<?php echo esc_attr($col);?>">
                            <?php get_template_part( 'template-parts/content/content', get_post_format() ); ?>
                        </div>
                        <?php  if ( $index == (12/esc_attr($col) )) { ?>
                        
                    <?php $index = 1;
                    }else{
                        $index++;   
                    }                        
                endwhile;
                else:
                get_template_part( 'template-parts/content/content', 'none' );
                endif;
                ?>

  <?php  themesmoon_pagination(); ?>
                </div>
               
            </div>
        </div> <!-- .site-content -->
    </div><!-- .container -->
</section> 

<?php get_footer();