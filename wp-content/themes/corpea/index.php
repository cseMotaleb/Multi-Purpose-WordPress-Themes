<?php
 get_header(); ?>
  <section id="main" class="generic-padding">
   <?php get_template_part('inc/sub-header');?>
      	<div class="container">
       		<div class="row">
       			 
          		<div class="col-md-9">
				    <?php
					if ( have_posts() ) {
					// Load posts loop.
					while ( have_posts() ) {
						the_post();
						get_template_part( 'template-parts/content/content' );
					}

					// Previous/next page navigation.
					

					} else {

					// If no content, include the "No posts found" template.
					get_template_part( 'template-parts/content/content', 'none' );

					}
					?>
				<?php themesmoon_pagination(); ?>
				</div><!-- col-md-9 -->
				<?php get_sidebar(); ?>

			</div><!-- row -->
			
		</div><!-- .site-main -->
	</section><!-- .content-area -->

<?php
get_footer();
