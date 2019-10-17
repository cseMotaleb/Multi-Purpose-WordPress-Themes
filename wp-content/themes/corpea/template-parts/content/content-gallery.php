<?php global $themesmoon_options; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php  if ( get_post_meta( get_the_ID(),'thm_gallery_images',false) ) { ?>
    <div class="featured-wrap">
        <div class="entry-content-gallery">
            <?php $slides = get_post_meta( get_the_ID(),'thm_gallery_images',false); ?>
            <?php if(count($slides) > 0) { ?>
            <div id="blog-gallery-slider<?php echo get_the_ID(); ?>" class="carousel slide blog-gallery-slider">
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <?php $slide_no = 1; ?>
                    <?php foreach( $slides as $slide ) { ?>
                    <div class="item <?php if($slide_no == 1) echo 'active'; ?>">
                        <?php $images = wp_get_attachment_image_src( $slide, 'blog-medium' ); ?>
                        <img class="img-responsive" src="<?php echo esc_url($images[0]); ?>" alt="">
                    </div>
                    <?php $slide_no++; ?>
                    <?php } ?>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#blog-gallery-slider<?php echo get_the_ID(); ?>" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="right carousel-control" href="#blog-gallery-slider<?php echo get_the_ID(); ?>" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
            <?php } ?>
        </div><!--/.entry-content-gallery-->
        <?php echo themesmoon_social_share( get_the_ID() ); ?>
    </div> 
    <?php } ?>

    <?php get_template_part( 'template-parts/content/entry-content' ); ?> 

</article> <!--/#post -->



