<?php

if(!function_exists('themesmoon_pagination')):

    function themesmoon_pagination($pages = '', $range = 2)
    {  
        global $paged;
        global $wp_query;
        if(empty($paged)) $paged = 1;

        $big = 999999999; // need an unlikely integer
        echo '<div class="themesmoon-pagination">';
        echo paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $wp_query->max_num_pages,
            'type'               => 'list',
        ) );
        echo '</div>';
    }
endif;


/*-------------------------------------------------------
*           Themeum Breadcrumb
*-------------------------------------------------------*/
if(!function_exists('themesmoon_breadcrumbs')):
function themesmoon_breadcrumbs(){ ?>
    <ol class="breadcrumb">
        <li><a href="<?php echo esc_url(site_url()); ?>" class="breadcrumb_home"><?php esc_html_e('Home', 'corpea') ?></a>/</li>
        <li class="active">

                    <?php if( is_tag() ) { ?>
                    <?php esc_html_e('Posts Tagged ', 'corpea') ?><span class="raquo">/</span><?php single_tag_title(); echo('/'); ?>
                    <?php } elseif (is_day()) { ?>
                    <?php esc_html_e('Posts made in', 'corpea') ?> <?php the_time('F jS, Y'); ?>
                    <?php } elseif (is_month()) { ?>
                    <?php esc_html_e('Posts made in', 'corpea') ?> <?php the_time('F, Y'); ?>
                    <?php } elseif (is_year()) { ?>
                    <?php esc_html_e('Posts made in', 'corpea') ?> <?php the_time('Y'); ?>
                    <?php } elseif (is_search()) { ?>
                    <?php esc_html_e('Search results for', 'corpea') ?> <?php the_search_query() ?>
                    <?php } elseif (is_single()) { ?>
                    <?php $category = get_the_category();
                    if ( $category ) { 
                        $catlink = get_category_link( $category[0]->cat_ID );
                        echo ('<a href="'.esc_url($catlink).'">'.esc_html($category[0]->cat_name).'</a> '.'<span class="raquo"> /</span> ');
                    }
                    echo get_the_title(); ?>
                    <?php } elseif (is_category()) { ?>
                    <?php single_cat_title(); ?>
                    <?php } elseif (is_tax()) { ?>
                    <?php 
                    $themesmoon_taxonomy_links = array();
                    $themesmoon_term = get_queried_object();
                    $themesmoon_term_parent_id = $themesmoon_term->parent;
                    $themesmoon_term_taxonomy = $themesmoon_term->taxonomy;

                    while ( $themesmoon_term_parent_id ) {
                        $themesmoon_current_term = get_term( $themesmoon_term_parent_id, $themesmoon_term_taxonomy );
                        $themesmoon_taxonomy_links[] = '<a href="' . esc_url( get_term_link( $themesmoon_current_term, $themesmoon_term_taxonomy ) ) . '" title="' . esc_attr( $themesmoon_current_term->name ) . '">' . esc_html( $themesmoon_current_term->name ) . '</a>';
                        $themesmoon_term_parent_id = $themesmoon_current_term->parent;
                    }

                    if ( !empty( $themesmoon_taxonomy_links ) ) echo implode( ' <span class="raquo">/</span> ', array_reverse( $themesmoon_taxonomy_links ) ) . ' <span class="raquo">/</span> ';

                    echo esc_html( $themesmoon_term->name ); 
                } elseif (is_author()) { 
                    global $wp_query;
                    $curauth = $wp_query->get_queried_object();

                    esc_html_e('Posts by ', 'corpea'); echo ' ',$curauth->nickname; 
                } elseif (is_page()) { 
                    echo get_the_title(); 
                } elseif (is_home()) { 
                    esc_html_e('Blog', 'corpea');
                } ?>  
            </li>
    </ol>

<?php
}
endif;


// Remove Redux Ads
if(!function_exists('redux_ads_custom_admin_styles')):
function redux_ads_custom_admin_styles() { ?>
  <style type="text/css">
  .rAds {
    display: none !important;
  }
  </style>
<?php }
add_action('admin_head', 'redux_ads_custom_admin_styles');
endif;

