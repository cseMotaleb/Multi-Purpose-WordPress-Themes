<?php

add_action('widgets_init','register_themesmoon_social_share_widget');

function register_themesmoon_social_share_widget()
{
	register_widget('Themesmoon_social_share_Widget');
}

class Themesmoon_social_share_Widget extends WP_Widget{

	public function __construct()
	{
		parent::__construct( 'Themesmoon_social_share_Widget',__("Themesmoon Social Share Widgets",'corpea'),array('description' => __("This Social Share Widgets",'corpea')));
	}

/*-------------------------------------------------------
 *				Front-end display of widget
*-------------------------------------------------------*/

 public function widget( $args, $instance ) {
		extract( $args );

		//Our variables from the widget settings.
		$title = apply_filters('link_widget_title', $instance['title'] );

		echo $before_widget;

		if ( $title ) {
			echo $before_title . $title . $after_title;
		}
		?>	
			<ul class="social">
				<?php if( isset($instance['facebook_url']) && $instance['facebook_url'] ) { ?>
					<li><a class="facebook" href="<?php echo esc_url( $instance['facebook_url'] ); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
				<?php } ?>				

				<?php if( isset($instance['twitter_url']) && $instance['twitter_url'] ) { ?>
					<li><a class="twitter" href="<?php echo esc_url( $instance['twitter_url'] ); ?>" target="_blank" ><i class="fab fa-twitter"></i></a></li>
				<?php } ?>				

				<?php if( isset($instance['gplus_url']) && $instance['gplus_url'] ) { ?>
					<li><a class="g-plus" href="<?php echo esc_url( $instance['gplus_url'] ); ?>" target="_blank"><i class="fab fa-google"></i></a></li>
				<?php } ?>				

				<?php if( isset($instance['linkedin_url']) && $instance['linkedin_url'] ) { ?>
					<li><a class="linkedin" href="<?php echo esc_url( $instance['linkedin_url'] ); ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
				<?php } ?>					

				<?php if( isset($instance['rss_url']) && $instance['rss_url'] ) { ?>
					<li><a class="rss" href="<?php echo esc_url( $instance['rss_url'] ); ?>" target="_blank"><i class="fas fa-rss"></i></a></li>
				<?php } ?>			

				<?php if( isset($instance['pinterest_url']) && $instance['pinterest_url'] ) { ?>
					<li><a class="pinterest" href="<?php echo esc_url( $instance['pinterest_url'] ); ?>" target="_blank"><i class="fab fa-pinterest"></i></a></li>
				<?php } ?>				

				<?php if( isset($instance['delicious_url']) && $instance['delicious_url'] ) { ?>
					<li><a class="delicious" href="<?php echo esc_url( $instance['delicious_url'] ); ?>" target="_blank"><i class="fab fa-delicious"></i></a></li>
				<?php } ?>						

				<?php if( isset($instance['instagram_url']) && $instance['instagram_url'] ) { ?>
					<li><a class="delicious" href="<?php echo esc_url( $instance['instagram_url'] ); ?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
				<?php } ?>				

				<?php if( isset($instance['tumblr_url']) && $instance['tumblr_url'] ) { ?>
					<li><a class="tumblr" href="<?php echo esc_url( $instance['tumblr_url'] ); ?>" target="_blank"><i class="fab fa-tumblr"></i></a></li>
				<?php } ?>				

				<?php if( isset($instance['stumbleupon_url']) && $instance['stumbleupon_url'] ) { ?>
					<li><a class="stumbleupon" href="<?php echo esc_url( $instance['stumbleupon_url'] ); ?>" target="_blank"><i class="fab fa-stumbleupon"></i></a></li>
				<?php } ?>				

				<?php if( isset($instance['flickr_url']) && $instance['flickr_url'] ) { ?>
					<li><a class="flickr" href="<?php echo esc_url( $instance['flickr_url'] ); ?>" target="_blank"><i class="fab fa-flickr"></i></a></li>
				<?php } ?>

				<?php if( isset($instance['dribble_url']) && $instance['dribble_url'] ) { ?>
					<li><a class="dribble" href="<?php echo esc_url( $instance['dribble_url'] ); ?>" target="_blank"><i class="fab fa-dribbble"></i></a></li>
				<?php } ?>
			</ul>

		<?php

		echo $after_widget;
	}


