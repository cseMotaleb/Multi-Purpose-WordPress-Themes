<!-- START BREADCRUMB AREA-->
    <div id="breadcrumbs_area">
      <div class="breadcrumb_overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-10 mx-auto text-center">
            <div class="breadcrumd_head">
              <p class="breadcrumb_title">BLOG Provider</p>
                <?php
                    global $wp_query;
                    if(isset($wp_query->queried_object->name)){
                        if (get_theme_mod( 'header_title_enable', true )) {
                            if($wp_query->queried_object->name != ''){
                                if($wp_query->queried_object->name == 'product' ){
                                    echo '<h2>'.esc_html__('Shop','corpea').'</h2>';
                                }else{
                                    echo '<h2 class="page-leading">'.$wp_query->queried_object->name.'</h2>'; 
                                }
                            }else{
                                echo '<h2 class="page-leading">'.get_the_title().'</h2>';
                            }
                        }
                    }else{
                        

                        if( is_search() ){
                            if (get_theme_mod( 'subtitle_enable', true )) {
                                if (get_theme_mod( 'header_subtitle_text', '' )){
                                    echo '<h3 class="page-subleading">'. get_theme_mod( 'header_subtitle_text','' ).'</h3>';
                                }
                            }

                            if (get_theme_mod( 'header_title_enable', true )) {
                                $text = '';
                                $first_char = esc_html__('Search','corpea');
                                if( isset($_GET['s'])){ $text = $_GET['s']; }
                                echo '<h2 class="page-leading">'.$first_char.':'.$text.'</h2>';
                            }
                        }
                        else if( is_home() ){
                            if (get_theme_mod( 'subtitle_enable', true )) {
                                if (get_theme_mod( 'header_subtitle_text', '' )){
                                    echo '<h3 class="page-subleading">'. get_theme_mod( 'header_subtitle_text','' ).'</h3>';
                                }
                            }
                            if (get_theme_mod( 'header_title_enable', true )) {
                                if (get_theme_mod( 'header_title_text', 'Blog' )){
                                    echo '<h2 class="page-leading">'. get_theme_mod( 'header_title_text','Blog' ).'</h2>';
                                }
                            }
                        }
                        else if( is_single()){

                            if (get_theme_mod( 'subtitle_enable', true )) {
                                if (get_theme_mod( 'header_subtitle_text', '' )){
                                    echo '<h3 class="page-subleading">'. get_theme_mod( 'header_subtitle_text','' ).'</h3>';
                                }
                            }
                            if (get_theme_mod( 'header_title_enable', true )) {
                                if (get_post_type() == 'event') {
                                    echo '<h2 class="page-leading">'. esc_html__( 'Event Details','corpea' ).'</h2>';
                                } elseif (get_post_type() == 'album') {
                                    echo '<h2 class="page-leading">'. esc_html__( 'Albums','corpea' ).'</h2>';
                                } elseif (get_post_type() == 'gallery') {
                                    echo '<h2 class="page-leading">'. esc_html__( 'Gallery','corpea' ).'</h2>';
                                } elseif (get_post_type() == 'performer') {
                                    echo '<h2 class="page-leading">'. esc_html__( 'Performer','corpea' ).'</h2>';
                                }elseif(get_post_type() == 'product'){
                                    echo '<h2>'.esc_html__('Product Details','corpea').'</h2>';
                                }elseif(get_post_type() == 'portfolio'){
                                    echo '<h2>'.esc_html__('Different Types of Laser','corpea').'</h2>';
                                    if ( $subtext != "" ){
                                        echo '<h3 class="page-subleading">'. $subtext .'</h3>';
                                    } 
                                }else {
                                    if (get_theme_mod( 'header_title_text', 'Latest Blog' )){
                                        echo '<h2 class="page-leading">'. get_theme_mod( 'header_title_text','Latest Blog' ).'</h2>';
                                    }

                                }
                            }

                        }
                        else{
                            if (get_theme_mod( 'header_title_enable', true )) {
                                echo '<h2 class="page-leading">'.get_the_title().'</h2>';
                                if ( $subtext != ""){
                                    echo '<h3 class="page-subleading">'. $subtext .'</h3>';
                                }
                            }
                        }
                    }
                    ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--END BREADCRUMB AREA-->   