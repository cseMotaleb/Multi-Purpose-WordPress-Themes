<?php get_header(); ?>
  <?php get_template_part('inc/sub-header');?>
        <div class="blog_area section_padding about">
    <div class="container">
        <div id="content" class="site-content" role="main">
            <?php
                $index = 1;
                $col = get_theme_mod( 'blog_column', 4 );
                if ( have_posts() ) :
                    while ( have_posts() ) : the_post(); 
                        if ( $index == '1' ) { ?>
                            <div class="row">
                        <?php }?>
                                <div class="separator-wrapper col-md-<?php echo esc_attr($col);?>">
                                   <?php get_template_part( 'template-parts/content/content', get_post_format() ); 
                                   ?>
                                </div>
                        <?php  if ( $index == (12/esc_attr($col) )) { ?>
                            </div><!--/row-->
                        <?php $index = 1;
                        }else{
                            $index++;   
                        }
                    endwhile;
                else:
                     get_template_part( 'template-parts/content', 'none' );
                endif;
                if($index !=  1 ){ ?>
                   </div><!--/row-->
                <?php }
            ?>
           <?php                                 
                $page_numb = max( 1, get_query_var('paged') );
                $max_page = $wp_query->max_num_pages;
                echo themesmoon_pagination( $page_numb, $max_page ); 
            ?>
        </div> <!-- .site-content -->
    </div> <!-- .container -->
</div>


<?php get_footer();