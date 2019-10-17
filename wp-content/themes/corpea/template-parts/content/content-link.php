<?php global $themesmoon_options; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php  if ( get_post_meta( get_the_ID(), 'thm_link',true ) ) { ?>
    <div class="featured-wrap">
        <div class="entry-link">
            <h4><?php echo esc_url( get_post_meta( get_the_ID(), 'thm_link',true ) ); ?></h4>
        </div>     
        <?php echo themesmoon_social_share( get_the_ID() ); ?>
    </div>
    <?php } ?>

    <?php get_template_part( 'template-parts/content/entry-content' ); ?> 

</article> <!--/#post -->