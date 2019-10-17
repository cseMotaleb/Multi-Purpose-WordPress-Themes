<?php global $themesmoon_options; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php  if ( get_post_meta( get_the_ID(), 'thm_qoute',true ) ) { ?>
    <div class="featured-wrap">
        <div class="entry-qoute">
            <blockquote>
                <p><?php echo esc_html(get_post_meta( get_the_ID(),'thm_qoute',true )); ?></p>
                <small><?php echo esc_html(get_post_meta( get_the_ID(), 'thm_qoute_author',true )); ?></small>
            </blockquote>
        </div> 
        <?php echo themeum_social_share( get_the_ID() ); ?>            
    </div>
    <?php } ?>

    <?php get_template_part( 'template-parts/content/entry-content' ); ?> 

</article> <!--/#post -->