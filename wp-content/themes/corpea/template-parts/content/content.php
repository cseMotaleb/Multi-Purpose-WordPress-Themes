<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>

<?php global $themesmoon_options; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="single_blog">
    <?php if ( has_post_thumbnail() ){ ?>
        <div class="blog_img">
            <?php the_post_thumbnail('full', array('class' => 'img-fluid')); ?>
        </div>
    <?php }

    get_template_part( 'template-parts/content/entry-content' ); ?> 
     </div>
</article> <!--/#post-->
  

