<?php global $themesmoon_options; ?>

<div class="blog_content">
     <div class="entry-blog-meta">
          <h2>
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        
    </h2> <!-- //.entry-title --> 
    
    <?php if (isset($themesmoon_options['blog-author']) && $themesmoon_options['blog-author'] ) { ?>

        <div class="entry-blog-meta-list author-by">
            <div class="author-avatar">
               <?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?>
            </div>
            <div class="author-avatar-text">
                <?php if ( get_the_author_meta('first_name') != "" || get_the_author_meta('last_name') != "" ) { ?>
                    <p class="author"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author_meta('first_name');?> <?php echo get_the_author_meta('last_name');?></a></p>
                <?php } else { ?>
                    <p class="author"> <?php the_author_posts_link() ?></p>
                <?php }?>
               
              
            </div>
            <span class="cats"><?php echo get_the_category_list(', '); ?></span>
               <span class="entry-date"><time datetime="<?php the_time( 'c' ); ?>"><?php the_time('M j,  Y'); ?></time></span>,
        </div>
    <?php }?> 
       <div class="entry-blog-meta-list social-share-number">
        <?php if (isset($themesmoon_options['blog-view']) && $themesmoon_options['blog-view'] ) { ?>
            <div class="share-count">
                <?php
                    $visitor_count = get_post_meta( $post->ID, '_post_views_count', true);
                    if( $visitor_count == '' ){ $visitor_count = 0; }
                    if( $visitor_count >= 1000 ){
                        $visitor_count = round( ($visitor_count/1000), 2 );
                        $visitor_count = $visitor_count.'k';
                    }
                ?>
                <span class="number"><?php echo esc_attr( $visitor_count ); ?></span><span><?php _e('Views','corpea');?></span>
            </div>
        <?php }?> 
        <?php if (isset($themesmoon_options['blog-social']) && $themesmoon_options['blog-social'] ) { ?>
            <?php get_template_part( 'template-parts/content/social-buttons' ); ?>
        <?php }?> 
     </div> 
  
</div> <!--/.entry-meta -->
  
       <?php if ( is_single() ) {
        the_content();
    } else {
        echo themesmoon_the_excerpt_max_charlength(100);
        if ( isset($themesmoon_options['blog-continue-en']) && $themesmoon_options['blog-continue-en']==1 ) {
            if ( isset($themesmoon_options['blog-continue']) && $themesmoon_options['blog-continue'] ) {
                $continue = esc_html($themesmoon_options['blog-continue']);
                echo '<p class="wrap-btn-style"><a class="btn btn-style" href="'.get_permalink().'">'. $continue .'</a></p>';
            } else {
                echo '<p class="wrap-btn-style"><a class="btn btn-style" href="'.get_permalink().'">'. esc_html__( 'Continue Reading', 'corpea' ) .'</a></p>';
            } 
        }
 
    } 
    wp_link_pages( array(
        'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'corpea' ) . '</span>',
        'after'       => '</div>',
        'link_before' => '<span>',
        'link_after'  => '</span>',
    ) );
    ?>
   
</div>




<?php if ( is_single() ) { ?>
    <div class="post-meta-info">
              
        <?php if (isset($themesmoon_options['blog-comment']) && $themesmoon_options['blog-comment'] ) { ?>
            <?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
            <div class="post-meta-info-list comments">
                <i class="fa fa-comments-o"></i>
                <div class="post-meta-info-list-in comments-in">
                    <p><?php _e('Comments','corpea');?></p>
                    <?php comments_popup_link( '<span class="leave-reply">' . esc_html__( 'No comment', 'corpea' ) . '</span>', esc_html__( 'One comment', 'corpea' ), esc_html__( '% comments', 'corpea' ) ); ?>
                </div>
            </div>
            <?php endif; //.comment-link ?>
        <?php }?> 

      
    </div>
<?php }?> 




