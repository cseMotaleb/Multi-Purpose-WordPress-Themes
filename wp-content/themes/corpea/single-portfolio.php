<?php get_header();?>
    
  <?php get_template_part('inc/sub-header');?>

        <div class="blog_area section_padding about">
            <?php while( have_posts() ): the_post();?>
            <div class="container">
            <div class="row">
                 <div class="col-md-9">
                    <div class="portfolio-single-items">
                        <div class="single-portfolio-img">
                        <?php if (has_post_thumbnail()) { ?>
                        <?php the_post_thumbnail( 'corpea-large', array('alt' => get_the_title()) ); ?>
                        <?php } ?>
                        </div>
                        <h3 class="portfolio-title mr-10">
                            <?php echo esc_html( get_the_title() );?>
                        </h3>
                        <div class="contetn-portfolio">
                            <?php the_content();?>
                        </div>

                    </div>
                            
                    
                        <!-- Related portfolio -->
        
        <div class="portfolio-single-related-post">
            <div class="container">
                <h3 class="related-post-title"><?php echo esc_attr('More Product Photography'); ?></h3>
                <?php

                $terms = get_the_terms( $post->ID , 'portfolio-tag', 'corpea');
                $term_ids = wp_list_pluck($terms,'term_id');

                $second_query = new WP_Query( array(
                    'post_type' => 'portfolio',
                    'tax_query' => array(
                                array(
                                    'taxonomy'  => 'portfolio-tag',
                                    'field'     => 'id',
                                    'terms'     => $term_ids,
                                    'operator'  => 'IN'
                                 )),
                    'posts_per_page'            => 3,
                    'ignore_sticky_posts'       => 1,
                    'post__not_in'              =>array($post->ID)
                ) );


                if($second_query->have_posts()) { ?>

                <div class="row">
                    <?php while ($second_query->have_posts() ) : $second_query->the_post(); ?>
                        <div class="col-sm-6 col-md-4">
                            <div class="single_related">

                                <div class="related-post-img">
                                   <?php if (has_post_thumbnail()) { ?>
                                        <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"> <?php the_post_thumbnail( 'corpea-portfo', array('alt' => get_the_title()) ); ?></a>
                                    <?php } ?> 
                                    <h3 class="portfolio-cat"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
                                    
                                </div>
                                

                                
                                <?php echo get_the_term_list( $post->ID, 'portfolio-tag', '<ul class="portfolio-tag-cont"><li>', '</li>,<li>', '</li></ul>' ); ?>    
                            </div>
                       </div>
                    <?php endwhile; wp_reset_query(); ?>
                </div> <!-- row -->
                <?php } ?>

            </div><!-- portfolio-single-related-post -->
        </div><!-- portfolio-single-related-post --> 
                </div> <!-- #content -->
                <?php get_sidebar( ); ?>
            </div> <!-- .row -->
        </div> <!-- .container -->
    <?php endwhile;?>
    </div>
<?php get_footer();?>
