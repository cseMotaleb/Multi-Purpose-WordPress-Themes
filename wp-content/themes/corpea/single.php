<?php get_header(); ?>
  <?php get_template_part('inc/sub-header');?>
        <div class="blog_area section_padding">
            <div class="container">
            <div class="row">
                 <div class="col-md-9">
                    <?php if ( have_posts() ) :  ?> 
                        <?php while ( have_posts() ) : the_post(); ?>
                            <?php get_template_part( 'template-parts/content/content', get_post_format() ); ?>   
                        <?php endwhile; ?> 
                        <?php get_template_part( 'inc/user-profile' ); ?>

                        <?php get_template_part( 'inc/related-post' ); ?>
                        
                        <?php get_template_part( 'inc/cats-related-post' ); ?>  
                        <?php
                            if ( comments_open() || get_comments_number() ) {
                                if ( isset($themesmoon_options['blog-single-comment-en']) && $themesmoon_options['blog-single-comment-en'] ) {
                                   comments_template();
                                }
                            }
                        ?>
                     <?php
                            if ( is_singular( 'post' ) ){
                                $count_post = esc_attr( get_post_meta( $post->ID, '_post_views_count', true) );
                                if( $count_post == ''){
                                    $count_post = 1;
                                    add_post_meta( $post->ID, '_post_views_count', $count_post);
                                }else{
                                    $count_post = (int)$count_post + 1;
                                    update_post_meta( $post->ID, '_post_views_count', $count_post);
                                }
                            }
                        ?>

                    <?php else: ?>
                    <?php get_template_part( 'template-parts/content/content', 'none' ); ?>
                    <?php endif; ?>
                    
                </div> <!-- #content -->
                <?php get_sidebar( ); ?>
            </div> <!-- .row -->
        </div> <!-- .container -->
    </div>
<?php get_footer();?>
