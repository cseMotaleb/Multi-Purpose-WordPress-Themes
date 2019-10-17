<?php

add_action('widgets_init','register_themesmoon_social_share_2_widget');

function register_themesmoon_social_share_2_widget()
{
	register_widget('Themesmoon_social_share_2_Widget');
}

class Themesmoon_social_share_2_Widget extends WP_Widget{

	public function __construct()
	{
		parent::__construct( 'Themesmoon_social_share_2_Widget',__("Themesmoon Social Share 2 Widgets",'corpea'),array('description' => __("This Social Share 2 Widgets",'corpea')));
	}

/*-------------------------------------------------------
 *				Front-end display of widget
*-------------------------------------------------------*/

 	public function widget( $args, $instance ) {
		extract( $args );

		//Our variables from the widget settings.
		$title = apply_filters('widget_title', $instance['title'] );

		echo $before_widget;

		if ( $title ) {
			echo $before_title .'<span class="title-icon-style"><i class="fa fa-share-alt"></i></span> '. $title . $after_title;
		}
		


		$output = '';

		$output .= '<div class="themeum-social-counter clearfix">';

		if( function_exists( 'get_scp_counter' ) ) {

			
			$settings_arr = get_option("socialcountplus_settings");

			if( is_array( $settings_arr ) ){

			    if (!empty( $settings_arr )) {
			        
			        
			        // Comments
			        if(isset( $settings_arr['comments_active'] )){
			            if( $settings_arr['comments_active'] == '1' ){
			                	$output .= '<div class="col-sm-6 social-common-bar comments-bar">';
								    $output .= '<div class="social-icon">';
								        $output .= '<a href="'.esc_url( $settings_arr['comments_url'] ).'" target="_blank"><i class="fa fa-comment-o"></i></a>';
								    $output .= '</div>';
								    $output .= '<div class="social-total-count">';
								        $output .= '<p class="follow-button">'.get_scp_counter( 'comments' ).'<span class="social-text">'.__('Comments','corpea').'</span></p>';
								    $output .= '</div>';
								$output .= '</div>';

			            }
			        }


			        // facebook
			        if(isset( $settings_arr['facebook_active'] )){
			            if( $settings_arr['facebook_active'] == '1' ){
			                	$output .= '<div class="col-sm-6 social-common-bar facebook-bar">';
								    $output .= '<div class="social-icon">';
								        $output .= '<a href="https://www.facebook.com/'.esc_attr( $settings_arr['facebook_id'] ).'" target="_blank"><i class="fa fa-facebook"></i></a>';
								    $output .= '</div>';
								    $output .= '<div class="social-total-count">';
								        $output .= '<p class="follow-button">'.get_scp_counter( 'facebook' ).'<span class="social-text">'.__('Likes','corpea').'</span></p>';
								    $output .= '</div>';
								$output .= '</div>';

			            }
			        }



			        // github
			        if(isset( $settings_arr['github_active'] )){
			            if( $settings_arr['github_active'] == '1' ){
			                	$output .= '<div class="col-sm-6 social-common-bar github-bar">';
								    $output .= '<div class="social-icon">';
								        $output .= '<a href="https://github.com/'.esc_attr( $settings_arr['github_username'] ).'" target="_blank"><i class="fa fa-github"></i></a>';
								    $output .= '</div>';
								    $output .= '<div class="social-total-count">';
								        $output .= '<p class="follow-button">'.get_scp_counter( 'github' ).'<span class="social-text">'.__('Followers','corpea').'</span></p>';
								    $output .= '</div>';
								$output .= '</div>';

			            }
			        }



			        // googleplus
			        if(isset( $settings_arr['googleplus_active'] )){
			            if( $settings_arr['googleplus_active'] == '1' ){
			                	$output .= '<div class="col-sm-6 social-common-bar googleplus-bar">';
								    $output .= '<div class="social-icon">';
								        $output .= '<a href="https://plus.google.com/'.esc_attr( $settings_arr['googleplus_id'] ).'" target="_blank"><i class="fa fa-google-plus"></i></a>';
								    $output .= '</div>';
								    $output .= '<div class="social-total-count">';
								        $output .= '<p class="follow-button">'.get_scp_counter( 'googleplus' ).'<span class="social-text">'.__('Followers','corpea').'</span></p>';
								    $output .= '</div>';
								$output .= '</div>';

			            }
			        }




			        // instagram
			        if(isset( $settings_arr['instagram_active'] )){
			            if( $settings_arr['instagram_active'] == '1' ){
			                	$output .= '<div class="col-sm-6 social-common-bar instagram-bar">';
								    $output .= '<div class="social-icon">';
								        $output .= '<a href="https://instagram.com/'.esc_attr( $settings_arr['instagram_username'] ).'" target="_blank"><i class="fa fa-instagram"></i></a>';
								    $output .= '</div>';
								    $output .= '<div class="social-total-count">';
								        $output .= '<p class="follow-button">'.get_scp_counter( 'instagram' ).'<span class="social-text">'.__('Followers','corpea').'</span></p>';
								    $output .= '</div>';
								$output .= '</div>';

			            }
			        }



			        // linkedin
			        if(isset( $settings_arr['linkedin_active'] )){
			            if( $settings_arr['linkedin_active'] == '1' ){
			                	$output .= '<div class="col-sm-6 social-common-bar linkedin-bar">';
								    $output .= '<div class="social-icon">';
								        $output .= '<a href="https://www.linkedin.com/profile/view?id='.esc_attr( $settings_arr['linkedin_company_id'] ).'" target="_blank"><i class="fa fa-linkedin"></i></a>';
								    $output .= '</div>';
								    $output .= '<div class="social-total-count">';
								        $output .= '<p class="follow-button">'.get_scp_counter( 'linkedin' ).'<span class="social-text">'.__('Followers','corpea').'</span></p>';
								    $output .= '</div>';
								$output .= '</div>';

			            }
			        }




			        // pinterest
			        if(isset( $settings_arr['pinterest_active'] )){
			            if( $settings_arr['pinterest_active'] == '1' ){
			                	$output .= '<div class="col-sm-6 social-common-bar pinterest-bar">';
								    $output .= '<div class="social-icon">';
								        $output .= '<a href="https://www.pinterest.com/'.esc_attr( $settings_arr['pinterest_username'] ).'" target="_blank"><i class="fa fa-pinterest"></i></a>';
								    $output .= '</div>';
								    $output .= '<div class="social-total-count">';
								        $output .= '<p class="follow-button">'.get_scp_counter( 'pinterest' ).'<span class="social-text">'.__('Followers','corpea').'</span></p>';
								    $output .= '</div>';
								$output .= '</div>';

			            }
			        }




			        // posts
			        if(isset( $settings_arr['posts_active'] )){
			            if( $settings_arr['posts_active'] == '1' ){
			                	$output .= '<div class="col-sm-6 social-common-bar posts-bar">';
								    $output .= '<div class="social-icon">';
								        $output .= '<a href="'.esc_url( $settings_arr['posts_url'] ).'" target="_blank"><i class="fa fa-file-text"></i></a>';
								    $output .= '</div>';
								    $output .= '<div class="social-total-count">';
								        $output .= '<p class="follow-button">'.get_scp_counter( 'posts' ).'<span class="social-text">'.__('Posts','corpea').'</span></p>';
								    $output .= '</div>';
								$output .= '</div>';

			            }
			        }





					// soundcloud
			        if(isset( $settings_arr['soundcloud_active'] )){
			            if( $settings_arr['soundcloud_active'] == '1' ){
			                	$output .= '<div class="col-sm-6 social-common-bar soundcloud-bar">';
								    $output .= '<div class="social-icon">';
								        $output .= '<a href="https://soundcloud.com/'.esc_attr( $settings_arr['soundcloud_username'] ).'" target="_blank"><i class="fa fa-soundcloud"></i></a>';
								    $output .= '</div>';
								    $output .= '<div class="social-total-count">';
								        $output .= '<p class="follow-button">'.get_scp_counter( 'soundcloud' ).'<span class="social-text">'.__('Followers','corpea').'</span></p>';
								    $output .= '</div>';
								$output .= '</div>';

			            }
			        }




			        // steam
			        if(isset( $settings_arr['steam_active'] )){
			            if( $settings_arr['steam_active'] == '1' ){
			                	$output .= '<div class="col-sm-6 social-common-bar steam-bar">';
								    $output .= '<div class="social-icon">';
								        $output .= '<a href="https://steamcommunity.com/'.esc_attr( $settings_arr['steam_group_name'] ).'" target="_blank"><i class="fa fa-steam"></i></a>';
								    $output .= '</div>';
								    $output .= '<div class="social-total-count">';
								        $output .= '<p class="follow-button">'.get_scp_counter( 'steam' ).'<span class="social-text">'.__('Members','corpea').'</span></p>';
								    $output .= '</div>';
								$output .= '</div>';

			            }
			        }




			        // tumblr
			        if(isset( $settings_arr['tumblr_active'] )){
			            if( $settings_arr['tumblr_active'] == '1' ){
			                	$output .= '<div class="col-sm-6 social-common-bar tumblr-bar">';
								    $output .= '<div class="social-icon">';
								        $output .= '<a href="http://'.esc_attr( $settings_arr['tumblr_hostname'] ).'.tumblr.com/" target="_blank"><i class="fa fa-tumblr-square"></i></a>';
								    $output .= '</div>';
								    $output .= '<div class="social-total-count">';
								        $output .= '<p class="follow-button">'.get_scp_counter( 'tumblr' ).'<span class="social-text">'.__('Followers','corpea').'</span></p>';
								    $output .= '</div>';
								$output .= '</div>';
			            }
			        }



			        // twitch
			        if(isset( $settings_arr['twitch_active'] )){
			            if( $settings_arr['twitch_active'] == '1' ){
			                	$output .= '<div class="col-sm-6 social-common-bar twitch-bar">';
								    $output .= '<div class="social-icon">';
								        $output .= '<a href="http://www.twitch.tv/'.esc_attr( $settings_arr['twitch_username'] ).'" target="_blank"><i class="fa fa-twitch"></i></a>';
								    $output .= '</div>';
								    $output .= '<div class="social-total-count">';
								        $output .= '<p class="follow-button">'.get_scp_counter( 'twitch' ).'<span class="social-text">'.__('Followers','corpea').'</span></p>';
								    $output .= '</div>';
								$output .= '</div>';
			            }
			        }




			        // twitter
			        if(isset( $settings_arr['twitter_active'] )){
			            if( $settings_arr['twitter_active'] == '1' ){
			                	$output .= '<div class="col-sm-6 social-common-bar twitter-bar">';
								    $output .= '<div class="social-icon">';
								        $output .= '<a href="https://twitter.com/'.esc_attr( $settings_arr['twitter_user'] ).'" target="_blank"><i class="fa fa-twitter"></i></a>';
								    $output .= '</div>';
								    $output .= '<div class="social-total-count">';
								        $output .= '<p class="follow-button">'.get_scp_counter( 'twitter' ).'<span class="social-text">'.__('Followers','corpea').'</span></p>';
								    $output .= '</div>';
								$output .= '</div>';
			            }
			        }



			        // users
			        if(isset( $settings_arr['users_active'] )){
			            if( $settings_arr['users_active'] == '1' ){
			                	$output .= '<div class="col-sm-6 social-common-bar users-bar">';
								    $output .= '<div class="social-icon">';
								        $output .= '<a href="'.esc_url( $settings_arr['users_url'] ).'" target="_blank"><i class="fa fa-user"></i></a>';
								    $output .= '</div>';
								    $output .= '<div class="social-total-count">';
								        $output .= '<p class="follow-button">'.get_scp_counter( 'users' ).'<span class="social-text">'.__('Users','corpea').'</span></p>';
								    $output .= '</div>';
								$output .= '</div>';
			            }
			        }




			        // vimeo
			        if(isset( $settings_arr['vimeo_active'] )){
			            if( $settings_arr['vimeo_active'] == '1' ){
			                	$output .= '<div class="col-sm-6 social-common-bar vimeo-bar">';
								    $output .= '<div class="social-icon">';
								        $output .= '<a href="https://vimeo.com/'.esc_attr( $settings_arr['vimeo_username'] ).'" target="_blank"><i class="fa fa-vimeo-square"></i></a>';
								    $output .= '</div>';
								    $output .= '<div class="social-total-count">';
								        $output .= '<p class="follow-button">'.get_scp_counter( 'vimeo' ).'<span class="social-text">'.__('Subscriber','corpea').'</span></p>';
								    $output .= '</div>';
								$output .= '</div>';
			            }
			        }



			        // youtube
			        if(isset( $settings_arr['youtube_active'] )){
			            if( $settings_arr['youtube_active'] == '1' ){
			                	$output .= '<div class="col-sm-6 social-common-bar vimeo-bar">';
								    $output .= '<div class="social-icon">';
								        $output .= '<a href="'.esc_url( $settings_arr['youtube_url'] ).'" target="_blank"><i class="fa fa-youtube-play"></i></a>';
								    $output .= '</div>';
								    $output .= '<div class="social-total-count">';
								        $output .= '<p class="follow-button">'.get_scp_counter( 'youtube' ).'<span class="social-text">'.__('Subscriber','corpea').'</span></p>';
								    $output .= '</div>';
								$output .= '</div>';
			            }
			        }


			    }
			}


		}
		$output .= '</div>';

		echo $output;

		echo $after_widget;
	}


	/*-------------------------------------------------------
	 *				Sanitize data, save and retrive
	 *-------------------------------------------------------*/

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		//Strip tags from title and name to remove HTML 
		$instance['title'] 				= strip_tags( $new_instance['title'] );

		return $instance;
	}


	/*-------------------------------------------------------
	 *				Back-End display of widget
	 *-------------------------------------------------------*/
	
	public function form( $instance )
	{

		$defaults = array(  'title' => '' );

		$instance = wp_parse_args( (array) $instance, $defaults );
	   ?>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e('Title :', 'corpea'); ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_html( $instance['title'] ); ?>" style="width:100%;" />
		</p>

	<?php
	}
}