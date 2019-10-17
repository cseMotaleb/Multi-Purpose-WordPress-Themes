<?php global $themesmoon_options; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php  if ( get_post_meta( get_the_ID(), 'thm_audio_code',true ) ) { ?>
    <div class="featured-wrap">
        <div class="entry-audio embed-responsive embed-responsive-16by9">
            <?php echo get_post_meta( get_the_ID(), 'thm_audio_code',true ); ?>
        </div> <!--/.audio-content -->
                <?php echo themesmoon_social_share( get_the_ID() ); ?>
        </div>   
    <?php } ?>    
    <?php get_template_part( 'template-parts/content/entry-content' ); ?> 
</article> <!--/#post -->
