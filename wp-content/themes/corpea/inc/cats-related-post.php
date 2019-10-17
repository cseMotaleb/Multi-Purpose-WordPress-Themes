<?php 

$category_detail = get_the_category( $post->ID );
if ( isset($category_detail[0]->term_id) ) {
    $catname = $category_detail[0]->term_id;
    $args = array( 
        'category'          => $catname,
        'orderby'           => 'date',
        'post_type'         => 'post',
        'post_status'       => 'publish',
        'order'             => 'DESC',
        'posts_per_page'    => 6,
        'offset'            => 0,
    );
    $catposts = get_posts($args);
}else{
    $args = array( 
        'orderby'           => 'date',
        'post_type'         => 'post',
        'post_status'       => 'publish',
        'order'             => 'DESC',
        'posts_per_page'    => 6,
        'offset'            => 0,
    );
    $catposts = get_posts($args);
}

if(count($catposts)>0) { ?>
    <div class="cats-related-posts"> 
        <h3 class="common-title"><?php esc_html_e('More Posts From','newedge');?>: <?php echo get_the_category_list(', '); ?></h3>
        <div class="row">
            <?php  wp_reset_postdata();
            foreach ($catposts as $key=>$catpost): setup_postdata($catpost);
            if(get_post_meta( get_the_ID(),"thm_post_color",true) != "" ){
              $post_color = get_post_meta( get_the_ID(),"thm_post_color",true);  
            }else{
              $post_color = '#000';
            }
            if ( has_post_thumbnail() ) {
                $img = wp_get_attachment_image_src( get_post_thumbnail_id( $catpost->ID ), 'newedge-small' );
                $image ='style="height:253px;background: url('.esc_url($img[0]).') no-repeat;background-size: cover;"'; 
              }else {
                $image ='style="height:253px;background: #333;"';
              }
            ?>
            <div class="col-sm-4 single-cats-related-posts">
                <div class="latest-category-post-item common-post-item">
                   
                    <div class="common-post-item-in" <?php echo $image; ?>></div>
                
                    <div class="common-post-item-intro">
                    <h3 class="entry-title"><a href="<?php echo get_permalink( $catpost->ID )?>"><?php echo $catpost->post_title; ?></a></h3> 
                    </div>
                </div>
            </div>
           <?php endforeach;  wp_reset_postdata(); ?>  
        </div>
    </div>
<?php } ?>