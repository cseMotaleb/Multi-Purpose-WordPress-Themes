<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */


add_filter( 'rwmb_meta_boxes', 'thm_register_meta_boxes' );

/**
 * Register meta boxes
 *
 * @return void
 */
function thm_register_meta_boxes( $meta_boxes )
{
	/**
	 * Prefix of meta keys (optional)
	 * Use underscore (_) at the beginning to make keys hidden
	 * Alt.: You also can make prefix empty to disable it
	 */
	// Better has an underscore as last sign
	$prefix = 'thm_';

	$meta_boxes[] = array(
		'id' => 'page-meta-settings',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => esc_html__( 'Page Settings', 'newedge' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'page'),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// List of meta fields
		'fields' => array(
			array(
				'name'             => esc_html__( 'Upload Sub Title Banner Image', 'newedge' ),
				'id'               => "{$prefix}subtitle_images",
				'type'             => 'image_advanced',
				'max_file_uploads' => 1,
			),	

			array(
				'name'             => esc_html__( 'Upload Sub Title BG Color', 'newedge' ),
				'id'               => "{$prefix}subtitle_color",
				'type'             => 'color',
				'std' 			   => "#191919"
			),	
		)
	);	

	$meta_boxes[] = array(
		'id' => 'post-meta-color',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => esc_html__( 'Post Color', 'newedge' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'post'),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// List of meta fields
		'fields' => array(
	
			array(
				'name'          => esc_html__( 'Select Color', 'newedge' ),
				'id'            => "{$prefix}post_color",
				'desc'			=> esc_html__( 'Select Your Desire Color', 'newedge' ),
				'type'          => 'select',
				'options' 		=> array(
					'black'					=>	'black',
					'red'					=>	'Red',
					'orange'				=>	'Orange',
					'blue'					=>	'Blue',
					'sky-blue'				=>	'Sky Blue',
					'pink'					=>	'Pink',
					'royal-blue'			=>	'Royal Blue',
					'dark-cyan'				=>	'Dark Cyan',
					'dark-green'			=>	'Dark Green',
					'light-green'			=>	'Light Green',
					'pure-violet'			=>	'Pure Violet',
					'yellow'				=>	'Yellow',
					'none'					=>	'None',
		       	)
			),			

		)
	);	

	$meta_boxes[] = array(
		'id' => 'post-meta-featured',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => esc_html__( 'Featured Post', 'newedge' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'post' ),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
	
			array(
				'name'  		=> esc_html__( 'Featured Post', 'newedge' ),
				'id'    		=> "thm_featured",
				'desc'  		=> esc_html__( 'Featured Post', 'newedge' ),
				'type'  		=> 'checkbox',
				'std'   		=> 0
			)
			
		)
	);


	$meta_boxes[] = array(
		'id' => 'post-meta-editor-picks',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => esc_html__( 'Editor Picks', 'newedge' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'post' ),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
	
			array(
				'name'  		=> esc_html__( 'Editor Picks', 'newedge' ),
				'id'    		=> "thm_editor_picks",
				'desc'  		=> esc_html__( 'Editor Picks', 'newedge' ),
				'type'  		=> 'checkbox',
				'std'   		=> 0
			)
			
		)
	);

	$meta_boxes[] = array(
		'id' => 'post-meta-handpick',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => esc_html__( 'Handpick Post Slide Image', 'newedge' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'post'),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// List of meta fields
		'fields' => array(
			array(
				'name'             => esc_html__( 'Upload Handpick Slide Image', 'newedge' ),
				'id'               => "{$prefix}handpick_image",
				'type'             => 'image_advanced',
				'max_file_uploads' => 1,
			),	
		)
	);		

		// 1st meta box
	$meta_boxes[] = array(
		'id' => 'post-meta-quote',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => esc_html__( 'Post Quote Settings', 'newedge' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'post'),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			array(
				// Field name - Will be used as label
				'name'  => esc_html__( 'Qoute Text', 'newedge' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}qoute",
				'desc'  => esc_html__( 'Write Your Qoute Here', 'newedge' ),
				'type'  => 'textarea',
				// Default value (optional)
				'std'   => ''
			),
			array(
				// Field name - Will be used as label
				'name'  => esc_html__( 'Qoute Author', 'newedge' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}qoute_author",
				'desc'  => esc_html__( 'Write Qoute Author or Source', 'newedge' ),
				'type'  => 'text',
				// Default value (optional)
				'std'   => ''
			)
			
		)
	);


	$meta_boxes[] = array(
		'id' => 'post-meta-link',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => esc_html__( 'Post Link Settings', 'newedge' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'post'),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			array(
				// Field name - Will be used as label
				'name'  => esc_html__( 'Link URL', 'newedge' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}link",
				'desc'  => esc_html__( 'Write Your Link', 'newedge' ),
				'type'  => 'text',
				// Default value (optional)
				'std'   => ''
			)
			
		)
	);


	$meta_boxes[] = array(
		'id' => 'post-meta-audio',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => esc_html__( 'Post Audio Settings', 'newedge' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'post'),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			array(
				// Field name - Will be used as label
				'name'  => esc_html__( 'Audio Embed Code', 'newedge' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}audio_code",
				'desc'  => esc_html__( 'Write Your Audio Embed Code Here', 'newedge' ),
				'type'  => 'textarea',
				// Default value (optional)
				'std'   => ''
			)
			
		)
	);

	$meta_boxes[] = array(
		'id' => 'post-meta-video',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => esc_html__( 'Post Video Settings', 'newedge' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'post'),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			array(
				// Field name - Will be used as label
				'name'  => esc_html__( 'Video Embed Code/ID', 'newedge' ),
				// Field ID, i.e. the meta key
				'id'    => "thm_video",
				'desc'  => esc_html__( 'Write Your Vedio Embed Code/ID Here', 'newedge' ),
				'type'  => 'textarea',
				// Default value (optional)
				'std'   => ''
			),
			array(
				'name'  => __( 'Video Durations', 'newedge' ),
				'id'    => "thm_video_durations",
				'type'  => 'text',
				'std'   => ''
			),			
			array(
				'name'     => esc_html__( 'Select Vedio Type/Source', 'newedge' ),
				'id'       => "{$prefix}video_source",
				'type'     => 'select',
				// Array of 'value' => 'Label' pairs for select box
				'options'  => array(
					'1' => esc_html__( 'Embed Code', 'newedge' ),
					'2' => esc_html__( 'YouTube', 'newedge' ),
					'3' => esc_html__( 'Vimeo', 'newedge' ),
				),
				// Select multiple values, optional. Default is false.
				'multiple'    => false,
				'std'         => '1'
			),
			
		)
	);


	$meta_boxes[] = array(
		'id' => 'post-meta-gallery',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => esc_html__( 'Post Gallery Settings', 'newedge' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'post'),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			array(
				'name'             => esc_html__( 'Gallery Image Upload', 'newedge' ),
				'id'               => "{$prefix}gallery_images",
				'type'             => 'image_advanced',
				'max_file_uploads' => 6,
			)			
		)
	);



	
	return $meta_boxes;
}