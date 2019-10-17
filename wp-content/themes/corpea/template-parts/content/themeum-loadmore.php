<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

//define('WP_USE_THEMES', false);

$output = '';
$posts = 0;
$paged = 1;
$number = 3;
$perpage = $show_author = $show_date = $show_category = $order = $category = $number = '';

if(isset( $_POST['perpage'] )){ $perpage = $_POST['perpage']; }
if(isset( $_POST['show_author'] )){ $show_author = $_POST['show_author']; }
if(isset( $_POST['show_date'] )){ $show_date = $_POST['show_date']; }
if(isset( $_POST['show_category'] )){ $show_category = $_POST['show_category']; }
if(isset( $_POST['order'] )){ $order = $_POST['order']; }
if(isset( $_POST['category'] )){ $category = $_POST['category']; }
if(isset( $_POST['perpage'] )){ $number = $_POST['perpage']; }
if(isset( $_POST['paged'] )){ $paged = $_POST['paged']; }

	if (isset($category) && $category!='') {
 		$idObj 	= get_category_by_slug( $category );
 		if (isset($idObj) && $idObj!='') {
			$idObj 	= get_category_by_slug( $category );
			$cat_id = $idObj->term_id;

			$args = array( 
		    	'category' => $cat_id,
    			'orderby' => 'meta_value_num',
		        'order' => $order,
		        'posts_per_page' => esc_attr($number),
		        'paged' => $paged
		    );
		    $posts = get_posts($args);
 		}else{
 			echo "Please Enter a valid category name";
 			$args = 0;
 		}
	}else{
		$args = array(
	        'order' => $order,
			'orderby' => 'meta_value_num',
	        'posts_per_page' => esc_attr($number),
	        'paged' => $paged
	    );
	    $posts = get_posts($args);
 	}


	if(count($posts)>0){
		foreach ($posts as $key=>$post): setup_postdata($post);
		    $output .= '<div class="row themeum-latest-item">';
		    if ( has_post_thumbnail($post->ID) ) {
			    $output .= '<div class="col-sm-4 latest-post-image">';
					    $output .= '<a href="'.get_permalink($post->ID).'">'.get_the_post_thumbnail($post->ID, 'newedge-full', array('class' => 'img-responsive')).'</a>';
				$output .= '</div>';//col-sm-4
			    
				$output .= '<div class="col-sm-8 latest-post-intro">';	
					if ( $show_category == 'yes'){
						$output .= '<span class="entry-category">';
						$output .= get_the_category_list(' ', '', $post->ID);
						$output .= '</span>';
					}
					$output .= '<h3 class="entry-title"><a href="'.get_permalink($post->ID).'">'. get_the_title($post->ID) .'</a></h3>';

					$output .= '<div class="post-intro">'. newedge_excerpt_max_charlength(150,$post->ID) .'</div>';	

					if ( $show_author == 'yes'){
						$output .= '<span class="author">'.__('By ', 'themeum-core').''.get_the_author_link().'</span>';	
					}
					if ( $show_date == 'yes'){
						$output .= '<span class="entry-date">';
						$output .= get_the_date('d M Y', $post->ID);
						$output .= '</span>';	
					}	
					
				$output .= '</div>';//col-sm-8
			}else {
				$output .= '<div class="col-sm-12 latest-post-intro">';	
					if ( $show_category == 'yes'){
						$output .= '<span class="entry-category">';
						$output .= get_the_category_list(', ', '', $post->ID);
						$output .= '</span>';
					}
					$output .= '<h3 class="entry-title"><a href="'.get_permalink($post->ID).'">'. get_the_title($post->ID) .'</a></h3>';

					$output .= '<div class="post-intro">'. newedge_excerpt_max_charlength(150,$post->ID) .'</div>';	

					if ( $show_author == 'yes'){
						$output .= '<span class="author">'.__('By ', 'themeum-core').''.get_the_author_link().'</span>';	
					}
					if ( $show_date == 'yes'){
						$output .= '<span class="entry-date">';
						$output .= get_the_date('d M Y', $post->ID);
						$output .= '</span>';	
					}	
					
				$output .= '</div>';//col-sm-8	
			}
			$output .= '</div>';
		endforeach;
		wp_reset_postdata();   
	}

echo $output;
