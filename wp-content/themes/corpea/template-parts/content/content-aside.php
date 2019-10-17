<?php global $themesmoon_options; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if (!is_single()) { ?>
	<div class="row">
	<?php if ( has_post_thumbnail() ){
			$col = 'col-sm-6';
		}else {
		$col = 'col-sm-12';
		} ?>
	    <?php if ( has_post_thumbnail() ) { ?>
	        <div class="featured-wrap <?php echo $col;?>"><a href="<?php the_permalink(); ?>" rel="bookmark">
	            <?php the_post_thumbnail('blog-medium', array('class' => 'img-responsive')); ?>
	        </a>
	        <?php echo themesmoon_social_share( get_the_ID() ); ?>
	        </div>
	    <?php } ?>
		<div class="<?php echo $col;?>">
		    <?php get_template_part( 'post-format/entry-content' ); ?> 
		</div>
	</div>
	<?php } else { ?>
    <?php if ( has_post_thumbnail() ) { ?>
        <div class="featured-wrap"><a href="<?php the_permalink(); ?>" rel="bookmark">
            <?php the_post_thumbnail('blog-medium', array('class' => 'img-responsive')); ?>
        </a>
        <?php echo themesmoon_social_share( get_the_ID() ); ?> 
        </div>
    <?php } ?>
	    <?php get_template_part( 'template-parts/entry-content' ); ?> 

	<?php }  ?>
</article> <!--/#post-->