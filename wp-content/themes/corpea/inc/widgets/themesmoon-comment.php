<?php

add_action('widgets_init','register_themesmoon_comments_widget');

function register_themesmoon_comments_widget()
{
	register_widget('Themesmoon_Comments_Widget');
}

class Themesmoon_Comments_Widget extends WP_Widget{

	public function __construct()
	{
		parent::__construct( 'Themesmoon_Comments_Widget','Themeum Comments Widgest',array('description' => 'This Custom Comments Widgets'));
	}


	/*-------------------------------------------------------
	 *				Front-end display of widget
	 *-------------------------------------------------------*/

	public function widget( $args, $instance ) {

		extract( $args );

		//Our variables from the widget settings.
		$title = apply_filters('widget_title', $instance['title'] );

		echo $before_widget;

		if ( $title )
			echo $before_title .'<span class="title-icon-style"><i class="fa fa-comment-o"></i></span> '. $title . $after_title;

		$output = '';
	 	$args = array(
			'status' => 'approve',
			'number' => esc_attr($instance['comments_number']),
		);
		$comments = get_comments($args);

		$output .= '<div class="latest-recent-comments">';
		foreach($comments as $comment) :				
			$output .= '<div class="latest-recent-comment">';
				$output .= '<p>'.$comment->comment_content.'</p>';
				$output .= '<div class="recent-comments-media">';
					$output .= '<div class="recent-comments-image">'.get_avatar( $comment->comment_author_email , $size = '33' ).'</div>';
					$output .= '<div class="recent-comment-wrap"><span class="recent-comments-user">'.$comment->comment_author.'</span>';
					$output .= '<span class="recent-comments-date">'.date('F j Y',strtotime($comment->comment_date)).'</span>,';
					$output .= '<span class="recent-comments-category">'.get_the_category_list( ',', '' , $comment->comment_post_ID ).'</span></div>';
				$output .= '</div>';
			$output .= '</div>';//latest-recent-comment
		endforeach;
		$output .= '</div>';//latest-recent-comments
		echo $output;

		echo $after_widget;
	}


	/*-------------------------------------------------------
	 *				Sanitize data, save and retrive
	 *-------------------------------------------------------*/

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		//Strip tags from title and name to remove HTML 
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['comments_number'] 		= $new_instance['comments_number'];	

		return $instance;
	}


	/*-------------------------------------------------------
	 *				Back-End display of widget
	 *-------------------------------------------------------*/
	
	public function form( $instance )
	{

		$defaults = array(  
			'title' => '',
			'comments_number' => '6'
			);
		$instance = wp_parse_args( (array) $instance, $defaults );
		?>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title : ', 'newedge' ); ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_attr($instance['title']); ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'comments_number' )); ?>"><?php esc_html_e( 'Number Of Comments', 'newedge' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('comments_number'));?>" name="<?php echo esc_attr($this->get_field_name('comments_number')); ?>" value="<?php echo esc_attr($instance['comments_number']); ?>">
		</p>
	
		<?php
	}
}