	/*-------------------------------------------------------
	 *				Sanitize data, save and retrive
	 *-------------------------------------------------------*/

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		//Strip tags from title and name to remove HTML 
		$instance['title'] 				= strip_tags( $new_instance['title'] );
		$instance['facebook_url'] 		= $new_instance['facebook_url'];
		$instance['twitter_url'] 		= $new_instance['twitter_url'];
		$instance['gplus_url'] 			= $new_instance['gplus_url'];
		$instance['linkedin_url'] 		= $new_instance['linkedin_url'];
		$instance['rss_url'] 			= $new_instance['rss_url'];
		$instance['pinterest_url'] 		= $new_instance['pinterest_url'];
		$instance['delicious_url'] 		= $new_instance['delicious_url'];
		$instance['instagram_url'] 		= $new_instance['instagram_url'];
		$instance['tumblr_url'] 		= $new_instance['tumblr_url'];
		$instance['stumbleupon_url'] 	= $new_instance['stumbleupon_url'];
		$instance['flickr_url'] 		= $new_instance['flickr_url'];
		$instance['dribble_url'] 		= $new_instance['dribble_url'];

		return $instance;
	}


	/*-------------------------------------------------------
	 *				Back-End display of widget
	 *-------------------------------------------------------*/
	
	public function form( $instance )
	{

		$defaults = array(  'title' 			=> '',
							'facebook_url' 		=> '',
							'twitter_url' 		=> '',
							'gplus_url' 		=> '',
							'linkedin_url' 		=> '',
							'rss_url' 			=> '',
							'pinterest_url' 	=> '',
							'delicious_url' 	=> '',
							'instagram_url' 	=> '',
							'tumblr_url' 		=> '',
							'stumbleupon_url' 	=> '',
							'flickr_url' 		=> '',
							'dribble_url' 		=> ''
			);

		$instance = wp_parse_args( (array) $instance, $defaults );
	   ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e('Title :', 'corpea'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_html( $instance['title'] ); ?>" style="width:100%;" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'facebook_url' ); ?>"><?php esc_html_e('Facebook URL: ', 'corpea'); ?></label>
			<input id="<?php echo $this->get_field_id( 'facebook_url' ); ?>" name="<?php echo $this->get_field_name( 'facebook_url' ); ?>" value="<?php echo esc_url( $instance['facebook_url'] ); ?>" style="width:100%;" />
		</p>		

		<p>
			<label for="<?php echo $this->get_field_id( 'twitter_url' ); ?>"><?php esc_html_e('Twitter URL: ', 'corpea'); ?></label>
			<input id="<?php echo $this->get_field_id( 'twitter_url' ); ?>" name="<?php echo $this->get_field_name( 'twitter_url' ); ?>" value="<?php echo esc_url( $instance['twitter_url'] ); ?>" style="width:100%;" />
		</p>		

		<p>
			<label for="<?php echo $this->get_field_id( 'gplus_url' ); ?>"><?php esc_html_e('Google Plus URL: ', 'corpea'); ?></label>
			<input id="<?php echo $this->get_field_id( 'gplus_url' ); ?>" name="<?php echo $this->get_field_name( 'gplus_url' ); ?>" value="<?php echo esc_url( $instance['gplus_url'] ); ?>" style="width:100%;" />
		</p>		

		<p>
			<label for="<?php echo $this->get_field_id( 'linkedin_url' ); ?>"><?php esc_html_e('Linkedin URL: ', 'corpea'); ?></label>
			<input id="<?php echo $this->get_field_id( 'linkedin_url' ); ?>" name="<?php echo $this->get_field_name( 'linkedin_url' ); ?>" value="<?php echo esc_url( $instance['linkedin_url'] ); ?>" style="width:100%;" />
		</p>			

		<p>
			<label for="<?php echo $this->get_field_id( 'rss_url' ); ?>"><?php esc_html_e('RSS URL: ', 'corpea'); ?></label>
			<input id="<?php echo $this->get_field_id( 'rss_url' ); ?>" name="<?php echo $this->get_field_name( 'rss_url' ); ?>" value="<?php echo esc_url( $instance['rss_url'] ); ?>" style="width:100%;" />
		</p>		

		<p>
			<label for="<?php echo $this->get_field_id( 'pinterest_url' ); ?>"><?php esc_html_e('Pinterest URL: ', 'corpea'); ?></label>
			<input id="<?php echo $this->get_field_id( 'pinterest_url' ); ?>" name="<?php echo $this->get_field_name( 'pinterest_url' ); ?>" value="<?php echo esc_url( $instance['pinterest_url'] ); ?>" style="width:100%;" />
		</p>		

		<p>
			<label for="<?php echo $this->get_field_id( 'delicious_url' ); ?>"><?php esc_html_e('Delicious URL: ', 'corpea'); ?></label>
			<input id="<?php echo $this->get_field_id( 'delicious_url' ); ?>" name="<?php echo $this->get_field_name( 'delicious_url' ); ?>" value="<?php echo esc_url( $instance['delicious_url'] ); ?>" style="width:100%;" />
		</p>			

		<p>
			<label for="<?php echo $this->get_field_id( 'instagram_url' ); ?>"><?php esc_html_e('Instagram URL: ', 'corpea'); ?></label>
			<input id="<?php echo $this->get_field_id( 'instagram_url' ); ?>" name="<?php echo $this->get_field_name( 'instagram_url' ); ?>" value="<?php echo esc_url( $instance['instagram_url'] ); ?>" style="width:100%;" />
		</p>		

		<p>
			<label for="<?php echo $this->get_field_id( 'tumblr_url' ); ?>"><?php esc_html_e('Tumblr URL: ', 'corpea'); ?></label>
			<input id="<?php echo $this->get_field_id( 'tumblr_url' ); ?>" name="<?php echo $this->get_field_name( 'tumblr_url' ); ?>" value="<?php echo esc_url( $instance['tumblr_url'] ); ?>" style="width:100%;" />
		</p>		

		<p>
			<label for="<?php echo $this->get_field_id( 'stumbleupon_url' ); ?>"><?php esc_html_e('Stumbleupon URL: ', 'corpea'); ?></label>
			<input id="<?php echo $this->get_field_id( 'stumbleupon_url' ); ?>" name="<?php echo $this->get_field_name( 'stumbleupon_url' ); ?>" value="<?php echo esc_url( $instance['stumbleupon_url'] ); ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'flickr_url' ); ?>"><?php esc_html_e('Flickr URL: ', 'corpea'); ?></label>
			<input id="<?php echo $this->get_field_id( 'flickr_url' ); ?>" name="<?php echo $this->get_field_name( 'flickr_url' ); ?>" value="<?php echo esc_url( $instance['flickr_url'] ); ?>" style="width:100%;" />
		</p>					

		<p>
			<label for="<?php echo $this->get_field_id( 'dribble_url' ); ?>"><?php esc_html_e('Dribble URL: ', 'corpea'); ?></label>
			<input id="<?php echo $this->get_field_id( 'dribble_url' ); ?>" name="<?php echo $this->get_field_name( 'dribble_url' ); ?>" value="<?php echo esc_url( $instance['dribble_url'] ); ?>" style="width:100%;" />
		</p>
		
	<?php
	}
}