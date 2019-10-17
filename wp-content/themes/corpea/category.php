<?php get_header();
global $themesmoon_options;
?>

<section id="main">
    
   <?php get_template_part('inc/sub-header')?>

    <div class="container">
        <div class="row">
            <div id="content" class="site-content col-sm-9" role="main">
                
                <?php
                global $themesmoon_options;
                $count_post = $themesmoon_options['post-number'];
                if (!is_numeric($count)) {
                    $count = 6;
                }
                if (!is_numeric($count_post)) {
                    $count_post = 6;
                }
                
                $style = '';
                if( !isset($themesmoon_options['style-select']) ){
                    $style = 'style1';
                }else{
                    $style = esc_attr( $themesmoon_options['style-select'] );
                }
                $category_id = $wp_query->query_vars['cat'];
                ?>
               



                <?php

                $paged_num = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                $args = array( 
                        'category' => $category_id,
                        'posts_per_page' => $count_post,
                        'paged' => $paged_num,
                        'post_status' => 'publish'
                    );
                $posts = get_posts($args);

                $output = '';

                if ($style == 'style1') {   
                        
                        if(count($posts)>0){

                            $output .= '<div id="themeum-area" class="lates-featured-post">';
                            
                            $j=1;
                            $x=0;
                            $total_post = count($posts);

                            foreach ($posts as $key=>$post): setup_postdata($post);

                                // post overlay color
                                $post_color = '';
                                if(get_post_meta( get_the_ID(),"thm_post_color",true) != "" ){
                                    $post_color = get_post_meta( get_the_ID(),"thm_post_color",true);  
                                }else{
                                    $post_color = 'black';
                                }


                                if( $j==1 || $x == 3 ){
                                    $output .= '<div class="row">'; 
                                    $x=0;
                                }
                                
                                $output .= '<div class="latest-featured-post-small col-sm-4">';
                                if ( has_post_thumbnail() ) {
                                    $img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'newedge-small' );
                                    $image ='style="height:253px;background: url('.esc_url($img[0]).') no-repeat;background-size: cover;"'; 
                                } else {
                                    $image ='style="height:253px;background: #333;"';
                                }           
                             
                                
                                $output .= '<div class="themeum-latest-featured-post-item common-post-item">';  
                                $output .= '<a href="'.get_permalink().'"><div class="overlay '.esc_attr( $post_color ).' yes"></div></a>';
                                $output .= '<a href="'.get_permalink().'"><div class="common-post-item-in" '.$image.'></div></a>';
                                $output .= themesmoon_social_share( get_the_ID() );
                             
                                $output .= '<div class="common-post-item-intro">';
                                $output .= '<span class="entry-category '.themesmoon_rnd_cat_color().'">';
                                $output .= '</span>';
                                $output .= '<h3 class="entry-title"><a href="'.get_permalink().'">'. get_the_title() .'</a></h3>';  
                                $output .= '</div>';//common-post-item-intro
                                $output .= '</div>';//common-post-item
                                $output .= '</div>'; //latest-featured-post-small  
                                

                                if( $x == 2 || $total_post == $j ){

                                        $output .= '</div>'; //row
                                            
                                             
                                    }
                                    $x++;
                                    $j++;

                                endforeach;
                            wp_reset_postdata();   
                            
                            $output .= '</div>'; //lates-featured-post 
                        }

                    } elseif ($style == 'style2') {
                        if(count($posts)>0){

                            $output .= '<div class="lates-featured-post">';
                            
                            $j=1;
                            $x=0;
                            $total_post = count($posts);

                            foreach ($posts as $key=>$post): setup_postdata($post);

                                // post overlay color
                                $post_color = '';
                                if(get_post_meta( get_the_ID(),"thm_post_color",true) != "" ){
                                    $post_color = get_post_meta( get_the_ID(),"thm_post_color",true);  
                                }else{
                                    $post_color = 'black';
                                }


                                if( $j==1 || $x == 3 ){
                                    $output .= '<div class="row">'; 
                                    $x=0;
                                }

                                $output .= '<div class="latest-featured-post-small col-sm-4">';
                                if ( has_post_thumbnail() ) {
                                    $img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'newedge-small' );
                                    $image ='style="height:200px;background: url('.esc_url($img[0]).') no-repeat;background-size: cover;"'; 
                                } else {
                                    $image = '';
                                }          
                               
                                
                                $output .= '<div class="themeum-latest-featured-post-item common-post-item common-post-item-text">';    
                                $output .= '<a href="'.get_permalink().'"><div class="overlay '.esc_attr( $post_color ).' yes"></div></a>';
                                $output .= '<a href="'.get_permalink().'"><div class="common-post-item-in" '.$image.'></div></a>';
                                $output .= themesmoon_social_share( get_the_ID() );
                                
                                $output .= '</div>';//common-post-item
                                $output .= '<div class="common-post-item-intro-text">';
                                //if ( $show_category == 'yes'){
                                    $output .= '<span class="entry-category '.themesmoon_rnd_cat_color().'">';
                                    $output .= themesmoon_pre_cat_list( get_the_ID() );
                                    $output .= '</span>';
                                //}
                                $output .= '<h3 class="entry-title"><a href="'.get_permalink().'">'. get_the_title() .'</a></h3>';  
                                $output .= '</div>';//common-post-item-intro
                                $output .= '</div>'; //latest-featured-post-thumb  
                                
                                if( $x == 2 || $total_post == $j ){

                                        $output .= '</div>'; //row
                                            
                                        global $themesmoon_options;
                                        if( $themesmoon_options['category-ads'] == 1){
                                            if (function_exists('themeum_advertiser')) {
                                                if( $themesmoon_options['category-slug'] == '' ){
                                                    $output .= '<div class="cat-add">';
                                                    $output .=  themeum_advertiser('themeumall'); 
                                                    $output .= '</div>';
                                                }else{
                                                    $output .= '<div class="cat-add">';
                                                    $output .=  themeum_advertiser( $themesmoon_options['category-slug'] ); 
                                                    $output .= '</div>';
                                                }
                                            }
                                        }         
                                    }
                                    $x++;
                                    $j++;


                            endforeach;
                            wp_reset_postdata();   
                            
                            $output .= '</div>'; //lates-featured-post  
                        }
                    }
                    echo $output;
                    wp_reset_postdata();


                    $page_num = 0;
                    $args = array( 
                        'category' => $category_id,
                        'posts_per_page' => -1,
                        'post_status' => 'publish'
                        );
                    $totalposts = get_posts($args);

                    if((count($totalposts)!=0) && ($count_post != 0) ){
                        $page_num = ceil( count($totalposts)/$count_post );
                    }else{
                        $page_num = 1;
                    }
                    
                    themesmoon_pagination( $page_num );
                    ?>

            </div> <!-- #content -->

            <?php get_sidebar(); ?>

        </div> <!-- .row -->
    </div> <!-- .contaainer -->
    
</section> 

<?php get_footer(); ?>
