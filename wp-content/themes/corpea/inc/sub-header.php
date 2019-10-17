<?php 
    $output = ''; 
    $sub_img = array();
    global $post;

    if(!function_exists('thmtheme_call_sub_header')){
        function thmtheme_call_sub_header(){
            global $themesmoon_options;
            if(isset($themesmoon_options['blog-banner']['url'])){
                $output = 'style="background-image:url('.esc_url($themesmoon_options['blog-banner']['url']).');background-size: cover;background-position: 50% 50%;"';
                return $output;
            }else{
                 $output = 'style="background-color:'.esc_attr($themesmoon_options['blog-subtitle-bg-color']).';"';
                 return $output;
            }
        }
    }
    
    if( isset($post->post_name) ){
        if(!empty($post->ID)){ 
            $image_attached = esc_attr(get_post_meta( $post->ID , 'thm_subtitle_images', true ));
            if(!empty($image_attached)){
                $sub_img = wp_get_attachment_image_src( $image_attached , 'blog-full'); 
                $output = 'style="background-image:url('.esc_url($sub_img[0]).');background-size: cover;background-position: 50% 50%;"';
                if(empty($sub_img[0])){
                    $output = 'style="background-color:'.esc_attr(get_post_meta( get_the_ID(),"thm_subtitle_color",true)).';"';
                    if(get_post_meta( get_the_ID(),"thm_subtitle_color",true) == ''){
                        $output = thmtheme_call_sub_header();
                    }
                }
            }else{
                if(get_post_meta( get_the_ID(),"thm_subtitle_color",true) != "" ){
                    $output = 'style="background-color:'.esc_attr(get_post_meta( get_the_ID(),"thm_subtitle_color",true)).';"';
                }else{
                    $output = thmtheme_call_sub_header();
                }
            }
        }else{
            $output = thmtheme_call_sub_header();
        }
    }else{
            $output = thmtheme_call_sub_header();
        }

?>
<?php if (!is_front_page()) { ?>

<div class="sub-title" <?php echo $output;?>>
    <div class="container">
        <div class="sub-title-inner">
            <div class="row">
                <div class="col-sm-12">
                    <?php 
                    global $wp_query; 
                    if(isset($wp_query->queried_object->name)){
                        if($wp_query->queried_object->name != ''){
                            echo '<h2>'.$wp_query->queried_object->name.'</h2>';
                        }else{
                            $first_char = get_the_title();
                            echo '<h2>'.get_the_title().'</h2>';
                        }
                    }else{
                        if(is_search()){
                            $first_char = __('Search','corpea');
                            echo '<h2>'.$first_char.'</h2>';
                        }else{
                            $first_char = get_the_title();
                            echo '<h2>'.get_the_title().'</h2>';
                        }
                    }
                    ?>
                    <?php themesmoon_breadcrumbs(); ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php } ?>