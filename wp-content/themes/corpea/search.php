<?php get_header(); ?>

<?php get_template_part('inc/page-subheader');?>

<section id="main" class="section_padding">
    <div class="container">
    <div class="row">
        <div id="content" class="site-content col-md-8" role="main">
            <?php if ( have_posts() ) : ?>

                <?php while ( have_posts() ) : the_post(); ?>
                   <?php get_template_part( 'template-parts/content/content', get_post_format() ); ?>   
                <?php endwhile; ?>

                <?php echo themesmoon_pagination(); ?>

            <?php else: ?>
                <?php get_template_part( 'template-parts//content', 'none' ); ?>
            <?php endif; ?>
        </div> <!-- #content -->
        <?php get_sidebar(); ?>

    </div>
    </div>
</section>
<?php get_footer();