/* -------------------------------------------
 *              Remove API
 * ------------------------------------------- */
function corpea_remove_api() {
    remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
}
add_action( 'after_setup_theme', 'corpea_remove_api' );


/* -------------------------------------------
 *              SVG image upload
 * ------------------------------------------- */
function corpea_mime_types( $mimes ){
  $mimes['svg'] = 'image/svg+xml';
  $mimes['svgz'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'corpea_mime_types');


/*-------------------------------------------------------
 *              Themesmoon Comment
 *-------------------------------------------------------*/

if(!function_exists('themesmoon_comment')):

    function themesmoon_comment($comment, $args, $depth)
    {
        $GLOBALS['comment'] = $comment;
        switch ( $comment->comment_type ) :
            case 'pingback' :
            case 'trackback' :
            // Display trackbacks differently than normal comments.
        ?>
        <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
            <p>Pingback: <?php comment_author_link(); ?> <?php edit_comment_link( esc_html__( '(Edit)', 'coprea' ), '<span class="edit-link">', '</span>' ); ?></p>
        <?php
                break;
            default :
            
            global $post;
        ?>
        <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
            <div id="comment-<?php comment_ID(); ?>" class="comment-body media">
                
                    <div class="comment-avartar pull-left">
                        <?php
                            echo get_avatar( $comment, $args['avatar_size'] );
                        ?>
                    </div>
                    <div class="comment-context media-body">
                        <div class="comment-head">
                            <?php
                                printf( '<span class="comment-author">%1$s</span>',
                                    get_comment_author_link());
                            ?>
                            <span class="comment-date"><?php echo get_comment_date('d / m / Y') ?></span>

                            <?php edit_comment_link( esc_html__( 'Edit', 'coprea' ), '<span class="edit-link">', '</span>' ); ?>
                            <span class="comment-reply">
                                <?php comment_reply_link( array_merge( $args, array( 'reply_text' => esc_html__( 'Reply', 'coprea' ), 'after' => '', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                            </span>
                        </div>

                        <?php if ( '0' == $comment->comment_approved ) : ?>
                        <p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'coprea' ); ?></p>
                        <?php endif; ?>

                        <div class="comment-content">
                            <?php comment_text(); ?>
                        </div>
                    </div>
                
            </div>
        <?php
            break;
        endswitch; 
    }

endif;




/*-------------------------------------------*
 *      Themesmoon Widget Registration
 *------------------------------------------*/

if(!function_exists('themesmoon_widdget_init')):

    function themesmoon_widdget_init()
    {

        register_sidebar(array( 'name'          => esc_html__( 'Sidebar', 'corpea' ),
                                'id'            => 'sidebar',
                                'description'   => esc_html__( 'Widgets in this area will be shown on Sidebar.', 'corpea' ),
                                'before_title'  => '<div class="link_widget_title"><h3> ',
                                'after_title'   => '</h3></div>',
                                'before_widget' => '<div id="%1$s" class="widget %2$s" >',
                                'after_widget'  => '</div>'
                    )
        );
        global $woocommerce;
        if($woocommerce) {
            register_sidebar(array(
                'name'          => __( 'Shop', 'corpea' ),
                'id'            => 'shop',
                'description'   => __( 'Widgets in this area will be shown on Shop Sidebar.', 'corpea' ),
                'before_title'  => '<div class="themeum-title"><h3 class="widget_title">',
                'after_title'   => '</h3></div>',
                'before_widget' => '<div id="%1$s" class="widget %2$s" >',
                'after_widget'  => '</div>'
                )
            );
        }   

        register_sidebar(array( 
                            'name'          => esc_html__( 'Footer-Bottom', 'corpea' ),
                            'id'            => 'bottom',
                            'description'   => esc_html__( 'Widgets in this area will be shown before Footer.' , 'corpea'),
                            'before_title'  => '<h3 class="link_widget_title">',
                            'after_title'   => '</h3>',
                            'before_widget' => '<div class="col-sm-6 col-md-3 bottom_widget clearfix"><div id="%1$s" class="widget %2$s" >',
                            'after_widget'  => '</div></div>'
                            )
        );        

    }
    
    add_action('widgets_init','themesmoon_widdget_init');

endif;




/*-----------------------------------------------------
 *              Custom Excerpt Length
 *----------------------------------------------------*/
if(!function_exists('themesmoon_the_excerpt_max_charlength')):

    function themesmoon_the_excerpt_max_charlength($limit) {
          $content = explode(' ', get_the_content(), $limit);
          if(count($content)>=$limit) {
            array_pop($content);
            $content = implode(" ",$content);
          }else{
            $content = implode(" ",$content);
          } 
          $content = preg_replace('/\[.+\]/','', $content);
          $content = apply_filters('the_content', $content); 
          $content = str_replace(']]>', ']]&gt;', $content);
          return $content;
    }

endif;



/*-----------------------------------------------------
 *              Custom Excerpt Length
 *----------------------------------------------------*/

if(!function_exists('themesmoon_get_video_id')){
    function themesmoon_get_video_id($url){
        $video = parse_url($url);

        switch($video['host']) {
            case 'youtu.be':
            $id = trim($video['path'],'/');
            $src = 'https://www.youtube.com/embed/' . esc_attr($id);
            break;

            case 'www.youtube.com':
            case 'youtube.com':
            parse_str($video['query'], $query);
            $id = $query['v'];
            $src = 'https://www.youtube.com/embed/' . esc_attr($id);
            break;

            case 'vimeo.com':
            case 'www.vimeo.com':
            $id = esc_attr(trim($video['path'],'/'));
            $src = "http://player.vimeo.com/video/{$id}";
        }

        return $src;
    }
}

if(!function_exists('themesmoon_hex2rgb')){
    function themesmoon_hex2rgb($hex) {
       $hex = str_replace("#", "", $hex);

       if(strlen($hex) == 3) {
          $r = hexdec(substr($hex,0,1).substr($hex,0,1));
          $g = hexdec(substr($hex,1,1).substr($hex,1,1));
          $b = hexdec(substr($hex,2,1).substr($hex,2,1));
       } else {
          $r = hexdec(substr($hex,0,2));
          $g = hexdec(substr($hex,2,2));
          $b = hexdec(substr($hex,4,2));
       }
       $rgb = array($r, $g, $b);

       return $rgb[0].','.$rgb[1].','.$rgb[2];
    }
}

if(!function_exists('themesmoon_hex2rgba')){
    function themesmoon_hex2rgba($hex,$opacity) {
       $hex = str_replace("#", "", $hex);

       if(strlen($hex) == 3) {
          $r = hexdec(substr($hex,0,1).substr($hex,0,1));
          $g = hexdec(substr($hex,1,1).substr($hex,1,1));
          $b = hexdec(substr($hex,2,1).substr($hex,2,1));
       } else {
          $r = hexdec(substr($hex,0,2));
          $g = hexdec(substr($hex,2,2));
          $b = hexdec(substr($hex,4,2));
       }
       $rgb = array($r, $g, $b);

       return $rgb[0].','.$rgb[1].','.$rgb[2].','.$opacity;
    }
}

// /*-------------------------------------------*
//  *               Excerpt Length
//  *------------------------------------------*/

if(!function_exists('new_excerpt_more')):

    if( isset($themesmoon_options['blog-continue-en']) && $themesmoon_options['blog-continue-en'] ){

        function new_excerpt_more( $more )
        {
            global $themesmoon_options;
            $continue = 'Continue Reading';

            if ( isset($themesmoon_options['blog-continue']) ){
                $continue = esc_html($themesmoon_options['blog-continue']);
            }
            
            return '&nbsp;<br /><br /><a class="btn btn-style" href="'. get_permalink( get_the_ID() ) . '">'.$continue. '</a>';
        }
        add_filter( 'excerpt_more', 'new_excerpt_more' );

    }

endif;


if(!function_exists('themesmoon_social_share')):
    
    function themesmoon_social_share( $post_id ){
        global $themesmoon_options;
        $output ='';
        $media_url = '';
        $title = get_the_title( $post_id );
        $permalink = get_permalink( $post_id );

        if( has_post_thumbnail( $post_id ) ){
            $thumb_src =  wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'full' ); 
            $media_url = $thumb_src[0];
        }

        $output .= '<div class="coprea-post-share-social">';
            $output .= '<a href="#" data-type="facebook" data-url="'.esc_url( $permalink ).'" data-title="'.esc_html( $title ).'" data-description="'. esc_html( $title ).'" data-media="'.esc_url( $media_url ).'" class="prettySocial fa fa-facebook"></a>';

            $output .= '<a href="#" data-type="twitter" data-url="'.esc_url( $permalink ).'" data-description="'.esc_html( $title ).'" data-via="'.$themeum_options['twitter-username'].'" class="prettySocial fa fa-twitter"></a>';

            $output .= '<a href="#" data-type="googleplus" data-url="'.esc_url( $permalink ).'" data-description="'.esc_html( $title ).'" class="prettySocial fa fa-google-plus"></a>';
            
            $output .= '<a href="#" data-type="pinterest" data-url="'.esc_url( $permalink ).'" data-description="'.esc_html( $title ).'" data-media="'.esc_url( $media_url ).'" class="prettySocial fa fa-pinterest"></a>';

            $output .= '<a href="#" data-type="linkedin" data-url="'.esc_url( $permalink ).'" data-title="'.esc_html( $title ).'" data-description="'.esc_html( $title ).'" data-via="'.$themeum_options['linkedin-username'].'" data-media="'.esc_url( $media_url ).'" class="prettySocial fa fa-linkedin"></a>';
        
        $output .= '<div class="share-icon"><i class="fa fa-share-alt"></i></div>';
        
        $output .= '</div>';

        return $output;
    }

endif;

if ( ! function_exists( 'all_cat_items' ) ) {
    function all_cat_items(){
        global $post;
        $cat_lists = get_categories();
        $all_cat_list = array();
        foreach($cat_lists as $cat_list){
            $all_cat_list[$cat_list->cat_name] = $cat_list->cat_name;
        }
         return $all_cat_list;
    }
}

if ( ! function_exists( 'themeum_fc_cats_list' ) ) {
    function themeum_fc_cats_list(){
        $cat_lists = get_categories();
        $all_cat_list = array('All Category'=>'');
        foreach($cat_lists as $cat_list){
            $all_cat_list[$cat_list->cat_name] = $cat_list->slug;
        }
        return $all_cat_list;
    }
}

if ( ! function_exists( 'themeum_rnd_cat_color' ) ) {
    function themeum_rnd_cat_color(){
        $items = Array('green','red','blue','pink','lightgreen','raw');
        $cat_title = $items[array_rand($items)];
        return $cat_title;
    }
}



/*-----------------------------------------------------
 *              Author Info
 *----------------------------------------------------*/

function themesmoon_modify_user_contact_profile($profile_fields) {

    // Add new fields
    $profile_fields['facebook'] = 'Facebook URL';
    $profile_fields['twitter'] = 'Twitter URL';
    $profile_fields['gplus'] = 'Google+ URL';
    $profile_fields['linkedin'] = 'Linkedin URL';
    $profile_fields['tumblr'] = 'Tumblr URL';
    $profile_fields['pinterest'] = 'Pinterest URL';
    $profile_fields['instagram'] = 'Instagram URL';

    return $profile_fields;
}
add_filter('user_contactmethods', 'themesmoon_modify_user_contact_profile');


/*-----------------------------------------------------
 *              Coming Soon Page Settings
 *----------------------------------------------------*/
if (isset($themesmoon_options['comingsoon-en']) && $themesmoon_options['comingsoon-en']) {
    if(!function_exists('themeum_my_page_template_redirect')):
        function themeum_my_page_template_redirect()
        {
            if( is_page( ) || is_home() || is_category() || is_single() )
            { 
                if( !is_super_admin( get_current_user_id() ) ){
                    get_template_part( 'coming','soon');
                    exit();
                } 
            }
        }
        add_action( 'template_redirect', 'themeum_my_page_template_redirect' );
    endif;

    if(!function_exists('themeum_cooming_soon_wp_title')):
        function themeum_cooming_soon_wp_title(){
            return 'Coming Soon';
        }
        add_filter( 'wp_title', 'themeum_cooming_soon_wp_title' );
    endif;
}





